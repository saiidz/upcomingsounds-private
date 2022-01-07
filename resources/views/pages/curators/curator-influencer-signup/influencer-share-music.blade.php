{{-- layout --}}
@extends('layouts.curator-guest')

{{-- page title --}}
@section('title','Taste Maker Signup ')

{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/intlTelInput.css')}}"
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
                            Great! Now tell us a bit more about you :)
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN: Page Main-->
        <div id="main">
            <div class="row">
                <div class="col s9 sTep2">
                    <div class="container">
                        <!-- Input Fields -->
                        <div class="row">
                            <div class="col s12">
                                <div id="input-fields" class="card card-tabs cardsTep2">
                                    <div class="card-content">
                                        <div class="card-title">
                                            <div class="row">
                                                <div class="col s12 m6 l10">
                                                    <h4 class="card-title bold">I will mostly share music:</h4>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="view-input-fields">
                                            <div class="row">
                                                <div class="col s12">
                                                    <form method="POST" action="{{route('influencer.signup.step.3.post')}}" id="validateSocialMediaLink" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="mb-1">
                                                                    <label>
                                                                        <input type="radio" class="influencer_instagram" name="share_music" onchange="playlistInstagram()" value="influencer_instagram" checked/>
                                                                        <span>On Instagram <i class="fa fa-instagram"></i>
                                                                            <p class="text-muted">At least 15,000 followers.</p></span>
                                                                    </label>
                                                                    {{-- Instagram url--}}
                                                                    <div class="input-field col s12" id="instagramUrl">
                                                                        <input id="instagram_url" class="@error('instagram_url') is-invalid @enderror" placeholder="https://www.instagram.com/username" required name="instagram_url" value="{{old('instagram_url')}}" type="text">
                                                                        <label for="instagram_url" class="social_label">Instagram</label>
                                                                        <div id="error_instagram_url" class="red-text" style="color:red; padding:4px;"></div>
                                                                        @error('instagram_url')
                                                                        <small class="red-text" role="alert">
                                                                            {{ $message }}
                                                                        </small>
                                                                        @enderror
                                                                    </div>
                                                                    {{-- Instagram url--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="mb-1">
                                                                    <label>
                                                                        <input type="radio" class="influencer_tiktok" name="share_music" onchange="playlistTiktok()" value="influencer_tiktok" />
                                                                        <span>On TikTok <i class="iconify" data-icon="fa-brands:tiktok"></i>
                                                                            <p class="text-muted">At least 15,000 followers.</p></span>
{{--                                                                            <p class="text-muted">At least 1,000 views per video on average.</p></span>--}}
                                                                    </label>
                                                                    {{-- TikTok url--}}
                                                                    <div class="input-field col s12" id="tiktokUrl" style="display:none;">
                                                                        <input id="tiktok_url" class="@error('tiktok_url') is-invalid @enderror" placeholder="https://www.tiktok.com/@" name="tiktok_url" value="{{old('tiktok_url')}}" type="text">
                                                                        <label for="tiktok_url" class="social_label">Tiktok</label>
                                                                        <div id="error_tiktok_url" class="red-text" style="color:red; padding:4px;"></div>
                                                                        @error('tiktok_url')
                                                                        <small class="red-text" role="alert">
                                                                            {{ $message }}
                                                                        </small>
                                                                        @enderror
                                                                    </div>
                                                                    {{-- TikTok url--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="mb-1">
                                                                    <label>
                                                                        <input type="radio" class="influencer_soundcloud" name="share_music" onchange="playlistSoundCloud()" value="influencer_soundcloud" />
                                                                        <span>On SoundCloud <i class="fa fa-spotify social_link"></i>
                                                                            <p class="text-muted">At least 15,000 followers.</p></span>
                                                                    </label>
                                                                    {{-- SoundCloud url--}}
                                                                    <div class="input-field col s12" id="soundcloudUrl" style="display:none;">
                                                                        <input id="soundcloud_url" class="@error('soundcloud_url') is-invalid @enderror" placeholder="https://www.soundcloud.com/" name="soundcloud_url" value="{{old('soundcloud_url')}}" type="text">
                                                                        <label for="soundcloud_url" class="social_label">Sound Cloud</label>
                                                                        <div id="error_soundcloud_url" class="red-text" style="color:red; padding:4px;"></div>
                                                                        @error('soundcloud_url')
                                                                        <small class="red-text" role="alert">
                                                                            {{ $message }}
                                                                        </small>
                                                                        @enderror
                                                                    </div>
                                                                    {{-- SoundCloud url--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button class="tellMeMore left LeftSide" onclick="window.history.go(-1); return false;" style="border:none;">Previous</button>
                                                                <button class="tellMeMore right RightSide" style="border:none;" type="submit" onclick='return validateSocialMediaLink("validateSocialMediaLink")'>Next
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="alert alert-info" style="display: none;"></div>
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
    <script src="{{asset('js/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('js/intlTelInput.min.js')}}"></script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
    <script>
        $(document).ready(function(){
            $('.oneTrackSelected').click(function() {
                $('.oneTrackSelected').not(this).prop('checked', false);
            });
        });

        function playlistInstagram(){
            if($('.influencer_instagram').is(":checked")){
                $('#tiktokUrl').hide();
                $('#soundcloudUrl').hide();
                $('#instagramUrl').show();
                document.getElementById('tiktok_url').value = '';
                document.getElementById('soundcloud_url').value = '';

                document.getElementById("soundcloud_url").required = false;
                document.getElementById("tiktok_url").required = false;
                document.getElementById("instagram_url").required = true;
            }
        }

        function playlistTiktok(){
            if($('.influencer_tiktok').is(':checked')){
                $('#instagramUrl').hide();
                $('#soundcloudUrl').hide();
                $('#tiktokUrl').show();
                document.getElementById('instagram_url').value = '';
                document.getElementById('soundcloud_url').value = '';

                document.getElementById("instagram_url").required = false;
                document.getElementById("soundcloud_url").required = false;
                document.getElementById("tiktok_url").required = true;
            }
        }

        function playlistSoundCloud(){
            if($('.influencer_soundcloud').is(':checked')){
                $('#instagramUrl').hide();
                $('#tiktokUrl').hide();
                $('#soundcloudUrl').show();
                document.getElementById('instagram_url').value = '';
                document.getElementById('tiktok_url').value = '';

                document.getElementById("instagram_url").required = false;
                document.getElementById("tiktok_url").required = false;
                document.getElementById("soundcloud_url").required = true;
            }
        }
    </script>
    <script>
        // validateSocialMediaLink
        function validateSocialMediaLink(validateSocialMediaLink){
            var social_media_link = document.getElementById(validateSocialMediaLink);
            result = "";
            flag = true;

            // instagram url check
            if (social_media_link.instagram_url.value != ""){
                const string = social_media_link.instagram_url.value;
                const instagramUrl = "https://www.instagram.com/";
                if(string.includes(instagramUrl) == false ){
                    social_media_link.instagram_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }

            // tiktok url check
            if (social_media_link.tiktok_url.value != ""){
                const stringTiktok = social_media_link.tiktok_url.value;
                const tiktokUrl = "https://www.tiktok.com/@";
                if(stringTiktok.includes(tiktokUrl) == false ){
                    social_media_link.tiktok_url.style.borderColor = "#DD0A0A";
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

            if(flag == true){
                document.getElementById('error_instagram_url').style.display = 'none';
                document.getElementById('error_soundcloud_url').style.display = 'none';
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
                const stringSoundcloud = social_media_link.soundcloud_url.value;
                const soundcloudUrl = "https://www.soundcloud.com";
                if(social_media_link.soundcloud_url.value != "" && stringSoundcloud.includes(soundcloudUrl) == false){
                    document.getElementById('error_soundcloud_url').style.display = 'block';
                    document.getElementById('error_soundcloud_url').innerHTML = result;
                }

                setTimeout(function(){
                    document.getElementById('error_instagram_url').style.display = 'none';
                    document.getElementById('error_tiktok_url').style.display = 'none';
                    document.getElementById('error_soundcloud_url').style.display = 'none';
                }, 4000);
                return false;
            }
        }
    </script>
@endsection
