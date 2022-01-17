{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','For Artists')

{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom/for-curators.css')}}">
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
                            <img src="{{asset('images/artist-header.jpg')}}"><h1 class="full-landing-text container">
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
                                <p class="text-muted text-md">We've combined all of your submissions into one easy-to-use Dashboard, UpcomingSounds is your one source for New Music.</p>
                                <p class="text-muted text-md">Our platform enables tastemakers, curators, and professionals from around the world to discover new music, connect, share their favorite tunes and find out about cool events. We are looking forward to receiving your application :)</p>
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
                                <span>1- Signup   >>>   2-Uploud your song  >>>    3- Select curators and send your song. </span>
                            </h5>
                            <span>
                                <p class="text-muted text-md">UpcomingSounds allows you to easily send your music to curators using USC Coins' "credits." Each curator requests the standard fee of 2 USC coins, Verified curators, tastemakers, and pors require 4 to  50 credits depending on their level.</p>
                                <p class="text-muted text-md">It doesn't matter if you are just starting and sending demos or if your work is already established and ready to be shown, we are here to help. you can expect your submission decision within 96 hours of receiving it. We will connect you with curators, blogs, journalists and other professionals that can get you the exposure you need in the industry. We can guarantee that you will get feedback from every track you submit. Sometimes the feedback you receive when your song is declined will be useful.</p>
                            </span>
                        </div>
                        @if(Auth::check() && Auth::user()->type == 'artist')
                            <a href="{{url('/artist-profile')}}" class="transparent  tellMeMore">
                                <span>Dashboard</span>
                            </a>
                        @else
                            <a href="{{url('/login')}}" class="transparent  tellMeMore">
                                <span>Start Now</span>
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
                            <p class="text-muted text-md">
                                <span>UpcomingSounds is an Easy Access Tool that allows you to listen and make the decision faster, whether you want to share a song or give feedback. Each submission includes links to the song link, Artwork, Artist social media profiles, additional streaming sources, and information about that song.</span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <img src="{{asset('images/accurate_targeting.svg')}}">
                            <h5>
                                <span>Accurate Targeting </span>
                            </h5>
                            <p class="text-muted text-md">
                                <span>With our data-driven insights, You’ll know who to submit your music to based on your genre, budget, and more. We even provide you with an “Accuracy Score” so you can be confident that your music has been sent to the right curators.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/flexible_schedule.svg')}}">
                            <h5>
                                <span>Flexible Schedule</span>
                            </h5>
                            <p class="text-muted text-md">
                                <span>Post-launch? you can easily manage your releases on UpcomingSounds. Schedule them in advance, submit your Demo, Unreleased, or a mastered track already in stores. You can send your masterpiece anytime whether you need some advice, help or you're ready to share it globally. Our curators are used to keeping your song secret until it's ready to be shared with the world.</span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <img src="{{asset('images/No_hidden_fees.svg')}}">
                            <h5>
                                <span>No hidden fees</span>
                            </h5>
                            <p class="text-muted text-md">
                                <span>You have full control over your spending budget. You decide how much to spend on each campaign. There's even an option for free submissions. They're sharing your song because they are passionate about music, not because you're paying them.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/direct_contact.svg')}}">
                            <h5>
                                <span>Direct Contact</span>
                            </h5>
                            <p class="text-muted text-md">
                                <span>No emailing is required. Our Dashboard grants you direct communication with curators and professionals. You'll be able to send them your songs and read their reviews on your UpcomingSounds Dashboard.</span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <img src="{{asset('images/cust-sup.svg')}}">
                            <h5>
                                <span>Fast customer support</span>
                            </h5>
                            <p class="text-muted text-md">
                                <span>We are a small start-up that knows how important customer service is. We're quick when it comes to answering questions, You will be able to receive your answer within 24 hours if you are stuck somewhere.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/label_manager.svg')}}">
                            <h5>
                                <span>For Artist reprasentitve / Managers / Lebales</span>
                            </h5>
                            <p class="text-muted text-md">
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
