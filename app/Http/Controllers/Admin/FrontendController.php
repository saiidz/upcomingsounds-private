<?php

namespace App\Http\Controllers\Admin;

use App\Models\Option;
use Buglinjo\LaravelWebp\Webp;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class FrontendController extends Controller
{

     /**
     * homeSection function
     *
     * @return void
     */
    public function homeSection()
    {
        $theme = Option::where('key', 'home_settings')->first();
        return view('admin.pages.frontend.home', get_defined_vars());
    }

    /**
     * homeSectionUpdate function
     *
     * @param Request $request
     * @return void
     */
    public function homeSectionUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'description_three_end_section' => 'required',
            'title_three_end_section'       => 'required',
            'description_two_end_section'   => 'required',
            'title_two_end_section'         => 'required',
            'description_one_end_section'   => 'required',
            'title_one_end_section'         => 'required',
            'image'                         => 'mimes:png,jpg',
            'upcoming_sound_content_three'  => 'required',
            'upcoming_sound_content_two'    => 'required',
            'upcoming_sound_content_one'    => 'required',
            'btn_link_three'                => 'required',
            'btn_text_three'                => 'required',
            'description_three'             => 'required',
            'title_three'                   => 'required',
            'banner_three'                  => 'mimes:png,jpg',
            'btn_link_two'                  => 'required',
            'btn_text_two'                  => 'required',
            'description_two'               => 'required',
            'title_two'                     => 'required',
            'banner_two'                    => 'mimes:png,jpg',
            'btn_link_one'                  => 'required',
            'btn_text_one'                  => 'required',
            'description_one'               => 'required',
            'title_one'                     => 'required',
            'banner_one'                    => 'mimes:png,jpg',
            'curator_btn_link'              => 'required',
            'curator_btn_text'              => 'required',
            'curator_description'           => 'required',
            'curator_title'                 => 'required',
            'artist_btn_link'               => 'required',
            'artist_btn_text'               => 'required',
            'artist_description'            => 'required',
            'artist_title'                  => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->hasFile('banner_one')) {
            $banner_one = $request->file('banner_one');
            $banner_one_name = 'banner_one.png';
            $banner_one_path = 'uploads/homesection/';
            $banner_one_new_path = $banner_one_path.$banner_one_name;
            $banner_one->move($banner_one_path, $banner_one_name);
        }

        if ($request->hasFile('banner_two')) {
            $banner_two = $request->file('banner_two');
            $banner_two_name = 'banner_two.png';
            $banner_two_path = 'uploads/homesection/';
            $banner_two_new_path = $banner_two_path.$banner_two_name;
            $banner_two->move($banner_two_path, $banner_two_name);
        }

        if ($request->hasFile('banner_three')) {
            $banner_three = $request->file('banner_three');
            $banner_three_name = 'banner_three.png';
            $banner_three_path = 'uploads/homesection/';
            $banner_three_new_path = $banner_three_path.$banner_three_name;
            $banner_three->move($banner_three_path, $banner_three_name);
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = 'image.png';
            $image_path = 'uploads/homesection/';
            $image_new_path = $image_path.$image_name;
            $image->move($image_path, $image_name);
        }

        $theme = Option::where('key','home_settings')->first();

        if(!empty($theme))
        {
            $theme_image = json_decode($theme->value)->image;
            $theme_banner_three = json_decode($theme->value)->banner_three;
            $theme_banner_two = json_decode($theme->value)->banner_two;
            $theme_banner_one = json_decode($theme->value)->banner_one;
        }

        $data = [
            'description_three_end_section' => $request->description_three_end_section,
            'title_three_end_section'       => $request->title_three_end_section,
            'description_two_end_section'   => $request->description_two_end_section,
            'title_two_end_section'         => $request->title_two_end_section,
            'description_one_end_section'   => $request->description_one_end_section,
            'title_one_end_section'         => $request->title_one_end_section,
            'image'                         => !empty($image_new_path) ? $image_new_path : $theme_image,
            'upcoming_sound_content_three'  => $request->upcoming_sound_content_three,
            'upcoming_sound_content_two'    => $request->upcoming_sound_content_two,
            'upcoming_sound_content_one'    => $request->upcoming_sound_content_one,
            'btn_link_three'                => $request->btn_link_three,
            'btn_text_three'                => $request->btn_text_three,
            'description_three'             => $request->description_three,
            'title_three'                   => $request->title_three,
            'banner_three'                  => !empty($banner_three_new_path) ? $banner_three_new_path : $theme_banner_three,
            'btn_link_two'                  => $request->btn_link_two,
            'btn_text_two'                  => $request->btn_text_two,
            'description_two'               => $request->description_two,
            'title_two'                     => $request->title_two,
            'banner_two'                    => !empty($banner_two_new_path) ? $banner_two_new_path : $theme_banner_two,
            'btn_link_one'                  => $request->btn_link_one,
            'btn_text_one'                  => $request->btn_text_one,
            'description_one'               => $request->description_one,
            'title_one'                     => $request->title_one,
            'banner_one'                    => !empty($banner_one_new_path) ? $banner_one_new_path : $theme_banner_one,
            'curator_btn_link'              => $request->curator_btn_link,
            'curator_btn_text'              => $request->curator_btn_text,
            'curator_description'           => $request->curator_description,
            'curator_title'                 => $request->curator_title,
            'artist_btn_link'               => $request->artist_btn_link,
            'artist_btn_text'               => $request->artist_btn_text,
            'artist_description'            => $request->artist_description,
            'artist_title'                  => $request->artist_title,
        ];



        if(!empty($theme))
        {
            Option::where(['id' => $theme->id, 'key' => $theme->key])->update([
                'key'   => 'home_settings',
                'value' => json_encode($data),
            ]);

        }else{
            Option::create([
                'key'   => 'home_settings',
                'value' => json_encode($data),
            ]);
        }

       return response()->json(['success' => 'Home Settings Updated!.']);
    }

     /**
     * aboutSection function
     *
     * @return void
     */
    public function aboutSection()
    {
        $theme = Option::where('key', 'about_settings')->first();
        return view('admin.pages.frontend.about', get_defined_vars());
    }

    /**
     * aboutSectionUpdate function
     *
     * @param Request $request
     * @return void
     */
    public function aboutSectionUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'btn_link_three'    => 'required',
            'btn_text_three'    => 'required',
            'description_three' => 'required',
            'banner_three'      => 'mimes:png,jpg',
            'btn_link_two'      => 'required',
            'btn_text_two'      => 'required',
            'description_two'   => 'required',
            'banner_two'        => 'mimes:png,jpg',
            'btn_link_one'      => 'required',
            'btn_text_one'      => 'required',
            'description_one'   => 'required',
            'banner_one'        => 'mimes:png,jpg',
            'about_us_title'    => 'required',
            'content_two'       => 'required',
            'heading_two'       => 'required',
            'content_one'       => 'required',
            'heading_one'       => 'required',
            'description'       => 'required',
            'heading'           => 'required',
            'banner'            => 'mimes:png,jpg',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        if ($request->hasFile('banner'))
        {
            $banner = Webp::make($request->file('banner'))->quality(70);
            $banner->save(public_path('uploads/aboutsection/banner.webp'));
            $banner_new_path = "uploads/aboutsection/banner.webp";
        }

//        if ($request->hasFile('banner')) {
//            $banner = $request->file('banner');
//            $banner_name = 'banner.png';
//            $banner_path = 'uploads/aboutsection/';
//            $banner_new_path = $banner_path.$banner_name;
//            $banner->move($banner_path, $banner_name);
//        }

        if ($request->hasFile('banner_one'))
        {
            $banner_one = Webp::make($request->file('banner_one'))->quality(70);
            $banner_one->save(public_path('uploads/aboutsection/banner_one.webp'));
            $banner_one_new_path = "uploads/aboutsection/banner_one.webp";
//            $banner_one = $request->file('banner_one');
//            $banner_one_name = 'banner_one.png';
//            $banner_one_path = 'uploads/aboutsection/';
//            $banner_one_new_path = $banner_one_path.$banner_one_name;
//            $banner_one->move($banner_one_path, $banner_one_name);
        }

        if ($request->hasFile('banner_two'))
        {
            $banner_two = Webp::make($request->file('banner_two'))->quality(70);
            $banner_two->save(public_path('uploads/aboutsection/banner_two.webp'));
            $banner_two_new_path = "uploads/aboutsection/banner_two.webp";

//            $banner_two = $request->file('banner_two');
//            $banner_two_name = 'banner_two.png';
//            $banner_two_path = 'uploads/aboutsection/';
//            $banner_two_new_path = $banner_two_path.$banner_two_name;
//            $banner_two->move($banner_two_path, $banner_two_name);
        }

        if ($request->hasFile('banner_three'))
        {
            $banner_three = Webp::make($request->file('banner_three'))->quality(70);
            $banner_three->save(public_path('uploads/aboutsection/banner_three.webp'));
            $banner_three_new_path = "uploads/aboutsection/banner_three.webp";

//            $banner_three = $request->file('banner_three');
//            $banner_three_name = 'banner_three.png';
//            $banner_three_path = 'uploads/aboutsection/';
//            $banner_three_new_path = $banner_three_path.$banner_three_name;
//            $banner_three->move($banner_three_path, $banner_three_name);
        }


        $theme = Option::where('key','about_settings')->first();

        if(!empty($theme))
        {
            $theme_banner = json_decode($theme->value)->banner;
            $theme_banner_three = json_decode($theme->value)->banner_three;
            $theme_banner_two = json_decode($theme->value)->banner_two;
            $theme_banner_one = json_decode($theme->value)->banner_one;
        }

        $data = [
            'btn_link_three'    => $request->btn_link_three,
            'btn_text_three'    => $request->btn_text_three,
            'description_three' => $request->description_three,
            'banner_three'      => !empty($banner_three_new_path) ? $banner_three_new_path : $theme_banner_three,
            'btn_link_two'      => $request->btn_link_two,
            'btn_text_two'      => $request->btn_text_two,
            'description_two'   => $request->description_two,
            'banner_two'        => !empty($banner_two_new_path) ? $banner_two_new_path : $theme_banner_two,
            'btn_link_one'      => $request->btn_link_one,
            'btn_text_one'      => $request->btn_text_one,
            'description_one'   => $request->description_one,
            'banner_one'        => !empty($banner_one_new_path) ? $banner_one_new_path : $theme_banner_one,
            'about_us_title'    => $request->about_us_title,
            'content_two'       => $request->content_two,
            'heading_two'       => $request->heading_two,
            'content_one'       => $request->content_one,
            'heading_one'       => $request->heading_one,
            'description'       => $request->description,
            'heading'           => $request->heading,
            'banner'            => !empty($banner_new_path) ? $banner_new_path : $theme_banner,
        ];



        if(!empty($theme))
        {
            Option::where(['id' => $theme->id, 'key' => $theme->key])->update([
                'key'   => 'about_settings',
                'value' => json_encode($data),
            ]);

        }else{
            Option::create([
                'key'   => 'about_settings',
                'value' => json_encode($data),
            ]);
        }

       return response()->json(['success' => 'About Settings Updated!.']);
    }

     /**
     * contactSection function
     *
     * @return void
     */
    public function contactSection()
    {
        $theme = Option::where('key', 'contact_settings')->first();
        return view('admin.pages.frontend.contact', get_defined_vars());
    }

     /**
     * contactSectionUpdate function
     *
     * @param Request $request
     * @return void
     */
    public function contactSectionUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email_title'    => 'required',
            'email'          => 'required',
            'working_hours'  => 'required',
            'address_detail' => 'required',
            'address'        => 'required',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $theme = Option::where('key','contact_settings')->first();


        $data = [
            'email_title'    => $request->email_title,
            'email'          => $request->email,
            'working_hours'  => $request->working_hours,
            'address_detail' => $request->address_detail,
            'address'        => $request->address,
        ];

        if(!empty($theme))
        {
            Option::where(['id' => $theme->id, 'key' => $theme->key])->update([
                'key'   => 'contact_settings',
                'value' => json_encode($data),
            ]);

        }else{
            Option::create([
                'key'   => 'contact_settings',
                'value' => json_encode($data),
            ]);
        }

       return response()->json(['success' => 'Contact Settings Updated!.']);
    }

      /**
     * forArtistsSection function
     *
     * @return void
     */
    public function forArtistsSection()
    {
        $theme = Option::where('key', 'for_artists_settings')->first();
        return view('admin.pages.frontend.for_artists', get_defined_vars());
    }

    /**
     * @return Application|Factory|View
     */
    public function curatorsSection()
    {
        $theme = Option::where('key', 'curators_settings')->first();
        return view('admin.pages.frontend.curator-dashboard', get_defined_vars());
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function curatorsSettingUpdate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'curator_banner_img' => 'required|mimes:png,jpg',
        ]);

        if ($validator->fails())
        {
            return response()->json(['errors' => $validator->errors()->all()]);
        }

        $theme = Option::where('key','curators_settings')->first();

        if(!empty($theme))
        {
            $theme_banner = json_decode($theme->value)->curator_banner_img;
        }

        if ($request->hasFile('curator_banner_img')) {
            if (!empty($theme_banner))
            {
                $themeBanner = public_path($theme_banner);
                if(file_exists($themeBanner)) {
                    unlink($themeBanner);
                }
            }

            $banner = $request->file('curator_banner_img');
            $name = str_replace(' ', '', $banner->getClientOriginalName());
            $image_path = 'curator_banner_img_'. $name;
            $banner->move(public_path() . '/uploads/curatorssetting/', $image_path);
            $banner_new_path = 'uploads/curatorssetting/'. $image_path;

//            $banner_name = 'curator_banner_img.png';
//            $banner_path = 'uploads/curatorssetting/';
//            $banner_new_path = $banner_path.$banner_name;
//            $banner->move($banner_path, $banner_name);
        }

        $data = [
            'curator_banner_img'  => !empty($banner_new_path) ? $banner_new_path : $theme_banner,
        ];


        if(!empty($theme))
        {
            Option::where(['id' => $theme->id, 'key' => $theme->key])->update([
                'key'   => 'curators_settings',
                'value' => json_encode($data),
            ]);

        }else{
            Option::create([
                'key'   => 'curators_settings',
                'value' => json_encode($data),
            ]);
        }

        return response()->json(['success' => 'Curator Settings Updated!.']);
    }
}
