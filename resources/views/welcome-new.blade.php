{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Discover the Best Platform for New and Upcoming Sounds - Effective Music Pitching Service | Submit Your Music Today!')
@section('page-style')
   
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow">
      <title>Discover the Best Platform for New and Upcoming Sounds - Effective Music Pitching Service | Submit Your Music Today!</title>
    <meta name="description" content=" Submit your music now and access music industry content curators." />
<meta name="keywords" content="acoustic, advice, answers, apply, artist, artists, audiences, band, Belgium, best, blog, brazil, budget, build, Canadian, careers, cheating, choice, classic, contact, a curator, curatorS, days, discover, electronic, explore, feedback, folk, United kingdom, german, getting, great, rock, guaranteed, help, important, indie, industry, info, instrumental, island, Italy, jazz, join, label, labels, Lebanon, listened, mentors, metal, MUSiC, musicians musique need network open opportunities, platform, playlist, playlists, pricing, producer, professionals, promote, promotion, ProS, publishers, punk, radio, radios, record, records, EDM, release, results, rock music, select, simple, Reels, soul, Spotify, states, Tiktok, stories, streaming, streams, success, touch, track, tracks, transparent, united, visibility, to access music industry jobs, record labels, music promotion, A&R & further your career in music, Music, Gateway, a worldwide music industry, marketplace, where you find music industry jobs, music cloud storage, music news, music industry jobs, record labels companies, music business worldwide, music industry news, music industry careers, career, in music, business, how to start a career in music.">

    </body>
</html>
    <link rel="canonical" href="https://upcomingsounds.com/">
    <style>
        .videoWlcome{
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            width: 100%;
            min-height: 89vh;
            overflow: hidden;
            background-color: #000;
        }
        .welcome_video > video{
            position: absolute;
            /*top: 50%;*/
            top: 36%;
            left: 50%;
            z-index: 0;
            width: auto;
            min-width: 100%;
            height: auto;
            min-height: 100%;
            transform: translateX(-50%) translateY(-50%);
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
        .fa-angle-down {
            font-size: 3.5rem;
        }
        .text-muted {
            color: #818a91!important;
        }
    


    </style>
{{--    <link type="text/css" href="{{ asset('welcome-home-page/css/animate.css') }}" rel="stylesheet">--}}
{{--    <link type="text/css" href="{{ asset('welcome-home-page/css/bootstrap.min.css') }}" rel="stylesheet">--}}
{{--    <link type="text/css" href="{{ asset('welcome-home-page/css/themify-icons.css') }}" rel="stylesheet">--}}
    <link type="text/css" href="{{ asset('welcome-home-page/css/owl.transitions.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('welcome-home-page/css/owl.carousel.css') }}" rel="stylesheet">
{{--    <link type="text/css" href="{{ asset('welcome-home-page/css/magnific-popup.css') }}" rel="stylesheet">--}}
{{--    <link type="text/css" href="{{ asset('welcome-home-page/css/magnific-popup.css') }}" rel="stylesheet">--}}
    <link type="text/css" href="{{ asset('welcome-home-page/css/base.css') }}" rel="stylesheet">
{{--    <link type="text/css" href="{{ asset('welcome-home-page/css/elements.css') }}" rel="stylesheet">--}}
    <link type="text/css" href="{{ asset('welcome-home-page/css/responsive.css') }}" rel="stylesheet">

    <style>
        .testim {
            width: 100%;
            /*position: absolute;*/
            top: 50%;
            -webkit-transform: translatey(-50%);
            -moz-transform: translatey(-50%);
            -ms-transform: translatey(-50%);
            -o-transform: translatey(-50%);
            transform: translatey(-50%);
        }

        .testim .wrap {
            position: relative;
            width: 100%;
            max-width: 1020px;
            padding: 40px 20px;
            margin: auto;
        }

        .testim .arrow {
            display: block;
            position: absolute;
            color: #333;
            cursor: pointer;
            font-size: 2em;
            top: 50%;
            -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%);
            -moz-transform: translateY(-50%);
            -o-transform: translateY(-50%);
            transform: translateY(-50%);
            -webkit-transition: all .3s ease-in-out;
            -ms-transition: all .3s ease-in-out;
            -moz-transition: all .3s ease-in-out;
            -o-transition: all .3s ease-in-out;
            transition: all .3s ease-in-out;
            padding: 5px;
            z-index: 22222222;
        }

        .testim .arrow:before {
            cursor: pointer;
        }

        .testim .arrow:hover {
            color: green;
        }


        .testim .arrow.left {
            left: 70px;
        }

        .testim .arrow.right {
            right: 70px;
        }

        .testim .dots {
            text-align: center;
            position: absolute;
            width: 100%;
            bottom: 60px;
            left: 0;
            display: block;
            z-index: 3333;
            height: 12px;
        }

        .testim .dots .dot {
            list-style-type: none;
            display: inline-block;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            border: 1px solid green;
            margin: 0 10px;
            cursor: pointer;
            -webkit-transition: all .5s ease-in-out;
            -ms-transition: all .5s ease-in-out;
            -moz-transition: all .5s ease-in-out;
            -o-transition: all .5s ease-in-out;
            transition: all .5s ease-in-out;
            position: relative;
        }

        .testim .dots .dot.active,
        .testim .dots .dot:hover {
            background: green;
            border-color: green;
        }

        .testim .dots .dot.active {
            -webkit-animation: testim-scale .5s ease-in-out forwards;
            -moz-animation: testim-scale .5s ease-in-out forwards;
            -ms-animation: testim-scale .5s ease-in-out forwards;
            -o-animation: testim-scale .5s ease-in-out forwards;
            animation: testim-scale .5s ease-in-out forwards;
        }

        .testim .cont {
            position: relative;
            overflow: hidden;
        }

        .testim .cont > div {
            text-align: center;
            position: absolute;
            top: 0;
            left: 0;
            padding: 0 0 70px 0;
            opacity: 0;
        }

        .testim .cont > div.inactive {
            opacity: 1;
        }


        .testim .cont > div.active {
            position: relative;
            opacity: 1;
        }


        .testim .cont div .img img {
            display: block;
            width: 100px;
            height: 100px;
            margin: auto;
            border-radius: 50%;
        }

        .testim .cont div h2 {
            color: green;
            font-size: 1em;
            margin: 15px 0;
        }

        .testim .cont div p {
            font-size: 1.15em;
            color: #333;
            width: 70%;
            margin: auto;
        }

        .testim .cont div.active .img img {
            -webkit-animation: testim-show .5s ease-in-out forwards;
            -moz-animation: testim-show .5s ease-in-out forwards;
            -ms-animation: testim-show .5s ease-in-out forwards;
            -o-animation: testim-show .5s ease-in-out forwards;
            animation: testim-show .5s ease-in-out forwards;
        }

        .testim .cont div.active h2 {
            -webkit-animation: testim-content-in .4s ease-in-out forwards;
            -moz-animation: testim-content-in .4s ease-in-out forwards;
            -ms-animation: testim-content-in .4s ease-in-out forwards;
            -o-animation: testim-content-in .4s ease-in-out forwards;
            animation: testim-content-in .4s ease-in-out forwards;
        }

        .testim .cont div.active p {
            -webkit-animation: testim-content-in .5s ease-in-out forwards;
            -moz-animation: testim-content-in .5s ease-in-out forwards;
            -ms-animation: testim-content-in .5s ease-in-out forwards;
            -o-animation: testim-content-in .5s ease-in-out forwards;
            animation: testim-content-in .5s ease-in-out forwards;
        }

        .testim .cont div.inactive .img img {
            -webkit-animation: testim-hide .5s ease-in-out forwards;
            -moz-animation: testim-hide .5s ease-in-out forwards;
            -ms-animation: testim-hide .5s ease-in-out forwards;
            -o-animation: testim-hide .5s ease-in-out forwards;
            animation: testim-hide .5s ease-in-out forwards;
        }

        .testim .cont div.inactive h2 {
            -webkit-animation: testim-content-out .4s ease-in-out forwards;
            -moz-animation: testim-content-out .4s ease-in-out forwards;
            -ms-animation: testim-content-out .4s ease-in-out forwards;
            -o-animation: testim-content-out .4s ease-in-out forwards;
            animation: testim-content-out .4s ease-in-out forwards;
        }

        .testim .cont div.inactive p {
            -webkit-animation: testim-content-out .5s ease-in-out forwards;
            -moz-animation: testim-content-out .5s ease-in-out forwards;
            -ms-animation: testim-content-out .5s ease-in-out forwards;
            -o-animation: testim-content-out .5s ease-in-out forwards;
            animation: testim-content-out .5s ease-in-out forwards;
        }

        @-webkit-keyframes testim-scale {
            0% {
                -webkit-box-shadow: 0px 0px 0px 0px #eee;
                box-shadow: 0px 0px 0px 0px #eee;
            }

            35% {
                -webkit-box-shadow: 0px 0px 10px 5px #eee;
                box-shadow: 0px 0px 10px 5px #eee;
            }

            70% {
                -webkit-box-shadow: 0px 0px 10px 5px #ea830e;
                box-shadow: 0px 0px 10px 5px #ea830e;
            }

            100% {
                -webkit-box-shadow: 0px 0px 0px 0px #ea830e;
                box-shadow: 0px 0px 0px 0px #ea830e;
            }
        }

        @-moz-keyframes testim-scale {
            0% {
                -moz-box-shadow: 0px 0px 0px 0px #eee;
                box-shadow: 0px 0px 0px 0px #eee;
            }

            35% {
                -moz-box-shadow: 0px 0px 10px 5px #eee;
                box-shadow: 0px 0px 10px 5px #eee;
            }

            70% {
                -moz-box-shadow: 0px 0px 10px 5px #ea830e;
                box-shadow: 0px 0px 10px 5px #ea830e;
            }

            100% {
                -moz-box-shadow: 0px 0px 0px 0px #ea830e;
                box-shadow: 0px 0px 0px 0px #ea830e;
            }
        }

        @-ms-keyframes testim-scale {
            0% {
                -ms-box-shadow: 0px 0px 0px 0px #eee;
                box-shadow: 0px 0px 0px 0px #eee;
            }

            35% {
                -ms-box-shadow: 0px 0px 10px 5px #eee;
                box-shadow: 0px 0px 10px 5px #eee;
            }

            70% {
                -ms-box-shadow: 0px 0px 10px 5px #ea830e;
                box-shadow: 0px 0px 10px 5px #ea830e;
            }

            100% {
                -ms-box-shadow: 0px 0px 0px 0px #ea830e;
                box-shadow: 0px 0px 0px 0px #ea830e;
            }
        }

        @-o-keyframes testim-scale {
            0% {
                -o-box-shadow: 0px 0px 0px 0px #eee;
                box-shadow: 0px 0px 0px 0px #eee;
            }

            35% {
                -o-box-shadow: 0px 0px 10px 5px #eee;
                box-shadow: 0px 0px 10px 5px #eee;
            }

            70% {
                -o-box-shadow: 0px 0px 10px 5px #ea830e;
                box-shadow: 0px 0px 10px 5px #ea830e;
            }

            100% {
                -o-box-shadow: 0px 0px 0px 0px #ea830e;
                box-shadow: 0px 0px 0px 0px #ea830e;
            }
        }

        @keyframes testim-scale {
            0% {
                box-shadow: 0px 0px 0px 0px #eee;
            }

            35% {
                box-shadow: 0px 0px 10px 5px #eee;
            }

            70% {
                box-shadow: 0px 0px 10px 5px #ea830e;
            }

            100% {
                box-shadow: 0px 0px 0px 0px #ea830e;
            }
        }

        @-webkit-keyframes testim-content-in {
            from {
                opacity: 0;
                -webkit-transform: translateY(100%);
                transform: translateY(100%);
            }

            to {
                opacity: 1;
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
        }

        @-moz-keyframes testim-content-in {
            from {
                opacity: 0;
                -moz-transform: translateY(100%);
                transform: translateY(100%);
            }

            to {
                opacity: 1;
                -moz-transform: translateY(0);
                transform: translateY(0);
            }
        }

        @-ms-keyframes testim-content-in {
            from {
                opacity: 0;
                -ms-transform: translateY(100%);
                transform: translateY(100%);
            }

            to {
                opacity: 1;
                -ms-transform: translateY(0);
                transform: translateY(0);
            }
        }

        @-o-keyframes testim-content-in {
            from {
                opacity: 0;
                -o-transform: translateY(100%);
                transform: translateY(100%);
            }

            to {
                opacity: 1;
                -o-transform: translateY(0);
                transform: translateY(0);
            }
        }

        @keyframes testim-content-in {
            from {
                opacity: 0;
                transform: translateY(100%);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @-webkit-keyframes testim-content-out {
            from {
                opacity: 1;
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }

            to {
                opacity: 0;
                -webkit-transform: translateY(-100%);
                transform: translateY(-100%);
            }
        }

        @-moz-keyframes testim-content-out {
            from {
                opacity: 1;
                -moz-transform: translateY(0);
                transform: translateY(0);
            }

            to {
                opacity: 0;
                -moz-transform: translateY(-100%);
                transform: translateY(-100%);
            }
        }

        @-ms-keyframes testim-content-out {
            from {
                opacity: 1;
                -ms-transform: translateY(0);
                transform: translateY(0);
            }

            to {
                opacity: 0;
                -ms-transform: translateY(-100%);
                transform: translateY(-100%);
            }
        }

        @-o-keyframes testim-content-out {
            from {
                opacity: 1;
                -o-transform: translateY(0);
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(-100%);
                transform: translateY(-100%);
            }
        }

        @keyframes testim-content-out {
            from {
                opacity: 1;
                transform: translateY(0);
            }

            to {
                opacity: 0;
                transform: translateY(-100%);
            }
        }

        @-webkit-keyframes testim-show {
            from {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
            }

            to {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }
        }

        @-moz-keyframes testim-show {
            from {
                opacity: 0;
                -moz-transform: scale(0);
                transform: scale(0);
            }

            to {
                opacity: 1;
                -moz-transform: scale(1);
                transform: scale(1);
            }
        }

        @-ms-keyframes testim-show {
            from {
                opacity: 0;
                -ms-transform: scale(0);
                transform: scale(0);
            }

            to {
                opacity: 1;
                -ms-transform: scale(1);
                transform: scale(1);
            }
        }

        @-o-keyframes testim-show {
            from {
                opacity: 0;
                -o-transform: scale(0);
                transform: scale(0);
            }

            to {
                opacity: 1;
                -o-transform: scale(1);
                transform: scale(1);
            }
        }

        @keyframes testim-show {
            from {
                opacity: 0;
                transform: scale(0);
            }

            to {
                opacity: 1;
                transform: scale(1);
            }
        }

        @-webkit-keyframes testim-hide {
            from {
                opacity: 1;
                -webkit-transform: scale(1);
                transform: scale(1);
            }

            to {
                opacity: 0;
                -webkit-transform: scale(0);
                transform: scale(0);
            }
        }

        @-moz-keyframes testim-hide {
            from {
                opacity: 1;
                -moz-transform: scale(1);
                transform: scale(1);
            }

            to {
                opacity: 0;
                -moz-transform: scale(0);
                transform: scale(0);
            }
        }

        @-ms-keyframes testim-hide {
            from {
                opacity: 1;
                -ms-transform: scale(1);
                transform: scale(1);
            }

            to {
                opacity: 0;
                -ms-transform: scale(0);
                transform: scale(0);
            }
        }

        @-o-keyframes testim-hide {
            from {
                opacity: 1;
                -o-transform: scale(1);
                transform: scale(1);
            }

            to {
                opacity: 0;
                -o-transform: scale(0);
                transform: scale(0);
            }
        }

        @keyframes testim-hide {
            from {
                opacity: 1;
                transform: scale(1);
            }

            to {
                opacity: 0;
                transform: scale(0);
            }
        }

        @media all and (max-width: 300px) {
            body {
                font-size: 14px;
            }
        }

        @media all and (max-width: 500px) {
            .testim .arrow {
                font-size: 1.5em;
            }

            .testim .cont div p {
                line-height: 25px;
            }

        }
    </style>
    <!-- Include Slick carousel CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <!-- Include Slick theme CSS (optional) -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <!-- Include your custom CSS (optional) -->
    <style>
        /* Customize your slider styles here */
        .testimonial-slider {
            width: 80%;
            margin: 0 auto;
            height: 300px; /* Set your desired fixed height */
        }
        .testimonial-slide {
            text-align: center;
        }
        .testimonial-slide img {
            display: inline-block;
            max-width: 100%;
            height: auto;
        }
        .testimonial-slide h2 {
            font-size: 24px;
            margin: 15px 0;
        }
        .testimonial-slide p {
            font-size: 16px;
        }
    </style>
    <link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}" type="text/css" />
@endsection
{{-- page content --}}
@section('content')

            <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}} @if(Request::is('welcome-new') == 'true') weLcoMeHeaderTopHide @endif">

                <!-- ############ PAGE START-->


                <div class="black owl-theme videoWlcome">
                    <div class="row-col">
                        <div class="col-lg-12 welcome_video">
                            <video id="welcome_video" preload="metadata" autoplay loop muted playsinline loading="lazy">
                                <source src="https://us-east-vpc.s3.us-east-2.amazonaws.com/upcomingsounds_new.mp4">
{{--                                <source src="https://us-east-vpc.s3.us-east-2.amazonaws.com/upcomingsounds_home.mp4">--}}
                            </video>
                            <div class="mouse">
                                <a href="javascript:void(0)" class="mouse-icon" id="upClick">
                                    <div class="mouse-wheel"><i class="fa fa-angle-down"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="padding-110px-tb xs-padding-60px-tb bg-white builder-bg circleCall" id="content-section13" style="padding-top: 167px !important;padding-bottom: 256px !important;">
                    <div class="container">
                        <div class="row equalize xs-equalize-auto equalize-display-inherit">
                            <!-- content details -->
                            <div class="col-md-6 col-sm-6 xs-12 xs-text-center xs-margin-nineteen-bottom display-table" style="">
                                <div class="display-table-cell-vertical-middle">
                                    <h2 class="alt-font title-extra-large sm-title-large xs-section-title-large text-dark-gray width-90 letter-spacing-minus-1 sm-width-100 margin-eight-bottom tz-text sm-margin-ten-bottom sm-margin-ten-top">
                                        {{ !empty($theme_home->artist_title) ? $theme_home->artist_title : 'For Artists, Labels, Manager' }}
                                    </h2>
                                    <div class="text-extra-large tz-text width-90 sm-width-100 margin-five-bottom sm-margin-ten-bottom">
                                        {{ !empty($theme_home->artist_description) ? $theme_home->artist_description : 'Don`t stress about pushing out your music to the world,Upcoming Sounds has you covered!' }}
                                    </div>
                                    <div class="text-medium tz-text width-90 sm-width-100 margin-ten-bottom sm-margin-ten-bottom xs-margin-twenty-bottom">
                                        <p>
                                            {{ !empty($theme_home->artist_description_two) ? $theme_home->artist_description_two : 'Our platform will deal with marketing and promoting your music with our efficient methods, pushing out your track/album/ep to playlists, blogs, and various curators to help your sound reach its full potential and exposure.' }}
                                        </p>
                                    </div>
                                    <a class="btn-circle border-2-dark-aqua btn-border text-dark-aqua propClone nav-link" href="{{url(!empty($theme_home->artist_btn_link) ? $theme_home->artist_btn_link : '/for-artists')}}">
                                        <span class="tz-text btn btn-sm rounded primary _600">{{ !empty($theme_home->artist_btn_text) ? $theme_home->artist_btn_text : 'Submit Your music now  (100 % Free)' }}</span>
{{--                                        <i class="fa fa-long-arrow-right icon-extra-small tz-icon-color"></i>--}}
                                    </a>
                                </div>
                            </div>
                            <!-- end content details -->
                            <div class="col-md-6 col-sm-6 col-xs-12 display-table text-right xs-margin-lr-auto xs-fl-none xs-no-padding-bottom">
                                <div class="display-table-cell-vertical-middle">
                                    <img src="{{asset(!empty($theme_home->artist_image) ? $theme_home->artist_image : 'welcome-home-page/images/music.webp')}}" data-img-size="(W)800px X (H)828px" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section id="home" class="no-padding slider-style1 border-none">
                    <div class="owl-slider-full owl-carousel light-pagination owl-without-next-pre-arrow">
                        <!-- slider item -->
                        @if(!empty($homeSliders))
                            @foreach($homeSliders as $homeSlider)
                                <div class="item owl-bg-img tz-builder-bg-image cover-background bg-img-one" id="tz-bg-1" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)) repeat scroll 0% 0%, transparent url({{asset( $homeSlider->image )}}) repeat scroll 0% 0%;" data-img-size="(W)1920px X (H)994px">
                                    <div class="container one-sixth-screen xs-one-third-screen position-relative">
                                        <div class="col-md-12 col-sm-12 col-xs-12 slider-typography text-left">
                                            <div class="slider-text-middle-main">
                                                <div class="slider-text-middle">
                                                    <div class="col-md-7 col-sm-10 col-xs-12 no-padding alt-font slider-content sm-no-margin-top">
                                                        <div class="title-extra-large-6 line-height-75 font-weight-700 text-white slider-title margin-seven-bottom tz-text" id="tz-slider-text1">{{$homeSlider->title ?? null}}</div>
                                                        <div class="text-light-gray text-extra-large text-white main-font font-weight-600 slider-text margin-ten-bottom tz-text width-80 xs-width-100" id="tz-slider-text2">
                                                            {{$homeSlider->details ?? null}}
                                                        </div>
                                                        <div class="btn-dual">
                                                            @if($homeSlider->button_one_status == 1)
                                                                <a class="btn btn-sm rounded primary _600 tastemakers_signup" target="_blank" style="background-color: #02b875 !important;color: white !important;" href="{{$homeSlider->button_one_link ?? null}}">
                                                                    <span class="tz-text">{{$homeSlider->button_one_text ?? null}}</span>
                                                                </a>
                                                            @endif

                                                            @if($homeSlider->button_two_status == 1)
                                                                    <a class="btn btn-sm rounded primary _600 tastemakers_signup" target="_blank" style="background-color: #02b875 !important;color: white !important;" href="{{$homeSlider->button_two_link ?? null}}"><span class="tz-text">{{$homeSlider->button_two_text ?? null}}</span></a>
{{--                                                                    <a class="btn btn-medium propClone highlight-button-white-border btn-circle xs-margin-ten-bottom" style="background-color: #02b875 !important;color: white !important;" href="{{$homeSlider->button_two_link ?? null}}"><span class="tz-text">{{$homeSlider->button_two_text ?? null}}</span></a>--}}
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <!-- end slider item -->
                    </div>
                </section>

                <section class="padding-110px-tb xs-padding-60px-tb bg-white builder-bg" id="content-section50">
                    <div class="container">
                        <div class="row equalize xs-equalize-auto equalize-display-inherit">
                            <div class="col-md-6 col-sm-6 xs-12 xs-text-center display-table" style="">
                                <div class="display-table-cell-vertical-middle">
                                    <img alt="" src="{{asset(!empty($theme_home->curator_image) ? $theme_home->curator_image : 'welcome-home-page/images/curator_music.png')}}" data-img-size="(W)800px X (H)681px">
                                </div>
                            </div>
                            <!-- content details -->
                            <div class="col-md-6 col-sm-6 xs-12 xs-text-center xs-margin-nineteen-bottom display-table curatorHomePage" style="padding-left: 100px">
                                <div class="display-table-cell-vertical-middle">
                                    <h2 class="alt-font title-extra-large sm-title-large xs-section-title-large text-dark-gray width-90 sm-width-100 letter-spacing-minus-1 margin-eight-bottom tz-text sm-margin-ten-bottom sm-margin-ten-top">
                                        {{ !empty($theme_home->curator_title) ? $theme_home->curator_title : ' For Curators, Bloggers, Content Creators, Media & Influences.' }}
                                    </h2>
                                    <div class="text-extra-large tz-text width-90 sm-width-100 margin-five-bottom sm-margin-ten-bottom">{{ !empty($theme_home->curator_description) ? $theme_home->curator_description : ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries.' }}</div>
                                    <div class="text-medium tz-text width-90 sm-width-100 margin-ten-bottom sm-margin-ten-bottom xs-margin-twenty-bottom">
                                        <p><div class="text-extra-large tz-text width-90 sm-width-100 margin-five-bottom sm-margin-ten-bottom">{{ !empty($theme_home->curator_description_two) ? $theme_home->curator_description_two : ' Lorem Ipsum is simply dummy text of the printing and typesetting industry. It has survived not only five centuries.' }}</div></p>
                                    </div>
                                    <a class="btn-circle border-2-dark-aqua btn-border text-dark-aqua propClone nav-link" href="{{url(!empty($theme_home->curator_btn_link) ? $theme_home->curator_btn_link : '/for-curators')}}">
                                        <span class="tz-text btn btn-sm rounded primary _600">{{ !empty($theme_home->curator_btn_text) ? $theme_home->curator_btn_text : 'Join Our Family' }}</span>
                                    </a>
{{--                                    <a class="btn-circle border-2-dark-aqua btn-border text-dark-aqua propClone nav-link" href="{{url(!empty($theme_home->artist_btn_link) ? $theme_home->artist_btn_link : '/for-artists')}}">--}}
{{--                                        <span class="tz-text btn btn-sm rounded primary _600">{{ !empty($theme_home->artist_btn_text) ? $theme_home->artist_btn_text : 'Submit Your music now  (100 % Free)' }}</span>--}}
{{--                                    </a>--}}
                                </div>
                            </div>
                            <!-- end content details -->
                        </div>
                    </div>
                </section>

                <section class="padding-60px-tb bg-white builder-bg" id="callto-action11">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                                <a href="#"><img class="" alt="" src="{{asset(!empty($theme_home->award_image_upcoming) ? $theme_home->award_image_upcoming : 'welcome-home-page/images/award.png')}}" data-img-size="(W)743px X (H)110px"></a>
                            </div>
                        </div>
                        <div class="row-col">
                            <div class="row-col">
                                <div class="col-md-4">
                                    <div class="p-a-lg text-center welcome_UpcomingSounds">
                                        <p class="text-muted text-md m-b-lg">{{ !empty($theme_home->upcoming_sound_content_one) ? $theme_home->upcoming_sound_content_one : 'UpcomingSounds.com is a unique place where musicians can gain attention, promotion and greater prospects in the world of entertainment. It doesnt matter if you are just starting and sending demos or if your work is already established and ready to be shown, we are here to help.' }}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-a-lg text-center welcome_UpcomingSounds">
                                        <p class="text-muted text-md m-b-lg">{{ !empty($theme_home->upcoming_sound_content_two) ? $theme_home->upcoming_sound_content_two : 'Whether youre a composer, band member, producer or sound designer, UpcomingSounds is the platform you have been waiting for. The site provides promotional opportunities to artists worldwide that might not have been otherwise available to them. UpcomingSounds is a platform that connects the creative community.'}}</p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="p-a-lg text-center welcome_UpcomingSounds">
                                        <p class="text-muted text-md m-b-lg">{{ !empty($theme_home->upcoming_sound_content_three) ? $theme_home->upcoming_sound_content_three : 'UpcomingSounds.com was launched in response to the demand for a fair but rewarding way to get noticed by those who are in search of talent. where new and known artists can share their work and where new and known artists can share their work and find artist mentors to help them reach a higher level.'}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="builder-bg border-none" style="background-color: #d94440;" id="content-section17">
                    <div class="container-fluid">
                        <div class="row equalize">
                            <!-- details -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 tz-background-color display-table">
                                <div class="display-table-cell-vertical-middle padding-thirty-one md-padding-twenty sm-no-padding-lr">
                                    <div class="col-md-12 col-sm-6 col-xs-12 no-padding margin-ten-bottom xs-margin-twenty-bottom xs-text-center">
                                        <div class="col-md-2 col-sm-2 xs-float-none font-weight-600 content-box title-extra-large line-height-40 alt-font text-dark-gray tz-text">01.</div>
                                        <div class="col-md-10 col-sm-10 xs-no-margin xs-no-padding xs-width-100 xs-clear-both">
                                            <h3 class="title-medium margin-two-bottom text-dark-gray tz-text alt-font">
                                                {{ !empty($theme_home->title_one_end_section) ? $theme_home->title_one_end_section : 'Demo, Unreleased or a mastered track already in stores.'}}
                                            </h3>
                                            <div class="text-medium text-dark-gray tz-text">
                                                <p>
                                                    {{ !empty($theme_home->description_one_end_section) ? $theme_home->description_one_end_section : 'You can send your masterpiece anytime whether you need some advice, or help or you`re ready to share it globally.'}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-6 col-xs-12 no-padding margin-ten-bottom xs-margin-twenty-bottom xs-text-center">
                                        <div class="col-md-2 col-sm-2 xs-float-none font-weight-600 content-box title-extra-large line-height-40 alt-font text-dark-gray tz-text">02.</div>
                                        <div class="col-md-10 col-sm-10 xs-no-margin xs-no-padding xs-width-100 xs-clear-both">
                                            <h3 class="title-medium margin-two-bottom text-dark-gray tz-text alt-font">
                                                {{ !empty($theme_home->title_two_end_section) ? $theme_home->title_two_end_section : 'All in one place'}}
                                            </h3>
                                            <div class="text-medium text-dark-gray tz-text">
                                                <p>
                                                    {{ !empty($theme_home->description_two_end_section) ? $theme_home->description_two_end_section : 'Upcomingsounds.com save you hours of productive wasted on sending emails or searching for contacts.'}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-6 col-xs-12 no-padding xs-text-center">
                                        <div class="col-md-2 col-sm-2 xs-float-none font-weight-600 content-box title-extra-large line-height-40 alt-font text-dark-gray tz-text">03.</div>
                                        <div class="col-md-10 col-sm-10 xs-no-margin xs-no-padding xs-width-100 xs-clear-both">
                                            <h3 class="title-medium margin-two-bottom text-dark-gray tz-text alt-font">
                                                {{ !empty($theme_home->title_three_end_section) ? $theme_home->title_three_end_section : 'Professional Review and Feedback'}}
                                            </h3>
                                            <div class="text-medium text-dark-gray tz-text">
                                                <p class="no-margin">
                                                    {{ !empty($theme_home->description_three_end_section) ? $theme_home->description_three_end_section : 'Get constructive feedback from a music critic or maybe a good hint for a better-sounding product.'}}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end details -->
                            <!-- content images -->
{{--                            <img src="{{asset($theme_home->image_upcoming_sounds)}}" alt="">--}}
{{--                            {{dd($theme_home->image_upcoming_sounds)}}--}}
{{--                            {{dump($theme_home->home_end_section_image)}}--}}
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding xs-no-padding-15 bg-gray tz-builder-bg-image uHNS cover-background xs-height-300-px bg-img-four" data-img-size="(W)1000px X (H)800px"
                                 style="background: linear-gradient(transparent, transparent) repeat scroll 0% 0%, transparent
                             url({{asset(!empty($theme_home->upcoming_home_new_section)
                                ? $theme_home->upcoming_home_new_section
                                : 'welcome-home-page/images/upcomingSounds.png')}}) repeat scroll 0% 0%;">

                            </div>
                            <!-- end content images -->
                        </div>
                    </div>
                </section>

{{--                <section class="padding-110px-tb xs-padding-60px-tb bg-white builder-bg" id="testimonials-section4">--}}
{{--                @if(!empty($testimonials) && count($testimonials) > 0)--}}
{{--                    <section class="bg-white builder-bg" style="padding-top:180px; padding-bottom: 80px;">--}}
{{--                        <div class="container-fluid">--}}
{{--                            <div class="row equalize">--}}
{{--                                <div class="col-md-12">--}}
{{--                                    <div id="testim" class="testim">--}}
{{--                                        <div class="testim-cover">--}}
{{--                                            <div class="wrap" id="testMonials" style="display: none;">--}}
{{--                                                <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>--}}
{{--                                                <span id="left-arrow" class="arrow left fa fa-chevron-left"></span>--}}
{{--                                                <ul id="testim-dots" class="dots">--}}
{{--                                                    @foreach($testimonials as $index => $testimonial)--}}
{{--                                                        <li class="dot" data-index="{{ $index }}"></li>--}}
{{--                                                    @endforeach--}}
{{--                                                </ul>--}}
{{--                                                <div id="testim-content" class="cont" style="width: 500px; height: 300px;"> <!-- Adjust width and height as needed -->--}}
{{--                                                    @foreach($testimonials as $testimonial)--}}
{{--                                                        <div class="testimonial-item" style="width: 100%; height: 100%;">--}}
{{--                                                            <div class="img" style="width: 100px; height: 100px;"> <!-- Adjust image width and height -->--}}
{{--                                                                <img src="{{ asset('uploads/testimonials/' . $testimonial->image) }}" alt="">--}}
{{--                                                            </div>--}}
{{--                                                            <h2>{{$testimonial->title ?? 'Lorem P. Ipsum'}}</h2>--}}
{{--                                                            <p>{{$testimonial->details ?? 'Lorem ipsum dolor sit amet, consectetur'}}</p>--}}
{{--                                                        </div>--}}
{{--                                                    @endforeach--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </section>--}}
{{--                @endif--}}



                @if(!empty($testimonials) && count($testimonials) > 0)
                    <section class="bg-white builder-bg" style="padding-top:180px; padding-bottom: 80px;" >
                        <div class="container-fluid">
                            <div class="row equalize">
                                <div class="col-md-12">
                                    <div class="testimonial-slider">
                                        @foreach($testimonials as $testimonial)
                                            <div class="testimonial-slide">
                                                <img src="{{asset('uploads/testimonials/'. $testimonial->image)}}" alt="Testimonial 1" style="  display: block;width: 100px;height: 100px;margin: auto;border-radius: 50%;">
                                                <h2>{{$testimonial->title ?? 'Lorem P. Ipsum'}}</h2>
                                                <p>{{$testimonial->details ?? 'Lorem ipsum dolor sit amet, consectetur'}}</p>
                                            </div>
                                        @endforeach
                                        <!-- Add more testimonial slides as needed -->
                                    </div>
{{--                                    <div id="testim" class="testim">--}}
{{--                                        <div class="testim-cover">--}}
{{--                                            <div class="wrap" id="testMonials" style="display: none;">--}}
{{--                                                <span id="right-arrow" class="arrow right fa fa-chevron-right"></span>--}}
{{--                                                <span id="left-arrow" class="arrow left fa fa-chevron-left "></span>--}}
{{--                                                <ul id="testim-dots" class="dots">--}}
{{--                                                    @foreach($testimonials as $testimonial)--}}
{{--                                                        <li class="dot"></li>--}}
{{--                                                    @endforeach--}}
{{--                                                </ul>--}}
{{--                                                <div id="testim-content" class="cont">--}}
{{--                                                    @foreach($testimonials as $testimonial)--}}
{{--                                                        <div class="">--}}
{{--                                                            <div class="img">--}}
{{--                                                                <img src="{{asset('uploads/testimonials/'. $testimonial->image)}}" alt="">--}}
{{--                                                            </div>--}}
{{--                                                            <h2>{{$testimonial->title ?? 'Lorem P. Ipsum'}}</h2>--}}
{{--                                                            <p>{{$testimonial->details ?? 'Lorem ipsum dolor sit amet, consectetur'}}</p>--}}
{{--                                                        </div>--}}
{{--                                                    @endforeach--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
                                </div>
                            </div>
                        </div>
                    </section>
                @endif
                <!-- ############ PAGE END-->

            </div>

            @include('welcome-panels.welcome-footer')

@endsection
{{-- page script --}}
@section('page-script')

    <script>
        $('video').on('ended', function () {
            this.load();
            this.play();
        });
        $("#upClick").click(function() {
            $('html, body').animate({
                scrollTop: $(".circleCall").offset().top
            }, 1500);
        });
    </script>

    <!-- Include jQuery and Slick carousel scripts -->
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script>
        $.noConflict();
        jQuery(document).ready(function($) {
            // Your Slick carousel initialization code here
            $('.testimonial-slider').slick({
                autoplay: true, // Auto-play the slider
            });
        });
    </script>


    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Check if the page was reloaded
            if (performance.navigation.type === 1) {
                // Page was reloaded, toggle the display property to "block"
                document.getElementById('testMonials').style.display = 'block';
            }
        });
    </script>


    <script>
        // vars
        'use strict'
        var	testim = document.getElementById("testim"),
            testimDots = Array.prototype.slice.call(document.getElementById("testim-dots").children),
            testimContent = Array.prototype.slice.call(document.getElementById("testim-content").children),
            testimLeftArrow = document.getElementById("left-arrow"),
            testimRightArrow = document.getElementById("right-arrow"),
            testimSpeed = 4500,
            currentSlide = 0,
            currentActive = 0,
            testimTimer,
            touchStartPos,
            touchEndPos,
            touchPosDiff,
            ignoreTouch = 30;
        ;
        console.log(testimContent)
        window.onload = function() {

            // Testim Script
            function playSlide(slide) {
                for (var k = 0; k < testimDots.length; k++) {
                    if (testimContent[k] !== undefined) {
                        testimContent[k].classList.remove("active");
                        testimContent[k].classList.remove("inactive");
                    }
                    testimDots[k].classList.remove("active");
                }

                if (slide < 0) {
                    slide = currentSlide = testimContent.length-1;
                }

                if (slide > testimContent.length - 1) {
                    slide = currentSlide = 0;
                }

                if (currentActive != currentSlide) {
                    testimContent[currentActive].classList.add("inactive");
                }
                testimContent[slide].classList.add("active");
                testimDots[slide].classList.add("active");

                currentActive = currentSlide;

                clearTimeout(testimTimer);
                testimTimer = setTimeout(function() {
                    playSlide(currentSlide += 1);
                }, testimSpeed)
            }

            testimLeftArrow.addEventListener("click", function() {
                playSlide(currentSlide -= 1);
            })

            testimRightArrow.addEventListener("click", function() {
                playSlide(currentSlide += 1);
            })

            for (var l = 0; l < testimDots.length; l++) {
                testimDots[l].addEventListener("click", function() {
                    playSlide(currentSlide = testimDots.indexOf(this));
                })
            }

            playSlide(currentSlide);

            // keyboard shortcuts
            document.addEventListener("keyup", function(e) {
                switch (e.keyCode) {
                    case 37:
                        testimLeftArrow.click();
                        break;

                    case 39:
                        testimRightArrow.click();
                        break;

                    case 39:
                        testimRightArrow.click();
                        break;

                    default:
                        break;
                }
            })

            testim.addEventListener("touchstart", function(e) {
                touchStartPos = e.changedTouches[0].clientX;
            })

            testim.addEventListener("touchend", function(e) {
                touchEndPos = e.changedTouches[0].clientX;

                touchPosDiff = touchStartPos - touchEndPos;

                console.log(touchPosDiff);
                console.log(touchStartPos);
                console.log(touchEndPos);


                if (touchPosDiff > 0 + ignoreTouch) {
                    testimLeftArrow.click();
                } else if (touchPosDiff < 0 - ignoreTouch) {
                    testimRightArrow.click();
                } else {
                    return;
                }

            })
        }
    </script>
    <script src="{{asset('welcome-home-page/js/jquery.min.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/jquery.appear.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/smooth-scroll.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/wow.min.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/jquery.nav.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/equalize.min.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/jquery.fitvids.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/jquery.countTo.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/counter.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/twitterFetcher_min.js')}}"></script>
    <script src="{{asset('welcome-home-page/js/main.js')}}"></script>
@endsection
