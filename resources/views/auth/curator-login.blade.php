{{-- layout --}}
@extends('layouts.guest')

{{-- page title --}}
@section('title','Taste Maker Login')

@section('page-style')
    <style>
        .curator_sides {
            height: 62px;
            font-size: 20px;
            padding-top: 17px;
        }
    </style>
@endsection

{{-- page content --}}
@section('content')

        <div class="b-t">
            <div class="center-block w-xxl w-auto-xs p-y-md text-center">
                <div class="p-a-md">
                    <div>
                        <a href="{{ url('/login/google/?request_from=curator') }}" class="btn-block">
                            <img src="{{asset('images/google_new.png')}}" style="width: 100%;">
{{--                            <img src="{{asset('images/google_new.png')}}" style="width: 278px;height: 62px;">--}}
                            {{--                            <i class="fa fa-google pull-left"></i>--}}
                            {{--                            Sign up with Google--}}
                        </a>

                        <a href="{{ url('/login/facebook/?request_from=curator') }}" class="btn-block">
                            <img src="{{asset('images/facebook.png')}}"  style="width: 100%;">
                        </a>

                        <a href="{{ url('/login/twitter/?request_from=curator') }}" class="btn-block">
                            <img src="{{asset('images/twitter.png')}}" style="width: 100%;">
                        </a>
                        <a href="{{url('/login/spotify/?request_from=curator')}}" style="background-color: #1ed760;;" class="btn btn-block curator_sides text-white m-b-sm">
                            <i class="fa fa-spotify pull-left"></i>
                            Sign up with Spotify
                        </a>
                    </div>
                    <div class="m-y text-sm">
                        OR
                    </div>
                    <form method="POST" action="{{ route('curator.login') }}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="user_check" value="curator">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required>
                            @error('email')
                            <small class="red-text ml-10" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group createPassword">
                            <input id="password" type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password" placeholder="Password" required
                                   autocomplete="current-password">
{{--                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="{{ old('password') }}" placeholder="Password" required>--}}
                            @error('password')
                            <small class="red-text ml-10" role="alert">
                                {{ $message }}
                            </small>
                            @enderror

                            <span toggle="#password" class="show-pas toggle-password create_password">
                            <img src="{{asset('images/toggle.svg')}}" alt="" class="password-toggle show" />
							<img src="{{asset('images/show-pas_black.svg')}}" alt="" class="password-toggle hide" />
									</span>
                        </div>
                        <div class="m-b-md">
                            <label class="md-check">
                                <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><i class="primary"></i> Keep me signed in
                            </label>
                        </div>
                        <button type="submit" class="btn circle btn-outline b-primary p-x-md auth_btn Login">Sign in</button>
{{--                        <button type="submit" class="btn btn-lg black p-x-lg">Sign in</button>--}}
                    </form>
                    <div class="m-y">
                        <a href="{{ route('password.request') }}" class="_600">Forgot password?</a>
                    </div>
                    <div>
                        Do not have an account?
                        <a href="{{ route('curator.register') }}" class="text-primary _600">Sign up</a>
                    </div>
                </div>
            </div>
        </div>
{{--    <div id="main" class="bg-gradiant-purple authentication-page">--}}
{{--        <section class="bg-login login_main ">--}}
{{--            <div class="container">--}}
{{--                <div class="main-flex-box">--}}
{{--                    <div class="text-box">--}}
{{--                        <h1>Login</h1>--}}
{{--                        <p>Sign in with the email and password</p>--}}
{{--                       @if(session('failed') !== null)--}}
{{--                            <p style="color:red">{{session('failed')}}</p>--}}
{{--                       @endif--}}
{{--                        <form class="login-form" method="POST" action="{{ route('login') }}">--}}
{{--                            @csrf--}}
{{--                            <div class="login_input">--}}
{{--                                <div class="input-group">--}}
{{--                                    <span><img src="{{asset('images/email.svg')}}" alt=""/></span>--}}
{{--                                    <input id="icon_prefix" type="email" class=" @error('email') is-invalid @enderror"--}}
{{--                                           name="email"--}}
{{--                                           value="{{ old('email') }}" placeholder="Email" required autocomplete="off"--}}
{{--                                           autofocus>--}}
{{--                                    @error('email')--}}
{{--                                    <small class="red-text ml-10" role="alert">--}}
{{--                                        {{ $message }}--}}
{{--                                    </small>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                                <div class="input-group">--}}
{{--                                    <span class="password-icon"><img src="{{asset('images/password.svg')}}" alt=""/></span>--}}
{{--                                    <input id="password-field" type="password"--}}
{{--                                           class="form-control @error('password') is-invalid @enderror"--}}
{{--                                           name="password" placeholder="Password" required--}}
{{--                                           autocomplete="current-password">--}}
{{--                                    @error('password')--}}
{{--                                    <small class="red-text ml-10" role="alert">--}}
{{--                                        {{ $message }}--}}
{{--                                    </small>--}}
{{--                                    @enderror--}}
{{--                                    <span--}}
{{--                                        toggle="#password-field"--}}
{{--                                        class="show-pas toggle-password"--}}
{{--                                     autocomplete="off"><img--}}
{{--                                            src="{{asset('images/toggle.svg')}}"--}}
{{--                                            alt=""--}}
{{--                                            class="password-toggle show"--}}
{{--                                        />--}}

{{--										<img--}}
{{--                                            src="{{asset('images/show-pas.svg')}}"--}}
{{--                                            alt=""--}}
{{--                                            class="password-toggle hide"--}}
{{--                                        />--}}
{{--									</span>--}}
{{--                                </div>--}}
{{--                                <p>--}}
{{--                                    <a href="{{ route('password.request') }}" class="text-color-white"--}}
{{--                                    >Forgot Password?</a--}}
{{--                                    >--}}
{{--                                </p>--}}
{{--                                <button type="submit" class="btn-white">--}}
{{--                                    Login--}}
{{--                                </button>--}}

{{--                            </div>--}}

{{--                            <div class="login_terms">--}}
{{--                                <p>Don't have account? <a href="{{ route('register') }}">SIGN UP </a></p>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    </div>--}}
    {{--<div id="login-page" class="row">--}}
    {{--  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">--}}
    {{--    <form class="login-form" method="POST" action="{{ route('login') }}">--}}
    {{--      @csrf--}}
    {{--      <div class="row">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <h5 class="ml-4">{{ __('Sign in') }}</h5>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row margin">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <i class="material-icons prefix pt-2">person_outline</i>--}}
    {{--          <input id="email" type="email" class=" @error('email') is-invalid @enderror" name="email"--}}
    {{--            value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
    {{--          <label for="email" class="center-align">{{ __('Email') }}</label>--}}
    {{--          @error('email')--}}
    {{--          <small class="red-text ml-10" role="alert">--}}
    {{--            {{ $message }}--}}
    {{--          </small>--}}
    {{--          @enderror--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row margin">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <i class="material-icons prefix pt-2">lock_outline</i>--}}
    {{--          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"--}}
    {{--            name="password" required autocomplete="current-password">--}}
    {{--          <label for="password">{{ __('password') }}</label>--}}
    {{--          @error('password')--}}
    {{--          <small class="red-text ml-10" role="alert">--}}
    {{--            {{ $message }}--}}
    {{--          </small>--}}
    {{--          @enderror--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row">--}}
    {{--        <div class="col s12 m12 l12 ml-2 mt-1">--}}
    {{--          <p>--}}
    {{--            <label>--}}
    {{--              <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>--}}
    {{--              <span>Remember Me</span>--}}
    {{--            </label>--}}
    {{--          </p>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <button type="submit" class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">--}}
    {{--            Login--}}
    {{--          </button>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row">--}}
    {{--        <div class="input-field col s6 m6 l6">--}}
    {{--          <p class="margin medium-small"><a href="{{ route('register') }}">Register Now!</a></p>--}}
    {{--        </div>--}}
    {{--        <div class="input-field col s6 m6 l6">--}}
    {{--          <p class="margin right-align medium-small">--}}
    {{--            <a href="{{ route('password.request') }}">Forgot password?</a>--}}
    {{--          </p>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--    </form>--}}
    {{--  </div>--}}
    {{--</div>--}}
@endsection
{{-- page script --}}
@section('page-script')

<script>
    $(".toggle-password").click(function () {
        $(this).toggleClass("show-pas");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
</script>
@endsection
