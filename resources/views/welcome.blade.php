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
            min-height: 100vh;
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
        /*.display-4{*/
        /*    font-size: 2.5rem !important;*/
        /*}*/

        /*.mouse{*/
        /*    display:none;*/
        /*}*/
        /*.mouse {*/
        /*    position: absolute;*/
        /*    !*bottom: -0.375rem;*!*/
        /*    top: 827px;*/
        /*    z-index: 2;*/
        /*    width: 100%;*/
        /*    text-align: center;*/
        /*}*/
        /*.mouse-icon {*/
        /*    height: 80px;*/
        /*    border: 1px solid transparent;*/
        /*    background: transparent;*/
        /*    cursor: pointer;*/
        /*    position: relative;*/
        /*    text-align: center;*/
        /*    margin: 0 auto;*/
        /*    display: block;*/
        /*}*/
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
    </style>
@endsection
{{-- page content --}}
@section('content')

            <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

                <!-- ############ PAGE START-->


                <div class="black owl-theme videoWlcome">
                    <div class="row-col">
                        <div class="col-lg-12 welcome_video">
{{--                            <video id="welcome_video" autoplay="true" loop="true" muted="true" playsinline="true">--}}
{{--                                <source src="https://us-east-vpc.s3.us-east-2.amazonaws.com/upcomingsounds_home.mp4" type="video/mp4">--}}
{{--                            </video>--}}
                            <video id="welcome_video" preload="metadata" autoplay loop muted playsinline>
                                <source src="https://us-east-vpc.s3.us-east-2.amazonaws.com/upcomingsounds_home.mp4">
{{--                                <source src="{{asset('video/upcomingsounds_home.mp4')}}">--}}
                            </video>
{{--                            <video autoplay muted id="welcome_video">--}}
{{--                                <source src="video1.webm" type="video/webm">--}}
{{--                                <source src="{{asset('video/upcomingsounds_home.mp4')}}" type="video/mp4">--}}
{{--                                <source src="{{asset('images/banner_1.jpg')}}" type="video/ogg">--}}
{{--                            </video>--}}
                            <div class="mouse">
                                <a href="javascript:void(0)" class="mouse-icon" id="upClick">
                                    <div class="mouse-wheel"><i class="fa fa-angle-down"></i></div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-col">
                    <div class="col-md-12 col-lg-12 black lt">
                        <div class="black cover cover-gd artists_welcome">
{{--                        <div class="black cover cover-gd artists_welcome" style="background-image: url({{asset('images/b7.jpg')}});">--}}
                            <div class="p-a-lg text-center p-t-lg">
                                <h5 class="display-4 m-y-lg text-white">{{ !empty($theme_home->artist_title) ? $theme_home->artist_title : 'For Artists / Labels / Managers' }}</h5>
                                <p class="text-black text-md m-y-lg">{{ !empty($theme_home->artist_description) ? $theme_home->artist_description : 'Send your music to real curators and professionals that we have personally selected and tested their ability to impact the music that makes it out to the world.' }}</p>
                                <a href="{{url(!empty($theme_home->artist_btn_link) ? $theme_home->artist_btn_link : '/artist-home')}}" class="btn circle white m-b-lg p-x-md"> {{ !empty($theme_home->artist_btn_text) ? $theme_home->artist_btn_text : 'Submit Your Music Now' }}</a>
                                {{--                                <a href="home.html" class="btn circle white m-b-lg p-x-md">View Artists</a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 black lt">
                        <div class="black cover cover-gd curators_welcome">
{{--                        <div class="black cover cover-gd curators_welcome" style="background-image: url({{asset('images/b7.jpg')}});">--}}
                            <div class="p-a-lg text-center p-t-lg">
                                <h6 class="display-4 m-y-lg text-white"> {{ !empty($theme_home->curator_title) ? $theme_home->curator_title : 'For Curators / Tastemakers / Influencers / Media' }}</h6>
                                <p class="text-black text-md m-y-lg">{{ !empty($theme_home->curator_description) ? $theme_home->curator_description : 'Discover new music, find upcoming talents, get paid to listen and review new or unreleased music.' }}</p>
                                <a href="{{url(!empty($theme_home->curator_btn_link) ? $theme_home->curator_btn_link : '/curator-home')}}" class="btn circle white m-b-lg p-x-md">{{ !empty($theme_home->curator_btn_text) ? $theme_home->curator_btn_text : 'Join Our Family' }} </a>
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
                    <div class="row-col UScarousel" style="background-image: url({{asset(!empty($theme_home->banner_one) ? $theme_home->banner_one : 'images/Banner_UCSWEB1.jpg')}});">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="">
                                <h2 class="display-4 m-y-lg"> {{ !empty($theme_home->title_one) ? $theme_home->title_one : 'Grow your audience' }} </h2>
                                <h6 class="m-b-lg SliderP">{{ !empty($theme_home->description_one) ? $theme_home->description_one : 'More impressions drive more success. Reach more fans, listeners and professionals in the most effective way.' }}</h6>
                                <a href="{{url(!empty($theme_home->btn_link_one) ? $theme_home->btn_link_one : '/register')}}" class="btn circle btn-outline b-primary m-b-lg p-x-md"> {{ !empty($theme_home->btn_text_one) ? $theme_home->btn_text_one : 'Sign Up Now' }}</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="row-col UScarousel" style="background-image: url({{asset(!empty($theme_home->banner_two) ? $theme_home->banner_two : 'images/Banner_UCSWEB2.jpg')}});">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="">
                                <h2 class="display-4 m-y-lg"> {{ !empty($theme_home->title_two) ? $theme_home->title_two : 'Visibility and Exposure that you deserve' }} </h2>
                                <h6 class="m-b-lg SliderP">{{ !empty($theme_home->description_two) ? $theme_home->description_two : 'Media coverage can increase the public awareness of your music.' }} </h6>
                                <a href="{{url(!empty($theme_home->btn_link_two) ? $theme_home->btn_link_two : '/artist-home')}}" class="btn circle btn-outline b-primary m-b-lg p-x-md"> {{ !empty($theme_home->btn_text_two) ? $theme_home->btn_text_two : 'Learn More' }}</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="row-col UScarousel" style="background-image: url({{asset(!empty($theme_home->banner_three) ? $theme_home->banner_three : 'images/Banner_UCSWEB3.jpg')}});">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="">
                                <h2 class="display-4 m-y-lg">{{ !empty($theme_home->title_three) ? $theme_home->title_three : 'Easy and direct contact' }} </h2>
                                <h6 class="m-b-lg SliderP">{{ !empty($theme_home->description_three) ? $theme_home->description_three : 'It takes more than a great product to stand out in the crowded music industry. Insightful planning and smart execution are necessary to take your music where you want it to go.' }}</h6>
                                <a href="{{url(!empty($theme_home->btn_link_three) ? $theme_home->btn_link_three : '/contact-us')}}" class="btn circle btn-outline b-primary m-b-lg p-x-md">{{ !empty($theme_home->btn_text_three) ? $theme_home->btn_text_three : 'Get In Touch' }}</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>

                <div class="row-col teal-50">
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
                     style="background-image: url({{asset(!empty($theme_home->image) ? $theme_home->image : 'images/b10.jpg')}});">
                    <div class="row-col">
                        <div class="col-md-4">
                            <div class="p-a-lg text-center">
                                <h4 class="m-y-lg text-white">{{ !empty($theme_home->title_one_end_section) ? $theme_home->title_one_end_section : 'Demo, Unreleased or a  mastered track already in stores.' }} </h4>
                                <p class="text-white text-md m-b-lg">{{ !empty($theme_home->description_one_end_section) ? $theme_home->description_one_end_section : 'You can send your masterpiece anytime
                                whether you need some advice, help or you are ready to share it globally.'}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-a-lg text-center">
                                <h4 class="m-y-lg text-white">{{ !empty($theme_home->title_two_end_section) ? $theme_home->title_two_end_section : 'Professional Review  and Feedback'}}</h4>
                                <p class="text-white text-md m-b-lg">{{ !empty($theme_home->description_two_end_section) ? $theme_home->description_two_end_section : 'Get constructive feedback from a music critic or maybe a good hint for a better-sounding product.'}}</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-a-lg text-center">
                                <h4 class="m-y-lg text-white"> {{ !empty($theme_home->title_three_end_section) ? $theme_home->title_three_end_section : 'All in one place'}} </h4>
                                <p class="text-white text-md m-b-lg">{{ !empty($theme_home->description_three_end_section) ? $theme_home->description_three_end_section : 'UpcomingSounds  save you hours of productive time wasted on sending emails or searching for contacts.'}}</p>
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
        $("#upClick").click(function() {
            $('html, body').animate({
                scrollTop: $(".owl-carousel").offset().top
            }, 1500);
        });
    </script>
@endsection
