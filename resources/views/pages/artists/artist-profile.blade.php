@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Artist Profile')

@section('page-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        #loadings{
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
    </style>
@endsection

@section('content')
    <!-- ############ LAYOUT START-->



    <!-- content -->
    <div id="content" class="app-content white bg box-shadow-z2" role="main">
        <div id="snackbar"></div>
        <div id="snackbarError"></div>
        <div class="app-header hidden-lg-up white lt box-shadow-z1">
            <div class="navbar">
                <!-- brand -->
                <a href="{{url('/')}}" class="navbar-brand md">
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">--}}
                    {{--                            <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)"/>--}}
                    {{--                            <circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color"/>--}}
                    {{--                            <circle cx="24" cy="24" r="10" fill="#ffffff"/>--}}
                    {{--                            <circle cx="13" cy="13" r="2"  fill="#ffffff" class="brand-animate"/>--}}
                    {{--                            <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />--}}
                    {{--                            <circle cx="24" cy="24" r="3" fill="#000000"/>--}}
                    {{--                        </svg>--}}

                    <img src="{{asset('images/logo.png')}}" alt=".">
                    {{--                        <span class="hidden-folded inline">pulse</span>--}}
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
            <div class="page-bg" data-stellar-ratio="2" style="background-image: url('images/a3.jpg');"></div>
            <div class="page-content">
                <div class="padding b-b">
                    <div class="row-col">
                        <div class="col-sm w w-auto-xs m-b">
                            <div class="item w rounded">
                                <div class="item-media">
                                    @php
                                        $mystring = $user_artist->profile;
                                        $findhttps   = 'https';
                                        $findhttp   = 'http';
                                        $poshttps = strpos($mystring, $findhttps);

                                        $poshttp = strpos($mystring, $findhttp);
                                        if($poshttps != false){
                                            $pos = $poshttps;
                                        }else{
                                            $pos = $poshttp;
                                        }
                                    @endphp
                                    @if($pos === false)
                                        @if(!empty($user_artist->profile))
                                            <div class="item-media-content" id="upload_profile"
                                                 style="background-image: url({{URL('/')}}/uploads/profile/{{$user_artist->profile}});"></div>
                                        @else
                                            <div class="item-media-content" id="upload_profile"
                                                 style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                        @endif
                                    @elseif($pos == 0)
                                        <div class="item-media-content" id="upload_profile"
                                             style="background-image: url({{$user_artist->profile}});"></div>
                                    @else
                                        <div class="item-media-content" id="upload_profile"
                                             style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="p-l-md no-padding-xs">
                                <h1 class="page-title">
                                    <span class="h1 _800">{{($user_artist) ? $user_artist->name : ''}}</span>
                                </h1>
                                <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">
                                    @if(!empty($user_artist->artistUser->artist_bio))
                                        {{$user_artist->artistUser->artist_bio}}
                                    @endif
                                </p>
                                @if(!empty($user_artist->artistUser->country))
                                    <div class="block flag_style clearfix m-b">
                                        @foreach($countries_flag as $flag)
                                            @if($flag['iso_a2'] == $user_artist->artistUser->country->iso2)
                                                {!! $flag->flag['flag-icon'] !!}
                                            @endif
                                        @endforeach
                                        <span class="text-muted" style="font-size:15px">{{($user_artist->artistUser->country) ? $user_artist->artistUser->country->name : ''}}</span>
                                    </div>
                                @endif
                                <form class="profile-pic" id="profileBtnShow" method="post" enctype="multipart/form-data" style="display:none;">
                                    <div class="item-action m-b">
                                        <label for="file" class="btn btn-sm rounded primary">Upload</label>
                                        <input id="file" type="file" class="btn btn-sm rounded primary" name="file" accept="image/*"/>
                                        {{--                                        <a href="#" class="btn btn-sm rounded primary">Upload</a>--}}
                                        {{--                                    <a href="#" class="btn btn-sm rounded white">Edit Profile</a>--}}
                                    </div>
                                </form>

                                <div class="block clearfix m-b">
                                    <span>9</span> <span class="text-muted">Albums</span>, <span>23</span> <span
                                        class="text-muted">Tracks</span>
                                </div>
                                <div class="row-col m-b">
                                    <div class="col-xs">
                                        @if(!empty($user_artist->artistUser->instagram_url))
                                            <a href="{{$user_artist->artistUser->instagram_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-blue-800"
                                               style="background-color: #a93691 !important;" title="Instagram">
                                                <i class="fa fa-instagram"></i>
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->facebook_url))
                                            <a href="{{$user_artist->artistUser->facebook_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored indigo"
                                               title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->spotify_url))
                                            <a href="{{$user_artist->artistUser->spotify_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-green-500"
                                               title="Spotify">
                                                <i class="fa fa-spotify"></i>
                                                <i class="fa fa-spotify"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->soundcloud_url))
                                            <a href="{{$user_artist->artistUser->soundcloud_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored orange-700"
                                               title="SoundCloud">
                                                <i class="fa fa-soundcloud"></i>
                                                <i class="fa fa-soundcloud"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->youtube_url))
                                            <a href="{{$user_artist->artistUser->youtube_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored red-600"
                                               title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->website_url))
                                            <a href="{{$user_artist->artistUser->website_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Website">
                                                <i class="fa fa-link"></i>
                                                <i class="fa fa-link"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->deezer_url))
                                            <a href="{{$user_artist->artistUser->deezer_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#eb9d00;" title="Deezer">
                                                {{--                                                <span class="iconify" data-icon="fa-brands:deezer"></span>--}}
                                                <i class="iconify" data-icon="fa-brands:deezer"></i>
                                            </a>
                                        @endif
                                        @if(!empty($user_artist->artistUser->bandcamp_url))
                                            <a href="{{$user_artist->artistUser->bandcamp_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Bandcamp">
                                                <i class="fa fa-bandcamp"></i>
                                                <i class="fa fa-bandcamp"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row-col">
                    <div class="col-lg-9 b-r no-border-md">
                        <div class="padding p-y-0 m-b-md">
                            <div class="nav-active-border b-primary bottom m-b-md m-t">
                                <ul class="nav l-h-2x" data-ui-jp="taburl">
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link active RemoveUpload" href="#" data-toggle="tab" data-target="#track">Tracks</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link RemoveUpload" href="#" data-toggle="tab" data-target="#playlist">Lists</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link RemoveUpload" href="#" data-toggle="tab" data-target="#like">Saved</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link RemoveUpload" href="#" data-toggle="tab"
                                           data-target="#profile">Profile</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link" id="EditProfile" href="#" data-toggle="tab"
                                           data-target="#edit-profile">Edit Profile</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane active" id="track">
                                    <div class="row item-list item-list-by m-b">
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-10"
                                                 data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b9.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">The Open Road</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Postiljonen</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        <span class="item-meta-category"><a href="browse.html"
                                                                                            class="label">Soul</a></span>
                                                        <span class="item-meta-date text-xs">02.04.2016</span>
                                                    </div>

                                                    <div
                                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                        Litatem tantae pecuniae? Utram tandem linguam nescio? Sed hoc
                                                        sane concedamus.
                                                    </div>

                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal"
                                                           data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-9"
                                                 data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b8.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">All I Need</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Pablo
                                                            Nouvelle</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        <span class="item-meta-category"><a href="browse.html"
                                                                                            class="label">Jazz</a></span>
                                                        <span class="item-meta-date text-xs">02.04.2016</span>
                                                    </div>

                                                    <div
                                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                        Tandem linguam nescio? Sed hoc sane concedamus.
                                                    </div>

                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal"
                                                           data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-4"
                                                 data-src="http://api.soundcloud.com/tracks/230791292/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b3.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">What A Time To Be Alive</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Judith
                                                            Garcia</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        <span class="item-meta-category"><a href="browse.html"
                                                                                            class="label">Electro</a></span>
                                                        <span class="item-meta-date text-xs">04.05.2016</span>
                                                    </div>

                                                    <div
                                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                        Verum hoc idem saepe faciamus inguam nescio? Sed hoc sane
                                                        concedamus.
                                                    </div>

                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal"
                                                           data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-2"
                                                 data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b1.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Fireworks</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Kygo</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        <span class="item-meta-category"><a href="browse.html"
                                                                                            class="label">Jazz</a></span>
                                                        <span class="item-meta-date text-xs">02.05.2016</span>
                                                    </div>

                                                    <div
                                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                        Hidem saepe faciamus. Quid ad utilitatem tantae pecuniae? Utram
                                                        tandem linguam nescio? Sed hoc sane concedamus.
                                                    </div>

                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal"
                                                           data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-12"
                                                 data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b11.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Happy ending</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Postiljonen</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        <span class="item-meta-category"><a href="browse.html"
                                                                                            class="label">Latin</a></span>
                                                        <span class="item-meta-date text-xs">09.06.2016</span>
                                                    </div>

                                                    <div
                                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                        Utilitatem tantae pecuniae? Utram tandem linguam nescio? Sed hoc
                                                        sane concedamus.
                                                    </div>

                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal"
                                                           data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-6"
                                                 data-src="http://api.soundcloud.com/tracks/236107824/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b5.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Body on me</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Rita Ora</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        <span class="item-meta-category"><a href="browse.html"
                                                                                            class="label">Nature</a></span>
                                                        <span class="item-meta-date text-xs">09.04.2016</span>
                                                    </div>

                                                    <div
                                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                        Tantae pecuniae? Utram tandem linguam nescio? Sed hoc sane
                                                        concedamus.
                                                    </div>

                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal"
                                                           data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-11"
                                                 data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b10.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Spring</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Pablo
                                                            Nouvelle</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        <span class="item-meta-category"><a href="browse.html"
                                                                                            class="label">Indie</a></span>
                                                        <span class="item-meta-date text-xs">09.03.2016</span>
                                                    </div>

                                                    <div
                                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                        Saepe faciamus. Quid ad utilitatem tantae pecuniae? Utram tandem
                                                        linguam nescio? Sed hoc sane concedamus.
                                                    </div>

                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal"
                                                           data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-3"
                                                 data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b2.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">I Wanna Be In the Cavalry</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Jeremy Scott</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        <span class="item-meta-category"><a href="browse.html"
                                                                                            class="label">DJ</a></span>
                                                        <span class="item-meta-date text-xs">09.04.2016</span>
                                                    </div>

                                                    <div
                                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                        Tantae pecuniae? Utram tandem linguam nescio? Sed hoc sane
                                                        concedamus.
                                                    </div>

                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal"
                                                           data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-5"
                                                 data-src="http://streaming.radionomy.com/JamendoLounge">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b4.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Live Radio</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Radionomy</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        <span class="item-meta-category"><a href="browse.html"
                                                                                            class="label">Electro</a></span>
                                                        <span class="item-meta-date text-xs">09.05.2016</span>
                                                    </div>

                                                    <div
                                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                        Verum hoc idem saepe faciamus. Quid ad utilitatem tantae
                                                        pecuniae? Utram tandem linguam nescio? Sed hoc sane concedamus.
                                                    </div>

                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal"
                                                           data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-8"
                                                 data-src="http://api.soundcloud.com/tracks/236288744/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b7.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Simple Place To Be</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">RYD</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        <span class="item-meta-category"><a href="browse.html"
                                                                                            class="label">Radio</a></span>
                                                        <span class="item-meta-date text-xs">09.04.2016</span>
                                                    </div>

                                                    <div
                                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                        Ad utilitatem tantae pecuniae? Utram tandem linguam nescio? Sed
                                                        hoc sane concedamus.
                                                    </div>

                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal"
                                                           data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-7"
                                                 data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b6.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Reflection (Deluxe)</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Fifth
                                                            Harmony</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        <span class="item-meta-category"><a href="browse.html"
                                                                                            class="label">Pop</a></span>
                                                        <span class="item-meta-date text-xs">05.05.2016</span>
                                                    </div>

                                                    <div
                                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                        Quid ad utilitatem tantae pecuniae? Utram tandem linguam nescio?
                                                        Sed hoc sane concedamus.
                                                    </div>

                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal"
                                                           data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-1"
                                                 data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b0.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Pull Up</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Summerella</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                        <span class="item-meta-category"><a href="browse.html"
                                                                                            class="label">Blue</a></span>
                                                        <span class="item-meta-date text-xs">30.05.2016</span>
                                                    </div>

                                                    <div
                                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                        Quamquam tu hanc copiosiorem etiam soles dicere. Nihil illinc
                                                        huc pervenit.
                                                    </div>

                                                    <div class="item-action visible-list m-t-sm">
                                                        <a href="#" class="btn btn-xs white">Edit</a>
                                                        <a href="#" class="btn btn-xs white" data-toggle="modal"
                                                           data-target="#delete-modal">Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-sm white rounded">Show More</a>
                                </div>
                                <div class="tab-pane" id="playlist">
                                    <div class="row m-b">
                                        <div class="col-xs-4 col-sm-4 col-md-3">
                                            <div class="item r" data-id="item-2"
                                                 data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b1.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Fireworks</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Kygo</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
              		          <span class="item-meta-stats text-xs ">
              		          	<i class="fa fa-play text-muted"></i> 30
              		          	<i class="fa fa-heart m-l-sm text-muted"></i> 10
              		          </span>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-3">
                                            <div class="item r" data-id="item-10"
                                                 data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b9.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">The Open Road</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Postiljonen</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
              		          <span class="item-meta-stats text-xs ">
              		          	<i class="fa fa-play text-muted"></i> 860
              		          	<i class="fa fa-heart m-l-sm text-muted"></i> 240
              		          </span>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-3">
                                            <div class="item r" data-id="item-1"
                                                 data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b0.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Pull Up</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Summerella</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
              		          <span class="item-meta-stats text-xs ">
              		          	<i class="fa fa-play text-muted"></i> 3200
              		          	<i class="fa fa-heart m-l-sm text-muted"></i> 210
              		          </span>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="like">
                                    <div class="row m-b">
                                        <div class="col-xs-4 col-sm-4 col-md-3">
                                            <div class="item r" data-id="item-10"
                                                 data-src="http://api.soundcloud.com/tracks/237514750/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b9.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">The Open Road</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Postiljonen</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
              		          <span class="item-meta-stats text-xs ">
              		          	<i class="fa fa-play text-muted"></i> 860
              		          	<i class="fa fa-heart m-l-sm text-muted"></i> 240
              		          </span>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-4 col-sm-4 col-md-3">
                                            <div class="item r" data-id="item-11"
                                                 data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b10.jpg');"></a>
                                                    <div class="item-overlay center">
                                                        <button class="btn-playpause">Play</button>
                                                    </div>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-overlay bottom text-right">
                                                        <a href="#" class="btn-favorite"><i
                                                                class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn-more" data-toggle="dropdown"><i
                                                                class="fa fa-ellipsis-h"></i></a>
                                                        <div class="dropdown-menu pull-right black lt"></div>
                                                    </div>
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Spring</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis hide">
                                                        <a href="artist.detail.html" class="text-muted">Pablo
                                                            Nouvelle</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
              		          <span class="item-meta-stats text-xs ">
              		          	<i class="fa fa-play text-muted"></i> 4500
              		          	<i class="fa fa-heart m-l-sm text-muted"></i> 2310
              		          </span>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane" id="profile">
                                    {{--               Artist Profile                     --}}
                                    <div class="page-title m-b">
                                        <h4 class="inline m-a-0 update_profile">Basic Info</h4>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-3 form-control-label text-muted">Name</div>
                                        <div class="col-sm-9">
                                            <input type="text"
                                                   class="form-control"
                                                   value="{{ isset($user_artist->name) ? $user_artist->name : ''  }}"
                                                   readonly>
                                        </div>
                                    </div>
                                    @if(!empty($user_artist->artistUser))
                                        @if($user_artist->artistUser->artist_signup_from == 'artist')
                                            <input type="hidden" name="artist_signup_from"
                                                   value="{{($user_artist->artistUser) ? $user_artist->artistUser->artist_signup_from : ''}}">
                                            <div class="page-title m-b">
                                                <h4 class="inline m-a-0 update_profile">Artist Info</h4>
                                            </div>

                                        @elseif($user_artist->artistUser->artist_signup_from == 'artist_representative')
                                            <input type="hidden" name="artist_signup_from"
                                                   value="{{($user_artist->artistUser) ? $user_artist->artistUser->artist_signup_from : ''}}">
                                            <div class="page-title m-b">
                                                <h4 class="inline m-a-0 update_profile">Artist Representative
                                                    Info</h4>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">What kind of
                                                    artist representative are you ?
                                                </div>
                                                <div class="col-sm-9">
                                                    <div class="col s12">
                                                        <p class="mb-1">
                                                            @if($user_artist->artistUser->artist_representative_record == 1)
                                                                <label>
                                                                    <span>Record Label 🎧</span>
                                                                </label>
                                                            @endif

                                                            @if($user_artist->artistUser->artist_representative_manager == 2)
                                                                <label class="record_label">
                                                                    <span>Manager 🚀</span>
                                                                </label>
                                                            @endif

                                                        </p>
                                                    </div>
                                                    <div class="col s12">
                                                        <p class="mb-1">
                                                            @if($user_artist->artistUser->artist_representative_press == 3)
                                                                <label class="record_label">
                                                                    <span>Press Officer 🎤</span>
                                                                </label>
                                                            @endif
                                                            @if($user_artist->artistUser->artist_representative_publisher == 4)
                                                                <label class="record_label">
                                                                    <span>Publisher 🎯</span>
                                                                </label>
                                                            @endif
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>

                                        @else
                                        @endif

                                        <div class="form-group row">
                                            <div class="col-sm-3 form-control-label text-muted">Artist Name
                                            </div>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                       class="form-control"
                                                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->artist_name : ''}}"
                                                       readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3 form-control-label text-muted">Country</div>
                                            <div class="col-sm-9">
                                                <input type="text"
                                                       class="form-control"
                                                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->country->name : ''}}"
                                                       readonly>
                                            </div>
                                        </div>

                                        <div class="page-title m-b">
                                            <h4 class="inline m-a-0 update_profile">Artist's Bio</h4>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3 form-control-label text-muted">Bio</div>
                                            <div class="col-sm-9">
                                                <textarea class="form-control"
                                                          readonly>{{isset($user_artist->artistUser) ? $user_artist->artistUser->artist_bio : ''}}</textarea>
                                            </div>
                                        </div>

                                        <div class="page-title m-b">
                                            <h4 class="inline m-a-0 update_profile">Right now</h4>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3 form-control-label text-muted">Hot News</div>
                                            <div class="col-sm-9">
                                                <textarea class="form-control"
                                                          readonly>{{isset($user_artist->artistUser) ? $user_artist->artistUser->hot_news : ''}}</textarea>
                                            </div>
                                        </div>

{{--                                        <div class="page-title m-b">--}}
{{--                                            <h4 class="inline m-a-0 update_profile">Social Media Links</h4>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group row">--}}
{{--                                            <div class="col-sm-3 form-control-label text-muted">Instagram</div>--}}
{{--                                            <div class="col-sm-9">--}}
{{--                                                <input type="text"--}}
{{--                                                       class="form-control"--}}
{{--                                                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->instagram_url : ''}}"--}}
{{--                                                       readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group row">--}}
{{--                                            <div class="col-sm-3 form-control-label text-muted">Facebook</div>--}}
{{--                                            <div class="col-sm-9">--}}
{{--                                                <input type="text"--}}
{{--                                                       class="form-control"--}}
{{--                                                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->facebook_url : ''}}"--}}
{{--                                                       readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group row">--}}
{{--                                            <div class="col-sm-3 form-control-label text-muted">Spotify</div>--}}
{{--                                            <div class="col-sm-9">--}}
{{--                                                <input type="text"--}}
{{--                                                       class="form-control"--}}
{{--                                                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->spotify_url : ''}}"--}}
{{--                                                       readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group row">--}}
{{--                                            <div class="col-sm-3 form-control-label text-muted">Sound Cloud--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-9">--}}
{{--                                                <input type="text"--}}
{{--                                                       class="form-control"--}}
{{--                                                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->soundcloud_url : ''}}"--}}
{{--                                                       readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group row">--}}
{{--                                            <div class="col-sm-3 form-control-label text-muted">Youtube</div>--}}
{{--                                            <div class="col-sm-9">--}}
{{--                                                <input type="text"--}}
{{--                                                       class="form-control"--}}
{{--                                                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->youtube_url : ''}}"--}}
{{--                                                       readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group row">--}}
{{--                                            <div class="col-sm-3 form-control-label text-muted">Add Website--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-9">--}}
{{--                                                <input type="text"--}}
{{--                                                       class="form-control"--}}
{{--                                                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->website_url : ''}}"--}}
{{--                                                       readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group row">--}}
{{--                                            <div class="col-sm-3 form-control-label text-muted">Deezer--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-9">--}}
{{--                                                <input type="text"--}}
{{--                                                       class="form-control"--}}
{{--                                                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->deezer_url : ''}}"--}}
{{--                                                       readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

{{--                                        <div class="form-group row">--}}
{{--                                            <div class="col-sm-3 form-control-label text-muted">Bandcamp--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-9">--}}
{{--                                                <input type="text"--}}
{{--                                                       class="form-control"--}}
{{--                                                       value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->bandcamp_url : ''}}"--}}
{{--                                                       readonly>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}

                                        <div class="page-title m-b-1">
                                            <h4 class="inline m-a-0 update_profile">Artist Features</h4>
                                        </div>
                                        <div class="form-group row">
                                            <div class="artist-features">
                                                @if(count($user_artist->userTags) > 0)
                                                    @php
                                                        $userTags = $user_artist->userTags->chunk(6);
                                                    @endphp
                                                    @foreach($userTags as $tags)
                                                        <ul>
                                                            @foreach($tags as $tag)
                                                                <li>{{$tag->featureTag->name}}</li>
                                                            @endforeach
                                                        </ul>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                    {{--               Artist Profile                     --}}
                                </div>
                                <div class="tab-pane" id="edit-profile">
                                    {{--               Artist Update Profile                     --}}
                                    <form method="POST" action="{{url('/update-artist-profile')}}"
                                          enctype="multipart/form-data">
                                        @csrf
                                        <div class="page-title m-b">
                                            <h4 class="inline m-a-0 update_profile">Basic Info</h4>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3 form-control-label text-muted">Name</div>
                                            <div class="col-sm-9">
                                                <input type="text" name="name"
                                                       class="form-control @error('name') is-invalid @enderror"
                                                       value="{{ isset($user_artist->name) ? $user_artist->name : ''  }}"
                                                       placeholder="Username" required>
                                                @error('name')
                                                <small class="red-text ml-10" role="alert">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>
                                        @if(!empty($user_artist->artistUser))
                                            @if($user_artist->artistUser->artist_signup_from == 'artist')
                                                <input type="hidden" name="artist_signup_from"
                                                       value="{{($user_artist->artistUser) ? $user_artist->artistUser->artist_signup_from : ''}}">
                                                <div class="page-title m-b">
                                                    <h4 class="inline m-a-0 update_profile">Artist Info</h4>
                                                </div>

                                            @elseif($user_artist->artistUser->artist_signup_from == 'artist_representative')
                                                <input type="hidden" name="artist_signup_from"
                                                       value="{{($user_artist->artistUser) ? $user_artist->artistUser->artist_signup_from : ''}}">
                                                <div class="page-title m-b">
                                                    <h4 class="inline m-a-0 update_profile">Artist Representative
                                                        Info</h4>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-sm-3 form-control-label text-muted">What kind of
                                                        artist representative are you ?
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="col s12">
                                                            <p class="mb-1">
                                                                <label>
                                                                    <input type="checkbox"
                                                                           {{($user_artist->artistUser->artist_representative_record == 1) ? 'checked' : ''}} class="filled-in"
                                                                           name="artist_representative_record"
                                                                           value="1"/>
                                                                    <span>Record Label 🎧</span>
                                                                </label>
                                                                <label class="record_label">
                                                                    <input type="checkbox"
                                                                           {{($user_artist->artistUser->artist_representative_manager == 2) ? 'checked' : ''}} class="filled-in"
                                                                           name="artist_representative_manager"
                                                                           value="2"/>
                                                                    <span>Manager 🚀</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                        <div class="col s12">
                                                            <p class="mb-1">
                                                                <label>
                                                                    <input type="checkbox"
                                                                           {{($user_artist->artistUser->artist_representative_press == 3) ? 'checked' : ''}} class="filled-in"
                                                                           name="artist_representative_press"
                                                                           value="3"/>
                                                                    <span>Press Officer 🎤</span>
                                                                </label>
                                                                <label class="record_label">
                                                                    <input type="checkbox"
                                                                           {{($user_artist->artistUser->artist_representative_publisher == 4) ? 'checked' : ''}} class="filled-in"
                                                                           name="artist_representative_publisher"
                                                                           value="4"/>
                                                                    <span>Publisher 🎯</span>
                                                                </label>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>

                                            @else
                                            @endif



                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Artist Name
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="artist_name"
                                                           class="form-control @error('artist_name') is-invalid @enderror"
                                                           name="artist_name"
                                                           value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->artist_name : ''}}"
                                                           type="text" placeholder="Artist Name" required>
                                                    @error('artist_name')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Country</div>
                                                <div class="col-sm-9">
                                                    <select class="form-control c-select" name="country_name">
                                                        <option value="" disabled selected>Choose Country</option>
                                                        @foreach($countries as $country)
                                                            <option value="{{$country->id}}"
                                                                    @if($country->id == $user_artist->artistUser->country_id) selected @endif>{{$country->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="page-title m-b">
                                                <h4 class="inline m-a-0 update_profile">Artist's Bio</h4>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Bio</div>
                                                <div class="col-sm-9">
                                                    <textarea name="artist_bio"
                                                              placeholder="Parisian singer, songwriter & producer..."
                                                              class="form-control @error('artist_bio') is-invalid @enderror">{{isset($user_artist->artistUser) ? $user_artist->artistUser->artist_bio : ''}}</textarea>
                                                    @error('artist_bio')
                                                    <small class="red-text ml-10" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="page-title m-b">
                                                <h4 class="inline m-a-0 update_profile">Right now</h4>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Hot News</div>
                                                <div class="col-sm-9">
                                                    <textarea name="hot_news"
                                                              placeholder="I'm releasing my next EP in March..."
                                                              class="form-control @error('hot_news') is-invalid @enderror">{{isset($user_artist->artistUser) ? $user_artist->artistUser->hot_news : ''}}</textarea>
                                                    @error('hot_news')
                                                    <small class="red-text ml-10" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="page-title m-b">
                                                <h4 class="inline m-a-0 update_profile">Social Media Links</h4>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Instagram</div>
                                                <div class="col-sm-9">
                                                    <input id="instagram_url"
                                                           class="form-control @error('instagram_url') is-invalid @enderror"
                                                           placeholder="https://www.instagram.com/username"
                                                           name="instagram_url"
                                                           value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->instagram_url : ''}}"
                                                           type="text">
                                                    @error('instagram_url')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Facebook</div>
                                                <div class="col-sm-9">
                                                    <input id="facebook_url"
                                                           class="form-control @error('facebook_url') is-invalid @enderror"
                                                           placeholder="https://www.facebook.com/username"
                                                           name="facebook_url"
                                                           value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->facebook_url : ''}}"
                                                           type="text">
                                                    @error('facebook_url')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Spotify</div>
                                                <div class="col-sm-9">
                                                    <input id="spotify_url"
                                                           class="form-control @error('spotify_url') is-invalid @enderror"
                                                           placeholder="https://www.spotify.com/username"
                                                           name="spotify_url"
                                                           value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->spotify_url : ''}}"
                                                           type="text">
                                                    @error('spotify_url')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Sound Cloud
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="soundcloud_url"
                                                           class="form-control @error('soundcloud_url') is-invalid @enderror"
                                                           placeholder="https://www.soundcloud.com/username"
                                                           name="soundcloud_url"
                                                           value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->soundcloud_url : ''}}"
                                                           type="text">
                                                    @error('soundcloud_url')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Youtube</div>
                                                <div class="col-sm-9">
                                                    <input id="youtube_url"
                                                           class="form-control @error('youtube_url') is-invalid @enderror"
                                                           placeholder="https://www.youtube.com/username"
                                                           name="youtube_url"
                                                           value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->youtube_url : ''}}"
                                                           type="text">
                                                    @error('youtube_url')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Add Website
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="website_url"
                                                           class="form-control @error('website_url') is-invalid @enderror"
                                                           placeholder="https://www.website.com/"
                                                           name="website_url"
                                                           value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->website_url : ''}}"
                                                           type="text">
                                                    @error('website_url')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Deezer
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="deezer_url"
                                                           class="form-control @error('deezer_url') is-invalid @enderror"
                                                           placeholder="https://www.deezer.com/"
                                                           name="deezer_url"
                                                           value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->deezer_url : ''}}"
                                                           type="text">
                                                    @error('deezer_url')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3 form-control-label text-muted">Bandcamp
                                                </div>
                                                <div class="col-sm-9">
                                                    <input id="bandcamp_url"
                                                           class="form-control @error('bandcamp_url') is-invalid @enderror"
                                                           placeholder="https://www.bandcamp.com/"
                                                           name="bandcamp_url"
                                                           value="{{isset($user_artist->artistUser) ? $user_artist->artistUser->bandcamp_url : ''}}"
                                                           type="text">
                                                    @error('bandcamp_url')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="page-title m-b-2">
                                                <h4 class="inline m-a-0 update_profile">Your universe</h4>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-sm-3">
                                                    <h6 class="card-title bold">Music genres <span
                                                            class="text tw-mr-2"
                                                            style="color:gray;">(Optional)</span>
                                                    </h6>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <div class="section" id="faq">
                                                        @if(isset($features) && !empty($features))
                                                            @if($features[0]->name == 'Metal')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            Metal
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[0]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="@error('tag') is-invalid @enderror">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($features[1]->name == 'Reggae')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            Reggae
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[1]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($features[2]->name == 'Popular Music')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            Popular Music
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[2]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            @if($features[3]->name == 'Classic / Instrumental')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            Classic / Instrumental
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[3]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($features[4]->name == 'Electronic')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            Electronic
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[4]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($features[5]->name == 'Folk / Acoustic')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            Folk / Acoustic
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[5]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($features[6]->name == 'Jazz')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            Jazz
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[6]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($features[7]->name == 'Pop')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            Pop
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[7]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($features[8]->name == 'R&B / Soul')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            R&B / Soul
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[8]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($features[9]->name == 'Rock / Punk')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            Rock / Punk
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[9]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($features[10]->name == 'World')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            World
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[10]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($features[11]->name == 'Moods')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            Moods
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[11]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($features[12]->name == 'Evolution & Status')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            Evolution & Status
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[12]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                            @if($features[13]->name == 'Hip-hop / Rap')
                                                                <div class="faq row">
                                                                    <div class="col-sm-12">
                                                                        <div
                                                                            class="collapsible-header features_tAgs">
                                                                            Hip-hop / Rap
                                                                        </div>
                                                                        <div class="features-box">
                                                                            <ul class="ks-cboxtags">
                                                                                @foreach($features[13]->featureTags as $feature)
                                                                                    <li>
                                                                                        <input type="checkbox"
                                                                                               id="checkboxOne{{$feature->id}}"
                                                                                               name="tag[]"
                                                                                               value="{{$feature->id}}"
                                                                                               {{in_array($feature->id, $selected_feature) ? 'checked' : ''}}
                                                                                               class="">
                                                                                        <label
                                                                                            for="checkboxOne{{$feature->id}}">
                                                                                            {{$feature->name}}
                                                                                        </label>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif

                                                        @endif

                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="form-group row">
                                            <input type="submit" value="Update"
                                                   class="btn btn-sm rounded artist_update">
                                        </div>

                                    </form>
                                    {{--               Artist Update Profile                     --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 w-xxl w-auto-md">
                        <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
                            <h6 class="text text-muted">5 Likes</h6>
                            <div class="row item-list item-list-sm m-b">
                                <div class="col-xs-12">
                                    <div class="item r" data-id="item-3"
                                         data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                        <div class="item-media ">
                                            <a href="track.detail.html" class="item-media-content"
                                               style="background-image: url('images/b2.jpg');"></a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title text-ellipsis">
                                                <a href="track.detail.html">I Wanna Be In the Cavalry</a>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis ">
                                                <a href="artist.detail.html" class="text-muted">Jeremy Scott</a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="item r" data-id="item-1"
                                         data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                        <div class="item-media ">
                                            <a href="track.detail.html" class="item-media-content"
                                               style="background-image: url('images/b0.jpg');"></a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title text-ellipsis">
                                                <a href="track.detail.html">Pull Up</a>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis ">
                                                <a href="artist.detail.html" class="text-muted">Summerella</a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="item r" data-id="item-12"
                                         data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                        <div class="item-media ">
                                            <a href="track.detail.html" class="item-media-content"
                                               style="background-image: url('images/b11.jpg');"></a>
                                        </div>
                                        <div class="item-info">
                                            <div class="item-title text-ellipsis">
                                                <a href="track.detail.html">Happy ending</a>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis ">
                                                <a href="artist.detail.html" class="text-muted">Postiljonen</a>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12">
                                    <div class="item r" data-id="item-11"
                                         data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                        <div class="item-media ">
                                            <a href="track.detail.html" class="item-media-content"
                                               style="background-image: url('images/b10.jpg');"></a>
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
                                    <div class="item r" data-id="item-6"
                                         data-src="http://api.soundcloud.com/tracks/236107824/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                        <div class="item-media ">
                                            <a href="track.detail.html" class="item-media-content"
                                               style="background-image: url('images/b5.jpg');"></a>
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

            <!-- .modal -->
            <div id="delete-modal" class="modal fade animate black-overlay" data-backdrop="false">
                <div class="row-col h-v">
                    <div class="row-cell v-m">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content flip-y">
                                <div class="modal-body text-center">
                                    <p class="p-y m-t"><i class="fa fa-remove text-warning fa-3x"></i></p>
                                    <p>Are you sure to delete this item?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default p-x-md" data-dismiss="modal">No
                                    </button>
                                    <button type="button" class="btn red p-x-md" data-dismiss="modal">Yes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- / .modal -->

            <!-- ############ PAGE END-->

        </div>
    </div>
    <!-- / -->


    <!-- ############ SWITHCHER START-->
    {{--        <div id="switcher">--}}
    {{--            <div class="switcher white" id="sw-theme">--}}
    {{--                <a href="#" data-ui-toggle-class="active" data-ui-target="#sw-theme" class="white sw-btn">--}}
    {{--                    <i class="fa fa-gear text-muted"></i>--}}
    {{--                </a>--}}
    {{--                <div class="box-header">--}}
    {{--                    <strong>Theme Switcher</strong>--}}
    {{--                </div>--}}
    {{--                <div class="box-divider"></div>--}}
    {{--                <div class="box-body">--}}
    {{--                    <p id="settingLayout" class="hidden-md-down">--}}
    {{--                        <label class="md-check m-y-xs" data-target="folded">--}}
    {{--                            <input type="checkbox">--}}
    {{--                            <i class="green"></i>--}}
    {{--                            <span>Folded Aside</span>--}}
    {{--                        </label>--}}
    {{--                        <label class="m-y-xs pointer" data-ui-fullscreen data-target="fullscreen">--}}
    {{--                            <span class="fa fa-expand fa-fw m-r-xs"></span>--}}
    {{--                            <span>Fullscreen Mode</span>--}}
    {{--                        </label>--}}
    {{--                    </p>--}}
    {{--                    <p>Colors:</p>--}}
    {{--                    <p data-target="color">--}}
    {{--                        <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">--}}
    {{--                            <input type="radio" name="color" value="primary">--}}
    {{--                            <i class="primary"></i>--}}
    {{--                        </label>--}}
    {{--                        <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">--}}
    {{--                            <input type="radio" name="color" value="accent">--}}
    {{--                            <i class="accent"></i>--}}
    {{--                        </label>--}}
    {{--                        <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">--}}
    {{--                            <input type="radio" name="color" value="warn">--}}
    {{--                            <i class="warn"></i>--}}
    {{--                        </label>--}}
    {{--                        <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">--}}
    {{--                            <input type="radio" name="color" value="success">--}}
    {{--                            <i class="success"></i>--}}
    {{--                        </label>--}}
    {{--                        <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">--}}
    {{--                            <input type="radio" name="color" value="info">--}}
    {{--                            <i class="info"></i>--}}
    {{--                        </label>--}}
    {{--                        <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">--}}
    {{--                            <input type="radio" name="color" value="blue">--}}
    {{--                            <i class="blue"></i>--}}
    {{--                        </label>--}}
    {{--                        <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">--}}
    {{--                            <input type="radio" name="color" value="warning">--}}
    {{--                            <i class="warning"></i>--}}
    {{--                        </label>--}}
    {{--                        <label class="radio radio-inline m-a-0 ui-check ui-check-color ui-check-md">--}}
    {{--                            <input type="radio" name="color" value="danger">--}}
    {{--                            <i class="danger"></i>--}}
    {{--                        </label>--}}
    {{--                    </p>--}}
    {{--                    <p>Themes:</p>--}}
    {{--                    <div data-target="bg" class="text-u-c text-center _600 clearfix">--}}
    {{--                        <label class="p-a col-xs-3 light pointer m-a-0">--}}
    {{--                            <input type="radio" name="theme" value="" hidden>--}}
    {{--                            <i class="active-checked fa fa-check"></i>--}}
    {{--                        </label>--}}
    {{--                        <label class="p-a col-xs-3 grey pointer m-a-0">--}}
    {{--                            <input type="radio" name="theme" value="grey" hidden>--}}
    {{--                            <i class="active-checked fa fa-check"></i>--}}
    {{--                        </label>--}}
    {{--                        <label class="p-a col-xs-3 dark pointer m-a-0">--}}
    {{--                            <input type="radio" name="theme" value="dark" hidden>--}}
    {{--                            <i class="active-checked fa fa-check"></i>--}}
    {{--                        </label>--}}
    {{--                        <label class="p-a col-xs-3 black pointer m-a-0">--}}
    {{--                            <input type="radio" name="theme" value="black" hidden>--}}
    {{--                            <i class="active-checked fa fa-check"></i>--}}
    {{--                        </label>--}}
    {{--                    </div>--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    <!-- ############ SWITHCHER END-->
    <!-- ############ SEARCH START -->
    <div class="modal white lt fade" id="search-modal" data-backdrop="false">
        <a data-dismiss="modal" class="text-muted text-lg p-x modal-close-btn">&times;</a>
        <div class="row-col">
            <div class="p-a-lg h-v row-cell v-m">
                <div class="row">
                    <div class="col-md-8 offset-md-2">
                        <form action="search.html" class="m-b-md">
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" placeholder="Type keyword"
                                       data-ui-toggle-class="hide" data-ui-target="#search-result">
                                <span class="input-group-btn">
                    <button class="btn b-a no-shadow white" type="submit">Search</button>
                  </span>
                            </div>
                        </form>
                        <div id="search-result" class="animated fadeIn">
                            <p class="m-b-md"><strong>23</strong> <span
                                    class="text-muted">Results found for: </span><strong>Keyword</strong></p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="row item-list item-list-sm item-list-by m-b">
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-9"
                                                 data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b8.jpg');"></a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">All I Need</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis ">
                                                        <a href="artist.detail.html" class="text-muted">Pablo
                                                            Nouvelle</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-2"
                                                 data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b1.jpg');"></a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Fireworks</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis ">
                                                        <a href="artist.detail.html" class="text-muted">Kygo</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-7"
                                                 data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b6.jpg');"></a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Reflection (Deluxe)</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis ">
                                                        <a href="artist.detail.html" class="text-muted">Fifth
                                                            Harmony</a>
                                                    </div>
                                                    <div class="item-meta text-sm text-muted">
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item r" data-id="item-11"
                                                 data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                                <div class="item-media ">
                                                    <a href="track.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b10.jpg');"></a>
                                                </div>
                                                <div class="item-info">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="track.detail.html">Spring</a>
                                                    </div>
                                                    <div class="item-author text-sm text-ellipsis ">
                                                        <a href="artist.detail.html" class="text-muted">Pablo
                                                            Nouvelle</a>
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
                                                    <a href="artist.detail.html" class="item-media-content"
                                                       style="background-image: url('images/a4.jpg');"></a>
                                                </div>
                                                <div class="item-info ">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="artist.detail.html">Judith Garcia</a>
                                                        <div class="text-sm text-muted">13 songs</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item">
                                                <div class="item-media rounded ">
                                                    <a href="artist.detail.html" class="item-media-content"
                                                       style="background-image: url('images/a9.jpg');"></a>
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
                                                    <a href="artist.detail.html" class="item-media-content"
                                                       style="background-image: url('images/b1.jpg');"></a>
                                                </div>
                                                <div class="item-info ">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="artist.detail.html">Melissa Garza</a>
                                                        <div class="text-sm text-muted">20 songs</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="item">
                                                <div class="item-media rounded ">
                                                    <a href="artist.detail.html" class="item-media-content"
                                                       style="background-image: url('images/a3.jpg');"></a>
                                                </div>
                                                <div class="item-info ">
                                                    <div class="item-title text-ellipsis">
                                                        <a href="artist.detail.html">Joe Holmes</a>
                                                        <div class="text-sm text-muted">24 songs</div>
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
    <!-- ############ SHARE START -->
    <div id="share-modal" class="modal fade animate">
        <div class="modal-dialog">
            <div class="modal-content fade-down">
                <div class="modal-header">

                    <h5 class="modal-title">Share</h5>
                </div>
                <div class="modal-body p-lg">
                    <div id="share-list" class="m-b">
                        <a href="" class="btn btn-icon btn-social rounded btn-social-colored indigo" title="Facebook">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-facebook"></i>
                        </a>

                        <a href="" class="btn btn-icon btn-social rounded btn-social-colored light-blue"
                           title="Twitter">
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-twitter"></i>
                        </a>

                        <a href="" class="btn btn-icon btn-social rounded btn-social-colored red-600" title="Google+">
                            <i class="fa fa-google-plus"></i>
                            <i class="fa fa-google-plus"></i>
                        </a>

                        <a href="" class="btn btn-icon btn-social rounded btn-social-colored blue-grey-600"
                           title="Trumblr">
                            <i class="fa fa-tumblr"></i>
                            <i class="fa fa-tumblr"></i>
                        </a>

                        <a href="" class="btn btn-icon btn-social rounded btn-social-colored red-700" title="Pinterst">
                            <i class="fa fa-pinterest"></i>
                            <i class="fa fa-pinterest"></i>
                        </a>
                    </div>
                    <div>
                        <input class="form-control" value="http://plamusic.com/slug"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ############ SHARE END -->

    <!-- ############ LAYOUT END-->
@endsection

@section('page-script')
    <script>
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#file').change(function(e) {
                e.preventDefault();
                var formData = new FormData();
                formData.append('file', this.files[0]);
                console.log(this.files[0]);
                // Preloader
                // $("#loading").delay(700).fadeOut("slow");
                // return false;
                showLoader();
                $.ajax({
                    type:'POST',
                    url: "{{ url('/upload-artist-profile')}}",
                    data: formData,
                    // dataType: 'json',
                    cache:false,
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if(data.success){
                            loader();
                            var image = document.getElementById('upload_profile');
                            var path = window.location.origin + '/uploads/profile/'+ data.profile_user;
                            image.style.backgroundImage = "url('"+path+"')";
                            $('#snackbar').html(data.success);
                            $('#snackbar').addClass("show");
                            setTimeout(function () {
                                $('#snackbar').removeClass("show");
                            }, 5000);
                        }
                        if(data.error){
                            // loader();
                            $('#snackbarError').html(data.error);
                            $('#snackbarError').addClass("show");
                            setTimeout(function () {
                                $('#snackbarError').removeClass("show");
                            }, 5000);

                        }
                    },
                });
            });
        });
        $('#EditProfile').click(function (){
            var display_btn = document.getElementById('profileBtnShow');
            display_btn.style.display = 'block';
        });

        $('.RemoveUpload').click(function (){
            var display_upload= document.getElementById('profileBtnShow');
            display_upload.style.display = 'none';
        });
    </script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>
@endsection
