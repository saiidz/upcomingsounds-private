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
    <style>
        ul.ks-cboxtags li input[type="checkbox"]:checked + label::before {
            content: url("../images/select-tick.svg");
            width: 23px;
            height: 34px;
            margin: 0 5px 0 0px;
            background-position: 40px;
            display: block;
            transform: translate(-2px, 5px);
        }

        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }

        .avatar-edit {
            position: absolute;
            right: 12px;
            z-index: 1;
            top: 10px;
        }

        input {
            display: none;
        }

        label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all .2s ease-in-out;
        }

        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }

        .avatar-upload .avatar-edit input + label::after {
            content: "\f040";
            font-family: 'FontAwesome';
            color: #757575;
            position: absolute;
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }

        .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #F8F8F8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }

        .avatar-upload .avatar-preview #imagePreview {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
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
                            The final touch, {{(auth()->user()) ? auth()->user()->name : 'test'}}... A picture of you to
                            complete your profile?
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN: Page Main-->
        <div id="main">
            <div class="row">
                <div class="col s9 sTep4">
                    <div class="container">
                        <!-- Input Fields -->
                        <div class="row">
                            <div class="col s12">
                                <div id="input-fields" class="card card-tabs cardsTep2">
                                    <div class="card-content">
                                        <div id="view-input-fields">
                                            <div class="row">
                                                <div class="col s12 m6 l10">
                                                    <h4 class="card-title bold">Profile Picture</h4>
                                                </div>
                                            </div>
                                            <div class="underline"></div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <form method="POST" action="{{route('artist.signup.step.5.post')}}"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="section" id="faq">
                                                            <div class="avatar-upload">
                                                                <div class="avatar-edit">
                                                                    <input type='file' id="imageUpload" name="profile"
                                                                           accept=".png, .jpg, .jpeg"/>
                                                                    <label for="imageUpload"></label>
                                                                </div>
                                                                <div class="avatar-preview">

                                                                    @php
                                                                        $mystring = auth()->user()->profile;
                                                                        $findhttps   = 'https';
                                                                        $findhttp   = 'http';
                                                                        $poshttps = strpos($mystring, $findhttps);

                                                                        $poshttp = strpos($mystring, $findhttp);
                                                                        if($poshttps != false){
                                                                            $pos = $poshttps;
                                                                        }else{
                                                                            $pos = $poshttp;
                                                                        }
                                                                    @endphp

                                                                    @if($pos === false)
                                                                        @if(!empty(auth()->user()->profile))
                                                                            <img src="{{URL('/')}}/uploads/profile/{{auth()->user()->profile}}"
                                                                                 id="imagePreview">
                                                                        @else
                                                                            <img src="{{asset('images/profile_images_icons.svg')}}"
                                                                                 id="imagePreview">
                                                                        @endif
                                                                    @elseif($pos == 0)
                                                                        <img src="{{auth()->user()->profile}}"
                                                                             id="imagePreview">
                                                                    @else
                                                                        <img src="{{asset('images/profile_images_icons.svg')}}"
                                                                             id="imagePreview">
                                                                    @endif

                                                                    @error('profile')
                                                                        <small class="red-text" role="alert">
                                                                            {{ $message }}
                                                                        </small>
                                                                    @enderror
                                                                </div>
                                                                <h4 class="profile-heading" style="text-align: center; font-size: 1.28rem;">{{(auth()->user()) ? auth()->user()->name : 'test'}}</h4>
                                                            </div>
                                                        </div>
                                                        <div class="section" id="faq">
                                                            <div class="faq row">
                                                                <div class="col s12 m12 l12">
                                                                    <ul class="collapsible categories-collapsible">
                                                                        <li class="active">
                                                                            <div class="collapsible-header">Q: No cool photo
                                                                                for {{(auth()->user()) ? auth()->user()->name : 'test'}}? <i class="material-icons">
                                                                                    keyboard_arrow_right </i></div>
                                                                            <div class="collapsible-body">
                                                                                <p>KDon't worry, you can always add one
                                                                                    later to your artist profile or replace
                                                                                    it!</p>
                                                                            </div>
                                                                        </li>
                                                                        <li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button class="tellMeMore left LeftSide" onclick="window.history.go(-1); return false;" style="border:none;">Previous</button>
                                                                <button class="tellMeMore right RightSide" style="border:none;"
                                                                        type="submit">Next
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
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('imagePreview').setAttribute('src', e.target.result );
                    // $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageUpload").change(function () {
            readURL(this);
        });
    </script>
@endsection
