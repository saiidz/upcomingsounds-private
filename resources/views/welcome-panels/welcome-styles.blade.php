<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | {{ config('app.name', 'Upcoming Sound') }}</title>
        <meta name="description" content=" Submit your music now and access music industry content curators. Discover the best platform for Artists, Curators, Influencers, Labels, blogs, playlists, stations, podcasts, Risk-free and guaranteed promotion, effective coverage and exposure from music industry professionals, Become a curator, Submit your music online, submit your music now,  make money from your playlist, get access to worldwide music and media content coverage, apply to join, Get impactful results.">
   <meta name="keywords" content=" SubmitHub, music blogs,Spotify playlisters, TikTok and Instagram influencers, Be heard, musique, musique, influencers, radio, label, booker, média, media, webradio, playlist, playlister, promote, influencer, influencers, track, tune, song, music, Music Pitching, Music Submission, Effective Results, Music promotions, Submit your Music, Playlist push, 	
Real music promotion, Become spotify playlist curator, receive Blog paid submission, A&R, Music Feedback, Guaranteed Promotion, Pay as you go,  Music Curators, Music Industry Professionals, Music Opportunities, Music Networks, Music Playlists, Music Streaming, get more streams, get plays, Music Producers, Indie Music, Emerging Artists music promotion, Music Marketing, Artist Development,  Access Music Industry content curators, Music Industry Connections,  Music Industry Success, Music Visibility, Music Discovery, Music Industry Content, Best Music Platform, Upcoming Artists,  Music Promotion Results, Music Industry Marketplace, Music Business, Discover New Music, Pitch Music to Labels, Submit Music to Playlists, Music Submission Tips, Effective Music Promotion, Music Marketing Strategies. " />

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
     <!-- Open Graph Protocol -->
    <meta property="og:title" content="Upcoming Sounds" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://upcomingsounds.com" />
    <meta property="og:image" content="https://upcomingsounds.com/logo.png" />
    <meta property="og:description" content="Submit your music now and access music industry content curators. Discover the best platform for new and upcoming sounds, offering guaranteed promotion and feedback from industry professionals." />
    <meta property="og:site_name" content="UpcomingSounds.com" />
    <!-- for ios 7 style, multi-resolution icon of 152x152 -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-barstyle" content="black-translucent">
    <link rel="apple-touch-icon" href="{{asset('images/logo.png')}}">
    <meta name="apple-mobile-web-app-title" content="Flatkit">
    <!-- for Chrome on Android, multi-resolution icon of 196x196 -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="shortcut icon" sizes="196x196" href="{{asset('images/favicon.png')}}">

    <!-- style -->
    <link rel="stylesheet" href="{{asset('css/animate.css/animate.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/glyphicons/glyphicons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/font-awesome/css/font-awesome.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/material-design-icons/material-design-icons.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/bootstrap/dist/css/bootstrap.min.css')}}" type="text/css" />

    <!-- build:css css/styles/app.min.css -->
    <link rel="stylesheet" href="{{asset('css/styles/app.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/styles/style.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/styles/font.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/custom/custom.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('libs/owl.carousel/dist/assets/owl.carousel.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('libs/owl.carousel/dist/assets/owl.theme.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('libs/mediaelement/build/mediaelementplayer.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('libs/mediaelement/build/mep.css')}}" type="text/css" />
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
<style>
    body {
        font-family: "Segoe UI", "Trebuchet MS", "PT Sans", "Helvetica Neue", "HelveticaNeue-Light", Helvetica, Arial, sans-serif !important;
    }
    @media (min-width: 320px) and (max-width: 480px) {
        .weLcoMeHeaderHide{
            display:none !important;
        }
        .weLcoMeHeaderTopHide{
            padding-top: 0 !important;
        }
    }
    @media (min-width: 320px) and (max-width: 480px) {
        #snackbarError{
            top:113px !important;
        }
    }
    #loadings {
        background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        display: none;
        position: fixed;
        width: 100%;
        height: 100vh;
        /*background: #fff url(../images/loader.gif) no-repeat center center;*/
        z-index: 999999;
    }
</style>
<link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}" type="text/css" />
<style>
    .x-twitter-icon::before {
        content: "";
        background-image: url({{asset('/images/x-twitter.png')}});
        width: 22px;
        height: 22px;
        display: inline-block;
        background-size: cover;
        /*margin-top: 7px;*/
    }
</style>
{!! htmlScriptTagJsApi([
        'action' => 'homepage',
        'callback_then' => 'callbackThen',
        'callback_catch' => 'callbackCatch'
    ]) !!}

<!-- OR! -->

{!! htmlScriptTagJsApi([
    'action' => 'homepage',
    'custom_validation' => 'myCustomValidation'
]) !!}
    <!-- endbuild -->
    @yield('page-style')
    @yield('blog-custom-css')
</head>
