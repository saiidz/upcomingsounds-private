{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','For Artists')

{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom/for-curators.css')}}">
    <style>
        .tellMeMore {
            padding: 11px 11px 11px 11px !important;
        }
    </style>
@endsection

{{-- page content --}}
@section('content')
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

        <!-- ############ PAGE START-->
        <div class="black owl-theme videoWlcome">
            <div class="row-col">
                <main class="col-lg-12 no-padding" id="main-content">
                    <div id="landing-page">
                        <div id="landing-header" class="full-landing">
                            <img src="{{asset(!empty($theme->artist_banner) ? $theme->artist_banner : 'images/artist-header.jpg')}}"><h1 class="full-landing-text container">
                                <span>For artists</span>
                            </h1>
                        </div>
                    </div>
                    <div class="container landing-headline">
                        <h3>
                            <span>UpcomingSounds One tool for all</span>
                        </h3>
                        <div class="mrg-bottom-30">
                            <span>
                                <p class="text-muted text-md">We've unified the submissions into one easy-to-use dashboard. UpcomingSounds.com is the ultimate resource for music promotion.</p>
                                <p class="text-muted text-md">Our platform allows music fans, curators, and professionals to discover new music, connect, share their favorite tunes, and find out about cool events all over the world. We are looking forward to receiving your upcoming release :)</p>
                            </span>
                        </div>
                        {{--                        @if(Auth::check() && Auth::user()->type == 'artist')--}}
                        {{--                            <a href="{{url('/artist-profile')}}" class="transparent  tellMeMore">--}}
                        {{--                                <span>Dashboard</span>--}}
                        {{--                            </a>--}}
                        {{--                        @else--}}
                        {{--                            <a href="{{url('/login')}}" class="transparent  tellMeMore">--}}
                        {{--                                <span>Start Now</span>--}}
                        {{--                            </a>--}}

                        {{--                        @endif--}}
                        {{--                        <div class="clearfix"></div>--}}
                    </div>

                    <div class="container landing-headline-works">
                        <h3>
                            <span>How It Works</span>
                        </h3>
                        <div class="mrg-bottom-30">
                            <h5>
                                <span>1- Signup >>> 2-Submit your Release >>> 3- Choose your exposure options</span>
                            </h5>
                            <span>
                                <p class="text-muted text-center text-md">We work to benefit artists! </p>
                                <p class="text-muted text-md">It doesn't matter if you are just starting and sending demos or if your work is already established and ready to be shown, we are here to help. Generally, your submissions will be evaluated within 48 hours of submission.</p>
                                <p class="text-muted text-md">You will be able to stay on top of industry trends by getting exposure through curators, blogs, journalists, and other professionals.</p>
                                <p class="text-muted text-md">1. First SignUp to UPCOMINGSOUNDS</p>
                                <p class="text-muted text-md">2. Second Submit your release whether old or new, song, album, or Ep. After Submitting your song will be pending for approval by our team specialists.</p>
                                <p class="text-muted text-md">3. Finally after you are approved you have 2 types of exposure options.</p>
                                <p class="text-black text-center text-md">Option one</p>
                                <p class="text-muted text-md">• After activating your 45 day campaign where your release will be placed on the dashboard, we will handle and take care of everything for you!</p>
                                <p class="text-muted text-md">• You will receive free placements from non verified curators on their playlists and social media pages.</p>
                                <p class="text-muted text-md">• You will also receive offers from verified curators for placements on Blogs, social media pages, playlists.</p>
                                <p class="text-muted text-md">We have 4 campaign types:</p>
                                <p class="text-muted text-md">Basic</p>
                                <p class="text-muted text-md">Advanced</p>
                                <p class="text-muted text-md">Pro</p>
                                <p class="text-muted text-md">Premium</p>
                                <p class="text-black text-center text-md">Option two</p>
                                <p class="text-muted text-md">You will be able to select manually from our wide range of verified curators and content creators for a service they provide (social media/ blog post/ playlist addition/ review...)</p>
                                <p class="text-muted text-md">The submission fee starts from 2 USC depending on the level of exposure they provide, where the curator can accept your submission and offer you their services for their assigned price. Or reject your submission and provide the reason for their rejection and possible improvements for the artist.</p>
                                <p class="text-muted text-md">If the curators reject your submission without providing their reason, you will be refunded the submission fee.</p>
                                <p class="text-muted text-md">The Curator has 12 days to accept or reject your submission, if no decision was taken by the end of the 12 days you will also be refunded.</p>
                            </span>
                        </div>
                        @if(Auth::check() && Auth::user()->type == 'artist')
                            <a href="{{url('/artist-profile')}}" class="transparent  tellMeMore">
                                <span>Dashboard</span>
                            </a>
                        @else
                            <a href="{{url('/login')}}" class="transparent  tellMeMore">
                                <span>Submit for free now</span>
                            </a>

                        @endif
                        <div class="clearfix"></div>
                    </div>

                    <div class="container landing-bullets">
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/verified_pros_curators.svg')}}">
                            {{--                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">--}}
                            {{--                                <path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"></path>--}}
                            {{--                            </svg>--}}
                            <h5>
                                <span>Verified Pro's / Curators </span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span> Upcomingsounds.com is  an easy-to-use service that allows you to share, promote, and sell your music online, while also connecting you with a variety of music industry experts. </span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <img src="{{asset('images/accurate_targeting.svg')}}">
                            <h5>
                                <span>Accurate Targeting </span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>With our data-driven insights, You’ll know who to submit your music to based on your genre, budget, and more. We even provide you with an “Accuracy Score” so you can be confident that your music has been sent to the right curators.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/flexible_schedule.svg')}}">
                            <h5>
                                <span>Flexible Schedule</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>Post-launch? you can easily manage your releases on UpcomingSounds. Schedule them in advance, submit your Demo, Unreleased, or a mastered track already in stores. You can send your masterpiece anytime whether you need some advice, help or you're ready to share it globally. Our curators are used to keeping your song secret until it's ready to be shared with the world.</span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <img src="{{asset('images/No_hidden_fees.svg')}}">
                            <h5>
                                <span>No hidden fees</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>You have full control over your spending budget. You decide how much to spend on each campaign. There's even an option for free submissions. They're sharing your song because they are passionate about music, not because you're paying them.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/direct_contact.svg')}}">
                            <h5>
                                <span>Direct Contact</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>No emailing is required. Our Dashboard grants you direct communication with curators and professionals. You'll be able to send them your songs and read their reviews on your UpcomingSounds Dashboard.</span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <img src="{{asset('images/cust-sup.svg')}}">
                            <h5>
                                <span>Fast customer support</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>We are a small start-up that knows how important customer service is. We're quick when it comes to answering questions, You will be able to receive your answer within 24 hours if you are stuck somewhere.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/label_manager.svg')}}">
                            <h5>
                                <span>For Artist reprasentitve / Managers / Lebales</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>We have created a multi-artist managing profile to help you easily access the dashboard for multiple artists with no extra fees.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </main>
            </div>
        </div>
    </div>
    @include('welcome-panels.welcome-footer')
@endsection
