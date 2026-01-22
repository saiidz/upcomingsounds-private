{{-- layout --}}
@extends('layouts.artist-guest')

{{-- page title --}}
@section('title','Application Submitted')

{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/vertical-modern-menu-template/materialize.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/themes/vertical-modern-menu-template/style.css') }}">
    <style>
        .success-wrapper {
            min-height: 75vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .success-card {
            max-width: 520px;
            width: 100%;
            border-radius: 14px;
        }
        .success-icon {
            font-size: 54px;
            line-height: 1;
            margin-bottom: 10px;
        }
        .success-title {
            font-weight: 700;
            margin-bottom: 8px;
        }
        .success-subtitle {
            color: #6b7280;
            margin-bottom: 24px;
        }
        .next-steps {
            background: #f8fafc;
            border-radius: 10px;
            padding: 16px;
            text-align: left;
            font-size: 14px;
        }
        .brand-name {
            color: #7c4dff;
            font-weight: 700;
        }
    </style>
@endsection

{{-- page content --}}
@section('content')

<div class="app-body">
    <div class="success-wrapper">
        <div class="card success-card z-depth-2">
            <div class="card-content center-align">

                <div class="success-icon">✅</div>

                <h4 class="success-title">
                    Thank you for applying to <span class="brand-name">Upcoming Sounds</span>
                </h4>

                <p class="success-subtitle">
                    Hi, this is <strong>Gary</strong> from Upcoming Sounds.  
                    We’ve received your application and it’s now under review.
                </p>

                <div class="next-steps">
                    <strong>What happens next?</strong>
                    <ul style="margin-top:8px;">
                        <li>• Our team will review your submission.</li>
                        <li>• You should hear from us within a few days.</li>
                        <li>• If you don’t hear back within 2 weeks, please check your spam folder.</li>
                    </ul>
                </div>

                <div style="margin-top: 24px;">
                    <a href="{{ url('/') }}" class="btn waves-effect waves-light">
                        Back to Home
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>

@endsection

{{-- page script --}}
@section('page-script')
    <script src="{{ asset('js/vendors.min.js') }}"></script>
    <script src="{{ asset('js/plugins.js') }}"></script>
@endsection
