<?php

namespace App\Http\Controllers;

use App\Models\Artist\ArtistCouponGiftCard;
use App\Models\Country;
use App\Models\TransactionHistory;
use App\Models\TransactionUserInfo;
use App\Models\User;
use App\Templates\I_PRODUCTS;
use App\Templates\IOfferTemplateStatus;
use App\Templates\IStatus;
use Carbon\Carbon;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;
use Stripe\SetupIntent;
use Stripe\Stripe;
use Stripe\StripeClient;

class ArtistWalletController extends Controller
{
    /**
     * shop
     */
    public function wallet()
    {
//        dd(Auth::user()->transactionHistory->sum('credits'));
        # ArtistCouponGiftCards
        $artistCouponGiftCards = ArtistCouponGiftCard::where([
                'user_id' => Auth::id(),
                'status' => IOfferTemplateStatus::PAID,
            ])->get();

        $stripe = new StripeClient(Config('services.stripe.secret'));

        /**
         *Sandbox Products Stripe
         */
        // Standard package
        $standard_products =  $stripe->prices->all(['product' => 'prod_L1zUPPaOgM1c6X']);

        // Plus package
        $plus_products =  $stripe->prices->all(['product' => 'prod_L2146ETp1Ff9j1']);

        // Most popular package
        $most_popular_products =  $stripe->prices->all(['product' => 'prod_L219VceVVRqZgN']);

        // Premium package
        $premium_products =  $stripe->prices->all(['product' => 'prod_L21E6DBKjpt0Ya']);

        // Platinum package
        $platinum_products =  $stripe->prices->all(['product' => 'prod_L21JVzBAJvcxEH']);

        # 1 USC package product
        $one_usc_products =  $stripe->prices->all(['product' => I_PRODUCTS::ONE_USC_PRODUCT]);
//dd($one_usc_products);
        /**
         *Sandbox Products Stripe
         */

        Stripe::setApiKey(Config::get('services.stripe.secret'));

        $intent = SetupIntent::create([
            'usage' => 'on_session',  // The default usage is off_session
        ]);

        $artist_transaction_user = TransactionUserInfo::where('user_id',Auth::id())->first();

//        $numberss = number_format($number / 100, 2);

        return view('pages.artists.artist-wallet.wallet', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function checkout(Request $request)
    {
        $price = $request->get('price');
        $currency = $request->get('currency');
        $contacts = $request->get('contacts');
        $package = $request->get('package');
        if(!empty($request->requestFrom))
            $requestFrom = $request->get('amount_USC');

        $request->session()->put('purchase_data', $request->all());

        return response()->json([
            'status'    => TRUE,
            'price'     => $price,
            'currency'  => $currency,
            'contacts'  => $contacts,
            'package'   => $package,
            'amountUSC'   => !empty($requestFrom) ? $requestFrom : null,
        ]);
    }
    /**
     * artistCheckout
     */
    public function artistCheckout(Request $request)
    {
        $purchase_data = $request->session()->get('purchase_data');

        if(empty($purchase_data))
            return abort(403);

        if(!empty($request->status) && !empty($request->send_offer_id) && !empty($request->contribution))
        {
            try {
                $status = $request->status;
                $send_offer_id = decrypt($request->send_offer_id);
                $contribution = decrypt($request->contribution);
            }catch (DecryptException $exception)
            {
                abort('403');
            }
        }
        $countries = Country::all();

        Stripe::setApiKey(Config::get('services.stripe.secret'));

        $intent = SetupIntent::create([
            'usage' => 'on_session',  // The default usage is off_session
        ]);

        // get billing info if exists
        $artist_billing_info = TransactionUserInfo::where('user_id',Auth::id())->latest()->first();
        $artist_billing_info = $artist_billing_info ?? null;
        return view('pages.artists.artist-wallet.checkout', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function artistBillingInfo(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'first_name'           => 'required|string',
            'last_name'            => 'required|string',
            'phone_number'         => 'required|numeric',
            'address'              => 'required',
            'country_name'         => 'required',
            'city_name'            => 'required',
            'postal_code'          => 'required|numeric',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();

        // check record is already exists
        $artist_billing_info_exist = TransactionUserInfo::where('id',$request->get('transaction_user_infos_id'))
                                                        ->where('user_id',Auth::id())->first();
        if(isset($artist_billing_info_exist)){

            $input['city_id'] = $request->get('city_name');
            $artist_billing_info_exist->update($input);

            return redirect()->back()->with('success', 'Billing Info updated successfully.');
        }

        $input['user_id'] = Auth::id();
        $input['city_id'] = $request->get('city_name');

        TransactionUserInfo::create($input);

        return redirect()->back()->with('success', 'Billing Info created successfully.');
    }
    /**
     * handling payment with POST
     */
    public function handlePost(Request $request)
    {
        $stripe = new StripeClient(Config('services.stripe.secret'));
        $user = $request->user();
        if(empty($user->stripe_id)){
            // create stripe customer
            $customer = $stripe->customers->create([
                'name' => $user->name,
                'email' => $user->email,
                'payment_method' => $request->paymentMethod,
                'description' => 'I am '.$user->type,
            ]);
            // update user stripe id
            $user->update([
                'stripe_id' => ($customer->id) ? $customer->id : null,
            ]);
        }

        // retrieve customer
        $customer = $stripe->customers->retrieve(
            $user->stripe_id,
        );
//        $user->createOrGetStripeCustomer();

        // charge payment
        $charges = $stripe->charges->create(
            [
            'amount' => $request->get('total_amount_stripe') * 100,
            'currency' => $request->get('currency_stripe'),
            'source' => $request->get('cardMethod'),
            ]
        );


        $payment_response =  json_encode($request->all());

        TransactionHistory::create([
            'user_id'                => $user->id,
            'user_type'              => $user->type,
            'transaction_user_id'    => $request->transaction_user_id,
            'package_name'           => $request->package_name,
            'amount'                 => ($charges->amount) ? $charges->amount/100 : null,
            'credits'                => $request->contacts,
            'payment_status'         => IStatus::COMPLETED,
            'payment_method'         => 'stripe',
            'payment_response'       => $payment_response,
            'paid_at'                => Carbon::now(),
            'transaction_id'         => ($charges->balance_transaction) ? $charges->balance_transaction : null,
            'customer_id'            => ($customer->id) ? $customer->id : null,
            'gateway_transaction_id' => ($charges->id) ? $charges->id : null,
        ]);

        return redirect('wallet')->with('success','Payment has been successfully processed');
    }
}
