<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CuratorDetailsSignupController extends Controller
{

    /**
     * postCuratorsSignupStep4
     */
    public function postCuratorsSignupStep4(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');

        if(!empty($curator_data) && !empty($curator_signup)){
            return redirect()->route('curator.signup.step.social.media');
        }else{
            return redirect()->back();
        }
    }
}
