@extends('layouts.welcomeLayout')

{{-- Page Title --}}
@section('title', 'Home')

{{-- Page Styles & SEO --}}
@section('page-style')
    {{-- SEO & Performance --}}
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

    {{-- Chat Widget --}}
    <script src="//code.tidio.co/nlzrwdckpawqcjxqkphkdskehwmmre38.js" async></script>

    {{-- CSS Libraries --}}
    <link type="text/css" href="{{ asset('welcome-home-page/css/owl.transitions.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('welcome-home-page/css/owl.carousel.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('welcome-home-page/css/base.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('welcome-home-page/css/responsive.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
    <link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}" type="text/css" />

    {{-- Custom Styles --}}
    <style>
        /* Video Section */
        .videoWlcome { position: relative; display: flex; flex-wrap: wrap; align-items: center; width: 100%; min-height: 89vh; overflow: hidden; background-color: #000; }
        .welcome_video > video { position: absolute; top: 36%; left: 50%; z-index: 0; width: auto; min-width: 100%; height: auto; min-height: 100%; transform: translateX(-50%) translateY(-50%); }
        .mouse-wheel { height: 80px; margin: 0 auto; display: block; width: 30px; animation: 1.6s ease infinite wheel-up-down; font-size: 50px; }
        .fa-angle-down { font-size: 3.5rem; }
        
        /* General Helpers */
        .text-muted { color: #818a91 !important; }
        
        /* Testimonials */
        .testimonial-slider { width: 80%; margin: 0 auto; height: auto; }
        .testimonial-slide { text-align: center; padding: 20px; }
        .testimonial-slide img { display: block; width: 100px; height: 100px; margin: auto; border-radius: 50%; }

        /* --- Optimized Content Section Styles --- */
        .optimized-section { padding: 60px 0; font-family: 'Open Sans', sans-serif; }
        .intro-grid { display: flex; flex-wrap: wrap; gap: 30px; justify-content: center; margin-bottom: 80px; }
        .intro-item { flex: 1; min-width: 300px; max-width: 350px; text-align: center; padding: 20px; }
        .intro-item h4 { font-size: 18px; font-weight: 700; margin-bottom: 15px; color: #333; text-transform: uppercase; }
        .intro-item p { color: #666; line-height: 1.6; font-size: 15px; }
        .award-icon { max-width: 80px; margin-bottom: 30px; display: block; margin-left: auto; margin-right: auto; }

        /* Why Choose Us Section */
        .why-choose-us-title { font-size: 32px; font-weight: 800; text-align: center; margin-bottom: 50px; color: #d94440; }
        .feature-row { display: flex; flex-wrap: wrap; margin-bottom: 40px; align-items: flex-start; }
        .feature-number { flex: 0 0 80px; font-size: 40px; font-weight: 900; color: #eaeaea; line-height: 1; position: relative; top: -5px; }
        .feature-content { flex: 1; padding-left: 20px; border-left: 2px solid #d94440; }
        .feature-content h3 { margin-top: 0; font-size: 22px; font-weight: 700; color: #222; margin-bottom: 10px; }
        .feature-content p { color: #555; line-height: 1.6; margin-bottom: 10px; }
        .feature-highlight { font-weight: 600; color: #d94440; display: block; margin-bottom: 5px; }
        
        /* Mobile Adjustments */
        @media (max-width: 768px) {
            .feature-row { flex-direction: column; }
            .feature-number { margin-bottom: 10px; }
            .feature-content { border-left: none; border-top: 2px solid #d94440; padding-left: 0; padding-top: 15px; }
        }
    </style>
@endsection

{{-- Main Content --}}
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

    {{-- SECTION 5: NEW OPTIMIZED CONTENT (Award + Intro + Why Choose Us) --}}
    <section class="optimized-section container">
        
        <img src="{{ asset('path/to/your/award-icon.png') }}" alt="Award" class="award-icon">

        <div class="intro-grid">
            <div class="intro-item">
                <h4>For Musicians</h4>
                <p>UpcomingSounds.com is a one-of-a-kind platform where musicians can gain attention, promotion, and greater prospects in the entertainment world. Whether you're just starting or have established work, we're here to help.</p>
            </div>
            <div class="intro-item">
                <h4>For Creatives</h4>
                <p>Whether you're a composer, band member, producer, or sound designer, this is the platform you've been waiting for. We offer promotional opportunities to artists worldwide that might not have been otherwise available.</p>
            </div>
            <div class="intro-item">
                <h4>Our Mission</h4>
                <p>Launched to meet the demand for a fair and rewarding way for talent to get noticed. It's a space where new and established artists can share their work and connect with mentors to reach new heights.</p>
            </div>
        </div>

        <hr style="border: 0; border-top: 1px solid #eee; margin: 0 auto 60px; width: 60%;">

        <h2 class="why-choose-us-title">Upcoming Sounds: Why choose us?</h2>

        <div class="feature-row">
            <div class="feature-number">01.</div>
      <img src="{{ asset('path/to/your/award-icon.png') }}" alt="Award" class="award-icon">
                <h3>Real Connections</h3>
                <p>Upcoming Sounds connects artists, labels, and managers with curators, bloggers, and influencers. We provide real exposure and quality coverage for artists while fairly compensating content curators for their time and efforts.</p>
            </div>
        </div>

        <div class="feature-row">
            <div class="feature-number">02.</div>
            <div class="feature-content">
                <h3>Risk Free Options</h3>
                <p>
                    <span class="feature-highlight">Option 1 - Maximize Exposure:</span> 
                    Choose from four packages to receive publicity from curators who genuinely appreciate your work. Proposals can be accepted or rejected.
                </p>
                <p>
                    <span class="feature-highlight">Option 2 - Customized Campaign:</span> 
                    Select impactful, verified curators chosen by our A&R Team. If you don't receive a response, you get a 100% automatic credit refund.
                </p>
            </div>
        </div>

        <div class="feature-row">
            <div class="feature-number">03.</div>
            <div class="feature-content">
                <h3>Easy to Use</h3>
                <p>Crafted from the ground up to offer a seamless experience. Artists can effortlessly connect with blogs and playlists, while curators manage submissions with ease—freeing everyone to focus purely on creative expression.</p>
            </div>
        </div>

    </section>

    {{-- SECTION 6: TESTIMONIALS --}}
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

{{-- Page Scripts --}}
@section('page-script')
<script src="{{ asset('welcome-home-page/js/jquery.min.js') }}"></script>
<script src="{{ asset('welcome-home-page/js/smooth-scroll.js') }}"></script>
<script src="{{ asset('welcome-home-page/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('welcome-home-page/js/owl.carousel.min.js') }}"></script>
<script src="{{ asset('welcome-home-page/js/main.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

<script>
    // Video Loop Fix
    var videoElement = document.getElementById('welcome_video');
    if (videoElement) {
        videoElement.addEventListener('ended', function() {
            this.load();
            this.play();
        });
    }

    // Scroll to section
    $("#upClick").click(function() {
        $('html, body').animate({
            scrollTop: $(".circleCall").offset().top
        }, 1200);
    });

    // Slider Init
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
@endsection
