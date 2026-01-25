@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Curator Offer Details')

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
        .cke_notifications_area {
            display: none;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-8 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0 titleColor">Curator Offer Details</h1>
                        <a href="{{ url()->previous() }}"
                           class="btn btn-sm rounded proposition basicbtn">
                            Back</a>
                    </div>
                    <div class="row-col">
                        {{-- LEFT COLUMN --}}
                        <div class="col-sm w w-auto-xs m-b">
                            <div class="item w">
                                <div class="item-media">
                                    <div class="item-media-content">
                                        @php
                                            $mystring = $send_offer->userCurator->profile;
                                            $findhttps   = 'https';
                                            $findhttp   = 'http';
                                            $poshttps = strpos($mystring, $findhttps);
                                            $poshttp = strpos($mystring, $findhttp);
                                            if($poshttps !== false){
                                                $pos = $poshttps;
                                            }else{
                                                $pos = $poshttp;
                                            }
                                        @endphp
                                        @if($pos === false)
                                            @if(!empty($send_offer->userCurator->profile))
                                                <img src="{{URL('/')}}/uploads/profile/{{$send_offer->userCurator->profile}}" alt="" class="profile-image">
                                            @else
                                                <img src="{{asset('images/profile_images_icons.svg')}}" alt="" class="profile-image">
                                            @endif
                                        @elseif($pos == 0)
                                            <img src="{{asset($send_offer->userCurator->profile)}}" alt="" class="profile-image">
                                        @else
                                            <img src="{{asset('images/profile_images_icons.svg')}}" alt="" class="profile-image">
                                        @endif

                                        <img src="{{asset('images/bg_curator_profile.png')}}" alt="" class="background-image">
                                    </div>
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

                        {{-- RIGHT COLUMN --}}
                        <div class="col-sm">
                            <div class="p-l-md no-padding-xs">
                                <div class="page-title">
                                    <h1 class="inline">{{($send_offer->userCurator) ? $send_offer->userCurator->name : ''}}</h1>
                                    @if ($send_offer->userCurator->is_verified == 1)
                                        <img src="{{ asset('images/verified_icon.svg') }}" style="width: 22px;vertical-align: inherit!important;" alt="">
                                    @endif
                                </div>
                                <p class="item-desc text-ellipsis text-muted" data-ui-toggle-class="text-ellipsis">
                                    @if(!empty($send_offer->userCurator->curatorUser->curator_signup_from))
                                        {{Str::upper (ucwords(str_replace("_", " ", $send_offer->userCurator->curatorUser->curator_signup_from)))}}
                                    @endif
                                </p>

                                {{-- RATING BLOCK --}}
                                @php
                                    $avgRating = 0; $totalReviews = 0;
                                    try {
                                        if(isset($send_offer->userCurator) && class_exists('\App\Models\CuratorRating')) {
                                            $ratingsQuery = \App\Models\CuratorRating::where('curator_id', $send_offer->userCurator->id);
                                            $avgRating = $ratingsQuery->avg('rating_stars') ?? 0;
                                            $totalReviews = $ratingsQuery->count();
                                        }
                                    } catch (\Exception $e) {}
                                @endphp

                                <div class="m-b-sm" style="display: flex; align-items: center; gap: 8px;">
                                    <div class="text-warning" style="font-size: 14px;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fa {{ $i <= round($avgRating) ? 'fa-star' : 'fa-star-o' }}"></i>
                                        @endfor
                                    </div>
                                    <span class="font-weight-bold" style="color: #02b875;">{{ number_format($avgRating, 1) }}</span>
                                    <span class="text-muted small">({{ $totalReviews }} {{ Str::plural('review', $totalReviews) }})</span>
                                </div>

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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Send Offer Info --}}
                    <div class="padding p-y-0 m-b-md m-t-3">
                        <div class="page-title m-b">
                            <h4 class="inline m-a-0 update_profile">Send Offer Info</h4>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 form-control-label text-muted">Expiry Date:</div>
                            <div class="col-sm-9">{{!empty($send_offer) ? getDateFormat($send_offer->expiry_date) : '----'}}</div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 form-control-label text-muted">Contribution:</div>
                            <div class="col-sm-9 font-weight-bold" style="color: #02b875;">{{!empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->contribution : 0}} USC</div>
                        </div>
                    </div>

                    {{-- Track Info --}}
                    <div class="padding p-y-0 m-b-md m-t-3">
                        <div class="page-title m-b">
                            <h4 class="inline m-a-0 update_profile">Track Info</h4>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 form-control-label text-muted">Track Name:</div>
                            <div class="col-sm-9">{{ !empty($send_offer->artistTrack) ? $send_offer->artistTrack->name : '----'}}</div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 form-control-label text-muted">Pitch:</div>
                            <div class="col-sm-9 text-muted italic" id="pitchInfo">
                                {{ !empty($send_offer->artistTrack->pitch_description) ? Str::limit($send_offer->artistTrack->pitch_description, 100) : '-----'}}
                                <a href="javascript:void(0)" class="seeMoreBio" onclick="seeMorePitch()">Read more</a>
                            </div>
                        </div>
                    </div>

                    {{-- UPDATED: Accept/Decline Logic --}}
                    <div class="padding text-center m-t-lg">
                        @php $status = strtolower($send_offer->status); @endphp

                       @if($status == 'rejected')
                             <div class="alert alert-danger" style="border-radius: 8px; font-weight: bold;">This Offer has been declined.</div>
                        
                        @elseif($status == 'accepted')
                             <div class="alert alert-info" style="background-color: #e3f2fd; color: #0d47a1; border-radius: 8px; font-weight: bold; border: 1px solid #90caf9;">
                                <i class="fa fa-clock-o"></i> Artist Completed Payment. Awaiting curator completion.
                             </div>

                        @elseif($status == 'delivered')
                            <div class="alert alert-success" style="background-color: #e8f5e9; color: #1b5e20; border-radius: 8px; font-weight: bold; border: 1px solid #a5d6a7;">
                                <i class="fa fa-check-circle"></i> Work has been delivered!
                                <button type="button" class="btn btn-sm btn-primary rounded-pill ml-2" data-toggle="modal" data-target="#rateModal{{$send_offer->id}}">
                                    Rate Curator & Finish
                                </button>
                            </div>
                            @include('partials.rating_modal', ['offer' => $send_offer])

                        @elseif($status == \App\Templates\IOfferTemplateStatus::COMPLETED)
                             <div class="alert alert-success" style="border-radius: 8px; font-weight: bold;">This offer is completed.</div>
                        
                        @else
                            {{-- PENDING STATE --}}
                            <div id="curatorOfferBtn">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#declineOffer" class="btn btn-sm rounded btn-danger m-r-sm">Decline</a>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#confirmPayUSCModal" class="btn btn-sm rounded btn-success">Pay USC</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            @if($send_offer->status == \App\Templates\IOfferTemplateStatus::EXPIRED)
                @include('pages.curators.panels.right-sidebar')
            @else
                @include('pages.chat.right-sidebar-chat')
            @endif
        </div>
    </div>

    @include('pages.artists.artist-offers.modal.modal')

@endsection

@section('page-script')
    <script src="{{asset('app-assets/js/artist/artist.js')}}"></script>
    <script>
        var curator_bio = {!! json_encode($send_offer->userCurator->curatorUser->curator_bio ?? '') !!};
        function seeMoreBio() { $('#bioInfo').html(curator_bio); }

        var track_pitch = {!! json_encode($send_offer->artistTrack->pitch_description ?? '') !!};
        function seeMorePitch() { $('#pitchInfo').html(track_pitch); }

        $('#payUSCOffer').click(function (event) {
            event.preventDefault();
            var send_offer_id = "{!! encrypt(!empty($send_offer) ? $send_offer->id : null) !!}";
            var contribution = $('.UscOfferPay').attr('data-contribution');
            $.ajax({
                type: "POST",
                url: "{{route('artist.offer.pay')}}",
                data:{"_token": "{{ csrf_token() }}", "send_offer_id": send_offer_id, "contribution": contribution},
                success: function (data) {
                    if(data.success) {
                        toastr.success(data.success);
                        window.location = '{{ URL::to('/accepted-offer') }}';
                    }
                    else toastr.error(data.error || data.error_wallet);
                }
            });
        });
    </script>
@endsection
