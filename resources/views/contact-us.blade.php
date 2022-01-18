{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Contact-us')

@section('page-style')
<style>
    .contact-title {
        font-size: 27px;
        font-weight: 600;
        margin-bottom: 20px
    }
    .form-contact .form-group {
        margin-bottom: 30px;
    }
    .form-contact .form-control {
        border: 1px solid #8f9195;
        border-radius: 0;
        height: 48px;
        padding-left: 18px;
        font-size: 13px;
        background: transparent
    }

    .form-contact .form-control:focus {
        outline: 0;
        box-shadow: none
    }

    .form-contact .form-control::placeholder {
        font-weight: 300;
        color: green;
    }
    .form-contact textarea {
        border-radius: 0;
        height: 100% !important
    }
    .contact-info {
        margin-bottom: 25px
    }

    .contact-info__icon {
        margin-right: 20px
    }

    .contact-info__icon i, .contact-info__icon span {
        color: #8f9195;
        font-size: 27px
    }

    .contact-info .media-body h3 {
        font-size: 16px;
        margin-bottom: 0;
        color: #2a2a2a
    }

    .contact-info .media-body h3 a:hover {
        color: #2845ba
    }

    .contact-info .media-body p {
        color: #8a8a8a
    }
    .media {
        display: -webkit-box;
        display: -moz-box;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex
    }
    .__cf_email__:hover{
        color:#02b875 !important;
    }
    .app-header ~ .app-body {
        padding-top: 3rem;
    }
</style>
@endsection

{{-- page content --}}
@section('content')
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

        <!-- ############ PAGE START-->

        <div class="row-col amber h-v">
            <div class="row-cell v-m">
                <div class="text-center col-sm-6 offset-sm-3 p-y-lg">
                    <h1 class="display-3 m-y-lg">Contact Us</h1>
                </div>
            </div>
        </div>

        <section class="contact-section">
            <div class="container m-t-2">
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form"
                              method="POST" action="{{ url('/contact-us') }}" autocomplete="off"
                              id="contactForm" novalidate>
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                    <textarea class="form-control w-100" name="message" id="message" cols="30" rows="9"
                                              onfocus="this.placeholder = ''"
                                              onblur="this.placeholder = 'Enter Message'"
                                              value="{{ old('message') }}" placeholder=" Enter Message" required></textarea>
                                        @error('message')
                                        <small class="red-text ml-10" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="name" id="name" type="text"
                                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'"
                                               value="{{ old('name') }}" placeholder="Enter your name" required>
                                        @error('name')
                                        <small class="red-text ml-10" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="email" id="email" type="email"
                                               onfocus="this.placeholder = ''"
                                               value="{{ old('email') }}" onblur="this.placeholder = 'Enter email address'" placeholder="Email" required>
                                        @error('email')
                                        <small class="red-text ml-10" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="subject" id="subject" type="text"
                                               onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'"
                                               value="{{ old('subject') }}" placeholder="Enter Subject" required>
                                        @error('subject')
                                        <small class="red-text ml-10" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mt-3">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                                @error('g-recaptcha-response')
                                <small class="red-text ml-10" role="alert">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>

                            <div class="form-group mt-3">
                                <button type="submit" class="btn circle btn-outline b-primary p-x-md auth_btn Rigister">Send</button>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fa fa-home"></i></span>
                            <div class="media-body">
                                <h3>Liverpool, England.</h3>
                                <p>29-31 Parliament Street, L8 5RN</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fa fa-tablet"></i></span>
                            <div class="media-body">
                                <h3></h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="fa fa-envelope"></i></span>
                            <div class="media-body">
                                <h3><a href="mailto:info@upcomingsounds.com" class="__cf_email__">info@upcomingsounds.com</a>
                                </h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
{{--        <div class="container m-t-2">--}}
{{--            <div class="row-col h-v">--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- ############ PAGE END-->

    </div>
    @include('welcome-panels.welcome-footer')
@endsection
