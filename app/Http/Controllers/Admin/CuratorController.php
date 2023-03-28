<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Helpers\Helper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Templates\IMessageTemplates;
use Illuminate\Support\Facades\Mail;
use App\Models\CuratorVerificationForm;
use Illuminate\Support\Facades\Validator;

class CuratorController extends Controller
{
    /**
     * approvedCurator function
     *
     * @return void
     */

    public function approvedCurator()
    {
        $approved_curators = User::GetApprovedCurators()->latest()->get();
        return view('admin.pages.curators.curator_approved', get_defined_vars());
    }

     /**
     * pendingCurator function
     *
     * @return void
     */

    public function pendingCurator()
    {
        $pending_curators = User::GetPendingCurators()->latest()->get();
        return view('admin.pages.curators.curator_pending', get_defined_vars());
    }

    /**
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deleteCurator($id)
    {
        User::where('id',$id)->delete();
        return redirect()->back()->with('success','Curator deleted successfully');
    }

    /**
     * profileCurator function
     *
     * @return void
     */

    public function profileCurator(User $user)
    {
        return view('admin.pages.curators.curator_view', get_defined_vars());
    }

    /**
     * verificationCurator function
     *
     * @return void
     */

    public function verificationCurator()
    {
        $user_curators = User::with('curatorVerificationForm')->where('is_approved',1)->where('type','curator')->get();
        // $verification_curators = CuratorVerificationForm::latest()->get();;
        return view('admin.pages.curators.curator_verification', get_defined_vars());
    }

     /**
     * storeApprovedCurator function
     *
     * @return void
     */

    public function storeApprovedCurator(Request $request,User $user)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($user))
        {
            $user->update([
                'is_approved' => 1,
                'is_rejected' => 0,
            ]);

            $data['email'] = $user->email;
            $data['username'] = $user->name;
            $data["title"] = "Approved Curator Upcoming Sounds";
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
        return response()->json(['success' => 'Curator Approved successfully and send email to Curator.']);
        // return redirect()->back()->with('success','Curator Approved successfully');
    }

    /**
     * storeRejectCurator function
     *
     * @return void
     */

    public function storeRejectCurator(Request $request,User $user)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($user))
        {
            $user->update([
                'is_approved' => 0,
                'is_rejected' => 1,
            ]);

            $data['email'] = $user->email;
            $data['username'] = $user->name;
            $data["title"] = "Curator Rejected";
            $data['rejectMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.curator_email.send_reject_email_to_curator', $data, function($message)use($data) {
                    $message->from('no_reply@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }
        }
        return response()->json(['success' => 'Curator Reject successfully and send email to Curator.']);
        // return redirect()->back()->with('success','Curator Reject successfully and send email to Curator.');
    }




    /**
     * curatorVerifcationShow function
     *
     * @return void
     */

    public function curatorVerifcationShow(User $user)
    {
        if(!empty($user))
        {
            $verification_curators = CuratorVerificationForm::where('user_id',$user->id)->latest()->get();
            return view('admin.pages.curators.curator_verification_view', get_defined_vars());
        }else{
            return redirect()->back();
        }

    }

    /**
     * storeVerifiedCurator function
     *
     * @return void
     */

    public function storeVerifiedCurator(Request $request,User $user)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($user))
        {
            $user->update([
                'is_verified' => 1,
                'is_rejected' => 0
            ]);

            $data['email'] = $user->email;
            $data['username'] = $user->name;
            $data["title"] = "Verified Verification Curator Upcoming Sounds";
            $data['verifiedMessage'] = $request->description_details ?? null;

            try {
                Mail::send('admin.emails.curator_email.send_verified_email_to_curator', $data, function($message)use($data) {
                    $message->from('no_reply@upcomingsounds.com');
                    $message->to($data["email"], $data["email"])
                        ->subject($data["title"]);
                });
            } catch (\Throwable $th) {
                //throw $th;
            }

            // if($user->phone_number)
            // {
            //     Helper::twilioOtp($user->phone_number, IMessageTemplates::CURATORVERIFYMESSAGE);
            // }
        }
        return response()->json(['success' => 'Curator Verified successfully and send email to Curator.']);
        // return redirect()->back()->with('success','Curator Verified successfully');
    }

    /**
     * storeRejectedCurator function
     *
     * @return void
     */

    public function storeRejectedCurator(Request $request,User $user)
    {
        $validator = Validator::make($request->all(), [
            'description_details' => "required",
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if(!empty($user))
        {
            if(!empty($user->curatorVerificationForm))
            {
                $count_apply = $user->curatorVerificationForm->last()->apply_count;

                if($count_apply == 3)
                {
                    $user->update([
                        'is_verified' => 0,
                        'is_rejected' => 1
                    ]);

                    // if($user->phone_number)
                    //     Helper::twilioOtp($user->phone_number, IMessageTemplates::CURATORREJECTEDCOMPLETEDMESSAGE);
                }else{
                    // if($user->phone_number)
                    //     Helper::twilioOtp($user->phone_number, IMessageTemplates::CURATORREJECTEDMESSAGE);

                }

                $data['email'] = $user->email;
                $data['username'] = $user->name;
                $data["title"] = "Rejected Verification Curator Upcoming Sounds";
                $data['verifiedRejectMessage'] = $request->description_details ?? null;

                try {
                    Mail::send('admin.emails.curator_email.send_verified_rejected_email_to_curator', $data, function($message)use($data) {
                        $message->from('no_reply@upcomingsounds.com');
                        $message->to($data["email"], $data["email"])
                            ->subject($data["title"]);
                    });
                } catch (\Throwable $th) {
                    //throw $th;
                }
            }

        }
        return response()->json(['success' => 'Curator Verified Rejected successfully and send email to Curator.']);
        // return redirect()->back()->with('success','Curator Rejected successfully and send message to curator.');
    }
}
