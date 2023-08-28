<?php

namespace App\Http\Controllers;

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
use Stripe\Stripe;

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
     * @param $couponCode
     * @return Application|JsonResponse|RedirectResponse|Redirector
     */
    public function checkout($couponCode = null)
    {
        try {
            Stripe::setApiKey(Config::get('services.stripe.secret'));

            header('Content-Type: application/json');
            $session = Session::create([
                'payment_method_types' => ['card'],
                'line_items' => [[
                    # Provide the exact Price ID (e.g. pr_1234) of the product you want to sell
                    'price' => 'price_1NiM8gAW5mXOlAUREFgQSUWi',
//                    'price_data' => [
//                        'currency' => 'usd',
//                        'unit_amount' => 1000,
//                        'product_data' => [
//                            'name' => 'Your Product Name',
//                        ],
//                    ],
                    'quantity' => 1,
                ]],
                'mode' => 'payment',
                'client_reference_id' => Str::random(6),
//                'success_url' => route('checkout.success',['session_id' => CHECKOUT_SESSION_ID]),
                'success_url' => url('success-checkout?session_id={CHECKOUT_SESSION_ID}'),
                'cancel_url' => route('checkout.failure'),
            ]);

            if ($couponCode) {
                $session->metadata = ['coupon_code' => $couponCode];
            }
            header("HTTP/1.1 303 See Other");
            header("Location: " . $session->url);

            return redirect($session->url);
//            return response()->json(['id' => $session->id]);
        } catch(\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    public function checkoutSuccess(Request $request)
    {
        Stripe::setApiKey(Config::get('services.stripe.secret'));
        $session = Session::retrieve($request['session_id']);
        $stripe = new \Stripe\StripeClient(Config::get('services.stripe.secret'));
        $customer = $stripe->customers->retrieve($session->customer);

        dd($session,$customer);
        $couponCode = $session->metadata['coupon_code'] ?? null;

        if ($couponCode) {
            $this->applyCoupon($couponCode);
        }

        // Process the user's order or subscription
        // You can handle this according to your application's logic
    }

    public function checkoutFailure(Request $request)
    {

        $session = Session::retrieve($request->session_id);
        $couponCode = $session->metadata['coupon_code'] ?? null;
        if ($couponCode) {
            $this->applyCoupon($couponCode);
        }

        // Process the user's order or subscription
        // You can handle this according to your application's logic
    }
}
