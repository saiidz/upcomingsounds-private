{{-- layout --}}
@extends('layouts.guest')

{{-- page title --}}
@section('title','Forget Password')

{{-- page style --}}
@section('page-style')
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/forgot.css')}}">--}}
@endsection

{{-- page content --}}
@section('content')
    <div id="main" class="bg-gradiant-purple authentication-page">
        <section class="bg-login login_main">
            <div class="container">
                <div class="main-flex-box">
                    <div class="text-box">
                        <h1>Forgot Password</h1>
                        <p>
                            Enter email and click the button to get a link in your <br/>

                            email inbox.
                        </p>
                        {{-- success status --}}
                        @if (session('status'))
                            <div class="card-alert card green lighten-5 remove_message">
                                <div class="card-content green-text">
                                    <p>{{ session('status') }}</p>
                                </div>
                                <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif
                        <form class="login-form" method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="login_input">
                                <div class="input-group">
                                    <span><img src="{{asset('images/email.svg')}}" alt=""/></span>
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" placeholder="Email" required autocomplete="off"
                                           autofocus>
                                    @error('email')
                                    <small class="red-text ml-10" role="alert">
                                        {{ $message }}
                                    </small>

                                
                                    @enderror
                                </div>
                                <button type="submit"
                                        class="btn-white">Send
                                </button>
                            </div>

                            <div class="login_terms">
                                <p>Don't have account? <a href="{{route('register')}}">SIGN UP </a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>


    {{--    <div id="forgot-password" class="row">--}}
    {{--        <div class="col s12 m6 l4 z-depth-4 offset-m4 card-panel border-radius-6 forgot-card bg-opacity-8">--}}
    {{--            --}}{{-- success status --}}
    {{--            @if (session('status'))--}}
    {{--                <div class="card-alert card green lighten-5">--}}
    {{--                    <div class="card-content green-text">--}}
    {{--                        <p>{{ session('status') }}</p>--}}
    {{--                    </div>--}}
    {{--                    <button type="button" class="close green-text" data-dismiss="alert" aria-label="Close">--}}
    {{--                        <span aria-hidden="true">×</span>--}}
    {{--                    </button>--}}
    {{--                </div>--}}
    {{--            @endif--}}
    {{--            <form class="login-form" method="POST" action="{{ route('password.email') }}">--}}
    {{--                @csrf--}}

    {{--                <div class="row">--}}
    {{--                    <div class="input-field col s12">--}}
    {{--                        <h5 class="ml-4">Forgot Password</h5>--}}
    {{--                        <p class="ml-4">You can reset your password</p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="input-field col s12">--}}
    {{--                        <i class="material-icons prefix pt-2">person_outline</i>--}}
    {{--                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"--}}
    {{--                               value="{{ old('email') }}" required autocomplete="email" autofocus>--}}
    {{--                        <label for="email" class="center-align">Email</label>--}}
    {{--                        @error('email')--}}
    {{--                        <span class="red-text ml-10" role="alert">--}}
    {{--            <strong>{{ $message }}</strong>--}}
    {{--          </span>--}}
    {{--                        @enderror--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="input-field col s12">--}}
    {{--                        <button type="submit"--}}
    {{--                                class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12 mb-1">Reset--}}
    {{--                            Password</button>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--                <div class="row">--}}
    {{--                    <div class="input-field col s6 m6 l6">--}}
    {{--                        <p class="margin medium-small"><a href="{{ route('login')}}">Login</a></p>--}}
    {{--                    </div>--}}
    {{--                    <div class="input-field col s6 m6 l6">--}}
    {{--                        <p class="margin right-align medium-small"><a href="{{route('register')}}">Register</a></p>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </form>--}}
    {{--        </div>--}}
    {{--    </div>--}}
@endsection


{{-- page script --}}
@section('page-script')
{{--    <script src="{{asset('js/scripts/ui-alerts.js')}}"></script>--}}
@endsection
