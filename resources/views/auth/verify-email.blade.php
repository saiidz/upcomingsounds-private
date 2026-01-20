<!DOCTYPE html>
<html lang="en">
<head>
    <meta property="og:title" content="Upcomingsounds.com">
    <meta property="og:description" content="Add description here">
    <meta property="og:image" content="https://upcomingsounds.com/og-image.png">
    <meta property="og:url" content="https://upcomingsounds.com">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Content Curator Login | UpcomingSounds</title>

    <meta name="description" content="Join UpcomingSounds, the newest platform for music promotion and pitching service. Submit your music now and access music industry jobs, record labels, and A&R opportunities. Discover advice, playlists, streaming platforms, and career resources for artists, bands, and producers in rock, EDM, jazz, indie, and more." />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}">
    <link rel="shortcut icon" sizes="196x196" href="{{asset('images/favicon.png')}}">

    <link rel="stylesheet" href="{{asset('css/login/login-new.css')}}" type="text/css" />

    <style>
        /* ===== FULL PAGE BACKGROUND ===== */
        .page-bg._auth {
            position: fixed;
            inset: 0;
            background: url("{{ asset('images/login-bg.jpg') }}") center center / cover no-repeat;
            z-index: -1;
        }

        .page-bg._auth::after {
            content: "";
            position: absolute;
            inset: 0;
            background: rgba(0,0,0,0.45);
        }

        .app, .main, .auth {
            position: relative;
            z-index: 1;
        }

        /* ===== CARD ENHANCEMENT ===== */
        .auth-card {
            background: rgba(255,255,255,0.96);
            border-radius: 14px;
            box-shadow: 0 10px 35px rgba(0,0,0,0.25);
            backdrop-filter: blur(6px);
        }

        .create_password {
            position: absolute;
            right: 7px;
            top: 16px;
        }

        #passwordDisplay {
            position: relative;
        }
    </style>
</head>

<body>

<div id="app" class="app">

    <!-- BACKGROUND -->
    <div class="page-bg _auth"></div>

    <main class="main">
        <div class="auth container-fluid">
            <div class="auth__row">

                <div class="auth__info-col">
                    <div class="free-trial">
                        <a href="{{url('/')}}">
                            <img src="{{asset('images/logo.png')}}" width="300" alt="Logo">
                        </a>
                    </div>
                </div>

                <div class="auth__card-col">
                    <div class="auth-card">
                        <div class="auth-form">

                            <div class="auth-form__header">
                                <div class="auth-form__title">Welcome back</div>
                                <div class="auth-form__text">
                                    New user? <a href="{{ route('curator.register') }}">Join now</a>
                                </div>
                            </div>

                            <div class="auth-form__body">
                                <form method="POST" action="{{ route('curator.login') }}" autocomplete="off">
                                    @csrf

                                    <input type="hidden" name="user_check" value="artist">

                                    <div class="form-group md-label">
                                        <input type="email" name="email" value="{{ old('email') }}"
                                               class="form-control @error('email') is-invalid @enderror" required>
                                        <label>Email Address</label>
                                        @error('email')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    <div class="form-group md-label position-relative">
                                        <input id="passwordAdd" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password" required>

                                        <label>Password</label>

                                        @error('password')<div class="invalid-feedback">{{ $message }}</div>@enderror

                                        <span toggle="#passwordAdd" class="toggle-password create_password">
                                            <img src="{{asset('images/toggle.svg')}}" id="showEyes">
                                            <img src="{{asset('images/show-pas_black.svg')}}" id="hideEyes" style="display:none;">
                                        </span>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" id="remember">
                                            <label class="custom-control-label" for="remember">Keep me signed in</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!! NoCaptcha::renderJs() !!}
                                        {!! NoCaptcha::display() !!}
                                        @error('g-recaptcha-response')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-outline-primary btn-block text-uppercase">
                                            Continue
                                        </button>
                                    </div>

                                    <a href="{{ route('password.request') }}" class="auth-form__forgot-link">
                                        Forgot your password?
                                    </a>
                                </form>
                            </div>

                            <div class="auth-form__footer">
                                <div class="auth-or">or</div>

                                <div class="form-group">
                                    <a href="{{ url('/login/google/?request_from=curator') }}"
                                       class="btn btn-social btn-google btn-block">
                                        Continue with Google
                                    </a>
                                </div>

                                <div class="auth-form__text _sm">
                                    Protected by reCAPTCHA and subject to Google Privacy Policy and Terms of Service.
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>
</div>

<script src="{{asset('libs/jquery/dist/jquery.js')}}"></script>
<script src="{{asset('libs/bootstrap/dist/js/bootstrap.js')}}"></script>

<script>
    $(".toggle-password").click(function () {
        var input = $($(this).attr("toggle"));
        if (input.attr("type") === "password") {
            $('#showEyes').hide();
            $('#hideEyes').show();
            input.attr("type", "text");
        } else {
            $('#hideEyes').hide();
            $('#showEyes').show();
            input.attr("type", "password");
        }
    });
</script>

</body>
</html>
