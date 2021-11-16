{{-- layout --}}
@extends('layouts.guest')

{{-- page title --}}
@section('title','Create Password')

{{-- page style --}}
@section('page-style')
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/login.css')}}">--}}
@endsection

{{-- page content --}}
@section('content')
    <div class="b-t">
        <div class="center-block w-xxl w-auto-xs p-y-md text-center">
            <div class="p-a-md">
                <div>
                    <h4>Create Password</h4>
                </div>
                <div id="snackbar"></div>
                <div id="snackbarError"></div>

                <form class="login-form" method="POST" action="{{ route('artist.create.password.post') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="form-group">

                        @if(!empty($user->email))
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ $user->email }}"
                                   readonly placeholder="Email" required
                                   autocomplete="off"
                                   autofocus>
                        @else
                            <input id="email" type="email"
                                   class="form-control @error('email') is-invalid @enderror" name="email"
                                   value="{{ old('email') }}"
                                   placeholder="Email" required
                                   autocomplete="off"
                                   autofocus>
                            @error('email')
                            <small class="red-text ml-10" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
                        @endif

                    </div>
                    <div class="form-group createPassword">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password" placeholder="Password" required autocomplete="new-password">
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
                    <div class="form-group createPassword">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                               required
                               placeholder="Password Confirm" autocomplete="new-password">

                        <span toggle="#password-confirm" class="show-pas toggle-password create_password">
                            <img src="{{asset('images/toggle.svg')}}" alt="" class="password-toggle show" />
							<img src="{{asset('images/show-pas_black.svg')}}" alt="" class="password-toggle hide" />
									</span>
                    </div>

                    <button type="submit" class="btn black btn-block p-x-md">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
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
