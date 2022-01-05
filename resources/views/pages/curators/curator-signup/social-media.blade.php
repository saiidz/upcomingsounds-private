{{-- layout --}}
@extends('layouts.curator-guest')

{{-- page title --}}
@section('title','Taste Maker Signup')

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
                                        <div id="view-input-fields">
                                            <div class="row">
                                                <div class="col s12 m6 l10">
                                                    <h4 class="card-title bold">Your social media links</h4>
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
                                                                        <i class="fa fa-instagram social_link"></i>
                                                                        <span>Instagram</span>
                                                                    </a>
                                                                    <a class="tellMeMore left" href="javascript:void(0)">
                                                                        <i class="iconify social_link" data-icon="fa-brands:tiktok"></i>
                                                                        <span>Tiktok</span>
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
                                                        <div class="row socialLinks">
                                                            <div class="col s12">
                                                                @if(Session::has('error_message'))
                                                                    <small class="red-text" role="alert">
                                                                        {{Session::get('error_message')}}
                                                                    </small>
                                                                @endif

                                                                <div class="input-field col s12">
                                                                    <input id="instagram_url" class="@error('instagram_url') is-invalid @enderror" @isset($social_links_required) @if($social_links_required == 'influencer_instagram') required @endif @endisset placeholder="https://www.instagram.com/username" name="instagram_url" value="{{old('instagram_url')}}" type="text">
                                                                    <label for="instagram_url" class="social_label">Instagram</label>
                                                                    <div id="error_instagram_url" class="red-text" style="color:red; padding:4px;"></div>
                                                                    @error('instagram_url')
                                                                    <small class="red-text" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                    @enderror
                                                                </div>
{{--                                                                <div class="col s12" id="loadedSocials" style="display:none;">--}}
{{--                                                                    <div class="box loaded-socials">--}}
{{--                                                                        <img src="" id="instagram_profile">--}}
{{--                                                                        <a class="black-text" id="instagram_profile_url" href="" target="_blank">--}}
{{--                                                                            <b id="instagram_username"></b>--}}
{{--                                                                        </a>--}}
{{--                                                                        <div style="color:white">--}}
{{--                                                                            Followers: <span id="instagram_follower_count"></span>--}}
{{--                                                                        </div>--}}
{{--                                                                    </div>--}}
{{--                                                                </div>--}}
                                                                <div class="input-field col s12">
                                                                    <input id="tiktok_url" class="@error('tiktok_url') is-invalid @enderror" @isset($social_links_required) @if($social_links_required == 'influencer_tiktok') required @endif @endisset placeholder="https://www.tiktok.com/@" name="tiktok_url" value="{{old('tiktok_url')}}" type="text">
                                                                    <label for="tiktok_url" class="social_label">Tiktok</label>
                                                                    <div id="error_tiktok_url" class="red-text" style="color:red; padding:4px;"></div>
                                                                    @error('tiktok_url')
                                                                    <small class="red-text" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                    @enderror
                                                                </div>
                                                                <div class="col s12" id="loadedSocialsTiktok" style="display:none;">
                                                                    <div class="box loaded-socials">
                                                                        <img src="" id="tiktok_profile">
                                                                        <a class="black-text" id="tiktok_profile_url" href="" target="_blank">
                                                                            <b id="tiktok_username"></b>
                                                                        </a>
                                                                        <div style="color:white">
                                                                            Followers: <span id="tiktok_follower_count"></span>
                                                                        </div>
                                                                    </div>
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
                                                                    <input id="soundcloud_url" class="@error('soundcloud_url') is-invalid @enderror" @isset($social_links_required) @if($social_links_required == 'influencer_soundcloud') required @endif @endisset placeholder="https://www.soundcloud.com/" name="soundcloud_url" value="{{old('soundcloud_url')}}" type="text">
                                                                    <label for="soundcloud_url" class="social_label">Sound Cloud</label>
                                                                    <div id="error_soundcloud_url" class="red-text" style="color:red; padding:4px;"></div>
                                                                    @error('soundcloud_url')
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
                                                                <div class="col s12" id="loadedSocialsYoutube" style="display:none;">
                                                                    <div class="boxYoutube loaded-socials">
                                                                        <a class="black-text" id="youtube_profile_url" href="" target="_blank">
                                                                            <b>Followers: <span id="youtube_follower_count"></span></b>
                                                                        </a>
                                                                    </div>
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
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script>
        // validateSocialMediaLink
        function validateSocialMediaLink(validateSocialMediaLink){
            var social_media_link = document.getElementById(validateSocialMediaLink);
            result = "";
            flag = true;
            {{--var influencer_data = {!! json_encode($influencer_data) !!};--}}
            // Instagram url check
            // if(social_media_link.instagram_url.value == ""){
            //     social_media_link.instagram_url.style.borderColor = "#DD0A0A";
            //     result = 'Please Enter Url';
            //     flag = false;
            // }
            if (social_media_link.instagram_url.value != ""){
                const string = social_media_link.instagram_url.value;
                const instagramUrl = "https://www.instagram.com/";
                if(string.includes(instagramUrl) == false ){
                    social_media_link.instagram_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }
            // Tiktok url check
            // if(social_media_link.tiktok_url.value == ""){
            //     social_media_link.tiktok_url.style.borderColor = "#DD0A0A";
            //     result = 'Please Enter Url';
            //     flag = false;
            // }
            if (social_media_link.tiktok_url.value != ""){
                const stringTiktok = social_media_link.tiktok_url.value;
                const tiktokUrl = "https://www.tiktok.com/@";
                if(stringTiktok.includes(tiktokUrl) == false ){
                    social_media_link.tiktok_url.style.borderColor = "#DD0A0A";
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
                document.getElementById('error_tiktok_url').style.display = 'none';
                // social_media_link.submit();
            }else{
                const string = social_media_link.instagram_url.value;
                const instagramUrl = "https://www.instagram.com/";
                if(social_media_link.instagram_url.value != "" && string.includes(instagramUrl) == false){
                    document.getElementById('error_instagram_url').style.display = 'block';
                    document.getElementById('error_instagram_url').innerHTML = result;
                }
                const stringTiktok = social_media_link.tiktok_url.value;
                const tiktokUrl = "https://www.tiktok.com/@";
                if(social_media_link.tiktok_url.value != "" && stringTiktok.includes(tiktokUrl) == false){
                    document.getElementById('error_tiktok_url').style.display = 'block';
                    document.getElementById('error_tiktok_url').innerHTML = result;
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
                    document.getElementById('error_tiktok_url').style.display = 'none';
                    document.getElementById('error_facebook_url').style.display = 'none';
                    document.getElementById('error_spotify_url').style.display = 'none';
                    document.getElementById('error_soundcloud_url').style.display = 'none';
                    document.getElementById('error_youtube_url').style.display = 'none';
                }, 4000);
                return false;
            }
        }
    </script>
    <script>
        // Instagram Profile Show
        {{--document.getElementById('instagram_url').addEventListener('focusout', function (){--}}
        {{--    var url = "{{url('/instagram-profile-show')}}";--}}
        {{--    var instagram_url = this.value;--}}
        {{--    $.ajax({--}}
        {{--        type: "GET",--}}
        {{--        url: url,--}}
        {{--        data: {--}}
        {{--            instagram_url: instagram_url,--}}
        {{--            _token: '{{ csrf_token() }}'--}}
        {{--        },--}}
        {{--        dataType: 'json',--}}
        {{--        success:function (data){--}}
        {{--            document.getElementById('instagram_profile').src = "#";--}}
        {{--            document.getElementById("instagram_username").value = "";--}}
        {{--            document.getElementById("instagram_profile_url").href = "";--}}
        {{--            document.getElementById("instagram_follower_count").value = "";--}}
        {{--            if(data.success){--}}
        {{--                document.getElementById('loadedSocials').style.display = 'inline-block';--}}
        {{--                document.getElementById('instagram_profile').src = data.instagram_profile;--}}
        {{--                document.getElementById('instagram_username').innerHTML = data.instagram_user.username;--}}
        {{--                document.getElementById("instagram_profile_url").href="https://www.instagram.com/"+data.instagram_user.username;--}}
        {{--                document.getElementById('instagram_follower_count').innerHTML = new Intl.NumberFormat().format(Math.abs(data.instagram_user.edge_followed_by.count));--}}
        {{--            }--}}
        {{--            if(data.error){--}}
        {{--                document.getElementById('loadedSocials').style.display = 'none';--}}
        {{--                $('#snackbarError').html(data.error);--}}
        {{--                $('#snackbarError').addClass("show");--}}
        {{--                setTimeout(function () {--}}
        {{--                    $('#snackbarError').removeClass("show");--}}
        {{--                }, 5000);--}}
        {{--            }--}}
        {{--        },--}}
        {{--    });--}}
        {{--});--}}
        // Tiktok Profile Show
        document.getElementById('tiktok_url').addEventListener('focusout', function (){
            var url = "{{url('/tiktok-profile-show')}}";
            var tiktok_url = this.value;
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    tiktok_url: tiktok_url,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success:function (data){
                    document.getElementById('tiktok_profile').src = "#";
                    document.getElementById("tiktok_username").value = "";
                    document.getElementById("tiktok_profile_url").href = "";
                    document.getElementById("tiktok_follower_count").value = "";
                    if(data.success){
                        document.getElementById('loadedSocialsTiktok').style.display = 'inline-block';
                        document.getElementById('tiktok_profile').src = data.tiktok_profile;
                        document.getElementById('tiktok_username').innerHTML = data.tiktok_user.uniqueId;
                        document.getElementById("tiktok_profile_url").href="https://www.tiktok.com/@"+data.tiktok_user.uniqueId;
                        document.getElementById('tiktok_follower_count').innerHTML = new Intl.NumberFormat().format(Math.abs(data.tiktok_followers));
                    }
                    if(data.error){
                        document.getElementById('loadedSocialsTiktok').style.display = 'none';
                        $('#snackbarError').html(data.error);
                        $('#snackbarError').addClass("show");
                        setTimeout(function () {
                            $('#snackbarError').removeClass("show");
                        }, 5000);
                    }
                },
            });
        });
        // Youtube Subscriber Show
        document.getElementById('youtube_url').addEventListener('focusout', function (){
            var url = "{{url('/youtube-profile-show')}}";
            var youtube_url = this.value;
            $.ajax({
                type: "GET",
                url: url,
                data: {
                    youtube_url: youtube_url,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success:function (data){
                    document.getElementById("youtube_profile_url").href = "";
                    document.getElementById("youtube_follower_count").value = "";
                    if(data.success){
                        document.getElementById('loadedSocialsYoutube').style.display = 'inline-block';
                        document.getElementById("youtube_profile_url").href="https://www.youtube.com/channel/"+data.youtube_channel_id;
                        document.getElementById('youtube_follower_count').innerHTML = new Intl.NumberFormat().format(Math.abs(data.youtube_followers));
                    }
                    if(data.error){
                        document.getElementById('loadedSocialsYoutube').style.display = 'none';
                        $('#snackbarError').html(data.error);
                        $('#snackbarError').addClass("show");
                        setTimeout(function () {
                            $('#snackbarError').removeClass("show");
                        }, 5000);
                    }
                },
            });
        })
    </script>
@endsection
