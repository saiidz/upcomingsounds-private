<?php

namespace App\Http\Controllers\Curator;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\CuratorTransfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class CuratorWalletController extends Controller
{
    /**
     * shop
     */
    public function wallet()
    {
        $countries = Country::all();
        return view('pages.curators.curator-wallet.wallet',get_defined_vars());
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
