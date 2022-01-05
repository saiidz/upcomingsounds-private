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
                        <h4><span class="saiidzeidan">Gary</span> from Upcoming Sounds</h4>
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
                                                    <form method="POST" action="{{route('playlist.signup.step.3.post')}}" id="validateSocialMediaLink" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="mb-1">
                                                                    <label>
                                                                        <input type="radio" class="playlist_spotify" onchange="playlistSpotify()" name="share_music"  value="playlist_spotify" checked/>
                                                                        <span>On Spotify <i class="fa fa-spotify"></i>
                                                                            <p class="text-muted"> must have at least 5,000 organic, engaged followers on at least one playlist. No payola or bought followers.</p></span>
                                                                    </label>
                                                                    {{-- Spotify url--}}
                                                                    <div class="input-field col s12" id="spotifyUrl">
                                                                        <input id="spotify_url"
                                                                               class="@error('spotify_url') is-invalid @enderror"
                                                                               placeholder="https://open.spotify.com/"
                                                                               name="spotify_url"
                                                                               value="{{old('spotify_url')}}" type="text">
                                                                        <label for="spotify_url" class="social_label">Spotify</label>
                                                                        <div id="error_spotify_url" class="red-text"
                                                                             style="color:red; padding:4px;"></div>
                                                                        @error('spotify_url')
                                                                        <small class="red-text" role="alert">
                                                                            {{ $message }}
                                                                        </small>
                                                                        @enderror
                                                                    </div>
                                                                    {{-- Spotify url--}}
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="mb-1">
                                                                    <label>
                                                                        <input type="radio" class="playlist_deezer" onchange="playlistDeezer()" name="share_music"  value="playlist_deezer" />
                                                                        <span>On Deezer <i class="iconify" data-icon="fa-brands:deezer"></i>
                                                                            <p class="text-muted"> must have at least 5,000 organic, engaged followers on at least one playlist. No payola or bought followers.</p></span>
                                                                    </label>
                                                                    {{-- Deezer url--}}
                                                                    <div class="input-field col s12" id="deezerUrl" style="display:none;">
                                                                        <input id="deezer_url"
                                                                               class="@error('deezer_url') is-invalid @enderror"
                                                                               placeholder="https://www.deezer.com/en/"
                                                                               name="deezer_url"
                                                                               value="{{old('deezer_url')}}"
                                                                               type="text">
                                                                        <label for="deezer_url"
                                                                               class="social_label">Deezer</label>
                                                                        <div id="error_deezer_url" class="red-text"
                                                                             style="color:red; padding:4px;"></div>
                                                                        @error('deezer_url')
                                                                        <small class="red-text" role="alert">
                                                                            {{ $message }}
                                                                        </small>
                                                                        @enderror
                                                                    </div>
                                                                    {{-- Deezer url--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="mb-1">
                                                                    <label>
                                                                        <input type="radio" class="playlist_apple" onchange="playlistApple()" name="share_music" value="playlist_apple" />
                                                                        <span>On Apple Music <i class="iconify" data-icon="fa-brands:apple"></i>
                                                                            <p class="text-muted"> must have at least 5,000 organic, engaged followers on at least one playlist. No payola or bought followers.</p></span>
                                                                    </label>
                                                                    {{-- Apple Music url--}}
                                                                    <div class="input-field col s12" id="appleUrl" style="display:none;">
                                                                        <input id="apple_url"
                                                                               class="@error('apple_url') is-invalid @enderror"
                                                                               placeholder="https://music.apple.com/us/"
                                                                               name="apple_url"
                                                                               value="{{old('apple_url')}}" type="text">
                                                                        <label for="apple_url" class="social_label">Apple
                                                                            Music</label>
                                                                        <div id="error_apple_url" class="red-text"
                                                                             style="color:red; padding:4px;"></div>
                                                                        @error('apple_url')
                                                                        <small class="red-text" role="alert">
                                                                            {{ $message }}
                                                                        </small>
                                                                        @enderror
                                                                    </div>
                                                                    {{-- Apple Music url--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button class="tellMeMore left LeftSide" onclick="window.history.go(-1); return false;" style="border:none;">Previous</button>
                                                                <button class="tellMeMore right RightSide" style="border:none;" type="submit"  onclick='return validateSocialMediaLink("validateSocialMediaLink")'>Next
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
        // $('#deezerUrl').hide();
        // $('#appleUrl').hide();


        function playlistSpotify(){
            if($('.playlist_spotify').is(":checked")){
                $('#deezerUrl').hide();
                $('#appleUrl').hide();
                $('#spotifyUrl').show();
                document.getElementById('deezer_url').value = '';
                document.getElementById('apple_url').value = '';
            }
        }

        function playlistDeezer(){
            if($('.playlist_deezer').is(':checked')){
                $('#spotifyUrl').hide();
                $('#appleUrl').hide();
                $('#deezerUrl').show();
                document.getElementById('spotify_url').value = '';
                document.getElementById('apple_url').value = '';
            }
        }

        function playlistApple(){
            if($('.playlist_apple').is(':checked')){
                $('#spotifyUrl').hide();
                $('#deezerUrl').hide();
                $('#appleUrl').show();
                document.getElementById('spotify_url').value = '';
                document.getElementById('deezer_url').value = '';
            }
        }
    </script>
    <script>
        // validateSocialMediaLink
        function validateSocialMediaLink(validateSocialMediaLink) {
            var social_media_link = document.getElementById(validateSocialMediaLink);
            result = "";
            flag = true;

            // spotify url check
            if (social_media_link.spotify_url.value != "") {
                const stringSpotify = social_media_link.spotify_url.value;
                const spotifyUrl = "https://open.spotify.com/";
                if (stringSpotify.includes(spotifyUrl) == false) {
                    social_media_link.spotify_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }
            // deezer url check
            if (social_media_link.deezer_url.value != "") {
                const stringDeezer = social_media_link.deezer_url.value;
                const deezerUrl = "https://www.deezer.com/en/";

                if (stringDeezer.includes(deezerUrl) == false) {
                    social_media_link.deezer_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }

            // apple music url check
            if (social_media_link.apple_url.value != "") {
                const stringApple = social_media_link.apple_url.value;
                const appleUrl = "https://music.apple.com/us/";

                if (stringApple.includes(appleUrl) == false) {
                    social_media_link.apple_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }
            // if(flag == true && (social_media_link.instagram_url.value != "")){
            if (flag == true) {
                document.getElementById('error_spotify_url').style.display = 'none';
                document.getElementById('error_deezer_url').style.display = 'none';
                document.getElementById('error_apple_url').style.display = 'none';
                // social_media_link.submit();
            } else {

                const stringSpotify = social_media_link.spotify_url.value;
                const spotifyUrl = "https://open.spotify.com/";
                if (social_media_link.spotify_url.value != "" && stringSpotify.includes(spotifyUrl) == false) {
                    document.getElementById('error_spotify_url').style.display = 'block';
                    document.getElementById('error_spotify_url').innerHTML = result;
                }
                const stringDeezer = social_media_link.deezer_url.value;
                const deezerUrl = "https://www.deezer.com/en/artist/";

                if (social_media_link.deezer_url.value != "" && stringDeezer.includes(deezerUrl) == false) {
                    document.getElementById('error_deezer_url').style.display = 'block';
                    document.getElementById('error_deezer_url').innerHTML = result;
                }

                const stringApple = social_media_link.apple_url.value;
                const appleUrl = "https://music.apple.com/us/";

                if (social_media_link.apple_url.value != "" && stringApple.includes(appleUrl) == false) {
                    document.getElementById('error_apple_url').style.display = 'block';
                    document.getElementById('error_apple_url').innerHTML = result;
                }
                setTimeout(function () {
                    document.getElementById('error_spotify_url').style.display = 'none';
                    document.getElementById('error_deezer_url').style.display = 'none';
                    document.getElementById('error_apple_url').style.display = 'none';
                }, 4000);
                return false;
            }
        }
    </script>
@endsection
