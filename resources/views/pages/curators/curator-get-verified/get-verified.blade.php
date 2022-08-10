@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Curator Get Verified')

{{-- page style --}}
@section('page-style')
        <style>
            .landing-headline {
                margin: 20px auto !important;
            }
        </style>
        <link rel="stylesheet" type="text/css" href="{{asset('css/custom/for-curators.css')}}">
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">

        {{-- <div class="padding p-b-0">
            <div class="page-title m-b">
                <h1 class="inline m-a-0">Get Verified</h1>
            </div>
        </div> --}}

        <div class="black owl-theme videoWlcome">
            <div class="row-col">
                <main class="col-lg-12 no-padding" id="main-content">
                    <div id="landing-page">
                        <div id="landing-header" class="full-landing">
                            <img src="{{asset('images/verified_banner_upcoming_sounds.jpg')}}"><h1 class="full-landing-text container">
                                <span>Get Verified
                                </span>
                            </h1>
                        </div>
                    </div>
                    <div class="container landing-headline">
                        <h3>
                            <span>GET VERIFIED</span>
                        </h3>
                        <div class="">
                            <span>
                                <p class="text-muted text-md">The first question is, why should you get verified on upcoming sounds? </p>
                            </span>
                        </div>
                    </div>

                    <div class="container landing-headline">
                        <h3>
                            <span>Exposure</span>
                        </h3>
                        <div class="">
                            <span>
                                <p class="text-muted text-md">As a result of becoming verified, you will appear first in the eyes of music artists, managers, PRs, labels, and representatives.</p>
                            </span>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="container landing-bullets">
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/verified_pros_curators.svg')}}">
                            <h5>
                                <span>Authenticity</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>You'll build your brand and credibility because we trust you, and creators willing to pay for your services will be satisfied with the results you deliver. </span>
                            </p>
                        </div>
                        <div class="col-xs-12 col-sm-12 m5 bullets offset-m1">
                            <img src="{{asset('images/music.svg')}}">
                            <h5>
                                <span>Full dashboard Access</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>With this option, you can access all features of our easy-to-use dashboard, including the offers section. </span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                        <div class="col-xs-12 col-sm-12 m5 bullets">
                            <img src="{{asset('images/ditch_the_emails.svg')}}">
                            <h5>
                                <span>Increase your profits</span>
                            </h5>
                            <p class="text-muted text-md m-t-2">
                                <span>Making an offer is a great way to maximize your sales and increase your income instead of getting paid a small amount.</span>
                            </p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </main>
            </div>
        </div>

        {{-- <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">

            </div>
            @include('pages.curators.panels.right-sidebar')
        </div> --}}
    </div>

    <!-- ############ PAGE END-->
@endsection

