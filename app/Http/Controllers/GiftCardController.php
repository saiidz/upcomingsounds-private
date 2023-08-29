<?php

namespace App\Http\Controllers;

use App\Models\SessionStripe;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Config;
use IlluminateAgnostic\Str\Support\Str;
use Stripe\Checkout\Session;
use Stripe\Exception\ApiErrorException;
use Stripe\Stripe;
use Stripe\StripeClient;

class GiftCardController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        return view('gift-card.index');
    }

    /**
     * @param Request $request
     * @return Application|JsonResponse|RedirectResponse|Redirector
     */
    public function checkout(Request $request)
    {
        $priceID = decrypt($request['price_id']);
        if(empty($priceID))
            return redirect()->back()->with('error','Something went wrong');

        try {
            Stripe::setApiKey(Config::get('services.stripe.secret'));

//            header('Content-Type: application/json');
            $session = Session::create([
//                'payment_method_types' => ['card'],
                'line_items' => [[
                    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                    'price' => $priceID,
//                    'price_data' => [
//                        'currency' => 'usd',
//                        'unit_amount' => 1000,
//                        'product_data' => [
//                            'name' => 'Your Product Name',
//                        ],
//                    ],
                    'quantity' => 1,
                ]],
                'phone_number_collection' => [
                    'enabled' => true,
                ],
                'mode' => 'payment',
                'client_reference_id' => Str::random(6),
//                'success_url' => route('checkout.success',['session_id' => '{CHECKOUT_SESSION_ID}']),
                'success_url' => url('success-checkout?session_id={CHECKOUT_SESSION_ID}'),
                'cancel_url' => route('checkout.failure'),
            ]);
            $timestamp = now()->timestamp;
            $sixDigitTime = substr($timestamp, -6);
            $randomString = Str::random(2); // You can adjust the length as needed

            $couponCode = "UCS-{$sixDigitTime}{$randomString}";

            $session->metadata = ['coupon_code' => $couponCode];

            # Stripe Session Create
            if(!empty($session))
            {
                SessionStripe::create([
                    'session_id'     => $session['id'],
                    'coupon_code'    => $couponCode,
                    'currency'       => $session['currency'],
                    'live_mode'      => !$session['live_mode'] ? 'sandbox' : 'live',
                    'url'            => $session['url'],
                    'payment_status' => $session['payment_status'],
                    'details'        => json_encode($session),
                ]);
            }

            return redirect($session->url);
//            return response()->json(['id' => $session->id]);
        } catch(\Exception $e) {
            return redirect('gift-card')->with('error', $e->getMessage());
//            return response()->json(['error' => $e->getMessage()]);
        }
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws ApiErrorException
     */
    public function checkoutSuccess(Request $request)
    {
        dd($_GET,request()->url(), request()->all(), request()->toArray(),request()->query('session_id'));
        Stripe::setApiKey(Config::get('services.stripe.secret'));
        $session = Session::retrieve($request['session_id']);

        $sessionExist = SessionStripe::where('session_id',$session['id'])->first();

        # update success and failure payment
        if(!empty($sessionExist))
        {
            # update customer
            $stripe = new StripeClient(Config::get('services.stripe.secret'));
            $customer = $stripe->customers->retrieve($session->customer);

            $sessionExist->update([
                'name'               => !empty($customer) ? $customer['name'] : null,
                'email'              => !empty($customer) ? $customer['email'] : null,
                'phone'             => !empty($customer) ? $customer['phone'] : null,
                'payment_status'     => $session['payment_status'],
                'details'            => json_encode($session),
                'stripe_customer_id' => !empty($customer) ? $customer['id'] : null,
                'customer_details'   => json_encode($customer),
            ]);
        }

        return redirect('gift-card')->with('success','Payment has been successfully processed and gift card details send to your email you have entered on stripe payment.');
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws ApiErrorException
     */
    public function checkoutFailure(Request $request)
    {
        Stripe::setApiKey(Config::get('services.stripe.secret'));
        $session = Session::retrieve($request['session_id']);

        $sessionExist = SessionStripe::where('session_id',$session['id'])->first();

        # update success and failure payment
        if(!empty($sessionExist))
        {
            # update customer
            $stripe = new StripeClient(Config::get('services.stripe.secret'));
            $customer = $stripe->customers->retrieve($session->customer);

            $sessionExist->update([
                'name'               => !empty($customer) ? $customer['name'] : null,
                'email'              => !empty($customer) ? $customer['email'] : null,
                'phone'              => !empty($customer) ? $customer['phone'] : null,
                'payment_status'     => $session['payment_status'],
                'details'            => json_encode($session),
                'stripe_customer_id' => !empty($customer) ? $customer['id'] : null,
                'customer_details'   => json_encode($customer),
            ]);
        }

        return redirect('gift-card')->with('error','Payment has been cancelled.');
    }
}
