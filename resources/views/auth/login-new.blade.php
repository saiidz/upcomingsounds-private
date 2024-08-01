<!DOCTYPE html>
<html data-html-server-rendered="true" lang="en" data-vue-tag="%7B%22lang%22:%7B%22ssr%22:%22en%22%7D%7D">
<head>
    <meta property="og:title" content="Upcomingsounds.com">
    <meta property="og:description" content="Add description here">
    <meta property="og:image" content="https://https://upcomingsounds.com/og-image.png">
    <meta property="og:url" content="https://upcomingsounds.com">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> Login | {{ config('app.name', 'Welcome to the newest platform for music promotion and pitching service with effective results. Submit your music now! | UpcomingSounds') }}</title>
    <meta name="description" content="acoustic, advice, answers, apply, artist, artists, audiences,
         band, Belgium, best, blog, brazil, budget, build, Canadian, careers,
         cheating, choice, classic, contact, a curator,
         curatorS, days, discover, electronic, explore,
         feedback, folk, United kingdom,  german, getting,
         great, rock,   guaranteed, help, important,
         indie, industry, info, instrumental, island, Italy, jazz, join,
         label, labels, Lebanon, listened,   mentors,
         metal, MUSiC, musicians musique need network open
         opportunities, platform, playlist, playlists, pricing,
         producer, professionals, promote, promotion,
         ProS, publishers, punk, radio, radios, record,
         records, EDM,  release, results, rock music,  select,
         simple, Reels, soul, Spotify, states,  Tiktok, stories, streaming, streams,
         success, touch, track, tracks, transparent, united, visibility,
         to access music industry jobs, record labels, music promotion, A&R & further your career in music, Music, Gateway, a worldwide, music industry, marketplace, where you find music industry jobs, music cloud storage, music news, music industry jobs, record labels companies, music business worldwide, music industry news, music industry careers, career, in music, business,  how to start a career in music," />
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
    <style>
        body{
            font-family: "Segoe UI", "Trebuchet MS", "PT Sans", "Helvetica Neue", "HelveticaNeue-Light", Helvetica, Arial, sans-serif !important;
        }
    </style>
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
{{--    <script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>--}}
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
                                    Welcome back
                                </div>
                                <div class="auth-form__text">New user? <a href="{{ route('register') }}">
                                        Join now
                                    </a>
                                </div>
                            </div>
                            <div class="auth-form__body">
                                <form method="POST" action="{{ route('login') }}" autocomplete="off">
                                    @csrf
                                    <input type="hidden" name="user_check" value="artist">
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
                                    <fieldset aria-describedby="" class="form-group form-group">
                                        <!---->
                                        <div tabindex="-1" role="group" class="bv-no-focus-ring">
                                            <div></div>
                                            <!----><!----><!---->
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <div class="ch-auth custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }} id="__BVID__44">
                                            <label class="custom-control-label" for="__BVID__44">
                                                Keep me signed in
                                            </label>
                                        </div>
                                    </div>
                                    <fieldset aria-describedby="" class="form-group md-label">
                                        <!---->
{{--                                        <div class="cf-turnstile" data-sitekey="0x4AAAAAAAQHTURBG4V2tGU9" data-theme="light"></div>--}}

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
                                            Continue
                                        </button>
                                    </div>
                                    <a href="{{ route('password.request') }}" class="auth-form__forgot-link">
                                        Forgot your password?
                                    </a><!---->
                                </form>
                            </div>
                            <div class="auth-form__footer">
                                <div class="auth-or">
                                    or
                                </div>
                                <div class="form-group">
                                    <a href="{{ url('/login/google/?request_from=artist') }}" class="btn btn-social btn-google btn-block">
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
    </script>
@endif
{{--<script>--}}
{{--    !function (w, d, t) {--}}
{{--        w.TiktokAnalyticsObject=t;var ttq=w[t]=w[t]||[];ttq.methods=["page","track","identify","instances","debug","on","off","once","ready","alias","group","enableCookie","disableCookie"],ttq.setAndDefer=function(t,e){t[e]=function(){t.push([e].concat(Array.prototype.slice.call(arguments,0)))}};for(var i=0;i<ttq.methods.length;i++)ttq.setAndDefer(ttq,ttq.methods[i]);ttq.instance=function(t){for(var e=ttq._i[t]||[],n=0;n<ttq.methods.length;n++)ttq.setAndDefer(e,ttq.methods[n]);return e},ttq.load=function(e,n){var i="https://analytics.tiktok.com/i18n/pixel/events.js";ttq._i=ttq._i||{},ttq._i[e]=[],ttq._i[e]._u=i,ttq._t=ttq._t||{},ttq._t[e]=+new Date,ttq._o=ttq._o||{},ttq._o[e]=n||{};var o=document.createElement("script");o.type="text/javascript",o.async=!0,o.src=i+"?sdkid="+e+"&lib="+t;var a=document.getElementsByTagName("script")[0];a.parentNode.insertBefore(o,a)};--}}

{{--        ttq.load('CNAIDJRC77U6KO2RGUE0');--}}
{{--        ttq.page();--}}
{{--    }(window, document, 'ttq');--}}
{{--</script>--}}
</body>
</html>
