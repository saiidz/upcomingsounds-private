<?php

namespace App\Http\Controllers;

use App\Models\TransactionHistory;
use App\Templates\IStatus;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws \Throwable
     */
    public function processTransaction(Request $request)
    {
        try {
            $totalAmountPaypal = decrypt($request->get('total_amount_paypal'));

            if(!$totalAmountPaypal)
                return redirect()->back()->with('error','Total Amount is required');

            $price = (int) $totalAmountPaypal;
            $currencyPaypal = decrypt($request->get('currency_paypal'));

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
                            "currency_code" => $currencyPaypal,
                            "value" => $price
                        ]
                    ]
                ]
            ]);

            $transactionUserID = decrypt($request->get('transaction_user_id'));
            $contacts_ = decrypt($request->get('contacts'));
            $packageName = decrypt($request->get('package_name'));

            // add data in session
            Session::put([
                'transaction_user_id' => $transactionUserID,
                'total_amount_paypal' => $price,
                'contacts'            => $contacts_,
                'package_name'        => $packageName,
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
        }catch (\Exception $exception)
        {
            return redirect()->back()->with('error', $exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws \Throwable
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
                'payment_status'         => IStatus::COMPLETED,
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
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     */
    public function cancelTransaction(Request $request)
    {
        return redirect('/artist-checkout')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
