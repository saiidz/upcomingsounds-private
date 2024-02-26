<head>
<meta property="og:title" content="Upcomingsounds.com">
<meta property="og:description" content="Add description here">
<meta property="og:image" content="https://https://upcomingsounds.com/og-image.png">
<meta property="og:url" content="https://upcomingsounds.com">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | {{ config('app.name', 'Welcome to the newest platform for music promotion and pitching service with effective results. Submit your music now! | UpcomingSounds') }}</title>
    <meta name="description" content="acoustic, advice, answers, apply, artist, artists, audiences,
band, Belgium, best, blog, brazil, budget, build, Canadian, careers,
cheating, choice, classic, contact, a curator,
curatorS, days, discover, electronic, explore,
feedback, folk, United kingdom,  german, getting,
great, rock,   guaranteed, help, important,
indie, industry, info, instrumental, island, Italy, jazz, join,
label, labels, Lebanon, listened,   mentors,
metal, MUSiC, musicians musique need network open
opportunities, platform, playlist, playlists, pricing,
producer, professionals, promote, promotion,
ProS, publishers, punk, radio, radios, record,
records, EDM,  release, results, rock music,  select,
simple, Reels, soul, Spotify, states,  Tiktok, stories, streaming, streams,
success, touch, track, tracks, transparent, united, visibility,
 to access music industry jobs, record labels, music promotion, A&R & further your career in music, Music, Gateway, a worldwide, music industry, marketplace, where you find music industry jobs, music cloud storage, music news, music industry jobs, record labels companies, music business worldwide, music industry news, music industry careers, career, in music, business,  how to start a career in music," />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimal-ui" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
    <!-- endbuild -->
    @yield('page-style')
</head>
