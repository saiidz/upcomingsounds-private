{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','For Curators')

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
                            <img src="{{asset('images/curator-header.jpg')}}"><h1 class="full-landing-text container">
                                <span>For curators</span>
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
                        @if(Auth::check() && Auth::user()->type == 'curator')
                            <a href="{{url('/taste-maker-profile')}}" class="transparent  tellMeMore">
                                <span>Dashboard</span>
                            </a>
                        @else
                            <a href="{{url('/taste-maker-register')}}" class="transparent  tellMeMore">
                                <span>Apply to join</span>
                            </a>

                        @endif
                        <div class="clearfix"></div>
                    </div>

                    <div class="container landing-bullets">
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/verified_pros_curators.svg')}}">
                            <h5>
                                <span>Friendly UI Dashboard</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>UpcomingSounds is an Easy Access Tool that allows you to listen and make the decision faster, whether you want to share a song or give feedback. Each submission includes links to the song link, Artwork, Artist social media profiles, additional streaming sources, and information about that song.</span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <img src="{{asset('images/music.svg')}}">
                            <h5>
                                <span>Your own Music</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>Our matching service help artists to pick the best match for their need.
                                    You will receive more than 99 Genres that fit your musical taste to pick. Each month, we select from the most active and impactful Influencers / Curators to add to our editorial submissions lists. It's perfect for helping you discover new music while you increase your rewards.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/ditch_the_emails.svg')}}">
                            <h5>
                                <span>No More Emails</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>No emailing is required. Our Dashboard grants you direct communication with artists. You'll be able to manage everything from UpcomingSounds.</span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <img src="{{asset('images/coin.svg')}}">
                            <h5>
                                <span>Redeem Rewards</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>Artists when submitting their music, they're asking for your feedback about their song. If you respond on time, you will receive a standard Fee of 1 USC coin = 1 GBP standard fee for "Non-verified" Tastemakers / Curators / Professionals. You can always submit your platform to our editors to increase your submissions Fee. Payments are made via PayPal or directly to your bank account.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/copyright.svg')}}">
                            <h5>
                                <span>Copyright permissions</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>YouTube Channels, Radios, TV channels, and media needs copyright permission to upload music and share to their platforms. UpcomingSounds has Created a copyright sign-off system that makes your life easier.</span>
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
                            <img src="{{asset('images/label.svg')}}">
                            <h5>
                                <span>For Labels / Music Supervisors / Publishers </span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>Discover new talents add new music to your movie or live show. Help upcoming artists to walk the right path from baby steps to shooting stars.</span>
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


