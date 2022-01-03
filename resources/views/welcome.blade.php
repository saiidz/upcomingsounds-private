{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Welcome')
@section('page-style')
    <style>
        .display-4{
            font-size: 2.5rem !important;
        }
        .owl-item{
            height: 412px !important;
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
    </style>
    <script>
        document.getElementById('welcome_video').play();
    </script>
@endsection
{{-- page content --}}
@section('content')
            <div class="app-body">

                <!-- ############ PAGE START-->


                <div class="black owl-theme videoWlcome">
                    <div class="row-col">
                        <div class="col-lg-12 welcome_video">
                            <video autoplay muted id="welcome_video">
                                <source src="{{asset('videos/upcomingsounds_home.m4v')}}" type="video/mp4">
                                <source src="{{asset('images/banner_1.jpg')}}" type="video/ogg">
                            </video>
                        </div>
                    </div>
                </div>
                <div class="row-col">
                    <div class="col-md-12 col-lg-12 black lt">
                        <div class="black cover cover-gd artists_welcome" style="background-image: url({{asset('images/b7.jpg')}});">
                            <div class="p-a-lg text-center p-t-lg">
                                <h5 class="display-4 m-y-lg text-white">Artists / Label / Manager </h5>
                                <div class="block">
                                    <p class="text-black text-md m-y-lg">Send your music to real curators and professionals that we have personally selected and tested their ability to impact the music that makes it out to the world.</p>
                                </div>
                                <div class="block">
                                    <a href="{{url('/artist-home')}}" class="btn circle white m-b-lg p-x-md">Artists</a>
                                </div>
                                {{--                                <a href="home.html" class="btn circle white m-b-lg p-x-md">View Artists</a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 black lt">
                        <div class="black cover cover-gd curators_welcome" style="background-image: url({{asset('images/b7.jpg')}});">
                            <div class="p-a-lg text-center p-t-lg">
                                <h5 class="display-4 m-y-lg text-white">Curators / Tastemakers / Pros </h5>
                                <div class="block">
                                    <p class="text-black text-md m-y-lg">Discover new music, find upcoming talents, get paid to listen and review now or unreleased music.</p>
                                </div>
                                <div class="block">
                                    <a href="{{url('/curator-home')}}" class="btn circle white m-b-lg p-x-md"> curators / Pros </a>
                                </div>
{{--                                <h3 class="display-3 m-y-lg">Music</h3>--}}
{{--                                <p class="text-muted text-md m-b-lg"> Discover new talents, Get paid to listen to music, create impact and change someones dream.</p>--}}
{{--                                <a href="#" class="btn circle white m-b-lg p-x-md">Try Free</a>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="owl-carousel black owl-theme owl-dots-bottom-center" data-ui-jp="owlCarousel"
                     data-ui-options="{
             items: 1
            ,loop: true
            ,autoplay: true
            ,nav: true
          }">
                    <div class="row-col" style="background-image: url({{asset('images/banner_1.jpg')}});">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="p-a-lg">
                                <h2 class="display-4 m-y-lg"> Grow your audience </h2>
                                <h5 class="text-muted m-b-lg">More impressions drive more success. Reach more fans, listeners and professionals in the most effective way. </h5>
                                <a href="#" class="btn circle btn-outline b-primary m-b-lg p-x-md">Get it
                                    now</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="row-col" style="background-image: url({{asset('images/banner_2.jpg')}});">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="p-a-lg">
                                <h2 class="display-4 m-y-lg"> Visibility and Exposure that you deserve </h2>
                                <h4 class="text-muted m-b-lg">Media coverage can increase the public's awareness of your music. </h4>
                                <a href="#" class="btn circle btn-outline b-primary m-b-lg p-x-md">Get it
                                    now</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="row-col" style="background-image: url({{asset('images/banner_3.jpg')}});">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="p-a-lg">
                                <h2 class="display-4 m-y-lg">Easy and direct contact </h2>
                                <h6 class="text-muted m-b-lg">It takes more than a great product to stand out in the crowded music industry. Insightful planning and smart execution are necessary to take your music where you want it to go.</h6>
                                <a href="#" class="btn circle btn-outline b-primary m-b-lg p-x-md">Get RTL</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>

                <div class="row-col teal-50">
                    <div class="row-col">
                        <div class="col-md-4">
                            <div class="p-a-lg text-center welcome_UpcomingSounds">
                                <p class="text-muted text-md m-b-lg">UpcomingSounds.com is a unique place where musicians can gain attention, promotion and greater prospects in the world of entertainment. It doesn't matter if you are just starting and sending demos or if your work is already established and ready to be shown, we are here to help.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-a-lg text-center welcome_UpcomingSounds">
                                <p class="text-muted text-md m-b-lg">Whether you're a composer, band member, producer or sound designer, Upcoming Sounds is the platform you have been waiting for. The site provides promotional opportunities to artists worldwide that might not have been otherwise available to them. UpcomingSounds is a platform that connects the creative community honestly and authentically.No middleman, no contracts, just pure curation.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-a-lg text-center welcome_UpcomingSounds">
                                <p class="text-muted text-md m-b-lg">UpcomingSounds.com was launched in response to the demand for a fair but rewarding way to get noticed by those who are in search of talent. where new and known artists can share their work and where new and known artists can share their work and find artist mentors to help them reach a higher level.</p>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="row-col dark-white">--}}
{{--                    <div class="col-md-3"></div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="p-a-lg text-center">--}}
{{--                            <h3 class="display-4 m-y-lg">Light, Grey, Dark, Black themes</h3>--}}
{{--                            <p class="text-muted text-md m-b-lg">Config any blocks with any colors</p>--}}
{{--                            <a href="#" class="btn circle btn-outline b-black m-b-lg p-x-md">Try Settings</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3"></div>--}}
{{--                </div>--}}

                <div class="black cover" data-stellar-background-ratio="0.5"
                     style="background-image: url({{asset('images/b10.jpg')}});">
                    <div class="row-col">
                        <div class="col-md-4">
                            <div class="p-a-lg text-center">
                                <h4 class="m-y-lg text-white">Demo, Unreleased or a  mastered track already in stores.</h4>
                                <p class="text-black text-md m-b-lg" style="color:#02b875 !important">You can send your masterpiece anytime
                                whether you need some advice, help or you're ready to share it globally.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-a-lg text-center">
                                <h4 class="m-y-lg text-white">Professional Review  and Feedback</h4>
                                <p class="text-black text-md m-b-lg" style="color:#02b875 !important">Get constructive feedback from a music critic or maybe a good hint for a better-sounding product.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-a-lg text-center">
                                <h4 class="m-y-lg text-white"> All in one place </h4>
                                <p class="text-black text-md m-b-lg" style="color:#02b875 !important">Upcoming sounds save you hours of productive time wasted on sending emails or searching for contacts.</p>
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="row-col dark-white">--}}
{{--                    <div class="col-md-3"></div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="p-a-lg">--}}
{{--                            <iframe style="border:none;height:605px;width:616px;" class="artist_frame" src="https://cdn.forms-content.sg-form.com/b036d0d1-262d-11ec-837e-ba9b577a670d"></iframe>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-3"></div>--}}
{{--                </div>--}}
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
    </script>
@endsection
