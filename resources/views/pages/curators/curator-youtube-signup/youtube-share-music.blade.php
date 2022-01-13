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
                                                    <form method="POST" id="validateSocialMediaLink" action="{{route('youtube.signup.step.3.post')}}" id="mobile-login-form" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="mb-1">
                                                                    <label>
                                                                        <input type="radio" class="oneTrackSelected" name="share_music"  value="youtube" checked/>
                                                                        <span>As a <i class="fa fa-youtube"></i> YouTube video upload
                                                                            <p class="text-muted">Must have at least 15,000 Subscribed.</p></span>
                                                                    </label>
                                                                    {{-- Youtube url--}}
                                                                    <div class="input-field col s12" id="youtubeUrl">
                                                                        <input id="youtube_url" class="@error('youtube_url') is-invalid @enderror" required placeholder="https://www.youtube.com/channel/" name="youtube_url" value="{{old('youtube_url')}}" type="text">
                                                                        <label for="youtube_url" class="social_label">Youtube</label>
                                                                        <div id="error_youtube_url" class="red-text" style="color:red; padding:4px;"></div>
                                                                        @error('youtube_url')
                                                                        <small class="red-text" role="alert">
                                                                            {{ $message }}
                                                                        </small>
                                                                        @enderror
                                                                    </div>
                                                                    {{-- Youtube url--}}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button class="tellMeMore left LeftSide" onclick="window.history.go(-1); return false;" style="border:none;">Previous</button>
                                                                <button class="tellMeMore right RightSide" onclick='return validateSocialMediaLink("validateSocialMediaLink")' style="border:none;" type="submit">Next
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
    </script>
    <script>
        // validateSocialMediaLink
        function validateSocialMediaLink(validateSocialMediaLink){
            var social_media_link = document.getElementById(validateSocialMediaLink);
            result = "";
            flag = true;

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
                document.getElementById('error_youtube_url').style.display = 'none';
                // social_media_link.submit();
            }else{
                const stringYoutube = social_media_link.youtube_url.value;
                const youtubeUrl = "https://www.youtube.com/channel/";
                if(social_media_link.youtube_url.value != "" && stringYoutube.includes(youtubeUrl) == false){
                    document.getElementById('error_youtube_url').style.display = 'block';
                    document.getElementById('error_youtube_url').innerHTML = result;
                }
                setTimeout(function(){
                    document.getElementById('error_youtube_url').style.display = 'none';
                }, 4000);
                return false;
            }
        }
    </script>
@endsection
