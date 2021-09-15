{{-- layout --}}
@extends('layouts.guest')

{{-- page title --}}
@section('title','Reset Password')

{{-- page style --}}
@section('page-style')
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">--}}
@endsection

{{-- page content --}}
@section('content')
    <div id="main" class="bg-gradiant-purple authentication-page">
        <section class="bg-login login_main forget-pass-2">
            <div class="container">
                <div class="main-flex-box">
                    <div class="text-box">
                        <h1>Reset Password</h1>
                        <form class="login-form" method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            <div class="login_input">
                                <div class="input-group">
                                    <span><img src="{{asset('images/email.svg')}}"/></span>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ $email ?? old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                                    @error('email')
                                        <small class="red-text ml-10" role="alert">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                                <div class="input-group">
                                    <span><img src="{{asset('images/password.svg')}}" alt=""/></span>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                                           name="password" placeholder="Password" required autocomplete="new-password">
                                    @error('password')
                                    <small class="red-text ml-10" role="alert">
                                        {{ $message }}
                                    </small>
                                    @enderror
                                    <span
                                        toggle="#password-field"
                                        class="show-pas toggle-password"
                                    ><img
                                            src="{{asset('images/toggle.svg')}}" alt=""
                                            class="password-toggle hide"
                                        />

										<img
                                            src="{{asset('images/show-pas.svg')}}"
                                            alt=""
                                            class="password-toggle show"
                                        />
									</span>
                                </div>
                                <div class="input-group">
                                    <span><img src="{{asset('images/password.svg')}}" alt=""/></span>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
                                           placeholder="Password Confirm" autocomplete="new-password">

                                    <span
                                        toggle="#password-field"
                                        class="show-pas toggle-password"
                                    ><img
                                            src="{{asset('images/toggle.svg')}}"
                                            alt=""
                                            class="password-toggle hide"
                                        />

										<img
                                            src="{{asset('images/show-pas.svg')}}"
                                            alt=""
                                            class="password-toggle show"
                                        />
									</span>
                                </div>
                                <button type="submit"
                                        class="btn-white">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{--    <div id="login-page" class="row">--}}
    {{--        <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-8">--}}
    {{--            <form class="login-form" method="POST" action="{{ route('password.update') }}">--}}
    {{--                @csrf--}}
    {{--                <input type="hidden" name="token" value="{{ $request->route('token') }}">--}}
    {{--                <div class="row">--}}
    {{--                    <div class="input-field col s12">--}}
    {{--                        <h5 class="ml-4">Reset Password</h5>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="row margin">--}}
    {{--                    <div class="input-field col s12">--}}
    {{--                        <i class="material-icons prefix pt-2">person_outline</i>--}}
    {{--                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"--}}
    {{--                               value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>--}}
    {{--                        <label for="email" class="center-align">Email</label>--}}
    {{--                        @error('email')--}}
    {{--                        <small class="red-text ml-10" role="alert">--}}
    {{--                            {{ $message }}--}}
    {{--                        </small>--}}
    {{--                        @enderror--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="row margin">--}}
    {{--                    <div class="input-field col s12">--}}
    {{--                        <i class="material-icons prefix pt-2">lock_outline</i>--}}
    {{--                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"--}}
    {{--                               name="password" required autocomplete="new-password">--}}
    {{--                        <label for="password">Password</label>--}}
    {{--                        @error('password')--}}
    {{--                        <small class="red-text ml-10" role="alert">--}}
    {{--                            {{ $message }}--}}
    {{--                        </small>--}}
    {{--                        @enderror--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="row margin">--}}
    {{--                    <div class="input-field col s12">--}}
    {{--                        <i class="material-icons prefix pt-2">lock_outline</i>--}}
    {{--                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required--}}
    {{--                               autocomplete="new-password">--}}
    {{--                        <label for="password-confirm">Password Confirm</label>--}}
    {{--                    </div>--}}
    {{--                </div>--}}

    {{--                <div class="row">--}}
    {{--                    <div class="input-field col s12">--}}
    {{--                        <button type="submit"--}}
    {{--                                class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Login</button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </form>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection
