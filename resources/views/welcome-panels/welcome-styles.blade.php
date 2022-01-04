<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title') | {{ config('app.name', 'Upcoming Sound') }}</title>
    <meta name="description" content="Music, Musician, Bootstrap" />
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
<style>
    @media (min-width: 320px) and (max-width: 480px) {
        #snackbarError{
            top:113px !important;
        }
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
</head>
