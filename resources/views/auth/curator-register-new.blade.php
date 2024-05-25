<!DOCTYPE html>
<html data-html-server-rendered="true" lang="en" data-vue-tag="%7B%22lang%22:%7B%22ssr%22:%22en%22%7D%7D">
<head>
    <meta property="og:title" content="Upcomingsounds.com">
    <meta property="og:description" content="Add description here">
    <meta property="og:image" content="https://https://upcomingsounds.com/og-image.png">
    <meta property="og:url" content="https://upcomingsounds.com">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <title>Content Curator Signup | UpcomingSounds</title>
<meta name="description" content="Join UpcomingSounds, the newest platform for music promotion and pitching service. Submit your music now and access music industry jobs, record labels, and A&R opportunities. Discover advice, playlists, streaming platforms, and career resources for artists, bands, and producers in rock, EDM, jazz, indie, and more." />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="{{asset('images/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('css/login/login-new.css')}}" type="text/css" />
    <style>
        /*.hide {*/
        /*    display: none !important;*/
        /*}*/
        .create_password {
            position: absolute;
            right: 7px;
            top: 16px;
        }
        #passwordDisplay{
            position: relative;
        }
        .cookiealert {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            margin: 0 !important;
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            border-radius: 0;
            transform: translateY(100%);
            transition: all 500ms ease-out;
            color: #ecf0f1;
            background: #02b875 !important;
        }

        .cookiealert.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0%);
            transition-delay: 1000ms;
        }

        .cookiealert a {
            text-decoration: underline
        }

        .cookiealert .acceptcookies {
            margin-left: 10px!important;
            vertical-align: baseline!important;
            border-radius: 500px!important;
            color: rgba(255, 255, 255, 0.87)!important;
            padding: 0.3445rem 0.75rem!important;
            font-weight: 500!important;
            outline: 0 !important;
            font-size: .875rem!important;
            border-width: 0!important;
        }
        .acceptcookies {
            background-color: #1f1f25;
        }
        .btn.acceptcookies:not([disabled]):hover, .btn.acceptcookies:not([disabled]):focus, .btn.acceptcookies:not([disabled]).active{
            box-shadow: inset 0 -10rem 0px rgb(158 158 158 / 10%);
        }
    </style>
</head>
<body>
<div data-server-rendered="true" id="app" class="app">
    <div class="page-bg _auth"><img alt="Page background image" src="{{asset('images/login-bg.jpg')}}" class="page-bg__img g-image"></div>
    <!---->
    <main class="main">
        <div class="auth container-fluid">
            <div class="auth__row">
                <div class="auth__info-col">
                    <div class="free-trial">
                        <a href="{{url('/')}}">
                            <img alt="Logo image" src="{{asset('images/logo.png')}}" width="300" data-sizes="(max-width: 300px) 100vw, 300px" class="free-trial__img g-image g-image--lazy g-image--loading">
                        </a>
                        <!---->
                    </div>
                </div>
                <div class="auth__card-col">
                    <div class="auth-card">
                        <div class="auth-form">
                            <div class="auth-form__header">
                                <div class="auth-form__title">
                                    Create an account
                                </div>
                                <div class="auth-form__text">Already have an account? <a href="{{ route('curator.login') }}">
                                        Log in
                                    </a>
                                </div>
                            </div>
                            <div class="auth-form__body">
                                <form method="POST" action="{{ route('curator.register') }}" autocomplete="off">
                                    @csrf
                                    <fieldset aria-describedby="" class="form-group md-label">
                                        <!---->
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <input id="fc-name" type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" required>
                                            <label for="fc-name">
                                                Username
                                            </label>
                                            <div class="invalid-feedback">
                                                @error('name')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <!----><!----><!---->
                                        </div>
                                    </fieldset>
                                    <fieldset aria-describedby="" class="form-group md-label">
                                        <!---->
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <input id="fc-EmailAddress" type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" required>
                                            <label for="fc-EmailAddress">
                                                Email Address
                                            </label>
                                            <div class="invalid-feedback">
                                                @error('email')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <!----><!----><!---->
                                        </div>
                                    </fieldset>
                                    <fieldset aria-describedby="" class="form-group md-label">
                                        <!---->
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <input id="passwordAdd" type="password"
                                                   class="form-control @error('password') is-invalid @enderror"
                                                   name="password"  required
                                                   autocomplete="current-password"><label for="password">
                                                Password
                                            </label>
                                            <div class="invalid-feedback">
                                                @error('password')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                            <span toggle="#passwordAdd" class="show-pas toggle-password create_password">
                                       <img src="{{asset('images/toggle.svg')}}" alt="" class="password-toggle show" id="showEyes" />
                                       <img src="{{asset('images/show-pas_black.svg')}}" alt="" class="password-toggle hide" id="hideEyes" style="display: none" />
                                       </span>
                                            <!----><!----><!---->
                                        </div>
                                    </fieldset>
                                    <fieldset aria-describedby="" class="form-group md-label">
                                        <!---->
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <input id="fc-address" type="text" name="address" value="{{ old('address') }}" class="form-control @error('address') is-invalid @enderror" required>
                                            <label for="fc-address">
                                                Address
                                            </label>
                                            <div class="invalid-feedback">
                                                @error('address')
                                                    {{ $message }}
                                                @enderror
                                            </div>
                                            <!----><!----><!---->
                                        </div>
                                    </fieldset>
                                    <fieldset aria-describedby="" class="form-group form-group">
                                        <!---->
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <div></div>
                                            <!----><!----><!---->
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <div class="">
                                            <label class="" for="">
                                                By clicking Sign Up, I agree to the
                                                <a href="{{url('/term-of-service')}}" target="_blank">
                                                    Terms of service
                                                </a>
                                                and
                                                <a href="{{url('/privacy-policy')}}" target="_blank">
                                                    Policy Privacy.
                                                </a>
                                            </label>
                                        </div>
                                    </div>
                                    <fieldset aria-describedby="" class="form-group md-label">
                                        <!---->
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!}
                                            <div class="invalid-feedback" style="display: block;">
                                                @error('g-recaptcha-response')
                                                {{ $message }}
                                                @enderror
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-primary btn-block text-uppercase">
                                            Sign up
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="auth-form__footer">
                                <div class="auth-or">
                                    or
                                </div>
                                <div class="form-group">
                                    <a href="{{ url('/login/google/?request_from=curator') }}" class="btn btn-social btn-google btn-block">
                                        <span class="btn-social__icon"></span>
                                        <span class="btn-social__text">
                                 Continue with Google
                                 </span>
                                    </a>
                                </div>
                                <div class="auth-form__text _sm">
                                    Protected by reCAPTCHA and subject to the Google Privacy Policy and Terms of Service.
                                </div>
                            </div>
                            <!---->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!---->
</div>
<!-- jQuery -->
<script src="{{asset('libs/jquery/dist/jquery.js')}}"></script>
<script src="{{asset('libs/tether/dist/js/tether.min.js')}}"></script>
<script src="{{asset('libs/bootstrap/dist/js/bootstrap.js')}}"></script>
<script>
    $(".toggle-password").click(function () {
        $(this).toggleClass("show-pas");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            $('#showEyes').css('display', 'none');
            $('#hideEyes').css('display', 'block');
            input.attr("type", "text");
        } else {
            $('#hideEyes').css('display','none');
            $('#showEyes').css('display','block');
            input.attr("type", "password");
        }
    });
</script>
<script type="text/javascript">
    if (window.location.hash === "#_=_"){
        history.replaceState
            ? history.replaceState(null, null, window.location.href.split("#")[0])
            : window.location.hash = "";
    }
</script>
{{--success_phone_number--}}
@if(Session::get('success_phone_number'))
    @php $message = (Session::get('success_phone_number')) @endphp
    <script>
        var x = document.getElementById("snackbar");
        x.innerText = "{{$message}}"
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 5000);
    </script>
    @php Session::forget('success_phone_number'); @endphp
@endif
@if (Session::get('success'))
    @php $message = (Session::get('success')) @endphp
    <script>
        var x = document.getElementById("snackbar");
        x.innerText = "{{$message}}"
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 5000);
    </script>
@endif
@if (Session::get('error'))
    @php $message = (Session::get('error')) @endphp
    <script>
        var x = document.getElementById("snackbarError");
        x.innerText = "{{$message}}"
        x.className = "show";
        setTimeout(function () {
            x.className = x.className.replace("show", "");
        }, 5000);
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-GFQ5K0QQGY"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-GFQ5K0QQGY');
</script>
