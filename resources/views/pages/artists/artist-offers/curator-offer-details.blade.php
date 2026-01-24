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
        .artist-features ul li::marker {
            color: #02b875;
        }
        .update_profile {
            font-size:17px !important;
        }
        .blue-tag {
            color: #3498db;
        }
        /* Symmetrical Profile Styling */
        .profile-container {
            display: flex;
            align-items: flex-start;
            gap: 25px;
        }
        .profile-image-wrapper {
            position: relative;
            width: 120px;
            height: 120px;
            flex-shrink: 0;
        }
        .profile-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            position: relative;
            z-index: 2;
            border: 3px solid #1a1a1a;
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
        .curator-info-header {
            flex-grow: 1;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-8 b-r no-border-md">
                <div class="padding">
                    {{-- Header with Back Button --}}
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0 titleColor">Curator Offer Details</h1>
                        <a href="{{ url()->previous() }}" class="btn btn-sm rounded proposition basicbtn">Back</a>
                    </div>

                    {{-- Symmetrical Header Section --}}
                    <div class="profile-container m-b-lg">
                        {{-- Left Side: Image & Bio --}}
                        <div style="width: 150px; text-align: center;">
                            <div class="profile-image-wrapper m-b-sm">
                                @php
                                    $profileImg = $send_offer->userCurator->profile;
                                    $isExternal = (strpos($profileImg, 'http') !== false);
                                @endphp
                                @if($isExternal)
                                    <img src="{{ asset($profileImg) }}" class="profile-image">
                                @else
                                    <img src="{{ !empty($profileImg) ? URL('/').'/uploads/profile/'.$profileImg : asset('images/profile_images_icons.svg') }}" class="profile-image">
                                @endif
                                <img src="{{asset('images/bg_curator_profile.png')}}" class="background-image">
                            </div>

                            @if (!empty($send_offer->userCurator->curatorUser->curator_bio))
                                <div class="text-left">
                                    <h4 class="biO m-b-0" style="font-size: 14px;">Bio</h4>
                                    <p id="bioInfo" class="text-muted small m-b-0">{{Str::limit($send_offer->userCurator->curatorUser->curator_bio, 50)}}</p>
                                    <a href="javascript:void(0)" class="seeMoreBio small" onclick="seeMoreBio()" style="color: #02b875;">See more</a>
                                </div>
                            @endif
                        </div>

                        {{-- Right Side: Name, Category, Rating, Country, Socials --}}
                        <div class="curator-info-header">
                            <div class="page-title m-b-0">
                                <h1 class="inline m-r-sm">{{($send_offer->userCurator) ? $send_offer->userCurator->name : '----'}}</h1>
                                @if ($send_offer->userCurator->is_verified == 1)
                                    <img src="{{ asset('images/verified_icon.svg') }}" style="width: 20px; vertical-align: middle;" alt="Verified">
                                @endif
                            </div>

                            <p class="text-muted m-b-0" style="font-size: 15px; font-weight: 500;">
                                @if(!empty($send_offer->userCurator->curatorUser->curator_signup_from))
                                    {{Str::upper (ucwords(str_replace("_", " ", $send_offer->userCurator->curatorUser->curator_signup_from)))}}
                                @endif
                            </p>

                            {{-- Safe Rating Logic --}}
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

                            <div class="m-b-sm" style="display: flex; align-items: center; gap: 10px; margin-top: 5px;">
                                <div class="text-warning" style="font-size: 14px;">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <i class="fa {{ $i <= round($avgRating) ? 'fa-star' : 'fa-star-o' }}"></i>
                                    @endfor
                                </div>
                                <span class="font-weight-bold" style="color: #02b875;">{{ number_format($avgRating, 1) }}</span>
                                <span class="text-muted small">({{ $totalReviews }} {{ Str::plural('review', $totalReviews) }})</span>
                            </div>

                            @if(!empty($send_offer->userCurator->curatorUser->country))
                                <div class="m-b-sm">
                                    <img src="{{asset('images/flags')}}/{{$send_offer->userCurator->curatorUser->country->flag_icon}}.png" style="width: 18px; margin-right: 5px;">
                                    <span class="text-muted small">{{$send_offer->userCurator->curatorUser->country->name}}</span>
                                </div>
                            @endif

                            <div class="social-icons">
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

                    {{-- Data Sections --}}
                    <div class="padding p-y-0">
                        <div class="page-title m-b-sm b-b p-b-xs">
                            <h4 class="inline m-a-0 update_profile">Offer Information</h4>
                        </div>
                        <div class="row m-b-sm">
                            <div class="col-xs-4 text-muted small">Expiry Date:</div>
                            <div class="col-xs-8 font-weight-bold">{{ !empty($send_offer->expiry_date) ? getDateFormat($send_offer->expiry_date) : '----' }}</div>
                        </div>
                        <div class="row m-b-sm">
                            <div class="col-xs-4 text-muted small">Status:</div>
                            <div class="col-xs-8 font-weight-bold"><span class="{{ in_array($send_offer->status, ['Rejected', 'Expired']) ? 'text-danger' : 'text-primary' }}">{{$send_offer->status}}</span></div>
                        </div>
                        <div class="row m-b-lg">
                            <div class="col-xs-4 text-muted small">Contribution:</div>
                            <div class="col-xs-8 font-weight-bold" style="color: #02b875;">{{ !empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->contribution : 0 }} USC</div>
                        </div>

                        <div class="page-title m-b-sm b-b p-b-xs">
                            <h4 class="inline m-a-0 update_profile">Track Details</h4>
                        </div>
                        <div class="row m-b-sm">
                            <div class="col-xs-4 text-muted small">Track Name:</div>
                            <div class="col-xs-8 font-weight-bold">{{ !empty($send_offer->artistTrack) ? $send_offer->artistTrack->name : '----' }}</div>
                        </div>
                        <div class="row m-b-lg">
                            <div class="col-xs-4 text-muted small">Pitch:</div>
                            <div class="col-xs-8 text-muted italic" id="pitchInfo">
                                {{ !empty($send_offer->artistTrack->pitch_description) ? Str::limit($send_offer->artistTrack->pitch_description, 100) : 'No pitch provided.' }}
                                @if(!empty($send_offer->artistTrack->pitch_description) && strlen($send_offer->artistTrack->pitch_description) > 100)
                                    <a href="javascript:void(0)" onclick="seeMorePitch()" style="color: #02b875;">Read more</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- Actions --}}
                    <div class="padding text-center m-t">
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
