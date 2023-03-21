<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PlaylistCuratorSignupController extends Controller
{
    /**
     * postPlaylistSignupStep3
     *
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    public function postPlaylistSignupStep3(Request $request)
    {
        // Forget a key...
        $request->session()->forget('youtuber_data');
        $request->session()->forget('influencer_data');

        $request->session()->get('curator_signup');
        $request->session()->get('curator_data');
        $request->session()->put('playlist_data', $request->all());

        return redirect()->route('playlist.signup.step.4');
    }
    /**
     * playlistSignupStep4
     */
    public function playlistSignupStep4(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $playlist_data = $request->session()->get('playlist_data');

        if(!empty($curator_data) && !empty($curator_signup) && !empty($playlist_data)){
            if($playlist_data['share_music'] == 'playlist_spotify'){
                return view('pages.curators.curator-signup.social-media',compact('curator_data','curator_signup'));
//                return view('pages.curators.curator-playlist-signup.playlist-spotify-details',compact('curator_data','curator_signup'));
            }elseif ($playlist_data['share_music'] == 'playlist_deezer'){
                return view('pages.curators.curator-signup.social-media',compact('curator_data','curator_signup'));
//                return view('pages.curators.curator-playlist-signup.playlist-deezer-details',compact('curator_data','curator_signup'));
            }elseif ($playlist_data['share_music'] == 'playlist_apple'){
                return view('pages.curators.curator-signup.social-media',compact('curator_data','curator_signup'));
//                return view('pages.curators.curator-playlist-signup.playlist-apple-details',compact('curator_data','curator_signup'));
            }
        }else{
            return redirect()->back();
        }
    }

    /**
     * postPlaylistSignupStep4
     */
    public function postPlaylistSignupStep4(Request $request)
    {
        $curator_signup = $request->session()->get('curator_signup');
        $curator_data = $request->session()->get('curator_data');
        $playlist_data = $request->session()->get('playlist_data');

        if(!empty($curator_data) && !empty($curator_signup) && !empty($playlist_data)){
            return redirect()->route('curator.signup.step.social.media');
        }else{
            return redirect()->back();
        }
    }
}
