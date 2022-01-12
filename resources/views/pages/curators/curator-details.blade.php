{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Privacy Policy')

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
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3 13h2v-2H3v2zm0 4h2v-2H3v2zm0-8h2V7H3v2zm4 4h14v-2H7v2zm0 4h14v-2H7v2zM7 7v2h14V7H7z"></path>
                            </svg>
                            <h5>
                                <span>Friendly UI Dashboard</span>
                            </h5>
                            <p class="text-muted text-md">
                                <span>UpcomingSounds is an Easy Access Tool that allows you to listen and make the decision faster, whether you want to share a song or give feedback. Each submission includes links to the song link, Artwork, Artist social media profiles, additional streaming sources, and information about that song.</span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"></path>
                            </svg>
                            <h5>
                                <span>Your own Music</span>
                            </h5>
                            <p class="text-muted text-md">
                                <span>Our matching service help artists to pick the best match for their need. 
You will receive more than 99 Genres that fit your musical taste to pick. Each month, we select from the most active and impactful Influencers / Curators to add to our editorial submissions lists. It's perfect for helping you discover new music while you increase your rewards.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 2H4c-1.1 0-1.99.9-1.99 2L2 22l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM6 9h12v2H6V9zm8 5H6v-2h8v2zm4-6H6V6h12v2z"></path>
                            </svg>
                            <h5>
                                <span>Ditch the emails</span>
                            </h5>
                            <p class="text-muted text-md">
                                <span>No emailing is required. Our Dashboard grants you direct communication with artists. You'll be able to manage everything from UpcomingSounds.</span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M11.8 10.9c-2.27-.59-3-1.2-3-2.15 0-1.09 1.01-1.85 2.7-1.85 1.78 0 2.44.85 2.5 2.1h2.21c-.07-1.72-1.12-3.3-3.21-3.81V3h-3v2.16c-1.94.42-3.5 1.68-3.5 3.61 0 2.31 1.91 3.46 4.7 4.13 2.5.6 3 1.48 3 2.41 0 .69-.49 1.79-2.7 1.79-2.06 0-2.87-.92-2.98-2.1h-2.2c.12 2.19 1.76 3.42 3.68 3.83V21h3v-2.15c1.95-.37 3.5-1.5 3.5-3.55 0-2.84-2.43-3.81-4.7-4.4z"></path>
                            </svg>
                            <h5>
                                <span>Redeem Rewards</span>
                            </h5>
                            <p class="text-muted text-md">
                                <span>Artists when submitting their music, they're asking for your feedback about their song. If you respond on time, you will receive a standard Fee of 1 USC coin = 1 GBP standard fee for "Non-verified" Tastemakers / Curators / Professionals. You can always submit your platform to our editors to increase your submissions Fee. Payments are made via PayPal or directly to your bank account.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.08 10.86c.05-.33.16-.62.3-.87s.34-.46.59-.62c.24-.15.54-.22.91-.23.23.01.44.05.63.13.2.09.38.21.52.36s.25.33.34.53.13.42.14.64h1.79c-.02-.47-.11-.9-.28-1.29s-.4-.73-.7-1.01-.66-.5-1.08-.66-.88-.23-1.39-.23c-.65 0-1.22.11-1.7.34s-.88.53-1.2.92-.56.84-.71 1.36S8 11.29 8 11.87v.27c0 .58.08 1.12.23 1.64s.39.97.71 1.35.72.69 1.2.91 1.05.34 1.7.34c.47 0 .91-.08 1.32-.23s.77-.36 1.08-.63.56-.58.74-.94.29-.74.3-1.15h-1.79c-.01.21-.06.4-.15.58s-.21.33-.36.46-.32.23-.52.3c-.19.07-.39.09-.6.1-.36-.01-.66-.08-.89-.23-.25-.16-.45-.37-.59-.62s-.25-.55-.3-.88-.08-.67-.08-1v-.27c0-.35.03-.68.08-1.01zM12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 18c-4.41 0-8-3.59-8-8s3.59-8 8-8 8 3.59 8 8-3.59 8-8 8z"></path>
                            </svg>
                            <h5>
                                <span>Copyright permissions</span>
                            </h5>
                            <p class="text-muted text-md">
                                <span>YouTube Channels, Radios, TV channels, and media needs copyright permission to upload music and share to their platforms. UpcomingSounds has Created a copyright sign-off system that makes your life easier.</span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 1c-4.97 0-9 4.03-9 9v7c0 1.66 1.34 3 3 3h3v-8H5v-2c0-3.87 3.13-7 7-7s7 3.13 7 7v2h-4v8h4v1h-7v2h6c1.66 0 3-1.34 3-3V10c0-4.97-4.03-9-9-9z"></path>
                            </svg>
                            <h5>
                                <span>Quick customer support</span>
                            </h5>
                            <p class="text-muted text-md">
                                <span>The team behind Upcoming Sounds is small, but we're quick when it comes to answering questions. If you're stuck or need help with something, you'll pretty much always get a response that day.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 2H8c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 5h-3v5.5c0 1.38-1.12 2.5-2.5 2.5S10 13.88 10 12.5s1.12-2.5 2.5-2.5c.57 0 1.08.19 1.5.51V5h4v2zM4 6H2v14c0 1.1.9 2 2 2h14v-2H4V6z"></path>
                            </svg>
                            <h5>
                                <span>For labels</span>
                            </h5>
                            <p class="text-muted text-md">
                                <span>Discover new talent and open conversations with prospective artists. You can also re-invest any credits you earn to submit your roster's music to blogs and playlisters.</span>
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


