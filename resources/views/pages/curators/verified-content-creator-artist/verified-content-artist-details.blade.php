@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Verified Content Artist Details')

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
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-8 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0">Verified Content Artist Details</h1>
                        <a href="{{ url()->previous() }}"
                           class="btn btn-sm rounded proposition basicbtn">
                            Back</a>
                    </div>
                    <div class="row-col">
                        <div class="col-sm w w-auto-xs m-b">
                            <div class="item w rounded">
                                <div class="item-media">
                                    @php
                                        $mystring = $verified_content_creator->artistUser->profile;
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
                                        @if(!empty($verified_content_creator->artistUser->profile))
                                            <div class="item-media-content"
                                                 style="background-image: url({{URL('/')}}/uploads/profile/{{$verified_content_creator->artistUser->profile}});"></div>
                                        @else
                                            <div class="item-media-content"
                                                 style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                        @endif
                                    @elseif($pos == 0)
                                        <div class="item-media-content"
                                             style="background-image: url({{$verified_content_creator->artistUser->profile}});"></div>
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
                                    <h1 class="inline">{{($verified_content_creator->artistUser) ? $verified_content_creator->artistUser->name : ''}}</h1>
                                </div>
                                <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis" style="font-size: 14px;">
                                    @if(!empty($verified_content_creator->artistUser->artistUser->artist_bio))
                                        {{$verified_content_creator->artistUser->artistUser->artist_bio}}
                                    @endif
                                </p>
                                @if(!empty($verified_content_creator->artistUser->artistUser->country))
                                    <div class="block flag_style clearfix m-b">
                                        <img class="flag_icon" src="{{asset('images/flags')}}/{{$verified_content_creator->artistUser->artistUser->country->flag_icon}}.png" alt="{{$verified_content_creator->artistUser->artistUser->country->flag_icon}}">
                                        <span class="text-muted"
                                              style="font-size:15px">{{($verified_content_creator->artistUser->artistUser->country) ? $verified_content_creator->artistUser->artistUser->country->name : ''}}</span>
                                    </div>
                                @endif
                                <div class="row-col m-b" id="socialView_S">
                                    <div class="col-xs">
                                        @if(!empty($verified_content_creator->artistUser->artistUser->instagram_url))
                                            <a href="{{$verified_content_creator->artistUser->artistUser->instagram_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-blue-800"
                                               title="Instagram">
                                                <i class="fa fa-instagram"></i>
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verified_content_creator->artistUser->artistUser->facebook_url))
                                            <a href="{{$verified_content_creator->artistUser->artistUser->facebook_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored indigo"
                                               title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verified_content_creator->artistUser->artistUser->spotify_url))
                                            <a href="{{$verified_content_creator->artistUser->artistUser->spotify_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored light-green-500"
                                               title="Spotify">
                                                <i class="fa fa-spotify"></i>
                                                <i class="fa fa-spotify"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verified_content_creator->artistUser->artistUser->soundcloud_url))
                                            <a href="{{$verified_content_creator->artistUser->artistUser->soundcloud_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored orange-700"
                                               title="SoundCloud">
                                                <i class="fa fa-soundcloud"></i>
                                                <i class="fa fa-soundcloud"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verified_content_creator->artistUser->artistUser->youtube_url))
                                            <a href="{{$verified_content_creator->artistUser->artistUser->youtube_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored red-600"
                                               title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verified_content_creator->artistUser->artistUser->website_url))
                                            <a href="{{$verified_content_creator->artistUser->artistUser->website_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Website">
                                                <i class="fa fa-link"></i>
                                                <i class="fa fa-link"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verified_content_creator->artistUser->artistUser->deezer_url))
                                            <a href="{{$verified_content_creator->artistUser->artistUser->deezer_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#eb9d00;" title="Deezer">
                                                <i class="fab fa-deezer"></i>
                                                <i class="fab fa-deezer"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verified_content_creator->artistUser->artistUser->bandcamp_url))
                                            <a href="{{$verified_content_creator->artistUser->artistUser->bandcamp_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Bandcamp">
                                                <i class="fa fa-bandcamp"></i>
                                                <i class="fa fa-bandcamp"></i>
                                            </a>
                                        @endif
                                        @if(!empty($verified_content_creator->artistUser->artistUser->tiktok_url))
                                            <a href="{{$verified_content_creator->artistUser->artistUser->tiktok_url}}" target="_blank"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333;" title="Tiktok">
                                                <i class="fab fa-tiktok"></i>
                                                <i class="fab fa-tiktok"></i>
                                            </a>
                                        @endif
                                        @if($verified_content_creator->artistUser->is_public_profile == 1)
                                            <a href="{{route('artist.public.profile',$verified_content_creator->artistUser->name)}}" target="_blank" id="Public_Profile"
                                               class="btn btn-icon btn-social rounded btn-social-colored"
                                               style="background-color:#333 !important;" title="Public Profile">
                                                <i class="custom-icon"></i>
                                                <i class="custom-icon"></i>
                                            </a>
                                        @else
                                            <a href="{{route('artist.public.profile',$verified_content_creator->artistUser->name)}}" target="_blank" id="Public_Profile"
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
                            <h4 class="inline m-a-0 update_profile">Verified Coverage Info</h4>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Created Date:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($verified_content_creator->created_at) ? getDateFormat($verified_content_creator->created_at) : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Status:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">
                                    @if($verified_content_creator->pay_now == 'yes')
                                        <span class="text-primary">{{__('PAID')}}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Contribution:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($verified_content_creator->verifiedCoverage->contribution) ? $verified_content_creator->verifiedCoverage->contribution : 0}} USC</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Offer Type:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($verified_content_creator->verifiedCoverage->offerType->name) ? $verified_content_creator->verifiedCoverage->offerType->name : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Time To Publish:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{!empty($verified_content_creator->verifiedCoverage->time_to_publish) ? $verified_content_creator->verifiedCoverage->time_to_publish . ' days for coverage' : '----'}}</div>
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
                                    class="col-sm-3 form-control-label text-muted">{{ !empty($verified_content_creator->artistTrack) ? $verified_content_creator->artistTrack->name : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Release Type:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{ !empty($verified_content_creator->artistTrack) ? Str::ucfirst($verified_content_creator->artistTrack->audio_cover) .' '. Str::ucfirst($verified_content_creator->artistTrack->release_type)  : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Release Date:</div>
                            <div class="col-sm-9">
                                <div
                                    class="col-sm-3 form-control-label text-muted">{{ !empty($verified_content_creator->artistTrack) ? getDateFormat($verified_content_creator->artistTrack->release_date) : '----'}}</div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-2 form-control-label">Description:</div>
                            <div class="col-sm-9">
                                <div class="col-sm-12 form-control-label text-muted">
                                    <div id="desInfo">
                                        {{ !empty($verified_content_creator->artistTrack->description) ? Str::limit($verified_content_creator->artistTrack->description, 100) : '-----'}}
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
                                        {{ !empty($verified_content_creator->artistTrack->pitch_description) ? Str::limit($verified_content_creator->artistTrack->pitch_description, 100) : '-----'}}
                                        <a href="javascript:void(0)" class="seeMoreBio" onclick="seeMorePitch()">Read more</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @if(!empty($verified_content_creator->artistTrack) && count($verified_content_creator->artistTrack->artistTrackLanguages) > 0)
                            <div class="form-group row">
                                <div class="col-sm-2 form-control-label">Track Languages:</div>
                                <div class="col-sm-9">
                                    <div class="col-sm-12 form-control-label text-muted">
                                        @foreach($verified_content_creator->artistTrack->artistTrackLanguages as $language)
                                            <span class="btn btn-xs white campaignTag">{{$language->language->name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                        @if(!empty($verified_content_creator->artistTrack->artistTrackTags))
                            <div class="form-group row">
                                <div class="col-sm-2 form-control-label">Genres:</div>
                                <div class="col-sm-9">
                                    <div class="col-sm-12 form-control-label text-muted">
                                        @foreach($verified_content_creator->artistTrack->artistTrackTags as $tag)
                                            <span class="btn btn-xs white campaignTag">{{$tag->curatorFeatureTag->name}}</span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endif

                    </div>

                    @if(!empty($verified_content_creator->artistTrack->track_thumbnail))
                        <div class="padding p-y-0 m-b-md m-t-3">
                            <div class="page-title m-b">
                                <h4 class="inline m-a-0 update_profile">Artist Track Thumbnail</h4>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 form-control-label">
                                    <a href="{{URL('/')}}/uploads/track_thumbnail/{{$verified_content_creator->artistTrack->track_thumbnail}}" target="_blank" style="float:left !important;">
                                        <img src="{{URL('/')}}/uploads/track_thumbnail/{{$verified_content_creator->artistTrack->track_thumbnail}}" style="height: 255px;width: 380px">
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(!empty($verified_content_creator->artistTrack->artistTrackImages) && (count($verified_content_creator->artistTrack->artistTrackImages) > 0))
                        <div class="padding p-y-0 m-b-md m-t-3">
                            <div class="page-title m-b">
                                <h4 class="inline m-a-0 update_profile">Artist Track Document</h4>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12 form-control-label">
                                    @foreach($verified_content_creator->artistTrack->artistTrackImages as $path)
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

                    @if(count($verified_content_creator->artistTrack->artistTrackLinks) > 0)
                        <div class="padding p-y-0 m-b-md m-t-3">
                            <div class="page-title m-b">
                                <h4 class="inline m-a-0 update_profile">Artist Track Links</h4>
                            </div>
                            <div class="form-group row">
                                @foreach($verified_content_creator->artistTrack->artistTrackLinks as $link)
                                    @if(!empty($link->link))
                                        <div class="col-sm-6 form-control-label">
                                            @php
                                                echo $link->link;
                                            @endphp
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    @endif

                    {{-- Submit Work  --}}
                    @if(!empty($verified_content_creator->pendingVerifiedCoverageSubmitWork))
                        <div class="row">
                            <div class="col-sm-12 text-muted">
                                <h4 style="color:#02b875 !important; text-align:center">Submit Work successfully. Please wait for approval from admin side.</h4>
                            </div>
                        </div>
                    @elseif(!empty($verified_content_creator) && !empty($verified_content_creator->verifiedCoverageSubmitWork))
                        <div class="row">
                            <div class="col-sm-12 text-muted">
                                <h4 style="color:#02b875 !important; text-align:center">This Verified Content is completed.</h4>
                            </div>
                        </div>
                        @if(!empty($verified_content_creator->verifiedCoverageSubmitWork))
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="padding p-y-0 m-b-md m-t-3">
                                        <div class="page-title m-b">
                                            <h4 class="inline m-a-0 update_profile">View Submit Work</h4>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-12 form-control-label">
                                                @if(!empty($verified_content_creator->verifiedCoverageSubmitWork->VerifiedCoverageSubmitWorkLinks))
                                                    @foreach($verified_content_creator->verifiedCoverageSubmitWork->VerifiedCoverageSubmitWorkLinks as $link)
                                                        <a href="{{$link->link}}" target="_blank" style="float:left !important;"
                                                           class="btn btn-sm rounded add_track">
                                                            View Completed Work</a>
                                                    @endforeach
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
                                                @if(!empty($verified_content_creator->verifiedCoverageSubmitWork->verifiedCoverageSubmitWorkImages))
                                                    @foreach($verified_content_creator->verifiedCoverageSubmitWork->verifiedCoverageSubmitWorkImages as $image)
                                                        <div class="" id="">
                                                            <a href="{{asset('uploads/vc_submit_work_images')}}/{{$image->path}}" target="_blank" style="float:left !important;"
                                                               class="btn btn-sm">
                                                                <img src="{{asset('uploads/vc_submit_work_images')}}/{{$image->path}}" alt="" style="height: 50px;">
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
                    @else
                        <div class="" id="curatorOfferBtn">
                            <a href="javascript:void(0)" data-toggle="modal"
                               data-target="#submitWorkVC" class="btn btn-sm rounded add_track">
                                Submit Work</a>
                        </div>
                    @endif

                    {{-- Submit Work  --}}
                </div>
            </div>
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
    @include('pages.curators.verified-content-creator-artist.submit-wok-modal')
@endsection


@section('page-script')
    <script src="{{asset('app-assets/js/artist/artist.js')}}"></script>
    <script type="text/javascript">



        $(document).ready(function(){

            var counter = 2;

            $("#addLinkButton").click(function () {

                if(counter>5)
                {
                    toastr.error('Only 5 Links allow');
                    // alert("Only 5 Links allow");
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
                    toastr.error('No more textbox to remove');
                    // alert("No more textbox to remove");
                    return false;
                }

                counter--;

                $("#TextBoxDiv" + counter).remove();

            });

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

        var curator_bio = {!! json_encode($verified_content_creator->userCurator->curatorUser->curator_bio) !!};
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

                var seeText = $('.seeMoreBio').html();
                if(seeText === 'See Less')
                {
                    $('.seeMoreBio').html('See More');
                    $('#bioInfo').html('{{ Str::limit($verified_content_creator->userCurator->curatorUser->curator_bio, 50) }}');
                }else if(seeText === 'See More'){
                    $('.seeMoreBio').html('See Less');
                }
            }
        }

        var track_des = {!! !empty($verified_content_creator->artistTrack->description) ? json_encode($verified_content_creator->artistTrack->description) : null !!};
        if(track_des)
        {
            function seeMoreDes()
            {
                $('#desInfo').empty();
                $('#desInfo').html(track_des);
            }
        }

        var track_pitch = {!! !empty($verified_content_creator->artistTrack->pitch_description) ? json_encode($verified_content_creator->artistTrack->pitch_description) : null !!};
        if(track_pitch)
        {
            function seeMorePitch()
            {
                $('#pitchInfo').empty();
                $('#pitchInfo').html(track_pitch);
            }
        }
    </script>
    <script>
        $('#payUSCOffer').click(function (event) {
            event.preventDefault();
            var send_offer_id = "{!! encrypt(!empty($verified_content_creator) ? $verified_content_creator->id : null) !!}";
            var contribution = $('.UscOfferPay').attr('data-contribution');
            var url= "{{route('artist.offer.pay')}}";
            showLoader()
            $.ajax({
                type: "POST",
                url: url,
                data:{
                    "_token": "{{ csrf_token() }}",
                    "send_offer_id": send_offer_id,
                    "contribution": contribution,
                },
                success: function (data) {
                    loader();
                    if(data.success){
                        toastr.success(data.success);
                        window.location = '{{ URL::to('/accepted-offer') }}';
                    }
                    if (data.error_wallet) {
                        toastr.error(data.error_wallet);
                        window.open('{{ URL::to('/wallet') }}', '_blank');
                    }
                    if(data.error){
                        toastr.error(data.error)
                    }
                }
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
    </script>
@endsection
