<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Tastemaker | {{ config('app.name', 'Upcoming Sound') }}</title>
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
    {{--    <link rel="stylesheet" href="{{asset('css/custom/custom.css')}}" type="text/css" />--}}
    <link rel="stylesheet" href="{{asset('css/custom/artist-custom.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('vendors/flag-icon/css/flag-icons.css')}}" type="text/css" />

    <link rel="stylesheet" href="{{asset('libs/owl.carousel/dist/assets/owl.carousel.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('libs/owl.carousel/dist/assets/owl.theme.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('libs/mediaelement/build/mediaelementplayer.min.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('libs/mediaelement/build/mep.css')}}" type="text/css" />

    <!-- endbuild -->
    @yield('page-style')
</head>

<body>
<div class="app dk" id="app">
    <div id="snackbar"></div>
    <div id="snackbarError"></div>
    <!-- ############ LAYOUT START-->

    <!-- aside -->
    <div id="aside" class="app-aside modal fade nav-dropdown">
        <!-- fluid app aside -->
        <div class="left navside grey dk" data-layout="column">
            <div class="navbar no-radius">
                <!-- brand -->
                <a href="{{url('/')}}" class="navbar-brand md">
                    <img src="{{asset('images/logo.png')}}" alt=".">
                </a>
                <!-- / brand -->
            </div>
            <div data-flex class="hide-scroll">
                <nav class="scroll nav-stacked nav-active-primary">

                    <ul class="nav" data-ui-nav>
                        <li class="nav-header hidden-folded">
                            <span class="text-xs text-muted">Main</span>
                        </li>
                        <li>
                            <a href="#">
                  <span class="nav-icon">
                    <i class="material-icons">
                      sort
                    </i>
                  </span>
                                <span class="nav-text">Browse</span>
                            </a>
                        </li>
                        <li>
                            <a data-toggle="modal" data-target="#search-modal">
                  <span class="nav-icon">
                    <i class="material-icons">
                      search
                    </i>
                  </span>
                                <span class="nav-text">Search</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
            <div data-flex-no-shrink>
                <div class="nav-fold dropup">
                    <a data-toggle="dropdown">
              <span class="pull-left">
                <img src="images/a3.jpg" alt="..." class="w-32 img-circle">
              </span>
                        <span class="clear hidden-folded p-x p-y-xs">
                <span class="block _500 text-ellipsis">{{($user_curator) ? $user_curator->name : ''}}</span>
              </span>
                    </a>
                    <div class="dropdown-menu w dropdown-menu-scale ">
                        <a class="dropdown-item" href="javascript:void(0)">
                            <span>Profile</span>
                        </a>

                        <a class="dropdown-item" href="{{ route('curator.logout') }}">
                            <span>Sign out</span>
                        </a>

{{--                        <form method="POST" action="{{ route('curator.logout') }}">--}}
{{--                            @csrf--}}
{{--                            <button class="dropdown-item">Sign out</button>--}}
{{--                        </form>--}}

                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- / -->

    <!-- content -->
    <div id="content" class="app-content white bg box-shadow-z2" role="main">
        <div class="app-header hidden-lg-up white lt box-shadow-z1">
            <div class="navbar">
                <!-- brand -->
                <a href="{{url('/')}}" class="navbar-brand md">
                    <img src="{{asset('images/logo.png')}}" alt=".">
                </a>
                <!-- / brand -->
                <!-- nabar right -->
                <ul class="nav navbar-nav pull-right">
                    <li class="nav-item">
                        <!-- Open side - Naviation on mobile -->
                        <a data-toggle="modal" data-target="#aside" class="nav-link">
                            <i class="material-icons">menu</i>
                        </a>
                        <!-- / -->
                    </li>
                </ul>
                <!-- / navbar right -->
            </div>
        </div>
        <div class="app-footer app-player grey bg">
            <div class="playlist" style="width:100%"></div>
        </div>
        <div class="app-body" id="view">

            <!-- ############ PAGE START-->

            <div class="page-content">
                <div class="row-col">
                    <div class="col-lg-9 b-r no-border-md">
                        <div class="padding">


                            <div class="page-title m-b">
                                <h1 class="inline m-a-0">Browse</h1>
                                <div class="dropdown inline">
                                    <button class="btn btn-sm no-bg h4 m-y-0 v-b dropdown-toggle text-primary" data-toggle="dropdown">All</button>
                                    <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item active">
                                            All
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            acoustic
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            ambient
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            blues
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            classical
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            country
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            electronic
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            emo
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            folk
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            hardcore
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            hip hop
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            indie
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            jazz
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            latin
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            metal
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            pop
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            pop punk
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            punk
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            reggae
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            rnb
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            rock
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            soul
                                        </a>
                                        <a href="#" class="dropdown-item">
                                            world
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div data-ui-jp="jscroll" class="jscroll-loading-center" data-ui-options="{
                                autoTrigger: true,
                                loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',
                                padding: 50,
                                nextSelector: 'a.jscroll-next:last'
                              }">
                                <div class="row">
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item r" data-id="item-3" data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b2.jpg');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">I Wanna Be In the Cavalry</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Jeremy Scott</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item r" data-id="item-5" data-src="http://streaming.radionomy.com/JamendoLounge">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b4.jpg');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">Live Radio</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Radionomy</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item r" data-id="item-2" data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b1.jpg');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">Fireworks</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Kygo</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item r" data-id="item-1" data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b0.jpg');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">Pull Up</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Summerella</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item r" data-id="item-9" data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b8.jpg');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">All I Need</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Pablo Nouvelle</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item r" data-id="item-7" data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b6.jpg');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">Reflection (Deluxe)</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Fifth Harmony</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item r" data-id="item-6" data-src="http://api.soundcloud.com/tracks/236107824/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b5.jpg');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">Body on me</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Rita Ora</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item r" data-id="item-12" data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b11.jpg');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">Happy ending</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Postiljonen</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item r" data-id="item-10" data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b9.jpg');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">The Open Road</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Postiljonen</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item r" data-id="item-11" data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b10.jpg');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">Spring</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Pablo Nouvelle</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item r" data-id="item-8" data-src="http://api.soundcloud.com/tracks/236288744/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b7.jpg');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">Simple Place To Be</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">RYD</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-4 col-sm-4 col-md-3">
                                        <div class="item r" data-id="item-4" data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b3.jpg');"></a>
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-overlay bottom text-right">
                                                    <a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                    <div class="dropdown-menu pull-right black lt"></div>
                                                </div>
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">What A Time To Be Alive</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Judith Garcia</a>
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-3 w-xxl w-auto-md">
                        <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
                            <h6 class="text text-muted">5 Likes</h6>
                            <div class="row item-list item-list-sm m-b">
                                <div class="col-xs-12">
                                    <div class="item r" data-id="item-6" data-src="http://api.soundcloud.com/tracks/236107824/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                        <div class="item-media ">
                                            <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b5.jpg');"></a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title text-ellipsis">
                                                <a href="track.detail.html">Body on me</a>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis ">
                                                <a href="artist.detail.html" class="text-muted">Rita Ora</a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="item r" data-id="item-8" data-src="http://api.soundcloud.com/tracks/236288744/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                        <div class="item-media ">
                                            <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b7.jpg');"></a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title text-ellipsis">
                                                <a href="track.detail.html">Simple Place To Be</a>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis ">
                                                <a href="artist.detail.html" class="text-muted">RYD</a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="item r" data-id="item-5" data-src="http://streaming.radionomy.com/JamendoLounge">
                                        <div class="item-media ">
                                            <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b4.jpg');"></a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title text-ellipsis">
                                                <a href="track.detail.html">Live Radio</a>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis ">
                                                <a href="artist.detail.html" class="text-muted">Radionomy</a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="item r" data-id="item-11" data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                        <div class="item-media ">
                                            <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b10.jpg');"></a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title text-ellipsis">
                                                <a href="track.detail.html">Spring</a>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis ">
                                                <a href="artist.detail.html" class="text-muted">Pablo Nouvelle</a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="item r" data-id="item-10" data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                        <div class="item-media ">
                                            <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b9.jpg');"></a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title text-ellipsis">
                                                <a href="track.detail.html">The Open Road</a>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis ">
                                                <a href="artist.detail.html" class="text-muted">Postiljonen</a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                            <h6 class="text text-muted">Go mobile</h6>
                            <div class="btn-groups">
                                <a href="" class="btn btn-sm dark lt m-r-xs" style="width: 135px">
                <span class="pull-left m-r-sm">
                  <i class="fa fa-apple fa-2x"></i>
                </span>
                                    <span class="clear text-left l-h-1x">
                  <span class="text-muted text-xxs">Download on the</span>
                  <b class="block m-b-xs">App Store</b>
                </span>
                                </a>
                                <a href="" class="btn btn-sm dark lt" style="width: 133px">
                <span class="pull-left m-r-sm">
                  <i class="fa fa-play fa-2x"></i>
                </span>
                                    <span class="clear text-left l-h-1x">
                  <span class="text-muted text-xxs">Get it on</span>
                  <b class="block m-b-xs m-r-xs">Google Play</b>
                </span>
                                </a>
                            </div>
                            <div class="b-b m-y"></div>
                            <div class="nav text-sm _600">
                                <a href="#" class="nav-link text-muted m-r-xs">About</a>
                                <a href="#" class="nav-link text-muted m-r-xs">Contact</a>
                                <a href="#" class="nav-link text-muted m-r-xs">Legal</a>
                                <a href="#" class="nav-link text-muted m-r-xs">Policy</a>
                            </div>
                            <p class="text-muted text-xs p-b-lg">&copy; Copyright 2016</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ############ PAGE END-->

        </div>
    </div>
    <!-- / -->

    <!-- ############ SEARCH START -->
    <div class="modal white lt fade" id="search-modal" data-backdrop="false">
        <a data-dismiss="modal" class="text-muted text-lg p-x modal-close-btn">&times;</a>
        <div class="row-col">
            <div class="p-a-lg h-v row-cell v-m">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="search.html" class="m-b-md">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" placeholder="Type keyword" data-ui-toggle-class="hide" data-ui-target="#search-result">
                                <span class="input-group-btn">
                    <button class="btn b-a no-shadow white" type="submit">Search</button>
                  </span>
                            </div>
                        </form>
                        <div id="search-result" class="animated fadeIn">
                            <p class="m-b-md"><strong>23</strong> <span class="text-muted">Results found for: </span><strong>Keyword</strong></p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row item-list item-list-sm item-list-by m-b">
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-5" data-src="http://streaming.radionomy.com/JamendoLounge">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b4.jpg');"></a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Live Radio</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis ">
                                                        <a href="artist.detail.html" class="text-muted">Radionomy</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-4" data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b3.jpg');"></a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">What A Time To Be Alive</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis ">
                                                        <a href="artist.detail.html" class="text-muted">Judith Garcia</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-8" data-src="http://api.soundcloud.com/tracks/236288744/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b7.jpg');"></a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Simple Place To Be</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis ">
                                                        <a href="artist.detail.html" class="text-muted">RYD</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-9" data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content" style="background-image: url('images/b8.jpg');"></a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">All I Need</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis ">
                                                        <a href="artist.detail.html" class="text-muted">Pablo Nouvelle</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="row item-list item-list-sm item-list-by m-b">
                                        <div class="col-xs-12">
                                            <div class="item">
                                                <div class="item-media rounded ">
                                                    <a href="artist.detail.html" class="item-media-content" style="background-image: url('images/a6.jpg');"></a>
                                                </div>
                                                <div class="item-info ">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="artist.detail.html">OlsJesse Russell</a>
                                                        <div class="text-sm text-muted">23 songs</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item">
                                                <div class="item-media rounded ">
                                                    <a href="artist.detail.html" class="item-media-content" style="background-image: url('images/a8.jpg');"></a>
                                                </div>
                                                <div class="item-info ">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="artist.detail.html">Sara King</a>
                                                        <div class="text-sm text-muted">14 songs</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item">
                                                <div class="item-media rounded ">
                                                    <a href="artist.detail.html" class="item-media-content" style="background-image: url('images/a9.jpg');"></a>
                                                </div>
                                                <div class="item-info ">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="artist.detail.html">Douglas Torres</a>
                                                        <div class="text-sm text-muted">20 songs</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item">
                                                <div class="item-media rounded ">
                                                    <a href="artist.detail.html" class="item-media-content" style="background-image: url('images/a7.jpg');"></a>
                                                </div>
                                                <div class="item-info ">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="artist.detail.html">Richard Carr</a>
                                                        <div class="text-sm text-muted">6 songs</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="top-search" class="btn-groups">
                            <strong class="text-muted">Top searches: </strong>
                            <a href="#" class="btn btn-xs white">Happy</a>
                            <a href="#" class="btn btn-xs white">Music</a>
                            <a href="#" class="btn btn-xs white">Weekend</a>
                            <a href="#" class="btn btn-xs white">Summer</a>
                            <a href="#" class="btn btn-xs white">Holiday</a>
                            <a href="#" class="btn btn-xs white">Blue</a>
                            <a href="#" class="btn btn-xs white">Soul</a>
                            <a href="#" class="btn btn-xs white">Calm</a>
                            <a href="#" class="btn btn-xs white">Nice</a>
                            <a href="#" class="btn btn-xs white">Home</a>
                            <a href="#" class="btn btn-xs white">SLeep</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ############ SEARCH END -->


    <!-- ############ LAYOUT END-->
</div>

<!-- build:js scripts/app.min.js -->
<!-- jQuery -->
<script src="{{asset('libs/jquery/dist/jquery.js')}}"></script>
<!-- Bootstrap -->
<script src="{{asset('libs/tether/dist/js/tether.min.js')}}"></script>
<script src="{{asset('libs/bootstrap/dist/js/bootstrap.js')}}"></script>
<!-- core -->
<script src="{{asset('libs/jQuery-Storage-API/jquery.storageapi.min.js')}}"></script>
<script src="{{asset('libs/jquery.stellar/jquery.stellar.min.js')}}"></script>
<script src="{{asset('libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
<script src="{{asset('libs/jscroll/jquery.jscroll.min.js')}}"></script>
<script src="{{asset('libs/PACE/pace.min.js')}}"></script>
<script src="{{asset('libs/jquery-pjax/jquery.pjax.js')}}"></script>

<script src="{{asset('libs/mediaelement/build/mediaelement-and-player.min.js')}}"></script>
<script src="{{asset('libs/mediaelement/build/mep.js')}}"></script>
<script src="{{asset('scripts/player.js')}}"></script>

<script src="{{asset('scripts/config.lazyload.js')}}"></script>
<script src="{{asset('scripts/ui-load.js')}}"></script>
<script src="{{asset('scripts/ui-jp.js')}}"></script>
<script src="{{asset('scripts/ui-include.js')}}"></script>
<script src="{{asset('scripts/ui-device.js')}}"></script>
<script src="{{asset('scripts/ui-form.js')}}"></script>
<script src="{{asset('scripts/ui-nav.js')}}"></script>
<script src="{{asset('scripts/ui-screenfull.js')}}"></script>
<script src="{{asset('scripts/ui-scroll-to.js')}}"></script>
<script src="{{asset('scripts/ui-toggle-class.js')}}"></script>
<script src="{{asset('scripts/ui-taburl.js')}}"></script>
<script src="{{asset('scripts/app.js')}}"></script>
<script src="{{asset('scripts/site.js')}}"></script>
<script src="{{asset('scripts/ajax.js')}}"></script>
<script src="{{asset('js/swiper-bundle.min.js')}}"></script>
<!-- endbuild -->
</body>
</html>
