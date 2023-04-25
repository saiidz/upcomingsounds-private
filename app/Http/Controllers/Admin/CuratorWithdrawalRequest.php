<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TransactionHistory;
use App\Templates\IStatus;
use App\Templates\IUserType;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CuratorWithdrawalRequest extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function curatorWithdrawalRequest()
    {
        # Withdrawal History
        $withdrawal_curators = TransactionHistory::where(['user_type' => IUserType::CURATOR, 'type' => IUserType::WITHDRAWAL])
            ->latest()->get();

        return view('admin.pages.curator-withdrawal-request.index', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function detailTransactionHistory(TransactionHistory $transactionHistory)
    {
        return view('admin.pages.curator-withdrawal-request.view', get_defined_vars());
    }

    /**
     * @param Request $request
     * @param TransactionHistory $transactionHistory
     * @return JsonResponse
     */
    public function storeApprovedTransactionHistory(Request $request,TransactionHistory $transactionHistory)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($transactionHistory))
        {
            $details = [
                'withdrawal_request' => json_decode($transactionHistory->details)->withdrawal_request,
                'paypal_email'       => json_decode($transactionHistory->details)->paypal_email,
                'wise_email'         => json_decode($transactionHistory->details)->wise_email,
                'withdrawal_message' => $request->description_details ?? null,
            ];

            $transactionHistory->update([
                'payment_status' => IStatus::COMPLETED,
                'details'        => json_encode($details),
            ]);

            $data['email']           = $transactionHistory->user->email;
            $data['username']        = $transactionHistory->user->name;
            $data["title"]           = "Withdrawal Request Approved Upcoming Sounds";
            $data['approvedMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.curator_email.send_approved_email_to_curator', $data, function($message)use($data) {
                    $message->from('gary@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        return response()->json(['success' => 'Transaction History Updated successfully and send email to Curator.']);
    }

    public function storeRejectTransactionHistory(Request $request,TransactionHistory $transactionHistory)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($transactionHistory))
        {
            $details = [
                'withdrawal_request' => json_decode($transactionHistory->details)->withdrawal_request,
                'paypal_email'       => json_decode($transactionHistory->details)->paypal_email,
                'wise_email'         => json_decode($transactionHistory->details)->wise_email,
                'withdrawal_message' => $request->description_details ?? null,
            ];

            $transactionHistory->update([
                'payment_status' => IStatus::CANCELLED,
                'details'        => json_encode($details),
            ]);


            $data['email']           = $transactionHistory->user->email;
            $data['username']        = $transactionHistory->user->name;
            $data["title"]           = "Withdrawal Request Rejected Upcoming Sounds";
            $data['approvedMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.curator_email.send_approved_email_to_curator', $data, function($message)use($data) {
                    $message->from('gary@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }
        }

        return response()->json(['success' => 'Transaction History Updated successfully and send email to Curator.']);
    }
}
