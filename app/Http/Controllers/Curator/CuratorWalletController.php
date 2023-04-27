<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CuratorTransfer;
use App\Models\SendOfferTransaction;
use App\Models\TransactionHistory;
use App\Models\TransactionUserInfo;
use App\Models\User;
use App\Templates\IOfferTemplateStatus;
use App\Templates\IStatus;
use App\Templates\IUserType;
use Carbon\Carbon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CuratorWalletController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function wallet()
    {
        $countries = Country::all();
        # Withdrawal History
        $withdrawal_histories = TransactionHistory::where(['user_id' => Auth::id(),'user_type' => IUserType::CURATOR, 'type' => IUserType::WITHDRAWAL])
            ->latest()->get();

        #__offer_payments
        $offer_payments = SendOfferTransaction::where(['curator_id' => Auth::id(),'is_approved' => IOfferTemplateStatus::IS_APPROVED,'status' => IOfferTemplateStatus::PAID])
            ->latest()->get();

        #__referral_payments
        $referral_payments = TransactionHistory::where(['user_id' => Auth::id(),'payment_status' => IStatus::COMPLETED])
            ->whereNotNull('referral_relationship_id')->latest()->get();

        // get billing info if exists
        $curator_billing_info = TransactionUserInfo::where('user_id',Auth::id())->latest()->first();
        $curator_billing_info = $curator_billing_info ?? null;

        return view('pages.curators.curator-wallet.wallet',get_defined_vars());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function curatorBillingInfo(Request $request)
    {
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
        $curator_billing_info_exist = TransactionUserInfo::where('id',$request->get('transaction_user_infos_id'))
            ->where('user_id',Auth::id())->first();
        if(isset($curator_billing_info_exist)){

            $input['city_id'] = $request->get('city_name');
            $curator_billing_info_exist->update($input);

            return redirect()->back()->with('success', 'Billing Info updated successfully.');
        }

        $input['user_id'] = Auth::id();
        $input['city_id'] = $request->get('city_name');

        TransactionUserInfo::create($input);

        return redirect()->back()->with('success', 'Billing Info created successfully.');
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function curatorWithdrawalRequest(Request $request)
    {
        if(empty($request->paypal_email) && ($request->withdrawal_request == IStatus::PAYPAL))
            $requiredEmail = 'required|email';
        elseif(empty($request->wise_email) && ($request->withdrawal_request == IStatus::WISE))
//            $requiredEmail = 'required|email';

        $validator = Validator::make($request->all(), [
            'email'  => !empty($requiredEmail) ? $requiredEmail : '',
            'amount' => 'required|numeric',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $user = Auth::user();

        # check curator balance
        $balance = User::curatorBalance();
        $amount = $request->amount;
        if($amount > $balance)
        {
            return response()->json(['error' => 'You have insufficient balance in your wallet']);
        }

        $details = [
            'withdrawal_request'          => $request->withdrawal_request,
            'paypal_email'                => $request->paypal_email ?? null,
            'wise_email'                  => $request->wise_email ?? null,
            'insideUK'                    => $request->insideUK ?? null,
            'wise_account_holder_inside'  => $request->wise_account_holder_inside ?? null,
            'wise_account_number_inside'  => $request->wise_account_number_inside ?? null,
            'wise_sort_code_inside'       => $request->wise_sort_code_inside ?? null,
            'wise_iban_inside'            => $request->wise_iban_inside ?? null,
            'wise_address_inside'         => $request->wise_address_inside ?? null,
            'outsideUK'                   => $request->outsideUK ?? null,
            'wise_account_holder_outside' => $request->wise_account_holder_outside ?? null,
            'wise_account_number_outside' => $request->wise_account_number_outside ?? null,
            'wise_bic_swift_outside'      => $request->wise_bic_swift_outside ?? null,
            'wise_iban_outside'           => $request->wise_iban_outside ?? null,
            'wise_address_outside'        => $request->wise_address_outside ?? null,
        ];

        # withdrawal request
        TransactionHistory::create([
            'user_id'             => $user->id,
            'user_type'           => $user->type,
            'type'                => IUserType::WITHDRAWAL,
            'transaction_user_id' => $request->transaction_user_infos_id,
            'amount'              => $amount,
            'payment_status'      => IStatus::PENDING,
            'paid_at'             => Carbon::now(),
            'details'             => json_encode($details),
        ]);

//        $data['trackID'] = $artist_track->id;
//        $data['email'] = $artist_track->user->email;
//        $data['username'] = $artist_track->user->name;
//        $data["title"] = "Request to Withdrawal Admin";
//        $data['requestEditTrackAdmin'] = $request->description_details ?? null;
//
//        try {
//            Mail::send('pages.artists.emails.send_request_to_edit_email_admin', $data, function($message)use($data) {
//                $message->from($data["email"], $data["email"]);
//                $message->to('admin@upcomigspunds.com')
//                    ->subject($data["title"]);
//            });
//        } catch (\Throwable $th) {
//            //throw $th;
//        }

        return response()->json(['success' => 'Withdrawal request created successfully. Please wait for approval from admin side.']);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function curatorWalletHistory(Request $request)
    {
        $curator_transaction_user = TransactionUserInfo::where('user_id',Auth::id())->first();

        if($request->requestFrom == IStatus::HISTORY_WITHDRAWAL)
        {
            $renderHtml = view('pages.curators.curator-wallet.__history_withdrawal')->with('historyWithdrawal', $curator_transaction_user)->render();
        }elseif ($request->requestFrom == IStatus::OFFER_PAYMENTS)
        {
            $renderHtml = view('pages.curators.curator-wallet.__offer_payments')->with('historyWithdrawal', $curator_transaction_user)->render();
        }elseif ($request->requestFrom == IStatus::REFERRAL_PAYMENTS)
        {
            $renderHtml = view('pages.curators.curator-wallet.__referral_payments')->with('historyWithdrawal', $curator_transaction_user)->render();
        }

        return response()->json([
            'renderHtml'  => $renderHtml,
            'requestFrom' => $request->requestFrom,
            'success'     => 'Success',
        ]);
    }

    /**
     * curatorTransfer
     */
    public function curatorTransfer(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email'                => 'required|email',
            'amount'               => 'required|numeric',
            'g-recaptcha-response' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $input = $request->all();

        $email_exists = User::where('email',$request->email)->where('id','!=', Auth::id())->first();

        if(isset($email_exists))
        {
            $input = $request->all();
            $input['user_id'] = $email_exists->id;
            $input['email'] = $email_exists->email;

            // create record
            CuratorTransfer::create($input);

            // auth user info
            $auth_email = Auth::user();

            // Send Email of curator transfer emails
            $data['email'] = $email_exists->email;
            $data['username'] = $email_exists->name;
            $data['amount'] = $request->amount;
            $data['auth_username'] = $auth_email->name;
            $data["title"] = "Curator Transfer Upcoming Sounds";

            Mail::send('pages.curators.emails.send_email_amount_curator_transfer', $data, function($message)use($data,$auth_email) {
//                $message->from($auth_email->email);
                $message->to($data["email"], $data["email"])
                    ->subject($data["title"]);
            });
            return redirect()->back()->with('success', 'Transfer Amount send successfully.');
        }else{
            return redirect()->back()->with('error', 'Email does not exists. Please enter correct email.');
        }
    }

}
