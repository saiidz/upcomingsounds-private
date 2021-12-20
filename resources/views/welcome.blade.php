{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Welcome')

{{-- page content --}}
@section('content')
            <div class="app-body">

                <!-- ############ PAGE START-->


                <div class="owl-carousel black owl-theme owl-dots-bottom-center" data-ui-jp="owlCarousel"
                     data-ui-options="{
             items: 1
            ,loop: true
            ,autoplay: true
            ,nav: true
          }">
                    <div class="row-col">
                        <div class="col-lg-12 welcome_video">
                            <video loop="true" autoplay="autoplay" controls muted>
                                <source src="{{asset('videos/upcomingsounds_home.m4v')}}" type="video/mp4">
                                <source src="{{asset('images/banner_1.jpg')}}" type="video/ogg">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                    </div>
                    <div class="row-col" style="background-image: url({{asset('images/banner_1.jpg')}});">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="p-a-lg">
                                <h2 class="display-4 m-y-lg">A simple, fast and responsive music template</h2>
                                <h6 class="text-muted m-b-lg">HTML5 Music Template</h6>
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
                                <h2 class="display-4 m-y-lg">A simple, fast and responsive music template</h2>
                                <h6 class="text-muted m-b-lg">HTML5 Music Template</h6>
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
                                <h2 class="display-4 m-y-lg">Ajax powered page switch with great experience</h2>
                                <h6 class="text-muted m-b-lg">No refresh page when switching pages</h6>
                                <a href="#" class="btn circle btn-outline b-primary m-b-lg p-x-md">Get RTL</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>
                <div class="row-col">
                    <div class="col-sm-6 black lt">
                        <div class="black cover cover-gd" style="background-image: url('images/b7.jpg');">
                            <div class="p-a-lg text-center">
                                <h3 class="display-3 m-y-lg">Artists</h3>
                                <p class="text-muted text-md m-b-lg">Listen to your favorite Artists.</p>
                                <a href="{{url('/artist-home')}}" class="btn circle white m-b-lg p-x-md">For Artists</a>
                                {{--                                <a href="home.html" class="btn circle white m-b-lg p-x-md">View Artists</a>--}}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="black cover cover-gd" style="background-image: url('images/b1.jpg');">
                            <div class="p-a-lg text-center">
                                <h3 class="display-3 m-y-lg">Curators</h3>
                                <p class="text-muted text-md m-b-lg">Get ready for Curators.</p>
                                <a href="{{url('/curator-home')}}" class="btn circle white m-b-lg p-x-md">For Tastemakers / Curators / Pros</a>
{{--                                <h3 class="display-3 m-y-lg">Music</h3>--}}
{{--                                <p class="text-muted text-md m-b-lg">Get ready for high sound quality.</p>--}}
{{--                                <a href="#" class="btn circle white m-b-lg p-x-md">Try Free</a>--}}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-col teal-50">
                    <div class="row-col">
                        <div class="col-md-4">
                            <div class="p-a-lg text-center welcome_UpcomingSounds">
                                <p class="text-muted text-md m-b-lg">UpcomingSounds.com is a unique place where musicians can gain attention, promotion and greater prospects in the world of entertainment. It doesn't matter if you are just starting out and sending demos or if your work is already established and ready to be shown, we are here to help. you can expect your submission decision within 72 hours of receiving it. We will connect you with curators, blogs, journalists and other professionals that can get you the exposure you need in the industry. We can guarantee that you will get feedback from each and every track you submit. Sometimes the feedback you receive when your song is declined will be useful.</p>
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

                <div class="owl-carousel black owl-theme owl-dots-bottom-center deep-purple-100" data-ui-jp="owlCarousel"
                     data-ui-options="{
             items: 1
            ,loop: true
            ,autoplay: true
            ,nav: true
          }">
                    <div class="row-col">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="p-a-lg">
                                <h2 class="display-4 m-y-lg">A simple, fast and responsive music template</h2>
                                <h6 class="text-muted m-b-lg">HTML5 Music Template</h6>
                                <a href="#" class="btn circle btn-outline b-primary m-b-lg p-x-md">Get it
                                    now</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="row-col">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="p-a-lg">
                                <h2 class="display-4 m-y-lg">Bootstrap 4 CSS framework</h2>
                                <h6 class="text-muted m-b-lg">Responsive layout</h6>
                                <a href="#" class="btn circle btn-outline b-primary m-b-lg p-x-md">View
                                    App</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                    <div class="row-col">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-center">
                            <div class="p-a-lg">
                                <h2 class="display-4 m-y-lg">Ajax powered page switch with great experience</h2>
                                <h6 class="text-muted m-b-lg">No refresh page when switching pages</h6>
                                <a href="#" class="btn circle btn-outline b-primary m-b-lg p-x-md">Get RTL</a>
                            </div>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>

                <div class="black cover" data-stellar-background-ratio="0.5"
                     style="background-image: url('images/b10.jpg');">
                    <div class="row-col">
                        <div class="col-md-4">
                            <div class="p-a-lg text-center">
                                <h4 class="m-y-lg">One Css framework, Unlimited options &amp; variables</h4>
                                <p class="text-muted text-md m-b-lg">Colors, layouts, components and widgets. we
                                    pre-build them for you.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-a-lg text-center">
                                <h4 class="m-y-lg">Two layouts, Horizontal and side navigation</h4>
                                <p class="text-muted text-md m-b-lg">With the flexiable layout options, you can build
                                    responsive layouts.</p>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-a-lg text-center">
                                <h4 class="m-y-lg">Three templates, Landing, App, Site templates</h4>
                                <p class="text-muted text-md m-b-lg">Choose the suitable one for your needs.</p>
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
