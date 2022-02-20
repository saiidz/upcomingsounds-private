<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction(Request $request)
    {
        if(!$request->get('total_amount_paypal')){
            return redirect()->back()->with('error','Total Amount is required');
        }
        $price = (int) $request->get('total_amount_paypal');
        $currency_paypal = $request->get('currency_paypal');

        $provider = new PayPalClient;
        $provider->setApiCredentials(Config::get('paypal'));

        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => url('/success-transaction'),
                "cancel_url" => url('/cancel-transaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => $currency_paypal,
                        "value" => $price
                    ]
                ]
            ]
        ]);

        // add data in session
        Session::put([
            'transaction_user_id' => $request->get('transaction_user_id'),
            'total_amount_paypal' => $price,
            'contacts'            => $request->get('contacts'),
            'package_name'        => $request->get('package_name'),
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }

            return redirect('/artist-checkout')
                ->with('error', 'Something went wrong.');

        } else {
            return redirect('/artist-checkout')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(Config::get('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            // get session values
            $transaction_user_id = Session::get('transaction_user_id');
            $total_amount_paypal = Session::get('total_amount_paypal');
            $contacts            = Session::get('contacts');
            $package_name        = Session::get('package_name');

            $user = $request->user();

            $payment_response =  json_encode($request->all());

            TransactionHistory::create([
                'user_id'                => $user->id,
                'user_type'              => $user->type,
                'transaction_user_id'    => $transaction_user_id,
                'package_name'           => $package_name,
                'amount'                 => isset($response['purchase_units']) ? $response['purchase_units'][0]['payments']['captures'][0]['amount']['value'] : null,
                'credits'                => $contacts,
                'payment_status'         => 'completed',
                'payment_method'         => 'paypal',
                'payment_response'       => $payment_response,
                'paid_at'                => Carbon::now(),
                'gateway_transaction_id' => isset($response['purchase_units']) ? $response['purchase_units'][0]['payments']['captures'][0]['id'] : null,
            ]);

            return redirect('/wallet')
                ->with('success', 'Payment has been successfully processed.');
        } else {
            return redirect('/artist-checkout')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }

    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect('/artist-checkout')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
