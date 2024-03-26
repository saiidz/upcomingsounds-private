@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Send Offer Details')

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
        .custom-icon::before {
            content: "";
            background-image: url({{asset('/images/artist_us.png')}});
            width: 22px;
            height: 22px;
            display: inline-block;
            background-size: cover;
            margin-top: 7px;
        }
        .addMoreLinks {
            width: 100% !important;
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
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover; /* Ensure the image covers the container */
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-8 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0">Send Offer Details</h1>
                        <a href="{{ url()->previous() }}"
                           class="btn btn-sm rounded proposition basicbtn">
                            Back</a>
                    </div>
                    <div class="row-col">
                        <div class="col-sm w w-auto-xs m-b">
                            <div class="item w rounded">
                                <div class="item-media">
                                    <div class="item-media-content">
                                        @php
                                            $mystring = $send_offer->userArtist->profile;
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
                                            @if(!empty($send_offer->userArtist->profile))
                                                <img src="{{URL('/')}}/uploads/profile/{{$send_offer->userArtist->profile}}" alt="" class="profile-image">
                                            @else
                                                <img src="{{asset('images/profile_images_icons.svg')}}" alt="" class="profile-image">
                                            @endif
                                        @elseif($pos == 0)
                                            <img src="{{asset($send_offer->userArtist->profile)}}" alt="" class="profile-image">
                                        @else
                                            <img src="{{asset('images/profile_images_icons.svg')}}" alt="" class="profile-image">
                                        @endif

                                        <img src="{{asset('images/bg_curator_profile.png')}}" alt="" class="background-image">
                                    </div>

{{--                                    @php--}}
{{--                                        $mystring = $send_offer->userArtist->profile;--}}
{{--                                        $findhttps   = 'https';--}}
{{--                                        $findhttp   = 'http';--}}
{{--                                        $poshttps = strpos($mystring, $findhttps);--}}

{{--                                        $poshttp = strpos($mystring, $findhttp);--}}
{{--                                        if($poshttps != false){--}}
{{--                                            $pos = $poshttps;--}}
{{--                                        }else{--}}
{{--                                            $pos = $poshttp;--}}
{{--                                        }--}}
{{--                                    @endphp--}}
{{--                                    @if($pos === false)--}}
{{--                                        @if(!empty($send_offer->userArtist->profile))--}}
{{--                                            <div class="item-media-content"--}}
{{--                                                 style="background-image: url({{URL('/')}}/uploads/profile/{{$send_offer->userArtist->profile}});"></div>--}}
{{--                                        @else--}}
{{--                                            <div class="item-media-content"--}}
{{--                                                 style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>--}}
{{--                                        @endif--}}
{{--                                    @elseif($pos == 0)--}}
{{--                                        <div class="item-media-content"--}}
{{--                                             style="background-image: url({{$send_offer->userArtist->profile}});"></div>--}}
{{--                                    @else--}}
{{--                                        <div class="item-media-content"--}}
{{--                                             style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>--}}
{{--                                    @endif--}}

                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="p-l-md no-padding-xs">
                                <div class="page-title">
                                    <h1 class="inline">{{($send_offer->userArtist) ? $send_offer->userArtist->name : ''}}</h1>
                                </div>
                                <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis" style="font-size: 14px;">
                                    @if(!empty($send_offer->userArtist->artistUser->artist_bio))
                                        {{$send_offer->userArtist->artistUser->artist_bio}}
                                    @endif
                                </p>
                                @if(!empty($send_offer->userArtist->artistUser->country))
                                    <div class="block flag_style clearfix m-b">
                                        <img class="flag_icon" src="{{asset('images/flags')}}/{{$send_offer->userArtist->artistUser->country->flag_icon}}.png" alt="{{$send_offer->userArtist->artistUser->country->flag_icon}}">
                                        <span class="text-muted"
                                              style="font-size:15px">{{($send_offer->userArtist->artistUser->country) ? $send_offer->userArtist->artistUser->country->name : ''}}</span>
                                    </div>
                                @endif
                                <div class="row-col m-b" id="socialView_S">
                                    <div class="col-xs">
                                        @if(!empty($send_offer->userArtist->artistUser->instagram_url))
                                            <a href="{{$send_offer->userArtist->artistUser->instagram_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-blue-800"
                                               title="Instagram">
                                                <i class="fa fa-instagram"></i>
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userArtist->artistUser->facebook_url))
                                            <a href="{{$send_offer->userArtist->artistUser->facebook_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored indigo"
                                               title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userArtist->artistUser->spotify_url))
                                            <a href="{{$send_offer->userArtist->artistUser->spotify_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-green-500"
                                               title="Spotify">
                                                <i class="fa fa-spotify"></i>
                                                <i class="fa fa-spotify"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userArtist->artistUser->soundcloud_url))
                                            <a href="{{$send_offer->userArtist->artistUser->soundcloud_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored orange-700"
                                               title="SoundCloud">
                                                <i class="fa fa-soundcloud"></i>
                                                <i class="fa fa-soundcloud"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userArtist->artistUser->youtube_url))
                                            <a href="{{$send_offer->userArtist->artistUser->youtube_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored red-600"
                                               title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userArtist->artistUser->website_url))
                                            <a href="{{$send_offer->userArtist->artistUser->website_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Website">
                                                <i class="fa fa-link"></i>
                                                <i class="fa fa-link"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userArtist->artistUser->deezer_url))
                                            <a href="{{$send_offer->userArtist->artistUser->deezer_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#eb9d00;" title="Deezer">
                                                <i class="fab fa-deezer"></i>
                                                <i class="fab fa-deezer"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userArtist->artistUser->bandcamp_url))
                                            <a href="{{$send_offer->userArtist->artistUser->bandcamp_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Bandcamp">
                                                <i class="fa fa-bandcamp"></i>
                                                <i class="fa fa-bandcamp"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userArtist->artistUser->tiktok_url))
                                            <a href="{{$send_offer->userArtist->artistUser->tiktok_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Tiktok">
                                                <i class="fab fa-tiktok"></i>
                                                <i class="fab fa-tiktok"></i>
                                            </a>
                                        @endif
                                        @if($send_offer->userArtist->is_public_profile == 1)
                                            <a href="{{route('artist.public.profile',$send_offer->userArtist->name)}}" target="_blank" id="Public_Profile"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333 !important;" title="Public Profile">
                                                <i class="custom-icon"></i>
                                                <i class="custom-icon"></i>
                                            </a>
                                        @else
                                            <a href="{{route('artist.public.profile',$send_offer->userArtist->name)}}" target="_blank" id="Public_Profile"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333 !important; display:none;" title="Public Profile">
                                                <i class="custom-icon"></i>
                                                <i class="custom-icon"></i>
                                            </a>
                                        @endif
                                    </div>
                                {{--View Submission  --}}
                                    <a href="javascript:void(0)" onclick="openNav({{!empty($send_offer->campaign) ? $send_offer->campaign->id : null}},'{{ \App\Templates\IMessageTemplates::VIEW_SUBMISSION }}')"
                                       class="btn btn-sm rounded proposition basicbtn">
                                        View Submission</a>
                                {{--View Submission  --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="padding p-y-0 m-b-md m-t-3">
                        <div class="page-title m-b">
                            <h4 class="inline m-a-0 update_profile">Send Offer Info</h4>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Expiry Date:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($send_offer) ? getDateFormat($send_offer->expiry_date) : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Approximate Publish Date:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($send_offer) ? getDateFormat($send_offer->publish_date) : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Offer Status:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">
                                    @if($send_offer->status == \App\Templates\IOfferTemplateStatus::PENDING)
                                        <span class="text-danger">{{$send_offer->status}}</span>
                                    @elseif($send_offer->status == \App\Templates\IOfferTemplateStatus::REJECTED)
                                        <span class="text-danger">{{$send_offer->status}}</span>
                                    @elseif($send_offer->status == \App\Templates\IOfferTemplateStatus::EXPIRED)
                                        <span class="text-danger">{{$send_offer->status}}</span>
                                    @else
                                        <span class="text-primary">{{$send_offer->status}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Offer Type:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->title : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Contribution:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->contribution : 0}} USC</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Offer Type:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->offerType->name : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Alternative Option:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->alternativeOption->name : '----'}}</div>
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
                                    class="col-sm-3 form-control-label text-muted">{{ !empty($send_offer->artistTrack) ? $send_offer->artistTrack->name : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Release Type:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{ !empty($send_offer->artistTrack) ? Str::ucfirst($send_offer->artistTrack->audio_cover) .' '. Str::ucfirst($send_offer->artistTrack->release_type)  : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Release Date:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{ !empty($send_offer->artistTrack) ? getDateFormat($send_offer->artistTrack->release_date) : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Description:</div>
                            <div class="col-sm-9">
                                <div class="col-sm-12 form-control-label text-muted">
                                    <div id="desInfo">
                                        {{ !empty($send_offer->artistTrack->description) ? Str::limit($send_offer->artistTrack->description, 100) : '-----'}}
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
                                        {{ !empty($send_offer->artistTrack->pitch_description) ? Str::limit($send_offer->artistTrack->pitch_description, 100) : '-----'}}
                                        <a href="javascript:void(0)" class="seeMoreBio" onclick="seeMorePitch()">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(!empty($send_offer->artistTrack->track_thumbnail))
                        <div class="padding p-y-0 m-b-md m-t-3">
                            <div class="page-title m-b">
                                <h4 class="inline m-a-0 update_profile">Artist Track Thumbnail</h4>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 form-control-label">
                                    <a href="{{URL('/')}}/uploads/track_thumbnail/{{$send_offer->artistTrack->track_thumbnail}}" target="_blank" style="float:left !important;">
                                        <img src="{{URL('/')}}/uploads/track_thumbnail/{{$send_offer->artistTrack->track_thumbnail}}" style="height: 255px;width: 380px">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(!empty($send_offer->artistTrack->artistTrackImages) && (count($send_offer->artistTrack->artistTrackImages) > 0))
                        <div class="padding p-y-0 m-b-md m-t-3">
                            <div class="page-title m-b">
                                <h4 class="inline m-a-0 update_profile">Artist Track Document</h4>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 form-control-label">
                                    @foreach($send_offer->artistTrack->artistTrackImages as $path)
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

                    <div class="padding p-y-0 m-b-md m-t-3">
                        <div class="page-title m-b">
                            <h4 class="inline m-a-0 update_profile">Offer Description</h4>
                        </div>
                        <div class="form-group row">
                            <div
                                class="col-sm-12 form-control-label text-muted">{!! !empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->offer_text : '----' !!}</div>
                        </div>
                    </div>

                    @if(!empty($send_offer) && $send_offer->status == \App\Templates\IOfferTemplateStatus::REJECTED)
                        <div class="row">
                            <div class="col-sm-12 text-muted">
                                <h4 style="color:#ED4F32 !important; text-align:center">This offer was declined by the artist.</h4>
                            </div>
                        </div>
                        <div class="padding p-y-0 m-b-md m-t-3">
                            <div class="page-title m-b">
                                <h4 class="inline m-a-0 update_profile">Decline Message</h4>
                            </div>
                            <div class="form-group row">
                                <div
                                    class="col-sm-12 form-control-label text-muted" style="color:#ED4F32 !important;">{{ !empty($send_offer->offer_check) ? $send_offer->offer_check : '----' }}</div>
                            </div>
                            <div class="form-group row">
                                <div
                                    class="col-sm-12 form-control-label text-muted" style="color:#ED4F32 !important;">{!! !empty($send_offer->message) ? $send_offer->message : '----' !!}</div>
                            </div>
                        </div>
                    @elseif(!empty($send_offer) && $send_offer->status == \App\Templates\IOfferTemplateStatus::ALTERNATIVE)
                        <div class="row">
                            <div class="col-sm-12 text-muted">
                                <h4 style="color:#ED4F32 !important; text-align:center">This offer was free alternative by the artist.</h4>
                            </div>
                        </div>
                        <div class="padding p-y-0 m-b-md m-t-3">
                            <div class="page-title m-b">
                                <h4 class="inline m-a-0 update_profile">Free Alternative Message</h4>
                            </div>
                            <div class="form-group row">
                                <div
                                    class="col-sm-12 form-control-label text-muted" style="color:#ED4F32 !important;">{{ !empty($send_offer->offer_check) ? $send_offer->offer_check : '----' }}</div>
                            </div>
                            <div class="form-group row">
                                <div
                                    class="col-sm-12 form-control-label text-muted" style="color:#ED4F32 !important;">{!! !empty($send_offer->message) ? $send_offer->message : '----' !!}</div>
                            </div>
                            <div class="" id="curatorOfferBtn">
                                <a href="javascript:void(0)" data-toggle="modal"
                                   data-target="#completeWorkAlternativeOffer" class="btn btn-sm rounded add_track">
                                    Complete Work</a>
                            </div>
                        </div>
                    @elseif(!empty($send_offer) && $send_offer->status == \App\Templates\IOfferTemplateStatus::ACCEPTED)
                        @if(!empty($send_offer->submitWork))
                            <div class="row">
                                <div class="col-sm-12 text-muted">
                                    <h4 style="color:#02b875 !important; text-align:center">Submit Work successfully. Please wait for approval from admin side.</h4>
                                </div>
                            </div>
                        @else
                            <div class="row">
                                <div class="col-sm-12 text-muted">
                                    <h4 style="color:#02b875 !important; text-align:center">This offer has been approved by the artist.</h4>
                                </div>
                            </div>
                            <div class="" id="curatorOfferBtn">
                                <a href="javascript:void(0)" data-toggle="modal"
                                   data-target="#submitWorkOffer" class="btn btn-sm rounded add_track">
                                    Submit Work</a>
                            </div>
                        @endif
                    @elseif(!empty($send_offer) && $send_offer->status == \App\Templates\IOfferTemplateStatus::COMPLETED)
                        <div class="row">
                            <div class="col-sm-12 text-muted">
                                <h4 style="color:#02b875 !important; text-align:center">This offer is completed.</h4>
                            </div>
                        </div>
                        @if(!empty($send_offer->submitWork))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="padding p-y-0 m-b-md m-t-3">
                                        <div class="page-title m-b">
                                            <h4 class="inline m-a-0 update_profile">View Submit Work</h4>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 form-control-label">
                                                @if(!empty($send_offer->submitWork->submitWorkLinks))
                                                    @foreach($send_offer->submitWork->submitWorkLinks as $link)
                                                        <a href="{{$link->link}}" target="_blank" style="float:left !important;"
                                                           class="btn btn-sm rounded add_track">
                                                            View Completed Work</a>
                                                    @endforeach
                                                @endif
                                                @if(!empty($send_offer->campaign))
                                                    <a href="javascript:void(0)" class="btn btn-sm rounded add_track" style="float:left !important;" onclick="openNav({{$send_offer->campaign->id}},'{{ \App\Templates\IMessageTemplates::MAKE_ANOTHER_OFFER}}')">
                                                        Make Another Offer
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="padding p-y-0 m-b-md m-t-3">
                                        <div class="form-group row">
                                            <div class="col-sm-12 form-control-label">
                                                @if(!empty($send_offer->submitWork->submitWorkImages))
                                                    @foreach($send_offer->submitWork->submitWorkImages as $image)
                                                        <div class="" id="">
                                                            <a href="{{asset('uploads/submit_work_images')}}/{{$image->path}}" target="_blank" style="float:left !important;"
                                                               class="btn btn-sm">
                                                                <img src="{{asset('uploads/submit_work_images')}}/{{$image->path}}" alt="" style="height: 50px;">
                                                            </a>
                                                        </div>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif


{{--                        @if(!empty($send_offer->campaign))--}}
{{--                            <div class="row">--}}
{{--                                <div class="col-sm-12">--}}
{{--                                    <div class="padding p-y-0 m-b-md m-t-3">--}}
{{--                                        <div class="page-title m-b">--}}
{{--                                            <h4 class="inline m-a-0 update_profile">Make Another Offer</h4>--}}
{{--                                        </div>--}}
{{--                                        <div class="form-group row">--}}
{{--                                            <div class="col-sm-12 form-control-label">--}}
{{--                                                <a href="javascript:void(0)" class="btn btn-sm rounded add_track" style="float:left !important;" onclick="openNav({{$send_offer->campaign->id}},'{{ \App\Templates\IMessageTemplates::MAKE_ANOTHER_OFFER}}')">--}}
{{--                                                    Make Another Offer--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}
                    @elseif(!empty($send_offer) && $send_offer->status == \App\Templates\IOfferTemplateStatus::EXPIRED)
                        <div class="row">
                            <div class="col-sm-12 text-muted">
                                <h4 style="color:#ED4F32 !important; text-align:center">This offer is Expired.</h4>
                            </div>
                        </div>
                    @else

                    @endif
                </div>
            </div>
            @if($send_offer->status == \App\Templates\IOfferTemplateStatus::EXPIRED)
                @include('pages.curators.panels.right-sidebar')
            @else
                @include('pages.chat.right-sidebar-chat')
            @endif
        </div>
    </div>

    <!-- ############ PAGE END-->
    @include('pages.curators.curator-offers.submit-wok-modal')
@endsection


@section('page-script')
    <script>
        var track_des = {!! !empty($send_offer->artistTrack->description) ? json_encode($send_offer->artistTrack->description) : null !!};
        if(track_des)
        {
            function seeMoreDes()
            {
                $('#desInfo').empty();
                $('#desInfo').html(track_des);
            }
        }

        var track_pitch = {!! !empty($send_offer->artistTrack->pitch_description) ? json_encode($send_offer->artistTrack->pitch_description) : null !!};
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
    <script>
        function openNav(campaign_id, request) {
            showLoader();
            //send ajax
            $.ajax({
                type: "GET",
                url: '{{route('get.active.campaign')}}',
                data: {campaign_id:campaign_id},
                dataType: 'json',
                success: function (data) {
                    loader();
                    if (data.success) {
                        // view submission
                        if(request === "view_submission")
                        {
                            $('#campaignAddRemove').empty();
                            $('#campaignAddRemove').html(data.campaign);
                            $('#campaign_ID').val(data.campaign_id);
                            $('.campaignBtn').remove();
                            $('#mySidebarCollapsed').addClass('mySidebarCollapsed');
                            // document.getElementById("mySidebarCollapsed").style.width = "490px";
                            document.getElementById("app-body").style.marginLeft = "490px";
                        }
                        // make another offer
                        if(request === "make_another_offer")
                        {
                            $('#campaignAddRemove').empty();
                            $('#campaignAddRemove').html(data.campaign);
                            $('#campaign_ID').val(data.campaign_id);
                            $('#mySidebarCollapsedShowHide').remove();
                            $('#backToOverview').css('display','none');
                            $('#templateCollapsedShowHide').css('display','block');

                            $('#mySidebarCollapsed').addClass('mySidebarCollapsed');
                            // document.getElementById("mySidebarCollapsed").style.width = "490px";
                            document.getElementById("app-body").style.marginLeft = "490px";
                        }

                    }
                    if (data.error) {
                        toastr.error(data.error);
                    }
                },
            });
        }

        function closeNav() {
            $('#mySidebarCollapsed').addClass('mySidebarCollapsedRemove');
            // document.getElementById("mySidebarCollapsed").style.width = "0";
            document.getElementById("app-body").style.marginLeft= "0";
        }
    </script>
    <script type="text/javascript">



        $(document).ready(function(){

            var counter = 2;

            $("#addLinkButton").click(function () {

                if(counter>5){
                    alert("Only 5 Links allow");
                    return false;
                }

                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter);

                newTextBoxDiv.after().html('<div class="col-sm-12 m-b"> <div class="addEmbeded"><div class="addMoreLinks"><input type="text" class="form-control moreLinks" name="completion_url[]" id="textbox' + counter + '" value="" placeholder="Please Add Completion Url"></div></div></div>');

                newTextBoxDiv.appendTo("#TextBoxesGroup");


                counter++;
            });

            $("#removeButton").click(function () {
                if(counter==2){
                    alert("No more textbox to remove");
                    return false;
                }

                counter--;

                $("#TextBoxDiv" + counter).remove();

            });

        });
    </script>
@endsection
