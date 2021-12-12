<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class YoutubeCuratorSignupController extends Controller
{
    /**
     * postYoutubeSignupStep4
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function postYoutubeSignupStep4(Request $request)
    {
        $request->session()->get('curator_signup');
        $request->session()->get('curator_data');
        $request->session()->put('influencer_data', $request->all());

        return redirect()->route('youtube.signup.step.5');
    }

    /**
     * youtubeSignupStep5
     */
    public function youtubeSignupStep5(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $influencer_data = $request->session()->get('influencer_data');

        if(!empty($curator_data) && !empty($curator_signup) && !empty($influencer_data)){
            if($influencer_data['share_music'] == 'youtube'){
                return view('pages.curators.curator-youtube-signup.youtube-details',compact('curator_data','curator_signup'));
            }
        }else{
            return redirect()->back();
        }
    }

    /**
     * postYoutubeSignupStep5
     */
    public function postYoutubeSignupStep5(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $influencer_data = $request->session()->get('influencer_data');

        if(!empty($curator_data) && !empty($curator_signup) && !empty($influencer_data)){
            return redirect()->route('curator.signup.step.6');
        }else{
            return redirect()->back();
        }
    }
}
