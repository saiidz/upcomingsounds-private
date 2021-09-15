{{-- layout --}}
@extends('layouts.guest')

{{-- page title --}}
@section('title','Signup')

{{-- page style --}}
@section('page-style')
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/register.css')}}">--}}
@endsection

{{-- page content --}}
@section('content')

    <div id="main" class="bg-gradiant-purple authentication-page">
        <section class="bg-login login_main signup">
            <div class="container">
                <div class="main-flex-box">
                    <div class="text-box">
                        <h1>Sign Up</h1>
                        <p>Sign up by creating an account</p>
                        <form class="login-form" method="POST" action="{{ route('register') }}" autocomplete="off">
                            @csrf
                            <div class="login_input">
                                <div class="input-group">
                                    <span><img src="{{asset('images/name.svg')}}" alt=""/></span>
                                    <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name"
                                           value="{{ old('name') }}"
                                           placeholder="Name" required autocomplete="off" autofocus>
                                    @error('name')
                                    <small class="red-text ml-10" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <span><img src="{{asset('images/email.svg')}}" alt=""/></span>
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ old('email') }}" placeholder="Email" required autocomplete="off">
                                    @error('email')
                                    <small class="red-text ml-10" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <span><img src="{{asset('images/password.svg')}}" alt=""/></span>
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror"
                                           name="password" placeholder="Password" required
                                           autocomplete="off">
                                    @error('password')
                                    <small class="red-text ml-10" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                    <span
                                        toggle="#password"
                                        class="show-pas toggle-password"
                                    ><img
                                            src="{{asset('images/toggle.svg')}}"
                                            alt=""
                                            class="password-toggle show"
                                        />

										<img
                                            src="{{asset('images/show-pas.svg')}}"
                                            alt=""
                                            class="password-toggle hide"
                                        />
									</span>


                                </div>
                                <div class="input-group">
                                    <span><img src="{{asset('images/address.svg')}}" alt=""/></span>
                                    <input id="address" type="text" class="@error('address') is-invalid @enderror"
                                           name="address" value="{{ old('address') }}"
                                           placeholder="Address" required autocomplete="off" autofocus>
                                    @error('address')
                                    <small class="red-text ml-10" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                </div>
                                <button type="submit"
                                        class="btn-white">Sign Up
                                </button>
                            </div>

                            <div class="login_terms">
                                <p>
                                    Already have an account? <a href="{{ route('login') }}">SIGN IN </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>



    {{--<div id="register-page" class="row">--}}
    {{--  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">--}}
    {{--    <form class="login-form" method="POST" action="{{ route('register') }}">--}}
    {{--      @csrf--}}
    {{--      <div class="row">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <h5 class="ml-4">Register</h5>--}}
    {{--          <p class="ml-4">Join to our community now !</p>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row margin">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <i class="material-icons prefix pt-2">person_outline</i>--}}
    {{--          <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"--}}
    {{--            required autocomplete="name" autofocus>--}}
    {{--          <label for="name" class="center-align">Name</label>--}}
    {{--          @error('name')--}}
    {{--          <small class="red-text ml-10" role="alert">--}}
    {{--            {{ $message }}--}}
    {{--          </small>--}}
    {{--          @enderror--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row margin">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <i class="material-icons prefix pt-2">mail_outline</i>--}}
    {{--          <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"--}}
    {{--            value="{{ old('email') }}" required autocomplete="email">--}}
    {{--          <label for="email">Email</label>--}}
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
    {{--          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required--}}
    {{--            autocomplete="new-password">--}}
    {{--          <label for="password">Password</label>--}}
    {{--          @error('password')--}}
    {{--          <small class="red-text ml-10" role="alert">--}}
    {{--            {{ $message }}--}}
    {{--          </small>--}}
    {{--          @enderror--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row margin">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <i class="material-icons prefix pt-2">lock_outline</i>--}}
    {{--          <input id="password-confirm" type="password" name="password_confirmation" required--}}
    {{--            autocomplete="new-password">--}}
    {{--          <label for="password-confirm">Password again</label>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--        <div class="row margin">--}}
    {{--            <div class="input-field col s12">--}}
    {{--                <i class="material-icons prefix pt-2">location_on</i>--}}
    {{--                <input id="address" type="text" class="@error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"--}}
    {{--                       required autocomplete="address" autofocus>--}}
    {{--                <label for="address" class="center-align">Address</label>--}}
    {{--                @error('address')--}}
    {{--                <small class="red-text ml-10" role="alert">--}}
    {{--                    {{ $message }}--}}
    {{--                </small>--}}
    {{--                @enderror--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--      <div class="row">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <button type="submit"--}}
    {{--            class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Register</button>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <p class="margin medium-small"><a href="{{ route('login')}}">Already have an account? Login</a></p>--}}
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
