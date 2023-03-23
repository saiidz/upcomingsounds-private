<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Buglinjo\LaravelWebp\Webp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class OptionController extends Controller
{
    /**
     * settingsEdit function
     *
     * @return void
     */
    public function settingsEdit()
    {
        $theme = Option::where('key', 'theme_settings')->first();
        return view('admin.pages.option.theme', get_defined_vars());
    }

    /**
     * settingsUpdate function
     *
     * @param Request $request
     * @return void
     */
    public function settingsUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'footer_description' => 'required',
            'reddit_icon'        => 'required',
            'tiktok_icon'        => 'required',
            'youtube_icon'       => 'required',
            'twitter_icon'       => 'required',
            'spotify_icon'       => 'required',
            'instagram_icon'     => 'required',
            'facebook_icon'      => 'required',
            'favicon'            => 'mimes:png,jpg',
            'logo'               => 'mimes:png,jpg',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

//        $webp = Webp::make($request->file('artist_banner'))->quality(70);
//        $webp->save(public_path('images/artist-header.webp'));
//        dd($webp,$request->all());
        // logo check
        if ($request->hasFile('logo')) {
            $logo = $request->file('logo');
            $logo_name = 'logo.png';
            $logo_path = 'uploads/';
            $logo_new_path = $logo_path.$logo_name;
            $logo->move($logo_path, $logo_name);

        }

        if ($request->hasFile('favicon')) {
            $favicon = $request->file('favicon');
            $favicon_name = 'favicon.ico';
            $favicon_path = 'uploads/';
            $favicon_new_path = $favicon_path.$favicon_name;
            $favicon->move($favicon_path, $favicon_name);
        }

        $theme = Option::where('key','theme_settings')->first();

        if(!empty($theme))
        {
            $theme_logo = json_decode($theme->value)->logo;
            $theme_favicon = json_decode($theme->value)->favicon;
        }
        $data = [
            'logo'               => !empty($logo_new_path) ? $logo_new_path : $theme_logo,
            'favicon'            => !empty($favicon_new_path) ? $favicon_new_path : $theme_favicon,
            'facebook_icon'      => $request->facebook_icon,
            'facebook_link'      => $request->facebook_link,
            'instagram_icon'     => $request->instagram_icon,
            'instagram_link'     => $request->instagram_link,
            'spotify_icon'       => $request->spotify_icon,
            'spotify_link'       => $request->spotify_link,
            'twitter_icon'       => $request->twitter_icon,
            'twitter_link'       => $request->twitter_link,
            'youtube_icon'       => $request->youtube_icon,
            'youtube_link'       => $request->youtube_link,
            'tiktok_icon'        => $request->tiktok_icon,
            'tiktok_link'        => $request->tiktok_link,
            'reddit_icon'        => $request->reddit_icon,
            'reddit_link'        => $request->reddit_link,
            'footer_description' => $request->footer_description,
        ];



        if(!empty($theme))
        {
            Option::where(['id' => $theme->id, 'key' => $theme->key])->update([
                'key'   => 'theme_settings',
                'value' => json_encode($data),
            ]);

        }else{
            Option::create([
                'key'   => 'theme_settings',
                'value' => json_encode($data),
            ]);
        }

       return response()->json(['success' => 'Theme Settings Updated!.']);
    }
}
