{{-- layout --}}
@extends('layouts.guest')

{{-- page title --}}
@section('title','Email verification')

{{-- page content --}}
@section('content')

    <div class="b-t">
        <div class="center-block w-xxl w-auto-xs p-y-md text-center">
            <div class="p-a-md">
                <div>
                    <h4>Verify your email</h4>
                    <p class="text-muted m-y">
                        Thanks for signing up! Before getting started,could you verify your email address by clicking on the link we just emailed to you? <span  style="color: red !important;">If you didn't receive the email make sure to check your spam inbox </span>, we will gladly send you another.
                    </p>
                </div>
                <div id="snackbar"></div>
                <div id="snackbarError"></div>
                @if (session('status') == 'verification-link-sent')
                    <p class="verify_msg" style="color: red !important;">{{ __('A new verification link has been sent to the email address you provided during registration. If you did not receive the email make sure to check your spam inbox') }}</p>
                @endif

                <div class="verify-btn">
                    <form method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="btn circle btn-outline b-primary p-x-md auth_btn verification btn-one">Resend Verification Email.</button>
{{--                        <button type="submit" class="btn black btn-block p-x-md verification btn-one">Resend Verification Email</button>--}}
                    </form>
                    <br>
                    <form method="POST" action="{{ url('/logout') }}">
                        @csrf
                        <button type="submit" class="btn circle btn-outline b-primary p-x-md auth_btn verification btn-two">Log Out</button>
{{--                        <button type="submit" class="btn black btn-block p-x-md verification btn-two">Log Out</button>--}}
                    </form>
                </div>


            </div>
        </div>
    </div>
@endsection

{{--        <div class="mb-4 text-sm text-gray-600">--}}
{{--            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}--}}
{{--        </div>--}}

{{--        @if (session('status') == 'verification-link-sent')--}}
{{--            <div class="mb-4 font-medium text-sm text-green-600">--}}
{{--                {{ __('A new verification link has been sent to the email address you provided during registration.') }}--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <div class="mt-4 flex items-center justify-between">--}}
{{--            <form method="POST" action="{{ route('verification.send') }}">--}}
{{--                @csrf--}}

{{--                <div>--}}
{{--                    <x-button>--}}
{{--                        {{ __('Resend Verification Email') }}--}}
{{--                    </x-button>--}}
{{--                </div>--}}
{{--            </form>--}}

{{--            <form method="POST" action="{{ url('/logout') }}">--}}
{{--                @csrf--}}

{{--                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">--}}
{{--                    {{ __('Log Out') }}--}}
{{--                </button>--}}
{{--            </form>--}}
{{--        </div>--}}
