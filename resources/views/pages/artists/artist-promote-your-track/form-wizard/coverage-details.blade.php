@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Coverage Details')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/curator-dashboard.css') }}">
    <link rel="stylesheet" href="{{asset('css/custom/custom.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('css/custom/chat.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <style>
        #loadings {
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
        svg.svg-inline--fa {
            font-size: inherit !important;
        }
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
        .form-control-label{
            font-size:15px;
        }
        .update_profile{
            font-size:17px !important;
        }
        .blue-tag {
            color: blue;
        }
        .profile-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            border-radius: 50%; 
        }
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; 
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="row-col">
            {{-- CHANGED: col-lg-8 to col-lg-12 to make it full width --}}
            <div class="col-lg-12 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0 titleColor" style="font-size:2rem !important;">Coverage Details</h1>
                        <a href="{{ url()->previous() }}"
                           class="btn btn-sm rounded proposition basicbtn">
                            Back</a>
                    </div>
                    <div class="row-col">
                        <div class="col-sm w w-auto-xs m-b">
                            <div class="item w">
                                <div class="item-media">
                                    <div class="item-media-content">
                                        @php
                                            $mystring = $verifiedCoverage->user->profile;
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
                                            @if(!empty($verifiedCoverage->user->profile))
                                                <img src="{{URL('/')}}/uploads/profile/{{$verifiedCoverage->user->profile}}" alt="" class="profile-image">
                                            @else
                                                <img src="{{asset('images/profile_images_icons.svg')}}" alt="" class="profile-image">
                                            @endif
                                        @elseif($pos == 0)
                                            <img src="{{asset($verifiedCoverage->user->profile)}}" alt="" class="profile-image">
                                        @else
                                            <img src="{{asset('images/profile_images_icons.svg')}}" alt="" class="profile-image">
                                        @endif

                                        <img src="{{asset('images/bg_curator_profile.png')}}" alt="" class="background-image">
                                    </div>
                                </div>
                            </div>
                            <div>
                                @if (!empty($verifiedCoverage->user->curatorUser->curator_bio))
                                    <div class="page-title m-b">
                                        <h4 class="inline m-a-0 biO">Bio</h4>
                                    </div>
                                    <p id="bioInfo" class="text-muted">{{Str::limit($verifiedCoverage->user->curatorUser->curator_bio, 50)}}</p>
                                    <a href="javascript:void(0)" class="seeMoreBio" onclick="seeMoreBio()">See more</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="p-l-md no-padding-xs">
                                <div class="page-title">
                                    <h1 class="inline" style="font-size: 1.5rem !important;">{{($verifiedCoverage->user) ? $verifiedCoverage->user->name : ''}}</h1>
                                    @if ($verifiedCoverage->user->is_verified == 1)
                                        <img src="{{ asset('images/verified_icon.svg') }}" style="width: 22px; vertical-align: sub !important;" alt="">
                                    @endif
                                </div>
                                <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">
                                    @if(!empty($verifiedCoverage->user->curatorUser->curator_signup_from))
                                        {{Str::upper (ucwords(str_replace("_", " ", $verifiedCoverage->user->curatorUser->curator_signup_from)))}}
                                    @endif
                                </p>
                                @if(!empty($verifiedCoverage->user->curatorUser->country))
                                    <div class="block flag_style clearfix m-b">
                                        <img class="flag_icon" src="{{asset('images/flags')}}/{{$verifiedCoverage->user->curatorUser->country->flag_icon}}.png" alt="{{$verifiedCoverage->user->curatorUser->country->flag_icon}}">
                                        <span class="text-muted"
                                              style="font-size:15px">{{($verifiedCoverage->user->curatorUser->country) ? $verifiedCoverage->user->curatorUser->country->name : ''}}</span>
                                    </div>
                                @endif
                                <div class="row-col m-b" id="socialView_S">
                                    <div class="col-xs">
                                        @if(!empty($verifiedCoverage->user->curatorUser->instagram_url))
                                            <a href="{{$verifiedCoverage->user->curatorUser->instagram_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-blue-800"
                                               title="Instagram">
                                                <i class="fa fa-instagram"></i>
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verifiedCoverage->user->curatorUser->facebook_url))
                                            <a href="{{$verifiedCoverage->user->curatorUser->facebook_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored indigo"
                                               title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verifiedCoverage->user->curatorUser->spotify_url))
                                            <a href="{{$verifiedCoverage->user->curatorUser->spotify_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-green-500"
                                               title="Spotify">
                                                <i class="fa fa-spotify"></i>
                                                <i class="fa fa-spotify"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verifiedCoverage->user->curatorUser->soundcloud_url))
                                            <a href="{{$verifiedCoverage->user->curatorUser->soundcloud_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored orange-700"
                                               title="SoundCloud">
                                                <i class="fa fa-soundcloud"></i>
                                                <i class="fa fa-soundcloud"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verifiedCoverage->user->curatorUser->youtube_url))
                                            <a href="{{$verifiedCoverage->user->curatorUser->youtube_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored red-600"
                                               title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verifiedCoverage->user->curatorUser->website_url))
                                            <a href="{{$verifiedCoverage->user->curatorUser->website_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Website">
                                                <i class="fa fa-link"></i>
                                                <i class="fa fa-link"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verifiedCoverage->user->curatorUser->deezer_url))
                                            <a href="{{$verifiedCoverage->user->curatorUser->deezer_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#eb9d00;" title="Deezer">
                                                <i class="fab fa-deezer"></i>
                                                <i class="fab fa-deezer"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verifiedCoverage->user->curatorUser->apple_url))
                                            <a href="{{$verifiedCoverage->user->curatorUser->apple_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Bandcamp">
                                                <i class="fa fa-apple"></i>
                                                <i class="fa fa-apple"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verifiedCoverage->user->curatorUser->tiktok_url))
                                            <a href="{{$verifiedCoverage->user->curatorUser->tiktok_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Tiktok">
                                                <i class="fab fa-tiktok"></i>
                                                <i class="fab fa-tiktok"></i>
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="padding p-y-0 m-b-md m-t-3">
                        @if(!empty($verifiedCoverage->user->curatorUserTags) && count($verifiedCoverage->user->curatorUserTags) > 0)
                            <div class="page-title m-b-1">
                                <h4 class="inline m-a-0 update_profile">Genres</h4>
                            </div>
                            <div class="form-group row">
                                <div class="artist-features">
                                    @if(count($verifiedCoverage->user->curatorUserTags) > 0)
                                        @php
                                            $userTags = $verifiedCoverage->user->curatorUserTags->chunk(6);
                                        @endphp
                                        @foreach($userTags as $tags)
                                            <ul>
                                                @foreach($tags as $tag)
                                                    <li>{{$tag->curatorFeatureTag->name}}</li>
                                                @endforeach
                                            </ul>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        @endif
                        <div class="page-title m-b">
                            <h4 class="inline m-a-0 update_profile">Coverage Details</h4>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Date:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{ !empty($verifiedCoverage->time_to_publish) ? $verifiedCoverage->time_to_publish : '------' }} days for Publication</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Contribution:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($verifiedCoverage->contribution) ? $verifiedCoverage->contribution : '----'}}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Offer Type:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($verifiedCoverage->offerType->name) ? $verifiedCoverage->offerType->name : '----'}}</div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Offer Text:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-12 form-control-label text-muted">
                                    {!! !empty($verifiedCoverage->description) ? $verifiedCoverage->description : '----' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- CHANGED: Commented out the right sidebar to hide it --}}
            {{-- @include('pages.curators.panels.right-sidebar') --}}
        </div>
    </div>

    @endsection


@section('page-script')
    <script src="{{asset('app-assets/js/artist/artist.js')}}"></script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {
            $('.ckeditor').ckeditor();
        });
    </script>
    <script>
        var preload = document.getElementById("loadings");
        function loader(){
            preload.style.display='none';
        }
        function showLoader(){
            preload.style.display='block';
        }
    </script>
    <script>
        var curator_bio = {!! json_encode($verifiedCoverage->user->curatorUser->curator_bio) !!};
        if(curator_bio)
        {
            function seeMoreBio()
            {
                $('#bioInfo').empty();
                $('#bioInfo').html(curator_bio);
            }
        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the description contains a certain tag (e.g., <a>)
            var description = document.getElementById("descriptionContainerOfferText").innerHTML;
            var containsTag = description.includes("<a");

            // If the tag exists, add a CSS class to change its color
            if (containsTag) {
                var tags = document.querySelectorAll("#descriptionContainerOfferText a");
                tags.forEach(function(tag) {
                    tag.classList.add("blue-tag");
                });
            }
        });
    </script>
@endsection
