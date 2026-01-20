@extends('layouts.guest')

@section('title','Email Verification')

@section('page-style')
<style>
    .verify-bg{
        min-height:100vh;
        background:
            linear-gradient(rgba(0,0,0,0.55), rgba(0,0,0,0.55)),
            url('{{ asset('images/auth-bg.jpg') }}') center/cover no-repeat;
        display:flex;
        align-items:center;
        justify-content:center;
        padding:20px;
    }

    .verify-card{
        background:#fff;
        border-radius:16px;
        box-shadow:0 15px 40px rgba(0,0,0,0.25);
        padding:30px 28px;
        width:100%;
        max-width:420px;
        text-align:center;
    }

    .verify-icon{
        width:80px;
        height:80px;
        border-radius:50%;
        background:#e9f8f4;
        display:flex;
        align-items:center;
        justify-content:center;
        margin:0 auto 16px;
    }

    .verify-title{
        margin-bottom:6px;
        font-weight:600;
    }

    .verify-text{
        font-size:14px;
        line-height:1.6;
    }

    .verify-hint{
        display:inline-block;
        margin-top:8px;
        background:#fcf8e3;
        color:#8a6d3b;
        padding:6px 10px;
        border-radius:6px;
        font-size:12px;
    }

    .verify-actions .btn{
        width:100%;
        padding:10px;
        font-weight:600;
    }

    .verify-logout{
        background:none;
        border:none;
        color:#777;
        font-size:13px;
        margin-top:12px;
        cursor:pointer;
    }

    .verify-logout:hover{
        text-decoration:underline;
        color:#444;
    }

    .alert-success{
        background:#e8f7ee;
        color:#1f7a4d;
        padding:10px 12px;
        border-radius:8px;
        font-size:13px;
        text-align:center;
        margin:12px 0;
    }
</style>
@endsection

@section('content')

<div class="verify-bg">

    <div class="verify-card">

        {{-- Icon --}}
        <div class="verify-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="42" height="42" viewBox="0 0 24 24" fill="none" stroke="#0cc2aa" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path>
                <polyline points="22,6 12,13 2,6"></polyline>
            </svg>
        </div>

        {{-- Title & Text --}}
        <h4 class="verify-title">Verify your email</h4>

        <p class="text-muted verify-text">
            We have sent a verification link to your email address.  
            Please click the link to activate your account.
            <br>
            <span class="verify-hint">
                If you don’t see it, please check your spam folder.
            </span>
        </p>

        {{-- Success Message --}}
        @if (session('status') == 'verification-link-sent')
            <div class="alert-success">
                A new verification link has been sent to your email address.
            </div>
        @endif

        {{-- Actions --}}
        <div class="verify-actions m-t-md">

            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit"
                        class="btn btn-outline b-primary auth_btn"
                        onclick="this.disabled=true; this.innerText='Sending…'; this.form.submit();">
                    Resend Verification Email
                </button>
            </form>

            <form method="POST" action="{{ url('/logout') }}">
                @csrf
                <button type="submit" class="verify-logout">
                    ← Log Out
                </button>
            </form>

        </div>

    </div>

</div>

@endsection
