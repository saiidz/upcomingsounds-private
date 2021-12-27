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
    </style>
    <script>
        document.getElementById('welcome_video').play();
    </script>
@endsection
{{-- page content --}}
@section('content')
            <div class="app-body">

                <!-- ############ PAGE START-->


                <div class="black owl-theme">
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
                            <div class="p-a-lg text-center">
                                <h5 class="display-4 m-y-lg text-white">Artists / Label / Manager </h5>
                                <p class="text-black text-md m-b-lg">Send your music to real curators and professionals that we have personally selected and tested their ability to impact the music that makes it out to the world.</p>
                                <a href="{{url('/artist-home')}}" class="btn circle white m-b-lg p-x-md">Artists</a>
                                {{--                                <a href="home.html" class="btn circle white m-b-lg p-x-md">View Artists</a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-12 black lt">
                        <div class="black cover cover-gd curators_welcome" style="background-image: url({{asset('images/b7.jpg')}});">
                            <div class="p-a-lg text-center">
                                <h5 class="display-4 m-y-lg text-white">Curators / Tastemakers / Pros </h5>
                                <p class="text-black text-md m-b-lg">Discover new music, find upcoming talents, get paid to listen and review now or unreleased music.</p>
                                <a href="{{url('/curator-home')}}" class="btn circle white m-b-lg p-x-md"> curators / Pros </a>
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
                                <p class="text-muted text-md m-b-lg">UpcomingSounds.com is a unique place where musicians can gain attention, promotion and greater prospects in the world of entertainment. It doesn't matter if you are just starting out and sending demos or if your work is already established and ready to be shown, we are here to help. you can expect your submission decision within 96 hours of receiving it. We will connect you with curators, blogs, journalists and other professionals that can get you the exposure you need in the industry. We can guarantee that you will get feedback from each and every track you submit. Sometimes the feedback you receive when your song is declined will be useful.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-a-lg text-center welcome_UpcomingSounds">
                                <p class="text-muted text-md m-b-lg">Whether you're a composer, band member, producer or sound designer, Upcoming Sounds is the platform you have been waiting for. The site provides promotional opportunities to artists worldwide that might not have been otherwise available to them. Upcoming Sounds is a platform that connects the creative community in an honest and authentic manner. Our philosophy has always been to make music promotion simple and effective for artists of all genres. With an intuitive user interface and seamless experience, we are able to connect curators directly with the artist community. No middleman, no contracts, just pure curation.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-a-lg text-center welcome_UpcomingSounds">
                                <p class="text-muted text-md m-b-lg">UpcomingSounds.com was launched in response to the demand for a fair but rewarding way to get noticed by those who are in search of talent. where new and known artists can share their work and find artist mentors to help them reach a higher level. It’s important to keep in mind that most curators are doing this as a hobby only verified users with orange tick will provide professional feedback and impactful results, sometimes it's hard to find the perfect words for why they don't like a song. It's never been easier to share your music with the world.</p>
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
