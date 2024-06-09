@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Submit Coverage Details')

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
        .form-control-label{
            font-size:15px;
        }
        .update_profile{
            font-size:17px !important;
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
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0 titleColor">Coverage Details</h1>
                        <a href="{{ url()->previous() }}"
                           class="btn btn-sm rounded proposition basicbtn">
                            Back</a>
                    </div>
                    <div class="row-col">
                        <div class="col-sm w w-auto-xs m-b">
                            <div class="item w rounded">
                                <div class="item-media">
                                    @php
                                        $mystring = $submitCoverage->userArtist->profile;
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
                                        @if(!empty($submitCoverage->userArtist->profile))
                                            <div class="item-media-content"
                                                 style="background-image: url({{URL('/')}}/uploads/profile/{{$submitCoverage->userArtist->profile}});"></div>
                                        @else
                                            <div class="item-media-content"
                                                 style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                        @endif
                                    @elseif($pos == 0)
                                        <div class="item-media-content"
                                             style="background-image: url({{$submitCoverage->userArtist->profile}});"></div>
                                    @else
                                        <div class="item-media-content"
                                             style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="p-l-md no-padding-xs">
                                <div class="page-title">
                                    <h1 class="inline">{{($submitCoverage->userArtist) ? $submitCoverage->userArtist->name : ''}}</h1>
                                </div>
                                <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis" style="font-size: 14px;">
                                    @if(!empty($submitCoverage->userArtist->artistUser->artist_bio))
                                        {{$submitCoverage->userArtist->artistUser->artist_bio}}
                                    @endif
                                </p>
                                @if(!empty($submitCoverage->userArtist->artistUser->country))
                                    <div class="block flag_style clearfix m-b">
                                        <img class="flag_icon" src="{{asset('images/flags')}}/{{$submitCoverage->userArtist->artistUser->country->flag_icon}}.png" alt="{{$submitCoverage->userArtist->artistUser->country->flag_icon}}">
                                        <span class="text-muted"
                                              style="font-size:15px">{{($submitCoverage->userArtist->artistUser->country) ? $submitCoverage->userArtist->artistUser->country->name : ''}}</span>
                                    </div>
                                @endif
                                <div class="row-col m-b" id="socialView_S">
                                    <div class="col-xs">
                                        @if(!empty($submitCoverage->userArtist->artistUser->instagram_url))
                                            <a href="{{$submitCoverage->userArtist->artistUser->instagram_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-blue-800"
                                               title="Instagram">
                                                <i class="fa fa-instagram"></i>
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        @endif
                                        @if(!empty($submitCoverage->userArtist->artistUser->facebook_url))
                                            <a href="{{$submitCoverage->userArtist->artistUser->facebook_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored indigo"
                                               title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        @endif
                                        @if(!empty($submitCoverage->userArtist->artistUser->spotify_url))
                                            <a href="{{$submitCoverage->userArtist->artistUser->spotify_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-green-500"
                                               title="Spotify">
                                                <i class="fa fa-spotify"></i>
                                                <i class="fa fa-spotify"></i>
                                            </a>
                                        @endif
                                        @if(!empty($submitCoverage->userArtist->artistUser->soundcloud_url))
                                            <a href="{{$submitCoverage->userArtist->artistUser->soundcloud_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored orange-700"
                                               title="SoundCloud">
                                                <i class="fa fa-soundcloud"></i>
                                                <i class="fa fa-soundcloud"></i>
                                            </a>
                                        @endif
                                        @if(!empty($submitCoverage->userArtist->artistUser->youtube_url))
                                            <a href="{{$submitCoverage->userArtist->artistUser->youtube_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored red-600"
                                               title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        @endif
                                        @if(!empty($submitCoverage->userArtist->artistUser->website_url))
                                            <a href="{{$submitCoverage->userArtist->artistUser->website_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Website">
                                                <i class="fa fa-link"></i>
                                                <i class="fa fa-link"></i>
                                            </a>
                                        @endif
                                        @if(!empty($submitCoverage->userArtist->artistUser->deezer_url))
                                            <a href="{{$submitCoverage->userArtist->artistUser->deezer_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#eb9d00;" title="Deezer">
                                                <i class="fab fa-deezer"></i>
                                                <i class="fab fa-deezer"></i>
                                            </a>
                                        @endif
                                        @if(!empty($submitCoverage->userArtist->artistUser->bandcamp_url))
                                            <a href="{{$submitCoverage->userArtist->artistUser->bandcamp_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Bandcamp">
                                                <i class="fa fa-bandcamp"></i>
                                                <i class="fa fa-bandcamp"></i>
                                            </a>
                                        @endif
                                        @if(!empty($submitCoverage->userArtist->artistUser->tiktok_url))
                                            <a href="{{$submitCoverage->userArtist->artistUser->tiktok_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Tiktok">
                                                <i class="fab fa-tiktok"></i>
                                                <i class="fab fa-tiktok"></i>
                                            </a>
                                        @endif
                                        @if($submitCoverage->userArtist->is_public_profile == 1)
                                            <a href="{{route('artist.public.profile',$submitCoverage->userArtist->name)}}" target="_blank" id="Public_Profile"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333 !important;" title="Public Profile">
                                                <i class="custom-icon"></i>
                                                <i class="custom-icon"></i>
                                            </a>
                                        @else
                                            <a href="{{route('artist.public.profile',$submitCoverage->userArtist->name)}}" target="_blank" id="Public_Profile"
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
                    <div class="padding p-y-0 m-b-md m-t-3">
                        <div class="page-title m-b">
                            <h4 class="inline m-a-0 update_profile">Coverage Info</h4>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Submit At:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($submitCoverage) ? getDateFormat($submitCoverage->submit_at) : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Coverage Status:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">
                                    @if($submitCoverage->status == \App\Templates\IOfferTemplateStatus::PENDING)
                                        <span class="text-danger">{{$submitCoverage->status}}</span>
                                    @else
                                        <span class="text-primary">{{$submitCoverage->status}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Coverage Type:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($submitCoverage->alternativeOption) ? $submitCoverage->alternativeOption->name : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Message:</div>
                            <div class="col-sm-9">
                                <div
                                    class="form-control-label text-muted">{!! $submitCoverage->message ?? '----' !!}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="padding p-y-0 m-b-md m-t-3">
                                <div class="page-title m-b">
                                    <h4 class="inline m-a-0 update_profile">Coverage Links</h4>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 form-control-label">
                                        @if(!empty(json_decode($submitCoverage->links)))
                                            @foreach(json_decode($submitCoverage->links) as $link)
                                                <a href="{{$link}}" target="_blank" style="float:left !important;"
                                                   class="btn btn-sm rounded add_track">
                                                    View Coverage Work</a>
                                            @endforeach
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="padding p-y-0 m-b-md m-t-3">
                        <div class="page-title m-b">
                            <h4 class="inline m-a-0 update_profile">Artist Track Info</h4>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Track Name:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{ !empty($submitCoverage->artistTrack) ? $submitCoverage->artistTrack->name : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Release Type:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{ !empty($submitCoverage->artistTrack) ? Str::ucfirst($submitCoverage->artistTrack->audio_cover) .' '. Str::ucfirst($submitCoverage->artistTrack->release_type)  : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Release Date:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{ !empty($submitCoverage->artistTrack) ? getDateFormat($submitCoverage->artistTrack->release_date) : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Description:</div>
                            <div class="col-sm-9">
                                <div class="col-sm-12 form-control-label text-muted">
                                    <div id="desInfo">
                                        {{ !empty($submitCoverage->artistTrack->description) ? Str::limit($submitCoverage->artistTrack->description, 100) : '-----'}}
                                        <a href="javascript:void(0)" class="seeMoreBio" onclick="seeMoreDes()">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Pitch:</div>
                            <div class="col-sm-9">
                                <div class="col-sm-12 form-control-label text-muted">
                                    <div id="pitchInfo">
                                        {{ !empty($submitCoverage->artistTrack->pitch_description) ? Str::limit($submitCoverage->artistTrack->pitch_description, 100) : '-----'}}
                                        <a href="javascript:void(0)" class="seeMoreBio" onclick="seeMorePitch()">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(!empty($submitCoverage->artistTrack->track_thumbnail))
                        <div class="padding p-y-0 m-b-md m-t-3">
                            <div class="page-title m-b">
                                <h4 class="inline m-a-0 update_profile">Artist Track Thumbnail</h4>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 form-control-label">
                                    <a href="{{URL('/')}}/uploads/track_thumbnail/{{$submitCoverage->artistTrack->track_thumbnail}}" target="_blank" style="float:left !important;">
                                        <img src="{{URL('/')}}/uploads/track_thumbnail/{{$submitCoverage->artistTrack->track_thumbnail}}" style="height: 255px;width: 380px">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(!empty($submitCoverage->artistTrack->artistTrackImages) && (count($submitCoverage->artistTrack->artistTrackImages) > 0))
                        <div class="padding p-y-0 m-b-md m-t-3">
                            <div class="page-title m-b">
                                <h4 class="inline m-a-0 update_profile">Artist Track Document</h4>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 form-control-label">
                                    @foreach($submitCoverage->artistTrack->artistTrackImages as $path)
                                        @if(!empty($path->type == 'pdf'))
                                            <div class="col-lg-4" style="display:inline-block">
                                                <iframe width=100% height="255" src="{{URL('/')}}/uploads/track_images/{{$path->path}}" allow=accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture allowfullscreen></iframe>
                                            </div>
                                        @else
                                            <div class="col-lg-4" style="display:inline-block">
                                                <a href="{{URL('/')}}/uploads/track_images/{{$path->path}}" target="_blank" style="float:left !important;">
                                                    <img src="{{URL('/')}}/uploads/track_images/{{$path->path}}" alt="{{$path->type}}" style="height: 255px;width: 100%;">
                                                </a>

                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="row">
                        <div class="col-sm-12 text-muted">
                            <h4 style="color:#02b875 !important; text-align:center">This Coverage is completed.</h4>
                        </div>
                    </div>
                </div>
            </div>
            @include('pages.artists.panels.right-sidebar')
        </div>
    </div>
@endsection


@section('page-script')
    <script>
        var track_des = {!! !empty($submitCoverage->artistTrack->description) ? json_encode($submitCoverage->artistTrack->description) : null !!};
        if(track_des)
        {
            function seeMoreDes()
            {
                $('#desInfo').empty();
                $('#desInfo').html(track_des);
            }
        }

        var track_pitch = {!! !empty($submitCoverage->artistTrack->pitch_description) ? json_encode($submitCoverage->artistTrack->pitch_description) : null !!};
        if(track_pitch)
        {
            function seeMorePitch()
            {
                $('#pitchInfo').empty();
                $('#pitchInfo').html(track_pitch);
            }
        }

        var preload = document.getElementById("loadings");
        function loader(){
            preload.style.display='none';
        }
        function showLoader(){
            preload.style.display='block';
        }
    </script>
@endsection
