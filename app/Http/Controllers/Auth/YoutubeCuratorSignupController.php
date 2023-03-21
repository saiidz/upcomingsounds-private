<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class YoutubeCuratorSignupController extends Controller
{
    /**
     * postYoutubeSignupStep3
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function postYoutubeSignupStep3(Request $request)
    {
        // Forget a key...
        $request->session()->forget('influencer_data');
        $request->session()->forget('playlist_data');

        $request->session()->get('curator_signup');
        $request->session()->get('curator_data');
        $request->session()->put('youtuber_data', $request->all());

        return redirect()->route('youtube.signup.step.4');
    }

    /**
     * youtubeSignupStep4
     */
    public function youtubeSignupStep4(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $youtuber_data = $request->session()->get('youtuber_data');

        if(!empty($curator_data) && !empty($curator_signup) && !empty($youtuber_data)){
            if($youtuber_data['share_music'] == 'youtube'){
                return view('pages.curators.curator-signup.social-media',compact('curator_data','curator_signup'));
//                return view('pages.curators.curator-youtube-signup.youtube-details',compact('curator_data','curator_signup'));
            }
        }else{
            return redirect()->back();
        }
    }

    /**
     * postYoutubeSignupStep4
     */
    public function postYoutubeSignupStep4(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $youtuber_data = $request->session()->get('youtuber_data');

        if(!empty($curator_data) && !empty($curator_signup) && !empty($youtuber_data)){
            return redirect()->route('curator.signup.step.social.media');
        }else{
            return redirect()->back();
        }
    }
}
