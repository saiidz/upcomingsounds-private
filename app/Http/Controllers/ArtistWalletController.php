<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
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
        $stripe = new StripeClient(Config('services.stripe.secret'));

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


        Stripe::setApiKey(Config::get('services.stripe.secret'));

        $intent = SetupIntent::create([
            'usage' => 'on_session',  // The default usage is off_session
        ]);

//        $numberss = number_format($number / 100, 2);

        return view('pages.artists.artist-wallet.wallet', get_defined_vars());
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
            'package_name'           => $request->package_name,
            'amount'                 => ($charges->amount) ? $charges->amount/100 : null,
            'contacts'               => $request->contacts,
            'payment_status'         => 'completed',
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
