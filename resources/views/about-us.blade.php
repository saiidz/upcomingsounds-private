{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','About-us')

@section('page-style')
    <style>
        /*.probootstrap-main {*/
        /*    position: relative;*/
        /*    margin-bottom: 300px;*/
        /*    background: #fff;*/
        /*    z-index: 2;*/
        /*}*/
        .flex, .probootstrap-section-half, .probootstrap-section-half .probootstrap-text {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap
        }
        .probootstrap-section-half.probootstrap-no-hover .probootstrap-image, .probootstrap-section-half.probootstrap-no-hover .probootstrap-text {
            width: 50%;
        }
        .probootstrap-section-half .probootstrap-image {
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        .probootstrap-section-half .probootstrap-image, .probootstrap-section-half .probootstrap-text {
            height: 100vh;
            -webkit-transition: .3s all ease;
            transition: .3s all ease;
        }
        .probootstrap-section-half .probootstrap-text {
            border-bottom: 1px solid #f2f2f2;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
        }
        .probootstrap-section-half .probootstrap-text>.probootstrap-inner {
            align-self: center;
            max-width: 500px;
            padding: 30px;
        }
        /*.probootstrap-animate {*/
        /*    opacity: 0;*/
        /*    visibility: hidden;*/
        /*}*/
        figure, ol, p, ul {
            margin-bottom: 1.3em;
        }
        .probootstrap-section {
            position: relative;
            /*padding: 10em 0;*/
            padding-top:5rem
        }
        .mb70 {
            margin-bottom: 70px!important;
        }
        .mb50 {
            margin-bottom: 50px!important;
        }
        .text-center {
            text-align: center;
        }
        .carousel-inner>.item>a>img, .carousel-inner>.item>img, .img-responsive, .thumbnail a>img, .thumbnail>img {
            display: block;
            max-width: 100%;
            height: auto;
        }
        img {
            vertical-align: middle;
        }
        p{
            text-align: justify;
        }
        .probootstrap-card-text{
            margin-top:25px;
        }
        .app-header ~ .app-body {
            padding-bottom: 0rem !important;
        }

        @media (min-width: 481px) and (max-width: 767px) {

            /* CSS */
            .probootstrap-section-half.probootstrap-no-hover .probootstrap-image, .probootstrap-section-half.probootstrap-no-hover .probootstrap-text {
                width: 100% !important;
            }
        }

        /*
          ##Device = Most of the Smartphones Mobiles (Portrait)
          ##Screen = B/w 320px to 479px
        */

        @media (min-width: 320px) and (max-width: 480px) {

            /* CSS */
            .probootstrap-section-half.probootstrap-no-hover .probootstrap-image, .probootstrap-section-half.probootstrap-no-hover .probootstrap-text {
                width: 100% !important;
            }
        }
    </style>
@endsection

{{-- page content --}}
@section('content')
    <div class="app-body">

        <!-- ############ PAGE START-->

        <div class="probootstrap-main">
            <section class="probootstrap-section-half probootstrap-no-hover">
                <div class="probootstrap-image"
                     style="background-image: url({{asset('images/upcoming-aboutus.jpg')}})"></div>
                <div class="probootstrap-text">
                    <div class="probootstrap-inner probootstrap-animate">
                        <h1 class="heading">About Us</h1>
                        <p class="m-y text-muted">Headquarters
 29-31 Parliament Street, Liverpool, England, L8 5RN</p>
                    </div>
                </div>
            </section>

            <section class="probootstrap-section">
                <div class="container">
                    <div class="row mb70 probootstrap-animate" data-animate-effect="fadeIn">
                        <div class="col-md-6">
                            <h2>How We Started</h2>
                            <p class="m-y text-muted">UpcomingSounds.com was launched in response to the demand for a fair but rewarding way to get noticed by those who are in search of talent.
                            where new and known artists can share their work and where new and known artists can share their work and find artist mentors to help them reach a higher level.</p>
                            <p class="m-y text-muted"> </div>
                        <div class="col-md-6">
                            <h2>Our Philosophy</h2>
                            <p class="m-y text-muted">Our philosophy has always been to make music promotion simple and effective for artists of all genres. With an intuitive user interface and seamless experience, we can connect curators directly with the artist community. No middleman, no contracts, just pure curation.
                            </p>
                            <p class="m-y text-muted"></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 section-heading text-center probootstrap-animate">
                            <h2 class="mb70">About Us</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4 probootstrap-animate mb50">
                            <div class="probootstrap-card probootstrap-person text-center">
                                <div class="probootstrap-card-media">
                                    <img src="{{asset('images/artistbackgrounds.jpg')}}" class="img-responsive"
                                         alt="{{asset('images/artistbackgrounds.jpg')}}">
                                </div>
                                <div class="probootstrap-card-text">
                                    <div class="display-inline">
                                        <p class="m-y text-muted">UpcomingSounds.com is a unique place where musicians can gain attention, promotion and greater prospects in the world of entertainment. It doesn't matter if you are just starting and sending demos or if your work is already established and ready to be shown, we are here to help. you can expect your submission decision within 96 hours of receiving it. We will connect you with curators, blogs, journalists and other professionals that can get you the exposure you need in the industry. We can guarantee that you will get feedback from every track you submit. Sometimes the feedback you receive when your song is declined will be useful.</p>
                                    </div>
                                    <div class="form-group mt-3">
                                        <a href="{{url('/artist-home')}}" class="btn circle btn-outline b-primary p-x-md auth_btn Rigister">Find out more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 probootstrap-animate mb50">
                            <div class="probootstrap-card probootstrap-person text-center">
                                <div class="probootstrap-card-media">
                                    <img src="{{asset('images/artistbackgrounds.jpg')}}" class="img-responsive"
                                         alt="{{asset('images/artistbackgrounds.jpg')}}">
                                </div>
                                <div class="probootstrap-card-text">
                                    <div class="display-inline">
                                        <p class="m-y text-muted">Whether you're a composer, band member, producer or sound designer, Upcoming Sounds is the platform you have been waiting for. The site provides promotional opportunities to artists worldwide that might not have been otherwise available to them. UpcomingSounds is a platform that connects the creative community honestly and authentically. Our philosophy has always been to make music promotion simple and effective for artists of all genres. With an intuitive user interface and seamless experience, we can connect curators directly with the artist community. No middleman, no contracts, just pure curation.</p>
                                    </div>
                                    <div class="form-group mt-3">
                                        <a href="{{url('/register')}}" class="btn circle btn-outline b-primary p-x-md auth_btn Rigister">signup</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 probootstrap-animate mb50">
                            <div class="probootstrap-card probootstrap-person text-center">
                                <div class="probootstrap-card-media">
                                    <img src="{{asset('images/artistbackgrounds.jpg')}}" class="img-responsive"
                                         alt="{{asset('images/artistbackgrounds.jpg')}}">
                                </div>
                                <div class="probootstrap-card-text">
                                    <div class="display-inline">
                                        <p class="m-y text-muted">UpcomingSounds.com was launched in response to the demand for a fair but rewarding way to get noticed by those who are in search of talent. where new and known artists can share their work and where new and known artists can share their work and find artist mentors to help them reach a higher level. It’s important to keep in mind that most curators are doing this as a hobby only verified users with an orange tick will provide professional feedback and impactful results, sometimes it's hard to find the perfect words for why they don't like a song. It's never been easier to share your music with the world.</p>
                                    </div>
                                    <div class="form-group tasteMakerReg">
                                        <a href="{{url('/taste-maker-register')}}" class="btn circle btn-outline b-primary p-x-md auth_btn Rigister">Apply as tastemaker / pro</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>


        <!-- ############ PAGE END-->

    </div>
    @include('welcome-panels.welcome-footer')
@endsection
