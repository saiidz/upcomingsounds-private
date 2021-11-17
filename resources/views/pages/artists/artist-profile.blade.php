@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Artist Profile')

@section('page-style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}" type="text/css" />
    <style>
        #loadings {
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
                                        <img class="flag_icon" src="{{asset('images/flags')}}/{{$user_artist->artistUser->country->flag_icon}}.png" alt="{{$user_artist->artistUser->country->flag_icon}}">
{{--                                        @foreach($countries_flag as $flag)--}}
{{--                                            @if($flag['iso_a2'] == $user_artist->artistUser->country->iso2)--}}
{{--                                                {!! $flag->flag['flag-icon'] !!}--}}
{{--                                            @endif--}}
{{--                                        @endforeach--}}
                                        <span class="text-muted"
                                              style="font-size:15px">{{($user_artist->artistUser->country) ? $user_artist->artistUser->country->name : ''}}</span>
                                    </div>
                                @endif
                                <form class="profile-pic" id="profileBtnShow" method="post"
                                      enctype="multipart/form-data" style="display:none;">
                                    <div class="item-action m-b">
                                        <label for="file" class="btn btn-sm rounded primary">Upload Profile</label>
                                        <input id="file" type="file" class="btn btn-sm rounded primary" name="file"
                                               accept="image/*"/>
                                        {{--                                        <a href="#" class="btn btn-sm rounded primary">Upload</a>--}}
                                        {{--                                    <a href="#" class="btn btn-sm rounded white">Edit Profile</a>--}}
                                    </div>
                                </form>

                                <div class="block clearfix m-b">
                                    <span>9</span> <span class="text-muted">Albums</span>,
                                    @if(!empty($artist_track_count) && $artist_track_count !== 0)
                                    <span>{{ $artist_track_count  }}</span> <span
                                        class="text-muted">Tracks</span>
                                    @endif
                                </div>
                                <div class="row-col m-b">
                                    <div class="col-xs">
                                        @if(!empty($user_artist->artistUser->instagram_url))
                                            <a href="{{$user_artist->artistUser->instagram_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-blue-800"
                                               title="Instagram">
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
                                        @if(!empty($user_artist->artistUser->tiktok_url))
                                            <a href="{{$user_artist->artistUser->tiktok_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Tiktok">
                                                <i class="iconify" data-icon="fa-brands:tiktok"></i>
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
                                        <a class="nav-link active RemoveUpload" href="#" data-toggle="tab"
                                           data-target="#track">Tracks</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link RemoveUpload" href="#" data-toggle="tab"
                                           data-target="#playlist">Lists</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link RemoveUpload" href="#" data-toggle="tab" data-target="#like">Saved</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link RemoveUpload" href="#" data-toggle="tab"
                                           data-target="#profile">Profile</a>
                                    </li>
                                    <li class="nav-item m-r inline" id="EditProfileTapShow" style="display:none;">
                                        <a class="nav-link"  id="EditProfile" href="#" data-toggle="tab"
                                           data-target="#edit-profile">Edit Profile</a>
                                    </li>
                                    <li class="nav-item m-r inline">
                                        <a class="nav-link RemoveUpload" id="AddTrack" href="#" data-toggle="tab"
                                           data-target="#add-track">Add a Track</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                {{--               Artist Tracks                     --}}
                                <div class="tab-pane active" id="track">
                                    @include('pages.artists.artist-track.index')
                                </div>
                                {{--               Artist Tracks                     --}}

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
                                {{--               Artist Profile                     --}}
                                <div class="tab-pane" id="profile">
                                    @include('pages.artists.artist-profile-panels.artist-show-profile')
                                </div>
                                {{--               Artist Profile                     --}}

                                {{--               Artist Update Profile                     --}}
                                <div class="tab-pane" id="edit-profile">
                                    @include('pages.artists.artist-profile-panels.artist-edit-profile')
                                </div>
                                {{--               Artist Update Profile                     --}}

                                <div class="tab-pane" id="add-track">
                                    {{--               Artist Update Profile                     --}}
                                    @include('pages.artists.artist-track.create')
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
        function removeStyle(objfield) {
            objfield.style.borderColor = "";
            objfield.style.border = "";
        }
        // Add Track Validations
        function validateAddTrackForm(track_frm){
            var trackfrm = document.getElementById(track_frm);
            result = "";
            flag = true;

            if(trackfrm.youtube_soundcloud_url.value == ""){
                trackfrm.youtube_soundcloud_url.style.borderColor = "#DD0A0A";
                result = 'Please Enter Url';
                flag = false;
            }

            if (trackfrm.youtube_soundcloud_url.value != ""){
                const string = trackfrm.youtube_soundcloud_url.value;
                const substring = ["https://www.youtube.com", "https://w.soundcloud.com/"];
                const song = substring.some(el => string.includes(el));

                if(song == false){
                    trackfrm.youtube_soundcloud_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }

            if(trackfrm.spotify_track_url.value == ""){
                trackfrm.spotify_track_url.style.borderColor = "#DD0A0A";
                result = 'Please Enter Url';
                flag = false;
            }

            if (trackfrm.spotify_track_url.value != ""){
                const spotifyTrack = trackfrm.spotify_track_url.value;
                const spotifyUrl = "https://open.spotify.com/track";

                if(spotifyTrack.includes(spotifyUrl) == false ){
                    trackfrm.spotify_track_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }

            if(flag == true && (trackfrm.youtube_soundcloud_url.value != "")  && (trackfrm.spotify_track_url.value != "")){
                document.getElementById('error_message_youtube_soundcloud').style.display = 'none';
                document.getElementById('error_message_spotify_track').style.display = 'none';
                // trackfrm.submit();
            }else{
                if(trackfrm.youtube_soundcloud_url.value != "" || trackfrm.youtube_soundcloud_url.value == ""){
                    document.getElementById('error_message_youtube_soundcloud').innerHTML = result;
                }
                if(trackfrm.spotify_track_url.value != "" || trackfrm.spotify_track_url.value == ""){
                    document.getElementById('error_message_spotify_track').innerHTML = result;
                }
                return false;
            }
        }


        function getId(url) {
            var regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|\&v=)([^#\&\?]*).*/;
            var match = url.match(regExp);

            if (match && match[2].length == 11) {
                return match[2];
            } else {
                return 'error';
            }
        }

        document.getElementById('trueUrl').addEventListener('focusout', function (){
            if(this.value.includes('https://www.youtube.com/watch') || this.value.includes('https://www.youtube.com/embed/') || this.value.includes('https://w.soundcloud.com/')){
                var match = this.value.match(/watch|embed|soundcloud/g);
                if(match[0].indexOf("watch") !== -1){
                    // alert('youtube');
                    // document.querySelector('#preview').style.display = 'none';
                    var res = getId(this.value);
                    // console.log(document.querySelector("#preview > iframe[src='']") == null);
                    //     return false;
                    document.querySelector('#preview').style.display = 'block';
                    document.querySelector('#preview').innerHTML = "";
                    // document.querySelector('#iframe_track').src = "https://www.youtube.com/embed/" + res;
                    document.querySelector('#preview').innerHTML = '<iframe width="320" height="315" src="https://www.youtube.com/embed/'+ res +'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                    // document.querySelector('#iframe_track').style.display = 'block'
                }else if(match[0].indexOf("soundcloud") !== -1){
                    // alert('soundcloud');
                    document.querySelector('#preview').style.display = 'block';
                    document.querySelector('#preview').innerHTML = "";
                    document.querySelector('#preview').innerHTML = this.value;
                    // document.querySelector('#iframe_track').src = this.value;
                    // document.querySelector('#iframe_track').style.display = 'block'
                }else if(match[0].indexOf("embed") !== -1){
                    // alert('embed')
                    document.querySelector('#preview').style.display = 'block';
                    document.querySelector('#preview').innerHTML = "";
                    document.querySelector('#preview').innerHTML = this.value;

                }else{
                    alert('error')
                }

            } else {
                // document.querySelector('#iframe_track').src = ""
                document.querySelector('#preview').style.display = 'none';
                // document.querySelector('#iframe_track').style.display = 'none';
            }
        })

        // Edit Track Validations
        function validateEditTrackForm(track_frm){
            var trackfrm = document.getElementById(track_frm);
            result = "";
            flag = true;

            if(trackfrm.youtube_soundcloud_url.value == ""){
                trackfrm.youtube_soundcloud_url.style.borderColor = "#DD0A0A";
                result = 'Please Enter Url';
                flag = false;
            }

            if (trackfrm.youtube_soundcloud_url.value != ""){
                const string = trackfrm.youtube_soundcloud_url.value;
                const substring = ["https://www.youtube.com", "https://w.soundcloud.com/"];
                const song = substring.some(el => string.includes(el));

                if(song == false){
                    trackfrm.youtube_soundcloud_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }

            if(trackfrm.spotify_track_url.value == ""){
                trackfrm.spotify_track_url.style.borderColor = "#DD0A0A";
                result = 'Please Enter Url';
                flag = false;
            }

            if (trackfrm.spotify_track_url.value != ""){
                const spotifyTrack = trackfrm.spotify_track_url.value;
                const spotifyUrl = "https://open.spotify.com/track";

                if(spotifyTrack.includes(spotifyUrl) == false ){
                    trackfrm.spotify_track_url.style.borderColor = "#DD0A0A";
                    result = 'Please Enter Valid Url';
                    flag = false;
                }
            }

            if(trackfrm.name.value == ""){
                trackfrm.name.style.borderColor = "#DD0A0A";
                result = 'Please Enter Name';
                flag = false;
            }

            if(trackfrm.description.value == ""){
                trackfrm.description.style.borderColor = "#DD0A0A";
                result = 'Please Enter Description';
                flag = false;
            }

            if(trackfrm.song_category.value == ""){
                trackfrm.song_category.style.borderColor = "#DD0A0A";
                result = 'Please Select Category';
                flag = false;
            }

            if(flag == true && (trackfrm.youtube_soundcloud_url.value != "") && (trackfrm.spotify_track_url.value != "") && (trackfrm.name.value != "") && (trackfrm.song_category.value != "") && (trackfrm.description.value != "")){
                document.getElementById('error_message_edit_youtube_soundcloud').style.display = 'none';
                document.getElementById('error_message_edit_spotify_track').style.display = 'none';
                document.getElementById('error_message_edit_name').style.display = 'none';
                document.getElementById('error_message_edit_song_category').style.display = 'none';
                document.getElementById('error_message_edit_description').style.display = 'none';

                var edit_track_id = document.getElementById('track_edit_song').getAttribute('data-edit-track-id');
                var url = '{{url('update-track')}}/' + edit_track_id;
                document.getElementById('track_edit_song').setAttribute('action',url);
                trackfrm.submit();
            }else{
                if(trackfrm.youtube_soundcloud_url.value != "" || trackfrm.youtube_soundcloud_url.value == ""){
                    document.getElementById('error_message_edit_youtube_soundcloud').innerHTML = result;
                }
                if(trackfrm.spotify_track_url.value != "" || trackfrm.spotify_track_url.value == ""){
                    document.getElementById('error_message_edit_spotify_track').innerHTML = result;
                }
                if(trackfrm.name.value == ""){
                    document.getElementById('error_message_edit_name').innerHTML = result;
                }
                if(trackfrm.description.value == ""){
                    document.getElementById('error_message_edit_description').innerHTML = result;
                }
                if(trackfrm.song_category.value == ""){
                    document.getElementById('error_message_edit_song_category').innerHTML = result;
                }
                return false;
            }
        }
        document.getElementById('trueUrlEdit').addEventListener('focusout', function (){
            if(this.value.includes('https://www.youtube.com/watch') || this.value.includes('https://www.youtube.com/embed/') || this.value.includes('https://w.soundcloud.com/')){
                var match = this.value.match(/watch|embed|soundcloud/g);
                if(match[0].indexOf("watch") !== -1){
                    // alert('youtube');
                    // document.querySelector('#preview').style.display = 'none';
                    var res = getId(this.value);
                    // console.log(document.querySelector("#preview > iframe[src='']") == null);
                    //     return false;
                    document.querySelector('#previewEdit').style.display = 'block';
                    document.querySelector('#previewEdit').innerHTML = "";
                    // document.querySelector('#iframe_track').src = "https://www.youtube.com/embed/" + res;
                    document.querySelector('#previewEdit').innerHTML = '<iframe width="320" height="315" src="https://www.youtube.com/embed/'+ res +'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                    // document.querySelector('#iframe_track').style.display = 'block'
                }else if(match[0].indexOf("soundcloud") !== -1){
                    // alert('soundcloud');
                    document.querySelector('#previewEdit').style.display = 'block';
                    document.querySelector('#previewEdit').innerHTML = "";
                    document.querySelector('#previewEdit').innerHTML = this.value;
                    // document.querySelector('#iframe_track').src = this.value;
                    // document.querySelector('#iframe_track').style.display = 'block'
                }else if(match[0].indexOf("embed") !== -1){
                    // alert('embed')
                    document.querySelector('#previewEdit').style.display = 'block';
                    document.querySelector('#previewEdit').innerHTML = "";
                    document.querySelector('#previewEdit').innerHTML = this.value;

                }else{
                    alert('error')
                }

            } else {
                // document.querySelector('#iframe_track').src = ""
                document.querySelector('#previewEdit').style.display = 'none';
                // document.querySelector('#iframe_track').style.display = 'none';
            }
        });

    </script>
    <script>
        // Image Track Song Preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('imgTrackPreview').setAttribute('src', e.target.result );
                    $('#imgTrackPreview').hide();
                    $('#imgTrackPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageTrackUpload").change(function () {
            readURL(this);
        });

        // Image Edit Track Preview
        function readEditURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('imgEditTrackPreview').setAttribute('src', e.target.result );
                    $('#imgEditTrackPreview').hide();
                    $('#imgEditTrackPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#imageEditTrackUpload").change(function () {
            readEditURL(this);
        });
    </script>
    <script src="{{asset('js/gijgo.min.js')}}"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            format: "yyyy-mm-dd"
        });
        $('#dateEditpicker').datepicker({
            iconsLibrary: 'fontawesome',
            format: "yyyy-mm-dd"
        });
    </script>
    <script>
        $(document).ready(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#file').change(function (e) {
                e.preventDefault();
                var formData = new FormData();
                formData.append('file', this.files[0]);
                console.log(this.files[0]);
                // Preloader
                // $("#loading").delay(700).fadeOut("slow");
                // return false;
                showLoader();
                $.ajax({
                    type: 'POST',
                    url: "{{ url('/upload-artist-profile')}}",
                    data: formData,
                    // dataType: 'json',
                    contentType: false,
                    processData: false,
                    success: (data) => {
                        if (data.success) {
                            loader();
                            var image = document.getElementById('upload_profile');
                            var path = window.location.origin + '/uploads/profile/' + data.profile_user;
                            image.style.backgroundImage = "url('" + path + "')";
                            $('#snackbar').html(data.success);
                            $('#snackbar').addClass("show");
                            setTimeout(function () {
                                $('#snackbar').removeClass("show");
                            }, 5000);
                        }
                        if (data.error) {
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
        $('#EditProfile').click(function () {
            var display_btn = document.getElementById('profileBtnShow');
            display_btn.style.display = 'block';
        });

        $('.RemoveUpload').click(function () {
            var display_upload = document.getElementById('profileBtnShow');
            display_upload.style.display = 'none';
            $("#EditProfileTapShow").css({ display: "none" });
        });
        $('#EditProfileTapHide').click(function () {
            $("#EditProfileTapShow").css({ display: "inline-block" });
            // var display_upload = document.getElementById('EditProfileTapShow');
            // display_upload.style.display = 'block';
        });
    </script>
    <script>
        // Edit Track
        function editTrack(track_id){
            showLoader();
            $.ajax({
                type: "GET",
                url: '{{url('/edit-track')}}/' + track_id,
                dataType: 'JSON',
                success:function (data){
                    loader();
                    $('#track_edit_song').trigger("reset");
                    // $('#trueUrl').val(data.artist_track.youtube_soundcloud_url);
                    // $('#spotifyTrackUrl').val(data.artist_track.spotify_track_url);
                    $('#track_edit_song').attr('data-edit-track-id',data.artist_track.id);

                    $('#trueUrlEdit').val(data.artist_track.youtube_soundcloud_url);
                    if(data.artist_track.youtube_soundcloud_url.includes('https://www.youtube.com/watch') || data.artist_track.youtube_soundcloud_url.includes('https://www.youtube.com/embed/') || data.artist_track.youtube_soundcloud_url.includes('https://w.soundcloud.com/')) {
                        var match = data.artist_track.youtube_soundcloud_url.match(/watch|embed|soundcloud/g);
                        if (match[0].indexOf("watch") !== -1) {
                            var res = getId(data.artist_track.youtube_soundcloud_url);
                            document.querySelector('#previewEdit').innerHTML = "";
                            document.querySelector('#previewEdit').innerHTML = '<iframe width="320" height="315" src="https://www.youtube.com/embed/' + res + '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>';
                        } else if (match[0].indexOf("soundcloud") !== -1) {
                            document.querySelector('#previewEdit').innerHTML = "";
                            document.querySelector('#previewEdit').innerHTML = data.artist_track.youtube_soundcloud_url;
                        } else if (match[0].indexOf("embed") !== -1) {
                            document.querySelector('#previewEdit').style.display = 'block';
                            document.querySelector('#previewEdit').innerHTML = "";
                            document.querySelector('#previewEdit').innerHTML = data.artist_track.youtube_soundcloud_url;

                        }
                    }
                    else {
                        document.querySelector('#previewEdit').style.display = 'none';
                    }

                    $('#spotifyTrackUrl').val(data.artist_track.spotify_track_url);
                    $('#trackEditTitle').val(data.artist_track.name);
                    $('#trackEditDescription').val(data.artist_track.description);

                    $("#songEditCategory").append('<option value="" disabled selected>Choose Song Category</option>');
                    $.each(data.track_categories, function (key, value) {
                        let selected = (value.id == data.artist_track.track_category_id) ? 'selected' : '';
                        $("#songEditCategory").append('<option value="' + value.id + '" '+selected+'>' + value.name + '</option>');
                    });
                    $('#dateEditpicker').val(data.artist_track.release_date);
                    if(data.artist_track.display_profile == "1"){
                        $('#displayEditProfile').attr( 'checked', true );
                    }else{
                        $('#displayEditProfile').attr( 'checked', false );
                    }

                }
            });
        }
        document.getElementById('update_track_not').addEventListener('click', function (){
            document.querySelector('#previewEdit').innerHTML = "";
        });
    </script>
    <script>
        // Delete Track Model
        function deleteTrack(track_id){
            $('.deleteTrack').attr('data-track-id',track_id);
        }
        $('#delete_track').click(function (event) {
            event.preventDefault();
            var track_id = $('.deleteTrack').attr('data-track-id');
            var url= "{{url('/delete-track')}}/"+track_id;
            $.ajax({
                type: "DELETE",
                url: url,
                data:{
                    "_token": "{{ csrf_token() }}",
                    "track_id": track_id,
                },
                success: function (data) {
                    if(data.success){
                        // $('#ShowVehicleMsg').html('<div class="card-alert card green lighten-5 remove_message"><div class="card-content green-text"><p>'+data.success+'</p></div><button type="button" class="close red-text" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button></div>')
                        $('#remove_track-'+track_id).remove();
                        $('#snackbar').html(data.success);
                        $('#snackbar').addClass("show");
                        setTimeout(function () {
                            $('#snackbar').removeClass("show");

                        }, 5000);
                    }
                }
            });
        });
    </script>
    <script src="https://code.iconify.design/2/2.0.3/iconify.min.js"></script>

    <script>
        // Change Artist password
        $('#changePasswordArtist').on('submit', function(e){
            e.preventDefault();

            $.ajax({
                url:$(this).attr('action'),
                method:$(this).attr('method'),
                data:new FormData(this),
                processData:false,
                dataType:'json',
                contentType:false,
                beforeSend:function(){
                    $(document).find('span.error-text').text('');
                },
                success:function(data){
                    if(data.status == 0){
                        $.each(data.error, function(prefix, val){
                            $('span.'+prefix+'_error').text(val[0]);
                        });
                    }else{
                        document.getElementById('change-password').style.display = 'none';
                        $('#changePasswordArtist')[0].reset();
                        $('#snackbar').html(data.msg);
                        $('#snackbar').addClass("show");
                        setTimeout(function () {
                            $('#snackbar').removeClass("show");

                        }, 5000);
                        // alert(data.msg);
                    }
                }
            });
        });
        document.getElementById('closeChangeArtistPassword').addEventListener('click', function (){
            document.querySelector('#changePasswordArtist').reset();
        });
    </script>
@endsection
