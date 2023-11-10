@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Public Profile '.UC_FIRST($user->name))

@section('page-style')
    <link rel="stylesheet" href="{{asset('css/custom/custom.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}" type="text/css" />
    <style>
        svg.svg-inline--fa {
            font-size: inherit !important;
        }
        /*.profile_public{*/
        /*    margin-left: 12.5rem;*/
        /*}*/
        .artist-features {
            display: flex;
            align-items: center;
            margin: 0 28px 20px 10px;
            flex-wrap: wrap;
        }
        .artist-features ul {
            margin: 0;
            padding: 0 0px 0 40px;
        }
        .artist-features ul li {
            color: #8d8ca4;
            font-size: 16px;
            line-height: 16px;
            margin: 10px 0 0 0;
        }
        .artist-features ul li::marker {
            color: #02b875;
        }
        .custom-icon::before {
            content: "";
            background-image: url({{asset('/images/artist_us.png')}});
            width: 22px;
            height: 22px;
            display: inline-block;
            background-size: cover;
            margin-top: 7px;
        }
        .item-media {
            position: relative;
            overflow: hidden;
        }

        .item-media-content {
            position: relative;
            width: 100%;
            padding-top: 100%; /* Set the desired aspect ratio, e.g., 4:3 would be 75% */
            background-size: cover;
        }

        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the image covers the container */
        }

        .profile-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            /*border: 4px solid #fff; !* Add a white border around the profile image *!*/
            border-radius: 50%; /* Make it a circle for a profile image effect */
        }
        .item-media:after {
            padding-top: 2% !important;
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->
    <div class="page-content">
        <div class="padding b-b profile_public">
            <div class="row-col">
                <div class="col-sm w w-auto-xs m-b">
                    <div class="item w">
                        <div class="item-media">
                            <div class="item-media-content">
                                @php
                                    $mystring = $user->profile;
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
                                    @if(!empty($user->profile))
                                        <img src="{{URL('/')}}/uploads/profile/{{$user->profile}}" alt="" class="profile-image">
                                    @else
                                        <img src="{{asset('images/profile_images_icons.svg')}}" alt="" class="profile-image">
                                    @endif
                                @elseif($pos == 0)
                                    <img src="{{asset($user->profile)}}" alt="" class="profile-image">
                                @else
                                    <img src="{{asset('images/profile_images_icons.svg')}}" alt="" class="profile-image">
                                @endif

                                <img src="{{asset('images/bg_curator_profile.png')}}" alt="" class="background-image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="p-l-md no-padding-xs">
                        <div class="page-title">
                            <h1 class="inline">{{($user) ? $user->name : ''}}</h1>
                            @if ($user->is_verified == 1)
                                <img src="{{ asset('images/verified_icon.svg') }}" class="m-b v-m m-l-xs" style="width: 22px;" alt="">
                            @endif
{{--                            <label class="fa fa-star text-primary text-lg m-b v-m m-l-xs" title="Pro"></label>--}}
                        </div>
                        <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis" style="font-size: 14px;">
                            @if(!empty($user->curatorUser->curator_bio))
                                {{$user->curatorUser->curator_bio}}
                            @endif
                        </p>
                        @if(!empty($user->curatorUser->country))
                            <div class="block flag_style clearfix m-b">
                                <img class="flag_icon" src="{{asset('images/flags')}}/{{$user->curatorUser->country->flag_icon}}.png" alt="{{$user->curatorUser->country->flag_icon}}">
                                <span class="text-muted"
                                      style="font-size:15px">{{($user->curatorUser->country) ? $user->curatorUser->country->name : ''}}</span>
                            </div>
                        @endif
{{--                        <div class="item-action m-b">--}}
{{--                            <a class="btn btn-icon white rounded btn-share pull-right" href="javascript:void(0)" id="shareArtistProfile" data-url_root="{{route('artist.public.profile',$user->name)}}" data-toggle="modal" data-target="#share-modal">--}}
{{--                                <i class="fa fa-share-alt"></i>--}}
{{--                            </a>--}}
{{--                            <button class="btn-playpause text-primary m-r-sm"></button>--}}
{{--                            <span>--}}
{{--                                @if(!empty($user->artistTrackAlbum))--}}
{{--                                    {{$user->artistTrackAlbum->count()}}--}}
{{--                                @endif Albums, @if(!empty($user->artistTrack))--}}
{{--                                        {{$user->artistTrack->count()}}--}}
{{--                                    @endif Tracks--}}
{{--                            </span>--}}
{{--                        </div>--}}

                        <div class="row-col m-b">
                            <div class="col-xs">
                                @if(!empty($user->curatorUser->instagram_url))
                                    <a href="{{$user->curatorUser->instagram_url}}" target="_blank"
                                       class="btn btn-icon btn-social rounded btn-social-colored light-blue-800"
                                       title="Instagram">
                                        <i class="fa fa-instagram"></i>
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                @endif
                                @if(!empty($user->curatorUser->facebook_url))
                                    <a href="{{$user->curatorUser->facebook_url}}" target="_blank"
                                       class="btn btn-icon btn-social rounded btn-social-colored indigo"
                                       title="Facebook">
                                        <i class="fa fa-facebook"></i>
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                @endif
                                @if(!empty($user->curatorUser->spotify_url))
                                    <a href="{{$user->curatorUser->spotify_url}}" target="_blank"
                                       class="btn btn-icon btn-social rounded btn-social-colored light-green-500"
                                       title="Spotify">
                                        <i class="fa fa-spotify"></i>
                                        <i class="fa fa-spotify"></i>
                                    </a>
                                @endif
                                @if(!empty($user->curatorUser->soundcloud_url))
                                    <a href="{{$user->curatorUser->soundcloud_url}}" target="_blank"
                                       class="btn btn-icon btn-social rounded btn-social-colored orange-700"
                                       title="SoundCloud">
                                        <i class="fa fa-soundcloud"></i>
                                        <i class="fa fa-soundcloud"></i>
                                    </a>
                                @endif
                                @if(!empty($user->curatorUser->youtube_url))
                                    <a href="{{$user->curatorUser->youtube_url}}" target="_blank"
                                       class="btn btn-icon btn-social rounded btn-social-colored red-600"
                                       title="Youtube">
                                        <i class="fa fa-youtube"></i>
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                @endif
                                @if(!empty($user->curatorUser->website_url))
                                    <a href="{{$user->curatorUser->website_url}}" target="_blank"
                                       class="btn btn-icon btn-social rounded btn-social-colored"
                                       style="background-color:#333;" title="Website">
                                        <i class="fa fa-link"></i>
                                        <i class="fa fa-link"></i>
                                    </a>
                                @endif
                                @if(!empty($user->curatorUser->deezer_url))
                                    <a href="{{$user->curatorUser->deezer_url}}" target="_blank"
                                       class="btn btn-icon btn-social rounded btn-social-colored"
                                       style="background-color:#eb9d00;" title="Deezer">
                                        <i class="fab fa-deezer"></i>
                                        <i class="fab fa-deezer"></i>
                                    </a>
                                @endif
                                @if(!empty($user->curatorUser->bandcamp_url))
                                    <a href="{{$user->curatorUser->bandcamp_url}}" target="_blank"
                                       class="btn btn-icon btn-social rounded btn-social-colored"
                                       style="background-color:#333;" title="Bandcamp">
                                        <i class="fa fa-bandcamp"></i>
                                        <i class="fa fa-bandcamp"></i>
                                    </a>
                                @endif
                                @if(!empty($user->curatorUser->tiktok_url))
                                    <a href="{{$user->curatorUser->tiktok_url}}" target="_blank"
                                       class="btn btn-icon btn-social rounded btn-social-colored"
                                       style="background-color:#333;" title="Tiktok">
                                        <i class="fab fa-tiktok"></i>
                                        <i class="fab fa-tiktok"></i>
                                    </a>
                                @endif
                                @if($user->is_public_profile == 1)
                                    <a href="{{route('artist.public.profile',$user->name)}}" target="_blank" id="Public_Profile"
                                       class="btn btn-icon btn-social rounded btn-social-colored"
                                       style="background-color:#333 !important;" title="Public Profile">
                                        <i class="custom-icon"></i>
                                        <i class="custom-icon"></i>
                                    </a>
                                @else
                                    <a href="{{route('artist.public.profile',$user->name)}}" target="_blank" id="Public_Profile"
                                       class="btn btn-icon btn-social rounded btn-social-colored"
                                       style="background-color:#333 !important; display:none;" title="Public Profile">
                                        <i class="custom-icon"></i>
                                        <i class="custom-icon"></i>
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
                <div class="padding">
                    <div class="nav-active-border b-primary bottom m-b-md">
                        <ul class="nav l-h-2x">
{{--                            <li class="nav-item m-r inline">--}}
{{--                                <a class="nav-link active" href="#" data-toggle="tab" data-target="#tab_1">Overview</a>--}}
{{--                            </li>--}}
                            <li class="nav-item m-r inline">
                                <a class="nav-link active" href="#" data-toggle="tab" data-target="#tab_4">Profile</a>
                            </li>
                        </ul>
                    </div>
                    <div class="tab-content">
{{--                        <div class="tab-pane active" id="tab_1">--}}
{{--                            @include('pages.curators.curator-public-profile.overview')--}}
{{--                        </div>--}}
                        <div class="tab-pane active" id="tab_4">
                            @include('pages.curators.curator-public-profile.show-profile')
                        </div>
                    </div>
                </div>
            </div>
            @if(\Illuminate\Support\Facades\Auth::user()->type != 'artist')
                @include('pages.curators.panels.right-sidebar')
            @endif

        </div>
    </div>

    <!-- ############ PAGE END-->
    @include('welcome-panels.welcome-footer')
@endsection

@section('page-script')
    <script>
        $('#shareArtistProfile').on('click', function (){
           let url = $(this).data('url_root');
           $('#publicArtistLink').val(url);
        });
    </script>
    <script src="{{asset('js/gijgo.min.js')}}"></script>
@endsection
