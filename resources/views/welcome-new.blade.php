{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Welcome to the newest platform for new sounds and upcoming sounds, pitching service with effective results. Submit your music now!')
@section('page-style')
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
@endsection
{{-- page content --}}
@section('content')

            <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

                <!-- ############ PAGE START-->


                <div class="black owl-theme videoWlcome">
                    <div class="row-col">
                        <div class="col-lg-12 welcome_video">
                            <video id="welcome_video" preload="metadata" autoplay loop muted playsinline>
                                <source src="https://us-east-vpc.s3.us-east-2.amazonaws.com/upcomingsounds_home.mp4">
                            </video>
                            <div class="mouse">
                                <a href="javascript:void(0)" class="mouse-icon" id="upClick">
                                    <div class="mouse-wheel"><i class="fa fa-angle-down"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="padding-110px-tb xs-padding-60px-tb bg-white builder-bg" id="content-section13">
                    <div class="container circleCall">
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
                                <div class="item owl-bg-img tz-builder-bg-image cover-background bg-img-one" id="tz-bg-1" style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0)) repeat scroll 0% 0%, transparent url({{asset('uploads/home_slider/'. $homeSlider->image)}}) repeat scroll 0% 0%;" data-img-size="(W)1920px X (H)994px">
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
                                                            <a class="btn btn-medium propClone bg-white text-dark-gray btn-circle xs-margin-ten-bottom" href="{{$homeSlider->button_one_link ?? null}}">
                                                                <span class="tz-text">{{$homeSlider->button_one_text ?? null}}</span>
                                                            </a>
                                                            <a class="btn btn-medium propClone highlight-button-white-border btn-circle xs-margin-ten-bottom" href="{{$homeSlider->button_two_link ?? null}}"><span class="tz-text">{{$homeSlider->button_two_text ?? null}}</span></a>
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
                            <div class="col-md-6 col-sm-6 xs-12 xs-text-center xs-margin-nineteen-bottom display-table" style="">
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
                                <a href="#"><img class="" alt="" src="{{asset('welcome-home-page/images/award.png')}}" data-img-size="(W)743px X (H)110px"></a>
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

                <section class="builder-bg border-none" style="background-color: green;" id="content-section17">
                    <div class="container-fluid">
                        <div class="row equalize">
                            <!-- details -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 tz-background-color display-table">
                                <div class="display-table-cell-vertical-middle padding-thirty-one md-padding-twenty sm-no-padding-lr">
                                    <div class="col-md-12 col-sm-6 col-xs-12 no-padding margin-ten-bottom xs-margin-twenty-bottom xs-text-center">
                                        <div class="col-md-2 col-sm-2 xs-float-none font-weight-600 content-box title-extra-large line-height-40 alt-font text-dark-gray tz-text">01.</div>
                                        <div class="col-md-10 col-sm-10 xs-no-margin xs-no-padding xs-width-100 xs-clear-both">
                                            <h3 class="title-medium margin-two-bottom text-dark-gray tz-text alt-font">
                                                Demo, Unreleased or a mastered track already in stores.
                                            </h3>
                                            <div class="text-medium text-dark-gray tz-text">
                                                <p>
                                                    You can send your masterpiece anytime whether you need some advice, or help or you're ready to share it globally.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-6 col-xs-12 no-padding margin-ten-bottom xs-margin-twenty-bottom xs-text-center">
                                        <div class="col-md-2 col-sm-2 xs-float-none font-weight-600 content-box title-extra-large line-height-40 alt-font text-dark-gray tz-text">02.</div>
                                        <div class="col-md-10 col-sm-10 xs-no-margin xs-no-padding xs-width-100 xs-clear-both">
                                            <h3 class="title-medium margin-two-bottom text-dark-gray tz-text alt-font">
                                                All in one place
                                            </h3>
                                            <div class="text-medium text-dark-gray tz-text">
                                                <p>
                                                    Upcomingsounds.com save you hours of productive
                                                    wasted on sending emails or searching for contacts.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-6 col-xs-12 no-padding xs-text-center">
                                        <div class="col-md-2 col-sm-2 xs-float-none font-weight-600 content-box title-extra-large line-height-40 alt-font text-dark-gray tz-text">03.</div>
                                        <div class="col-md-10 col-sm-10 xs-no-margin xs-no-padding xs-width-100 xs-clear-both">
                                            <h3 class="title-medium margin-two-bottom text-dark-gray tz-text alt-font">
                                                Professional Review and Feedback
                                            </h3>
                                            <div class="text-medium text-dark-gray tz-text">
                                                <p class="no-margin">
                                                    Get constructive feedback from a music critic or maybe a good
                                                    hint for a better-sounding product.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end details -->
                            <!-- content images -->
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding xs-no-padding-15 bg-gray tz-builder-bg-image cover-background xs-height-300-px bg-img-four" data-img-size="(W)1000px X (H)800px" style="background: linear-gradient(transparent, transparent) repeat scroll 0% 0%, transparent url({{asset('welcome-home-page/images/upcomingSounds.png')}}) repeat scroll 0% 0%;"></div>
                            <!-- end content images -->
                        </div>
                    </div>
                </section>

                <section class="padding-110px-tb xs-padding-60px-tb bg-white builder-bg" id="testimonials-section4">
                    <div class="container">
                        <div class="row two-column">
                            <!-- testimonial item -->
                            <div class="col-md-6 col-sm-6 col-xs-12 xs-text-center margin-ten-bottom sm-margin-twenty-bottom">
                                <div class="col-md-3 col-sm-3 col-xs-12 sm-no-padding xs-margin-eleven-bottom">
                                    <img class="border-radius-100 width-95 xs-width-40" src="{{asset('welcome-home-page/images/avtar.jpg')}}" data-img-size="(W)149px X (H)149px" alt=""/>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12 feature-box-details">
                                    <div class="text-medium margin-five-bottom sm-margin-twelve-bottom xs-margin-six-bottom float-left width-100 tz-text">Lorem Ipsum has been the industry's standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                                    <span class="tz-text font-weight-600 alt-font text-dark-gray sm-text-medium display-inline-block">- NATHAN FORD</span>
                                </div>
                            </div>
                            <!-- end testimonial item -->
                            <!-- testimonial item -->
                            <div class="col-md-6 col-sm-6 col-xs-12 xs-text-center margin-ten-bottom sm-margin-twenty-bottom">
                                <div class="col-md-3 col-sm-3 col-xs-12 sm-no-padding xs-margin-eleven-bottom">
                                    <img class="border-radius-100 width-95 xs-width-40" src="{{asset('welcome-home-page/images/avtar.jpg')}}" data-img-size="(W)149px X (H)149px" alt=""/>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12 feature-box-details">
                                    <div class="text-medium margin-five-bottom sm-margin-twelve-bottom xs-margin-six-bottom float-left width-100 tz-text">Lorem Ipsum has been the industry's standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                                    <span class="tz-text font-weight-600 alt-font text-dark-gray sm-text-medium display-inline-block">- PAUL SCRIVENS</span>
                                </div>
                            </div>
                            <!-- end testimonial item -->
                            <!-- testimonial item -->
                            <div class="col-md-6 col-sm-6 col-xs-12 xs-text-center xs-margin-twenty-bottom">
                                <div class="col-md-3 col-sm-3 col-xs-12 sm-no-padding xs-margin-eleven-bottom">
                                    <img class="border-radius-100 width-95 xs-width-40" src="{{asset('welcome-home-page/images/avtar.jpg')}}" data-img-size="(W)149px X (H)149px" alt=""/>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12 feature-box-details">
                                    <div class="text-medium margin-five-bottom sm-margin-twelve-bottom xs-margin-six-bottom float-left width-100 tz-text">Lorem Ipsum has been the industry's standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                                    <span class="tz-text font-weight-600 alt-font text-dark-gray sm-text-medium display-inline-block">- AARRON WALTER</span>
                                </div>
                            </div>
                            <!-- end testimonial item -->
                            <!-- testimonial item -->
                            <div class="col-md-6 col-sm-6 col-xs-12 xs-text-center">
                                <div class="col-md-3 col-sm-3 col-xs-12 sm-no-padding sm-margin-eleven-bottom">
                                    <img class="border-radius-100 width-95 xs-width-40" src="{{asset('welcome-home-page/images/avtar.jpg')}}" data-img-size="(W)149px X (H)149px" alt=""/>
                                </div>
                                <div class="col-md-9 col-sm-9 col-xs-12 feature-box-details">
                                    <div class="text-medium margin-five-bottom sm-margin-twelve-bottom xs-margin-six-bottom float-left width-100 tz-text">Lorem Ipsum has been the industry's standard dummy text ever since, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</div>
                                    <span class="tz-text font-weight-600 alt-font text-dark-gray sm-text-medium display-inline-block">- SHOKO MUGIKURA</span>
                                </div>
                            </div>
                            <!-- end testimonial item -->
                        </div>
                    </div>
                </section>
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
