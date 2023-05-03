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
            'curator_banner'     => 'mimes:png,jpg',
            'artist_banner'      => 'mimes:png,jpg',
            'favicon'            => 'mimes:png,jpg',
            'logo'               => 'mimes:png,jpg',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }


        // logo check
        if ($request->hasFile('logo'))
        {
            $logo = Webp::make($request->file('logo'))->quality(70);
            $logo->save(public_path('uploads/logo.webp'));
            $logo_new_path = "uploads/logo.webp";

//            $logo = $request->file('logo');
//            $logo_name = 'logo.png';
//            $logo_path = 'uploads/';
//            $logo_new_path = $logo_path.$logo_name;
//            $logo->move($logo_path, $logo_name);

        }

        if ($request->hasFile('favicon'))
        {
            $favicon = Webp::make($request->file('favicon'))->quality(70);
            $favicon->save(public_path('uploads/favicon.webp'));
            $favicon_new_path = "uploads/favicon.webp";

//            $favicon = $request->file('favicon');
//            $favicon_name = 'favicon.ico';
//            $favicon_path = 'uploads/';
//            $favicon_new_path = $favicon_path.$favicon_name;
//            $favicon->move($favicon_path, $favicon_name);
        }

        if ($request->hasFile('artist_banner'))
        {
            $artist_banner_webp = Webp::make($request->file('artist_banner'))->quality(70);
            $artist_banner_webp->save(public_path('images/artist-header.webp'));
        }

        if ($request->hasFile('curator_banner'))
        {
            $curator_banner_webp = Webp::make($request->file('curator_banner'))->quality(70);
            $curator_banner_webp->save(public_path('images/curator-header.webp'));
        }

        if ($request->hasFile('blog_banner'))
        {
            $blog_banner_webp = Webp::make($request->file('blog_banner'))->quality(70);
            $blog_banner_webp->save(public_path('images/blog-bg.webp'));
        }


        $theme = Option::where('key','theme_settings')->first();

        if(!empty($theme))
        {
            $theme_logo = json_decode($theme->value)->logo;
            $theme_favicon = json_decode($theme->value)->favicon;
        }
        $data = [
            'logo'               => !empty($logo_new_path) ? $logo_new_path : $theme_logo,
            'favicon'            => !empty($favicon_new_path) ? "$favicon_new_path" : $theme_favicon,
            'artist_banner'      => !empty($artist_banner_webp) ? "images/artist-header.webp" : "images/artist-header.jpg",
            'curator_banner'     => !empty($curator_banner_webp) ? "images/curator-header.webp" : "images/curator-header.jpg",
            'blog_banner'        => !empty($blog_banner_webp) ? "images/blog-bg.webp" : "images/blog-bg.jpg",
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
            'curator_border'     => $request->curator_border ?? null,
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
