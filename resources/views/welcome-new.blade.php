{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title - Optimized for SEO --}}
@section('title', 'Home')

@section('page-style')
    {{-- SEO & Performance Meta Tags --}}
    <meta name="description" content="The leading platform to discover and submit music to verified Spotify curators, labels, and influencers.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="https://upcomingsounds.com/">

    {{-- Structured Data (Schema) --}}
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "Upcoming Sounds",
      "url": "https://upcomingsounds.com",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https://upcomingsounds.com/search?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    }
    </script>

    <script src="//code.tidio.co/nlzrwdckpawqcjxqkphkdskehwmmre38.js" async></script>

    <style>
        .videoWlcome {
            position: relative;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            width: 100%;
            min-height: 89vh;
            overflow: hidden;
            background-color: #000;
        }
        .welcome_video > video {
            position: absolute;
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
            margin: 0 auto;
            display: block;
            width: 30px;
            animation: 1.6s ease infinite wheel-up-down;
            font-size: 50px;
        }
        .fa-angle-down { font-size: 3.5rem; }
        .text-muted { color: #818a91 !important; }
        .testimonial-slider { width: 80%; margin: 0 auto; height: auto; }
        .testimonial-slide { text-align: center; padding: 20px; }
        .testimonial-slide img { display: block; width: 100px; height: 100px; margin: auto; border-radius: 50%; }
    </style>

    {{-- Original CSS Assets --}}
    <link type="text/css" href="{{ asset('welcome-home-page/css/owl.transitions.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('welcome-home-page/css/owl.carousel.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('welcome-home-page/css/base.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('welcome-home-page/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}" type="text/css" />
@endsection

@section('content')
<div class="{{ Auth::check() ? 'app-bodynew' : 'app-body' }} @if(Request::is('welcome-new')) weLcoMeHeaderTopHide @endif">
    
    {{-- SECTION 1: HERO VIDEO --}}
    <div class="black owl-theme videoWlcome">
        <div class="row-col">
            <div class="col-lg-12 welcome_video">
                <video id="welcome_video" preload="none" autoplay loop muted playsinline loading="lazy">
                    <source src="https://us-east-vpc.s3.us-east-2.amazonaws.com/upcomingsounds_new.mp4">
                </video>
                <div class="mouse">
                    <a href="javascript:void(0)" class="mouse-icon" id="upClick">
                        <div class="mouse-wheel"><i class="fa fa-angle-down"></i></div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- SECTION 2: FOR ARTISTS --}}
    <section class="padding-110px-tb xs-padding-60px-tb bg-white builder-bg circleCall" id="content-section13" style="padding-top: 167px !important; padding-bottom: 256px !important;">
        <div class="container">
            <div class="row equalize xs-equalize-auto equalize-display-inherit">
                <div class="col-md-6 col-sm-6 xs-12 xs-text-center display-table">
                    <div class="display-table-cell-vertical-middle">
                        <h2 class="alt-font title-extra-large sm-title-large text-dark-gray width-90 letter-spacing-minus-1 margin-eight-bottom tz-text">
                            {{ !empty($theme_home->artist_title) ? $theme_home->artist_title : 'For Artists, Labels, Manager' }}
                        </h2>
                        <div class="text-extra-large tz-text width-90 margin-five-bottom">
                            {{ !empty($theme_home->artist_description) ? $theme_home->artist_description : 'Don\'t stress about pushing out your music to the world, Upcoming Sounds has you covered!' }}
                        </div>
                        <div class="text-medium tz-text width-90 margin-ten-bottom">
                            <p>{{ !empty($theme_home->artist_description_two) ? $theme_home->artist_description_two : 'Our platform will deal with marketing and promoting your music.' }}</p>
                        </div>
                        <a class="btn-circle border-2-dark-aqua nav-link" href="{{ url($theme_home->artist_btn_link ?? '/for-artists') }}">
                            <span class="tz-text btn btn-sm rounded primary _600">{{ !empty($theme_home->artist_btn_text) ? $theme_home->artist_btn_text : 'Submit Your music now (100 % Free)' }}</span>
                        </a>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12 text-right">
                    <img src="{{ asset($theme_home->artist_image ?? 'welcome-home-page/images/music.webp') }}" alt="Music" loading="lazy">
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 3: DYNAMIC SLIDERS --}}
    <section id="home" class="no-padding slider-style1 border-none">
        <div class="owl-slider-full owl-carousel light-pagination">
            @if(!empty($homeSliders))
                @foreach($homeSliders as $homeSlider)
                    <div class="item cover-background" style="background-image: url('{{ asset($homeSlider->image) }}');">
                        <div class="container one-sixth-screen">
                            <div class="slider-text-middle">
                                <div class="col-md-7 text-white">
                                    <div class="title-extra-large-6 font-weight-700 margin-seven-bottom tz-text">{{ $homeSlider->title }}</div>
                                    <div class="text-extra-large margin-ten-bottom tz-text">{{ $homeSlider->details }}</div>
                                    <div class="btn-dual">
                                        @if($homeSlider->button_one_status == 1)
                                            <a class="btn btn-sm rounded primary" style="background-color: #02b875 !important;" href="{{ $homeSlider->button_one_link }}">
                                                <span class="tz-text">{{ $homeSlider->button_one_text }}</span>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </section>

    {{-- SECTION 4: FOR CURATORS --}}
    <section class="padding-110px-tb xs-padding-60px-tb bg-white builder-bg" id="content-section50">
        <div class="container">
            <div class="row equalize xs-equalize-auto equalize-display-inherit">
                <div class="col-md-6 col-sm-6 xs-12 display-table">
                    <img alt="Curators" src="{{ asset($theme_home->curator_image ?? 'welcome-home-page/images/curator_music.png') }}" loading="lazy">
                </div>
                <div class="col-md-6 col-sm-6 xs-12 curatorHomePage" style="padding-left: 100px">
                    <div class="display-table-cell-vertical-middle">
                        <h2 class="alt-font title-extra-large text-dark-gray margin-eight-bottom tz-text">
                            {{ !empty($theme_home->curator_title) ? $theme_home->curator_title : ' For Curators & Influencers' }}
                        </h2>
                        <div class="text-extra-large tz-text margin-five-bottom">{{ $theme_home->curator_description ?? 'Join our family of music enthusiasts .' }}</div>
                        <a class="btn-circle border-2-dark-aqua nav-link" href="{{ url($theme_home->curator_btn_link ?? '/for-curators') }}">
                            <span class="tz-text btn btn-sm rounded primary _600">{{ !empty($theme_home->curator_btn_text) ? $theme_home->curator_btn_text : 'Join Our Family' }}</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 5: AWARDS & ABOUT --}}
    <section class="padding-60px-tb bg-white builder-bg" id="callto-action11">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 text-center">
                    <img src="{{ asset($theme_home->award_image_upcoming ?? 'welcome-home-page/images/award.png') }}" alt="Award" loading="lazy">
                </div>
            </div>
            <div class="row-col">
                <div class="col-md-4 p-a-lg text-center">
                    <p class="text-muted">{{ $theme_home->upcoming_sound_content_one ?? 'UpcomingSounds is a unique place for musicians.' }}</p>
                </div>
                <div class="col-md-4 p-a-lg text-center">
                    <p class="text-muted">{{ $theme_home->upcoming_sound_content_two ?? 'Connecting the creative community worldwide.' }}</p>
                </div>
                <div class="col-md-4 p-a-lg text-center">
                    <p class="text-muted">{{ $theme_home->upcoming_sound_content_three ?? 'Launched to ensure fair feedback and mentoring.' }}</p>
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 6: RED FEATURE SECTION (01, 02, 03) --}}
    <section class="builder-bg border-none" style="background-color: #d94440;" id="content-section17">
        <div class="container-fluid">
            <div class="row equalize">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 tz-background-color display-table">
                    <div class="display-table-cell-vertical-middle padding-thirty-one">
                        <div class="col-md-12 no-padding margin-ten-bottom">
                            <div class="col-md-2 font-weight-600 title-extra-large text-dark-gray tz-text">01.</div>
                            <div class="col-md-10">
                                <h3 class="title-medium text-dark-gray tz-text">{{ $theme_home->title_one_end_section ?? 'Demo or Mastered Track' }}</h3>
                                <p class="text-medium text-dark-gray tz-text">{{ $theme_home->description_one_end_section ?? 'Send your masterpiece anytime.' }}</p>
                            </div>
                        </div>
                        <div class="col-md-12 no-padding margin-ten-bottom">
                            <div class="col-md-2 font-weight-600 title-extra-large text-dark-gray tz-text">02.</div>
                            <div class="col-md-10">
                                <h3 class="title-medium text-dark-gray tz-text">{{ $theme_home->title_two_end_section ?? 'All in one place' }}</h3>
                                <p class="text-medium text-dark-gray tz-text">{{ $theme_home->description_two_end_section ?? 'Save hours of productive time.' }}</p>
                            </div>
                        </div>
                        <div class="col-md-12 no-padding">
                            <div class="col-md-2 font-weight-600 title-extra-large text-dark-gray tz-text">03.</div>
                            <div class="col-md-10">
                                <h3 class="title-medium text-dark-gray tz-text">{{ $theme_home->title_three_end_section ?? 'Professional Feedback' }}</h3>
                                <p class="text-medium text-dark-gray tz-text">{{ $theme_home->description_three_end_section ?? 'Get constructive hints for your sound.' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 no-padding bg-gray tz-builder-bg-image cover-background" 
                     style=display: none;"background-image: url('{{ asset($theme_home->upcoming_home_new_section ?? 'welcome-home-page/images/upcomingSounds.png') }}'); height: 600px;">
                </div>
            </div>
        </div>
    </section>

    {{-- SECTION 7: TESTIMONIALS --}}
    @if(!empty($testimonials) && count($testimonials) > 0)
        <section class="bg-white builder-bg" style="padding-top:100px; padding-bottom: 80px;" >
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="testimonial-slider">
                            @foreach($testimonials as $testimonial)
                                <div class="testimonial-slide">
                                    <img src="{{ asset('uploads/testimonials/'. $testimonial->image) }}" alt="User" loading="lazy">
                                    <h2 class="text-dark-gray">{{ $testimonial->title ?? 'Artist Review' }}</h2>
                                    <p class="text-muted">{{ $testimonial->details }}</p>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

</div>
@include('welcome-panels.welcome-footer')
@endsection

@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    document.getElementById('welcome_video').addEventListener('ended', function() {
        this.load();
        this.play();
    });

    $("#upClick").click(function() {
        $('html, body').animate({
            scrollTop: $(".circleCall").offset().top
        }, 1200);
    });

    jQuery(document).ready(function($) {
        $('.testimonial-slider').slick({
            autoplay: true,
            autoplaySpeed: 4500,
            dots: true,
            arrows: false,
            responsive: [{ breakpoint: 768, settings: { slidesToShow: 1 } }]
        });
    });
</script>

{{-- Original Asset Scripts --}}
<script src="{{ asset('welcome-home-page/js/jquery.min.js') }}"></script>
<script src="{{ asset('welcome-home-page/js/smooth-scroll.js') }}"></script>
<script src="{{ asset('welcome-home-page/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('welcome-home-page/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('welcome-home-page/js/main.js') }}"></script>
@endsection
