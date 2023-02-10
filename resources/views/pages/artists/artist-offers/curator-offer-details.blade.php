@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Curator Offer Details')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/curator-dashboard.css') }}">
    <link rel="stylesheet" href="{{asset('css/custom/custom.css')}}" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        .form-control-label{
            font-size:15px;
        }
        .update_profile{
            font-size:17px !important;
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
                        <h1 class="inline m-a-0">Curator Offer Details</h1>
                        <a href="{{ url()->previous() }}"
                           class="btn btn-sm rounded proposition basicbtn">
                            Back</a>
                    </div>
                    <div class="row-col">
                        <div class="col-sm w w-auto-xs m-b">
                            <div class="item w rounded">
                                <div class="item-media">
                                    @php
                                        $mystring = $send_offer->userCurator->profile;
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
                                        @if(!empty($send_offer->userCurator->profile))
                                            <div class="item-media-content" id="upload_profile"
                                                 style="background-image: url({{URL('/')}}/uploads/profile/{{$send_offer->userCurator->profile}});"></div>
                                        @else
                                            <div class="item-media-content" id="upload_profile"
                                                 style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                        @endif
                                    @elseif($pos == 0)
                                        <div class="item-media-content" id="upload_profile"
                                             style="background-image: url({{$send_offer->userCurator->profile}});"></div>
                                    @else
                                        <div class="item-media-content" id="upload_profile"
                                             style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                    @endif
                                </div>
                            </div>
                            <div>
                                @if (!empty($send_offer->userCurator->curatorUser->curator_bio))
                                    <div class="page-title m-b">
                                        <h4 class="inline m-a-0 biO">Bio</h4>
                                    </div>
                                    <p id="bioInfo" class="text-muted">{{Str::limit($send_offer->userCurator->curatorUser->curator_bio, 50)}}</p>
                                    <a href="javascript:void(0)" class="seeMoreBio" onclick="seeMoreBio()">See more</a>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm">
                            <div class="p-l-md no-padding-xs">
                                <div class="page-title">
                                    <h1 class="inline">{{($send_offer->userCurator) ? $send_offer->userCurator->name : ''}}</h1>
                                    @if ($send_offer->userCurator->is_verified == 1)
                                        <img src="{{ asset('images/verified_icon.svg') }}" style="width: 22px;" alt="">
                                    @endif
                                </div>
                                <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">
                                    @if(!empty($send_offer->userCurator->curatorUser->curator_signup_from))
                                        {{Str::upper ($send_offer->userCurator->curatorUser->curator_signup_from)}}
                                    @endif
                                </p>
                                @if(!empty($send_offer->userCurator->curatorUser->country))
                                    <div class="block flag_style clearfix m-b">
                                        <img class="flag_icon" src="{{asset('images/flags')}}/{{$send_offer->userCurator->curatorUser->country->flag_icon}}.png" alt="{{$send_offer->userCurator->curatorUser->country->flag_icon}}">
                                        <span class="text-muted"
                                              style="font-size:15px">{{($send_offer->userCurator->curatorUser->country) ? $send_offer->userCurator->curatorUser->country->name : ''}}</span>
                                    </div>
                                @endif
                                <div class="row-col m-b" id="socialView_S">
                                    <div class="col-xs">
                                        @if(!empty($send_offer->userCurator->curatorUser->instagram_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->instagram_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-blue-800"
                                               title="Instagram">
                                                <i class="fa fa-instagram"></i>
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userCurator->curatorUser->facebook_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->facebook_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored indigo"
                                               title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userCurator->curatorUser->spotify_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->spotify_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-green-500"
                                               title="Spotify">
                                                <i class="fa fa-spotify"></i>
                                                <i class="fa fa-spotify"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userCurator->curatorUser->soundcloud_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->soundcloud_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored orange-700"
                                               title="SoundCloud">
                                                <i class="fa fa-soundcloud"></i>
                                                <i class="fa fa-soundcloud"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userCurator->curatorUser->youtube_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->youtube_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored red-600"
                                               title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userCurator->curatorUser->website_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->website_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Website">
                                                <i class="fa fa-link"></i>
                                                <i class="fa fa-link"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userCurator->curatorUser->deezer_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->deezer_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#eb9d00;" title="Deezer">
                                                <i class="fab fa-deezer"></i>
                                                <i class="fab fa-deezer"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userCurator->curatorUser->apple_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->apple_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Bandcamp">
                                                <i class="fa fa-apple"></i>
                                                <i class="fa fa-apple"></i>
                                            </a>
                                        @endif
                                        @if(!empty($send_offer->userCurator->curatorUser->tiktok_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->tiktok_url}}" target="_blank"
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
                            <div class="col-sm-2 form-control-label">Status:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">
                                    @if($send_offer->status == \App\Templates\IOfferTemplateStatus::PENDING)
                                        <span class="text-danger">{{$send_offer->status}}</span>
                                    @else
                                        <span class="text-primary">{{$send_offer->status}}</span>
                                    @endif
                                </div>
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
                            <h4 class="inline m-a-0 update_profile">Track Info</h4>
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
                                <div
                                    class="col-sm-12 form-control-label text-muted">{{ !empty($send_offer->artistTrack->description) ? $send_offer->artistTrack->description : '-----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Pitch:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-12 form-control-label text-muted">{{ !empty($send_offer->artistTrack->pitch_description) ? $send_offer->artistTrack->pitch_description : '-----'}}</div>
                            </div>
                        </div>
                    </div>

                    <div class="padding p-y-0 m-b-md m-t-3">
                        <div class="page-title m-b">
                            <h4 class="inline m-a-0 update_profile">Offer Description</h4>
                        </div>
                        <div class="form-group row">
                            <div
                                class="col-sm-12 form-control-label text-muted">{!! !empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->offer_text : '----' !!}</div>
                        </div>
                    </div>
                    <div class="" id="curatorOfferBtn">
                        <a href="javascript:void(0)"  class="btn btn-sm rounded add_track decLine" style="background-color: #ED4F32 !important; ">
                            Decline</a>
                        <a href="javascript:void(0)"  class="btn btn-sm rounded add_track ">
                            Choose Free Alternative</a>
                        <a href="javascript:void(0)"  class="btn btn-sm rounded add_track ">
                            Pay {{!empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->contribution : 0}} USC</a>
                    </div>
                </div>
            </div>
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
@endsection


@section('page-script')
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

        var curator_bio = {!! json_encode($send_offer->userCurator->curatorUser->curator_bio) !!};
        if(curator_bio)
        {
            // var counter = 0
            function seeMoreBio()
            {
                // counter += 1
                // if(counter == 2)
                // {
                //     $('#bioInfo').empty();
                //     $('#bioInfo').text(curator_bio.substring(0,50) + '.....');
                //     // $('#bioInfo').html(curator_bio);
                // }
                $('#bioInfo').empty();
                $('#bioInfo').html(curator_bio);
            }
        }
    </script>
@endsection
