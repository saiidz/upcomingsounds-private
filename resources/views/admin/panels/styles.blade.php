<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="MI Auto">
    <meta name="keywords" content="MI Auto">
    <meta name="author" content="ThemeSelect">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Upcoming Sounds') }}</title>
    <link rel="apple-touch-icon" href="{{asset('images/favicon.png')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/favicon.png')}}">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/vendors.min.css')}}">
    <!-- BEGIN: VENDOR CSS-->
    @yield('vendor-style')
    <!-- END: VENDOR CSS-->
    <!-- BEGIN: Page Level CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/themes/vertical-modern-menu-template/style.css')}}">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/admin-materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/admin-style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/style.min.css')}}"> --}}

    <!-- END: Page Level CSS-->
    @yield('page-style')
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/custom/custom.css')}}">
    <link rel="stylesheet" type="text/css"
    href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    {{-- <link rel="stylesheet" type="text/css" href="{{asset('css/custom/custom.css')}}"> --}}
    <!-- END: Custom CSS-->
    <style>
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
</head>
