{{-- layout --}}
@extends('layouts.artist-guest')

{{-- page title --}}
@section('title','Artist Signup Step Three')

{{-- page style --}}
@section('page-style')
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('vendors/vendors.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-faq.css')}}">

@endsection

{{-- page content --}}
@section('content')
    <div class="app-body">
        <div class="b-t">
            <div class="center-block text-center">
                <div class="p-a-md">
                    <div>
                        <h4><span class="saiidzeidan">Gary</span> from Upcoming Sounds</h4>
                        <p class="text-muted m-y">
                            Got it, fa! Where can the Upcoming Sounds curators & pros find you online?
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
    {{--                                    <div class="card-title">--}}
    {{--                                        <div class="row">--}}
    {{--                                            <div class="col s12 m6 l10">--}}
    {{--                                                <h4 class="card-title bold">Your social media links</h4>--}}
    {{--                                            </div>--}}
    {{--                                        </div>--}}
    {{--                                    </div>--}}
                                        <div id="view-input-fields">
                                            <div class="row">
                                                <div class="col s12 m6 l10">
                                                    <h4 class="card-title bold">Your social media links</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <form method="POST" id="validateSocialMediaLink" action="{{route('artist.signup.step.3.post')}}"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="input-field col s12">
                                                                    <a class="tellMeMore left" href="javascript:void(0)">
                                                                        <i class="fa fa-instagram social_link"></i>
                                                                        <span>Instagram</span>
                                                                    </a>
                                                                    <a class="tellMeMore left" href="javascript:void(0)">
                                                                        <i class="fa fa-facebook social_link"></i>
                                                                        <span>Facebook</span>
                                                                    </a>
                                                                    <a class="tellMeMore left" href="javascript:void(0)">
                                                                        <i class="fa fa-spotify social_link"></i>
                                                                        <span>Spotify</span>
                                                                    </a>
                                                                    <a class="tellMeMore left" href="javascript:void(0)">
                                                                        <i class="fa fa-soundcloud social_link"></i>
                                                                        <span>Sound Cloud</span>
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
                                                        <div class="row">
                                                            <div class="col s12">
                                                                @if(Session::has('error_message'))
                                                                    <small class="red-text" role="alert">
                                                                        {{Session::get('error_message')}}
                                                                    </small>
                                                                @endif
                                                                <div class="input-field col s12">
                                                                    <input id="instagram_url" class="@error('instagram_url') is-invalid @enderror" placeholder="https://www.instagram.com/username" name="instagram_url" value="{{old('instagram_url')}}" type="text">
                                                                    <label for="instagram_url" class="social_label">Instagram</label>
                                                                    <div id="error_instagram_url" class="red-text" style="color:red; padding:4px;"></div>
                                                                    @error('instagram_url')
                                                                    <small class="red-text" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                    @enderror
                                                                </div>
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
                                                                    <input id="soundcloud_url" class="@error('soundcloud_url') is-invalid @enderror" placeholder="https://www.soundcloud.com/" name="soundcloud_url" value="{{old('soundcloud_url')}}" type="text">
                                                                    <label for="soundcloud_url" class="social_label">Sound Cloud</label>
                                                                    <div id="error_soundcloud_url" class="red-text" style="color:red; padding:4px;"></div>
                                                                    @error('soundcloud_url')
                                                                    <small class="red-text" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                    @enderror
                                                                </div>
                                                                <div class="input-field col s12">
                                                                    <input id="youtube_url" class="@error('youtube_url') is-invalid @enderror" placeholder="https://www.youtube.com/channel/" name="youtube_url" value="{{old('youtube_url')}}" type="text">
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
                                                                            <div class="collapsible-header">Q: Why share your social media links on Upcoming Sounds? <i class="material-icons">
                                                                                    keyboard_arrow_right </i></div>
                                                                            <div class="collapsible-body">
                                                                                <p>The music curators & pros on Upcoming Sounds enjoy browsing the social media accounts of an artist which they have received a track from. Filling in your main social media profiles is a way for them to get to know your project better </p>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                            <div class="collapsible-header">Q: You don't have an account on these platforms yet? <i class="material-icons">
                                                                                    keyboard_arrow_right </i></div>
                                                                            <div class="collapsible-body">
                                                                                <p>You don't have an account on these platforms yet? </p>
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
    <script>
        // validateSocialMediaLink
        function validateSocialMediaLink(validateSocialMediaLink){
            var social_media_link = document.getElementById(validateSocialMediaLink);
            result = "";
            flag = true;

            // instgram url check
            if (social_media_link.instagram_url.value != ""){
                const string = social_media_link.instagram_url.value;
                const instagramUrl = "https://www.instagram.com/";
                if(string.includes(instagramUrl) == false ){
                    social_media_link.instagram_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }

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
            // soundcloud url check
            if (social_media_link.soundcloud_url.value != ""){
                const stringSoundcloud = social_media_link.soundcloud_url.value;
                const soundcloudUrl = "https://www.soundcloud.com";
                if(stringSoundcloud.includes(soundcloudUrl) == false ){
                    social_media_link.soundcloud_url.style.borderColor = "#DD0A0A";
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
                document.getElementById('error_instagram_url').style.display = 'none';
                document.getElementById('error_facebook_url').style.display = 'none';
                document.getElementById('error_spotify_url').style.display = 'none';
                document.getElementById('error_soundcloud_url').style.display = 'none';
                document.getElementById('error_youtube_url').style.display = 'none';
                // social_media_link.submit();
            }else{
                const string = social_media_link.instagram_url.value;
                const instagramUrl = "https://www.instagram.com/";
                if(social_media_link.instagram_url.value != "" && string.includes(instagramUrl) == false){
                    document.getElementById('error_instagram_url').style.display = 'block';
                    document.getElementById('error_instagram_url').innerHTML = result;
                }
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
                const stringSoundcloud = social_media_link.soundcloud_url.value;
                const soundcloudUrl = "https://www.soundcloud.com";
                if(social_media_link.soundcloud_url.value != "" && stringSoundcloud.includes(soundcloudUrl) == false){
                    document.getElementById('error_soundcloud_url').style.display = 'block';
                    document.getElementById('error_soundcloud_url').innerHTML = result;
                }
                const stringYoutube = social_media_link.youtube_url.value;
                const youtubeUrl = "https://www.youtube.com/channel/";
                if(social_media_link.youtube_url.value != "" && stringYoutube.includes(youtubeUrl) == false){
                    document.getElementById('error_youtube_url').style.display = 'block';
                    document.getElementById('error_youtube_url').innerHTML = result;
                }
                setTimeout(function(){
                    document.getElementById('error_instagram_url').style.display = 'none';
                    document.getElementById('error_facebook_url').style.display = 'none';
                    document.getElementById('error_spotify_url').style.display = 'none';
                    document.getElementById('error_soundcloud_url').style.display = 'none';
                    document.getElementById('error_youtube_url').style.display = 'none';
                }, 4000);
                return false;
            }
        }
    </script>
@endsection
