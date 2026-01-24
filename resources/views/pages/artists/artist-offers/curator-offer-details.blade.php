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
        .profile-image {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            height: 100%;
            border-radius: 50%;
            z-index: 2;
        }
        .background-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: 1;
        }
        /* Ensures the Rating and categories align perfectly */
        .curator-stats-row {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-top: 5px;
            margin-bottom: 10px;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-8 b-r no-border-md">
                <div class="padding">
                    {{-- Header Row --}}
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0 titleColor">Curator Offer Details</h1>
                        <a href="{{ url()->previous() }}" class="btn btn-sm rounded proposition basicbtn">Back</a>
                    </div>

                    {{-- Main Info Section --}}
                    <div class="row-col">
                        {{-- LEFT COLUMN: Image & Bio --}}
                        <div class="col-sm w w-auto-xs m-b">
                            <div class="item w">
                                <div class="item-media">
                                    <div class="item-media-content">
                                        @php
                                            $mystring = $send_offer->userCurator->profile;
                                            $pos = (strpos($mystring, 'https') !== false || strpos($mystring, 'http') !== false);
                                        @endphp
                                        @if(!$pos)
                                            <img src="{{ !empty($send_offer->userCurator->profile) ? URL('/').'/uploads/profile/'.$send_offer->userCurator->profile : asset('images/profile_images_icons.svg') }}" class="profile-image">
                                        @else
                                            <img src="{{ asset($send_offer->userCurator->profile) }}" class="profile-image">
                                        @endif
                                        <img src="{{asset('images/bg_curator_profile.png')}}" class="background-image">
                                    </div>
                                </div>
                            </div>
                            <div class="m-t-sm">
                                @if (!empty($send_offer->userCurator->curatorUser->curator_bio))
                                    <div class="page-title m-b-xs">
                                        <h4 class="inline m-a-0 biO" style="font-size: 14px;">Bio</h4>
                                    </div>
                                    <p id="bioInfo" class="text-muted small m-b-xs">{{Str::limit($send_offer->userCurator->curatorUser->curator_bio, 50)}}</p>
                                    <a href="javascript:void(0)" class="seeMoreBio small" onclick="seeMoreBio()" style="color: #02b875;">See more</a>
                                @endif
                            </div>
                        </div>

                        {{-- RIGHT COLUMN: Name, Categories, and RATING --}}
                        <div class="col-sm">
                            <div class="p-l-md no-padding-xs">
                                <div class="page-title">
                                    <h1 class="inline">{{($send_offer->userCurator) ? $send_offer->userCurator->name : '----'}}</h1>
                                    @if ($send_offer->userCurator->is_verified == 1)
                                        <img src="{{ asset('images/verified_icon.svg') }}" style="width: 22px; vertical-align: middle; margin-left: 5px;">
                                    @endif
                                </div>

                                {{-- Professional Categories --}}
                                <p class="item-desc text-muted m-b-0" style="font-size: 14px;">
                                    @if(!empty($send_offer->userCurator->curatorUser->curator_signup_from))
                                        {{Str::upper (ucwords(str_replace("_", " ", $send_offer->userCurator->curatorUser->curator_signup_from)))}}
                                    @endif
                                </p>

                                {{-- SAFE Rating Logic --}}
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

                                <div class="curator-stats-row">
                                    <div class="text-warning" style="font-size: 14px;">
                                        @for ($i = 1; $i <= 5; $i++)
                                            <i class="fa {{ $i <= round($avgRating) ? 'fa-star' : 'fa-star-o' }}"></i>
                                        @endfor
                                    </div>
                                    <span class="font-weight-bold" style="color: #02b875; font-size: 14px;">{{ number_format($avgRating, 1) }}</span>
                                    <span class="text-muted small">({{ $totalReviews }} {{ Str::plural('review', $totalReviews) }})</span>
                                </div>

                                {{-- Country --}}
                                @if(!empty($send_offer->userCurator->curatorUser->country))
                                    <div class="block flag_style clearfix m-b-sm">
                                        <img class="flag_icon" src="{{asset('images/flags')}}/{{$send_offer->userCurator->curatorUser->country->flag_icon}}.png" style="width: 18px;">
                                        <span class="text-muted" style="font-size:14px; margin-left: 5px;">{{$send_offer->userCurator->curatorUser->country->name}}</span>
                                    </div>
                                @endif

                                {{-- Social Icons --}}
                                <div class="row-col" id="socialView_S">
                                    <div class="col-xs">
                                        @if(!empty($send_offer->userCurator->curatorUser->instagram_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->instagram_url}}" target="_blank" class="btn btn-icon btn-social rounded white btn-sm m-r-xs"><i class="fa fa-instagram"></i></a>
                                        @endif
                                        @if(!empty($send_offer->userCurator->curatorUser->spotify_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->spotify_url}}" target="_blank" class="btn btn-icon btn-social rounded white btn-sm m-r-xs"><i class="fa fa-spotify"></i></a>
                                        @endif
                                        @if(!empty($send_offer->userCurator->curatorUser->soundcloud_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->soundcloud_url}}" target="_blank" class="btn btn-icon btn-social rounded white btn-sm m-r-xs"><i class="fa fa-soundcloud"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr class="m-y-lg" style="border-color: #2e2e2e;">

                    {{-- Bottom Information Sections --}}
                    <div class="padding p-y-0">
                        <h4 class="update_profile m-b-sm">Offer Information</h4>
                        <div class="row m-b-sm">
                            <div class="col-sm-3 text-muted small">Expiry Date:</div>
                            <div class="col-sm-9 font-weight-bold">{{ !empty($send_offer->expiry_date) ? getDateFormat($send_offer->expiry_date) : '----' }}</div>
                        </div>
                        <div class="row m-b-sm">
                            <div class="col-sm-3 text-muted small">Status:</div>
                            <div class="col-sm-9 font-weight-bold"><span class="{{ in_array($send_offer->status, ['Rejected', 'Expired']) ? 'text-danger' : 'text-primary' }}">{{$send_offer->status}}</span></div>
                        </div>
                        <div class="row m-b-lg">
                            <div class="col-sm-3 text-muted small">Contribution:</div>
                            <div class="col-sm-9 font-weight-bold" style="color: #02b875;">{{ !empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->contribution : 0 }} USC</div>
                        </div>

                        <h4 class="update_profile m-b-sm">Track Details</h4>
                        <div class="row m-b-sm">
                            <div class="col-sm-3 text-muted small">Track Name:</div>
                            <div class="col-sm-9 font-weight-bold">{{ !empty($send_offer->artistTrack) ? $send_offer->artistTrack->name : '----' }}</div>
                        </div>
                        <div class="row m-b-lg">
                            <div class="col-sm-3 text-muted small">Pitch:</div>
                            <div class="col-sm-9 text-muted italic" id="pitchInfo">
                                {{ !empty($send_offer->artistTrack->pitch_description) ? Str::limit($send_offer->artistTrack->pitch_description, 100) : 'No pitch provided.' }}
                                @if(!empty($send_offer->artistTrack->pitch_description) && strlen($send_offer->artistTrack->pitch_description) > 100)
                                    <a href="javascript:void(0)" onclick="seeMorePitch()" style="color: #02b875;">Read more</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Form Actions --}}
                    <div class="padding text-center m-t-md">
                        @if($send_offer->status == \App\Templates\IOfferTemplateStatus::REJECTED)
                             <div class="alert alert-danger">This offer was declined.</div>
                        @elseif($send_offer->status == \App\Templates\IOfferTemplateStatus::COMPLETED)
                             <div class="alert alert-success">Submission Completed.</div>
                        @else
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#declineOffer" class="btn btn-sm rounded btn-danger m-r-sm">Decline</a>
                            <a href="javascript:void(0)" data-toggle="modal" data-target="#confirmPayUSCModal" class="btn btn-sm rounded btn-success">Pay USC</a>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Sidebar --}}
            <div class="col-lg-4">
                @include('pages.chat.right-sidebar-chat')
            </div>
        </div>
    </div>
    @include('pages.artists.artist-offers.modal.modal')
@endsection

@section('page-script')
    <script src="{{asset('app-assets/js/artist/artist.js')}}"></script>
    <script>
        var curator_bio_full = {!! json_encode($send_offer->userCurator->curatorUser->curator_bio ?? '') !!};
        function seeMoreBio() { $('#bioInfo').html(curator_bio_full); $('.seeMoreBio').hide(); }

        var pitch_full = {!! json_encode($send_offer->artistTrack->pitch_description ?? '') !!};
        function seeMorePitch() { $('#pitchInfo').html(pitch_full); }

        $('#payUSCOffer').click(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "{{route('artist.offer.pay')}}",
                data: { "_token": "{{ csrf_token() }}", "send_offer_id": "{!! encrypt($send_offer->id) !!}", "contribution": $('.UscOfferPay').attr('data-contribution') },
                success: function (data) {
                    if(data.success) window.location = '{{ URL::to('/accepted-offer') }}';
                    else toastr.error(data.error_wallet || data.error);
                }
            });
        });
    </script>
@endsection
