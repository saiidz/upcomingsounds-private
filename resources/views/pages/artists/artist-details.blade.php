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
                                <span>Signup >>> 2-Submit your Release >>> 3- Once your release is approved, Choose and activate your 45-day campaign (curators will offer publishing/coverage or select individual curators). </span>
                            </h5>
                            <span>
                                <p class="text-muted text-md">We work to benefit artists. Music submissions can be made in 3 different ways.</p>
                                <p class="text-muted text-md">In option one, we will handle all the overwhelming music submissions and music coverage, as well as all the hard work dealing with and communicating with music publishers, so once you decide to go with that option,</p>

                                <p class="text-muted text-md">You'll automatically receive offers for (free and paid contributors) for a specific coverage type from each curator/blogger or content creator selected and approved, and credited to provide results by Upcoming Sounds.</p>
                                <p class="text-muted text-md">Campaigns Type:</p>
                                <p class="text-muted text-md">A 45-day campaign runs continuously (all types of campaigns).</p>
                                <p class="text-muted text-md">4 different exposure plans (more details will appear after your release has been approved).</p>
                                <p class="text-muted text-md">Your music is only offered if the curators love it, and if you don't receive any offers, you will be refunded with USC credits.</p>
                                <p class="text-muted text-md">As option two, you can send music only to verified curators as well as content creators.</p>
                                <p class="text-muted text-md">Verification badges appear on content creators/bloggers, playlist curators, and media publishers who have been tested for providing exposure and real results.</p>
                                <p class="text-muted text-md">You can easily send your music to curators, by purchasing USC Coins "credits" starting from 2 USC coins.</p>
                                <p class="text-muted text-md">It is expected that the curator/content curator will send the publication within ten to twelve days (a refund will be issued if the curator fails to deliver)</p>
                                <p class="text-muted text-md">As for the third way, In addition, we have designed a special dashboard for artists and curators to support each other at the same time, making this unique dashboard better and more effective, as it is completely free, but can only be activated with active campaign status. Moreover, we are also working with passionate content creators and influencers to promote artist music and receive compensation.</p>
                                <p class="text-muted text-md">The artists will receive significant exposure through upcoming and approved (low follower count) content curators on their social platforms and playlists</p>
                                <p class="text-muted text-md">Curators will also give artists proof of publication</p>
                                <p class="text-muted text-md">Content creators, curators, and influencers receive compensation based on how many tiers they achieve each week</p>
                                <p class="text-muted text-md">It doesn't matter if you are just starting and sending demos or if your work is already established and ready to be shown, we are here to help. Generally, your submissions will be evaluated within 48 hours of submission.</p>
                                <p class="text-muted text-md">You will be able to stay on top of industry trends by getting exposure through curators, blogs, journalists, and other professionals.</p>
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
