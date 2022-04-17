{{-- layout --}}
@extends('layouts.curator-guest')

{{-- page title --}}
@section('title','Influncer Signup')

{{-- page style --}}
@section('page-style')
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('vendors/vendors.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-faq.css')}}">
    <style>
        .socialLinks .box {
            padding: 15px 15px 15px 70px;
            min-height: 70px;
            line-height: 20px;
            display: inline-block;
            position: relative;
            width: 100%;
            max-width: 400px;
            margin-bottom: 30px;
        }
        .box {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            background: #02b875;
        }
        .socialLinks .boxYoutube {
            padding: 15px 15px 15px 15px;
            line-height: 20px;
            display: inline-block;
            position: relative;
            max-width: 400px;
            margin-bottom: 30px;
        }
        .boxYoutube {
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            background: #02b875;
        }
        .socialLinks .box img {
            border-radius: 50%;
            position: absolute;
            left: 15px;
            width: 40px;
            height: 40px;
        }
        .socialLinks .black-text {
            color: white!important;
        }
    </style>
@endsection

{{-- page content --}}
@section('content')
    <div class="app-body">
        <div class="b-t">
            <div class="center-block text-center">
                <div class="p-a-md">
                    <div>
                        <h4><span class="Gary">Gary</span> from Upcoming Sounds</h4>
                        <p class="text-muted m-y">
                            Awesome! Now, Where can the UpcomingSounds artists and musicians find you online?
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN: Page Main-->
        <div id="main">
            <div class="row">
                <div class="col s9 sTep3">
                    <div class="container">
                        <!-- Input Fields -->
                        <div class="row">
                            <div class="col s12">
                                <div id="input-fields" class="card card-tabs cardsTep2">
                                    <div class="card-content">
                                        <div id="view-input-fields">
                                            <div class="row">
                                                <div class="col s12 m6 l10">
                                                    <h4 class="card-title bold">Add your social media profiles</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <form method="POST" id="validateSocialMediaLink" action="{{route('curator.signup.step.social.media.post')}}"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="input-field col s12">
                                                                    <a class="tellMeMore left" href="javascript:void(0)">
                                                                        <i class="fa fa-facebook social_link"></i>
                                                                        <span>Facebook</span>
                                                                    </a>
                                                                    <a class="tellMeMore left" href="javascript:void(0)">
                                                                        <i class="fa fa-spotify social_link"></i>
                                                                        <span>Spotify</span>
                                                                    </a>
                                                                    <a class="tellMeMore left" href="javascript:void(0)">
                                                                        <i class="fa fa-youtube social_link"></i>
                                                                        <span>Youtube</span>
                                                                    </a>
                                                                    <a class="tellMeMore left" href="javascript:void(0)">
                                                                        <i class="fa fa-link social_link"></i>
                                                                        <span>Add Website</span>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row socialLinks">
                                                            <div class="col s12">
                                                                @if(Session::has('error_message'))
                                                                    <small class="red-text" role="alert">
                                                                        {{Session::get('error_message')}}
                                                                    </small>
                                                                @endif

                                                                <div class="input-field col s12">
                                                                    <input id="facebook_url" class="@error('facebook_url') is-invalid @enderror" placeholder="https://www.facebook.com/" name="facebook_url" value="{{old('facebook_url')}}" type="text">
                                                                    <label for="facebook_url" class="social_label">Facebook</label>
                                                                    <div id="error_facebook_url" class="red-text" style="color:red; padding:4px;"></div>
                                                                    @error('facebook_url')
                                                                    <small class="red-text" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                    @enderror
                                                                </div>

                                                                <div class="input-field col s12">
                                                                    <input id="spotify_url" class="@error('spotify_url') is-invalid @enderror" placeholder="https://open.spotify.com/" name="spotify_url" value="{{old('spotify_url')}}" type="text">
                                                                    <label for="spotify_url" class="social_label">Spotify</label>
                                                                    <div id="error_spotify_url" class="red-text" style="color:red; padding:4px;"></div>
                                                                    @error('spotify_url')
                                                                    <small class="red-text" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                    @enderror
                                                                </div>

                                                                <div class="input-field col s12">
                                                                    <input id="youtube_url" class="@error('youtube_url') is-invalid @enderror" @isset($social_links_required) @if($social_links_required == 'youtube') required @endif @endisset placeholder="https://www.youtube.com/channel/" name="youtube_url" value="{{old('youtube_url')}}" type="text">
                                                                    <label for="youtube_url" class="social_label">Youtube</label>
                                                                    <div id="error_youtube_url" class="red-text" style="color:red; padding:4px;"></div>
                                                                    @error('youtube_url')
                                                                    <small class="red-text" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                    @enderror
                                                                </div>

                                                                <div class="input-field col s12">
                                                                    <input id="website_url" class="@error('website_url') is-invalid @enderror" placeholder="https://www.website.com" name="website_url" value="{{old('website_url')}}" type="text">
                                                                    <label for="website_url" class="social_label">Add Website</label>
                                                                    @error('website_url')
                                                                    <small class="red-text" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="section" id="faq">
                                                            <div class="faq row">
                                                                <div class="col s12 m12 l12">
                                                                    <ul class="collapsible categories-collapsible">
                                                                        <li class="active">
                                                                            <div class="collapsible-header">Q: Why share your social media links on UpcomingSounds?<i class="material-icons">
                                                                                    keyboard_arrow_right </i></div>
                                                                            <div class="collapsible-body">
                                                                                <p>The artists and musicians on UpcomingSounds enjoy browsing social media accounts and making long-lasting connections with the curators and pros with whom they have submitted their music. Filling out your social media profiles will help them better understand your project. </p>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="collapsible-header">Q: How can I get verified on upcomingsounds? <i class="material-icons">
                                                                                    keyboard_arrow_right </i></div>
                                                                            <div class="collapsible-body">
                                                                                <p>Upon completing the submission form, you will be able to apply for verification on your dashboard.</p>
                                                                            </div>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button class="tellMeMore left LeftSide" onclick="window.history.go(-1); return false;" style="border:none;">Previous</button>
                                                                <button class="tellMeMore right RightSide" style="border:none;"
                                                                        onclick='return validateSocialMediaLink("validateSocialMediaLink")' type="submit">Next
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-overlay"></div>
                </div>
            </div>
        </div>
        <!-- END: Page Main-->

    </div>

@endsection


{{-- page script --}}
@section('page-script')
    <script src="{{asset('js/vendors.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script>
        // validateSocialMediaLink
        function validateSocialMediaLink(validateSocialMediaLink){
            var social_media_link = document.getElementById(validateSocialMediaLink);
            result = "";
            flag = true;


            // facebook url check
            if (social_media_link.facebook_url.value != ""){
                const stringFacebook = social_media_link.facebook_url.value;
                const facebookUrl = "https://www.facebook.com";
                if(stringFacebook.includes(facebookUrl) == false ){
                    social_media_link.facebook_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }
            // spotify url check
            if (social_media_link.spotify_url.value != ""){
                const stringSpotify = social_media_link.spotify_url.value;
                const spotifyUrl = "https://open.spotify.com/";
                if(stringSpotify.includes(spotifyUrl) == false ){
                    social_media_link.spotify_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }

            // youtube url check
            if (social_media_link.youtube_url.value != ""){
                const stringYoutube = social_media_link.youtube_url.value;
                const youtubeUrl = "https://www.youtube.com/channel/";
                if(stringYoutube.includes(youtubeUrl) == false ){
                    social_media_link.youtube_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }
            // if(flag == true && (social_media_link.instagram_url.value != "")){
            if(flag == true){
                document.getElementById('error_facebook_url').style.display = 'none';
                document.getElementById('error_spotify_url').style.display = 'none';
                document.getElementById('error_youtube_url').style.display = 'none';
                // social_media_link.submit();
            }else{
                const stringFacebook = social_media_link.facebook_url.value;
                const facebookUrl = "https://www.facebook.com";
                if(social_media_link.facebook_url.value != "" && stringFacebook.includes(facebookUrl) == false){
                    document.getElementById('error_facebook_url').style.display = 'block';
                    document.getElementById('error_facebook_url').innerHTML = result;
                }

                const stringSpotify = social_media_link.spotify_url.value;
                const spotifyUrl = "https://open.spotify.com/";
                if(social_media_link.spotify_url.value != "" && stringSpotify.includes(spotifyUrl) == false){
                    document.getElementById('error_spotify_url').style.display = 'block';
                    document.getElementById('error_spotify_url').innerHTML = result;
                }
                const stringYoutube = social_media_link.youtube_url.value;
                const youtubeUrl = "https://www.youtube.com/channel/";
                if(social_media_link.youtube_url.value != "" && stringYoutube.includes(youtubeUrl) == false){
                    document.getElementById('error_youtube_url').style.display = 'block';
                    document.getElementById('error_youtube_url').innerHTML = result;
                }
                setTimeout(function(){
                    document.getElementById('error_facebook_url').style.display = 'none';
                    document.getElementById('error_spotify_url').style.display = 'none';
                    document.getElementById('error_youtube_url').style.display = 'none';
                }, 4000);
                return false;
            }
        }
    </script>
@endsection
