{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Blog')

@section('page-style')
    <style>
        .hero-wrap {
            width: 100%;
            height: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: top center;
            position: relative;
        }
        .hero-wrap .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: '';
            opacity: .8;
            background: #f200ff;
            background: linear-gradient(45deg, #f200ff 0%, #ffba42 100%);
        }
        .align-items-center {
            -webkit-box-align: center !important;
            -ms-flex-align: center !important;
            align-items: center !important;
        }
        .justify-content-start {
            -webkit-box-pack: start !important;
            -ms-flex-pack: start !important;
            justify-content: flex-start !important;
        }
        .no-gutters {
            margin-right: 0;
            margin-left: 0;
        }
        .no-gutters > .col, .no-gutters > [class*="col-"] {
            padding-right: 0;
            padding-left: 0;
        }

        .slider-text .subheading {
            font-size: 18px;
            color: white;
            font-weight: 400;
            margin-bottom: 0;
        }
        .slider-text h1 {
            font-size: 3vw;
            line-height: 1.2;
        }
        .slider-text .text {
            position: relative;
        }
        .slider-text p {
            font-size: 18px;
            line-height: 1.5;
            color: rgba(255, 255, 255, 0.9);
        }
        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }
        .mouse {
            position: absolute;
            left: 0;
            bottom: -100px;
            z-index: 2;
        }
        .mouse-icon {
            height: 80px;
            border: 1px solid transparent;
            background: transparent;
            cursor: pointer;
            position: relative;
            text-align: center;
            margin: 0 auto;
            display: block;
        }
        .mouse-wheel {
            height: 80px;
            margin: 0 auto 0;
            display: block;
            width: 30px;
            background: transparent;
            border-radius: 50%;
            animation: 1.6s ease infinite wheel-up-down;
            font-size: 50px;
            line-height: 1;
        }
        .ion-ios-arrow-round-down::before {
            content: "\f118";
        }
        .ionicons, .ion-ios-arrow-back::before, .ion-ios-arrow-forward::before, .ion-ios-arrow-round-down::before, .ion-ios-arrow-round-forward::before {
            display: inline-block;
            font-style: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            text-rendering: auto;
            line-height: 1;
        }
        .ftco-section {
            padding: 7em 0 0 0;
            position: relative;
        }
        .d-flex {
            display: flex !important;
        }
        .blog-entry {
            margin-bottom: 30px;
        }
        .block-20 {
            overflow: hidden;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center center;
            position: relative;
            display: block;
            width: 100%;
            height: 400px;
            border-radius: 4px;
        }
        .blog-entry .text {
            position: relative;
            width: 100%;
            margin: 0 auto;
        }
        .p-4 {
            padding: 1.5rem !important;
        }
        .blog-entry .text .topper {
            margin-top: -61px;
            position: absolute;
            top: 0;
            left: 20px;
            background: #ffd369;
        }
        .blog-entry .one {
            width: 70px;
        }
        .pl-3 {
            padding-left: 1rem !important;
        }
        .blog-entry span.day {
            font-size: 44px;
            font-weight: 300;
            color: #000000;
            line-height: 1;
        }
        .blog-entry .two {
            width: calc(100% - 70px);
        }
        .pr-3 {
            padding-right: 1rem !important;
        }
        .py-2 {
            padding-bottom: 0.5rem !important;
        }
        .blog-entry span.yr, .blog-entry span.mos {
            font-size: 13px;
            line-height: 1.6;
            display: block;
            color: rgba(0, 0, 0, 0.7);
        }
        .blog-entry span.yr, .blog-entry span.mos {
            font-size: 13px;
            line-height: 1.6;
            display: block;
            color: rgba(0, 0, 0, 0.7);
        }
        .blog-entry .text .topper::after {
            position: absolute;
            bottom: -10px;
            left: 40px;
            content: '';
            width: 0;
            height: 0;
            border-style: solid;
            border-width: 10px 10px 0 10px;
            border-color: #ffd369 transparent transparent transparent;
        }
        .blog-entry .text .heading {
            font-size: 22px;
            margin-bottom: 30px;
            font-weight: 800;
        }
        .mb-3 {
            margin-bottom: 1rem !important;
        }
        .blog-entry .text .heading a {
            color: #000000;
        }
        .blog-entry .text .btn-custom {
            color: rgba(0, 0, 0, 0.4);
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
        }
        .blog-entry .text .btn-custom span {
            color: #000000;
        }
        .ion-ios-arrow-round-forward::before {
            content: "\f119";
        }
        .row {
            flex-wrap: wrap;
        }
        .fa-arrow-down{
            color:#02b875 !important;
        }
        .app-header ~ .app-body {
            padding-bottom: 0rem !important;
        }
        @media (min-width: 481px) and (max-width: 767px) {

            /* CSS */
            .hero-wrap {
                height:346px !important;
                background-position: center center !important;
            }
            .no-gutters{
                padding-top: 55px!important;
            }
        }

        /*
          ##Device = Most of the Smartphones Mobiles (Portrait)
          ##Screen = B/w 320px to 479px
        */

        @media (min-width: 320px) and (max-width: 480px) {

            /* CSS */
            .hero-wrap {
                height:346px !important;
                background-position: center center !important;
            }
            .slider-text h1 {
                font-size: 5vw!important;
            }
            .no-gutters{
                padding-top: 90px!important;
            }
            .mouse {
                position: initial !important;;

            }
        }
    </style>
@endsection

{{-- page content --}}
@section('content')
    <div class="app-body">

        <!-- ############ PAGE START-->
        <div class="hero-wrap js-fullheight" style="background-image:url({{asset('images/blog-bg.jpg')}}); height: 700px;background-position: 50% 0px;"
             data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" style="height: 433px;padding-top: 190px;"
                     data-scrollax-parent="true">
                    <div class="col-md-12 ftco-animate">
                        <h1 class="mb-4 mb-md-0">UpcomingSounds blog</h1>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="text">
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                        there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                                        the Semantics, a large language ocean.</p>
                                    <div class="mouse">
                                        <a href="#" class="mouse-icon">
                                            <div class="mouse-wheel"><i class="fa fa-arrow-down"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="#" class="block-20" style="background-image: url({{asset('images/image_1.jpg')}});">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day">18</span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr">2021</span>
                                        <span class="mos">October</span>
                                    </div>
                                </div>
                                <h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <p><a href="#" class="btn-custom"><i class="fa fa-arrow-circle-right"></i>Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="#" class="block-20" style="background-image: url({{asset('images/image_2.jpg')}});">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day">18</span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr">2021</span>
                                        <span class="mos">October</span>
                                    </div>
                                </div>
                                <h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <p><a href="#" class="btn-custom"><i class="fa fa-arrow-circle-right"></i>Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="#" class="block-20" style="background-image: url({{asset('images/image_3.jpg')}});">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day">18</span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr">2021</span>
                                        <span class="mos">October</span>
                                    </div>
                                </div>
                                <h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <p><a href="#" class="btn-custom"><i class="fa fa-arrow-circle-right"></i>Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="#" class="block-20" style="background-image: url({{asset('images/image_4.jpg')}});">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day">18</span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr">2021</span>
                                        <span class="mos">October</span>
                                    </div>
                                </div>
                                <h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <p><a href="#" class="btn-custom"><i class="fa fa-arrow-circle-right"></i>Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="#" class="block-20" style="background-image: url({{asset('images/image_5.jpg')}});">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day">18</span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr">2021</span>
                                        <span class="mos">October</span>
                                    </div>
                                </div>
                                <h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <p><a href="#" class="btn-custom"><i class="fa fa-arrow-circle-right"></i>Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="#" class="block-20" style="background-image: url({{asset('images/image_6.jpg')}});">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day">18</span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr">2021</span>
                                        <span class="mos">October</span>
                                    </div>
                                </div>
                                <h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <p><a href="#" class="btn-custom"><i class="fa fa-arrow-circle-right"></i>Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
{{--        <div class="row-col amber h-v">--}}
{{--            <div class="row-cell v-m">--}}
{{--                <div class="text-center col-sm-6 offset-sm-3 p-y-lg">--}}
{{--                    <h1 class="display-3 m-y-lg">Blog</h1>--}}
{{--                                        <p class="m-y text-muted h4">--}}
{{--                                           Coming Soon--}}
{{--                                        </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}

{{--        <div class="container m-t-2">--}}
{{--            <div class="row-col h-v">--}}
{{--            </div>--}}
{{--        </div>--}}
        <!-- ############ PAGE END-->

    </div>
    @include('welcome-panels.welcome-footer')
@endsection
