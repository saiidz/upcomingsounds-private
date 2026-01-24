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
            color: #3498db;
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
        .cke_notifications_area {
            display: none;
        }
        .curator-rating-inline {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-top: 2px;
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
                        <a href="{{ url()->previous() }}" class="btn btn-sm rounded proposition basicbtn">Back</a>
                    </div>

                    <div class="row-col m-b-lg">
                        {{-- LEFT COLUMN: Profile Image & Bio --}}
                        <div class="col-sm w w-auto-xs m-b">
                            <div class="item w" style="width: 120px;">
                                <div class="item-media" style="height: 120px;">
                                    <div class="item-media-content">
                                        @php
                                            $profileImg = $send_offer->userCurator->profile;
                                            $isExternal = (strpos($profileImg, 'http') !== false);
                                        @endphp

                                        @if($isExternal)
                                            <img src="{{ asset($profileImg) }}" alt="" class="profile-image">
                                        @else
                                            <img src="{{ !empty($profileImg) ? URL('/').'/uploads/profile/'.$profileImg : asset('images/profile_images_icons.svg') }}" alt="" class="profile-image">
                                        @endif

                                        <img src="{{asset('images/bg_curator_profile.png')}}" alt="" class="background-image">
                                    </div>
                                </div>
                            </div>

                            <div class="m-t">
                                @if (!empty($send_offer->userCurator->curatorUser->curator_bio))
                                    <div class="page-title m-b-xs">
                                        <h4 class="inline m-a-0 biO" style="font-size: 14px;">Bio</h4>
                                    </div>
                                    <p id="bioInfo" class="text-muted small m-b-xs">{{Str::limit($send_offer->userCurator->curatorUser->curator_bio, 60)}}</p>
                                    <a href="javascript:void(0)" class="seeMoreBio small" onclick="seeMoreBio()" style="color: #02b875;">See more</a>
                                @endif
                            </div>
                        </div>

                        {{-- RIGHT COLUMN: Name, Category, and RATING --}}
                        <div class="col-sm">
                            <div class="p-l-md no-padding-xs">
                                <div class="page-title">
                                    <h1 class="inline">{{($send_offer->userCurator) ? $send_offer->userCurator->name : '----'}}</h1>
                                    @if ($send_offer->userCurator->is_verified == 1)
                                        <img src="{{ asset('images/verified_icon.svg') }}" style="width: 20px; vertical-align: middle; margin-left: 5px;" alt="Verified">
                                    @endif
                                </div>

                                {{-- Curator Category text --}}
                                <p class="item-desc text-muted m-b-0">
                                    @if(!empty($send_offer->userCurator->curatorUser->curator_signup_from))
                                        {{Str::upper (ucwords(str_replace("_", " ", $send_offer->userCurator->curatorUser->curator_signup_from)))}}
                                    @endif
                                </p>

                                {{-- RATING PLACEMENT --}}
                                @php
                                    $ratings = \App\Models\CuratorRating::where('curator_id', $send_offer->userCurator->id);
                                    $avgRating = $ratings->avg('rating_stars') ?? 0;
                                    $totalReviews = $ratings->count();
                                @endphp

                                <div class="curator-rating-inline m-b-sm">
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
                                        <img class="flag_icon" src="{{asset('images/flags')}}/{{$send_offer->userCurator->curatorUser->country->flag_icon}}.png" alt="" style="width: 18px;">
                                        <span class="text-muted" style="font-size:14px; margin-left: 5px;">{{$send_offer->userCurator->curatorUser->country->name}}</span>
                                    </div>
                                @endif

                                {{-- Socials --}}
                                <div class="row-col" id="socialView_S">
                                    <div class="col-xs">
                                        @if(!empty($send_offer->userCurator->curatorUser->instagram_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->instagram_url}}" target="_blank" class="btn btn-icon btn-social rounded white btn-sm m-r-xs"><i class="fa fa-instagram"></i></a>
                                        @endif
                                        @if(!empty($send_offer->userCurator->curatorUser->facebook_url))
                                            <a href="{{$send_offer->userCurator->curatorUser->facebook_url}}" target="_blank" class="btn btn-icon btn-social rounded white btn-sm m-r-xs"><i class="fa fa-facebook"></i></a>
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

                    {{-- OFFER INFO SECTION --}}
                    <div class="padding p-y-0 m-b-md">
                        <div class="page-title m-b-sm b-b p-b-xs">
                            <h4 class="inline m-a-0 update_profile">Offer Information</h4>
                        </div>
                        <div class="form-group row m-b-xs">
                            <div class="col-sm-3 form-control-label text-muted">Expiry Date:</div>
                            <div class="col-sm-9 font-weight-bold">{{ !empty($send_offer->expiry_date) ? getDateFormat($send_offer->expiry_date) : '----' }}</div>
                        </div>
                        <div class="form-group row m-b-xs">
                            <div class="col-sm-3 form-control-label text-muted">Publish Date:</div>
                            <div class="col-sm-9 font-weight-bold">{{ !empty($send_offer->publish_date) ? getDateFormat($send_offer->publish_date) : '----' }}</div>
                        </div>
                        <div class="form-group row m-b-xs">
                            <div class="col-sm-3 form-control-label text-muted">Status:</div>
                            <div class="col-sm-9 font-weight-bold">
                                <span class="{{ in_array($send_offer->status, ['Rejected', 'Expired', 'Pending']) ? 'text-danger' : 'text-primary' }}">
                                    {{$send_offer->status}}
                                </span>
                            </div>
                        </div>
                        <div class="form-group row m-b-xs">
                            <div class="col-sm-3 form-control-label text-muted">Contribution:</div>
                            <div class="col-sm-9 font-weight-bold" style="color: #02b875;">{{ !empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->contribution : 0 }} USC</div>
                        </div>
                    </div>

                    {{-- TRACK INFO SECTION --}}
                    <div class="padding p-y-0 m-b-md">
                        <div class="page-title m-b-sm b-b p-b-xs">
                            <h4 class="inline m-a-0 update_profile">Track Details</h4>
                        </div>
                        <div class="form-group row m-b-xs">
                            <div class="col-sm-3 form-control-label text-muted">Track Name:</div>
                            <div class="col-sm-9 font-weight-bold">{{ !empty($send_offer->artistTrack) ? $send_offer->artistTrack->name : '----' }}</div>
                        </div>
                        <div class="form-group row m-b-xs">
                            <div class="col-sm-3 form-control-label text-muted">Release Type:</div>
                            <div class="col-sm-9">{{ !empty($send_offer->artistTrack) ? Str::ucfirst($send_offer->artistTrack->audio_cover) .' '. Str::ucfirst($send_offer->artistTrack->release_type) : '----' }}</div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-3 form-control-label text-muted">Pitch:</div>
                            <div class="col-sm-9 text-muted italic" id="pitchInfo">
                                {{ !empty($send_offer->artistTrack->pitch_description) ? Str::limit($send_offer->artistTrack->pitch_description, 120) : 'No pitch provided.' }}
                                @if(!empty($send_offer->artistTrack->pitch_description) && strlen($send_offer->artistTrack->pitch_description) > 120)
                                    <a href="javascript:void(0)" class="seeMoreBio" onclick="seeMorePitch()" style="color: #02b875;">Read more</a>
                                @endif
                            </div>
                        </div>
                    </div>

                    {{-- ACTIONS SECTION --}}
                    <div class="padding">
                        @if($send_offer->status == \App\Templates\IOfferTemplateStatus::REJECTED)
                             <div class="alert alert-danger text-center">This offer was declined.</div>
                        @elseif($send_offer->status == \App\Templates\IOfferTemplateStatus::COMPLETED)
                             <div class="alert alert-success text-center">This submission is completed.</div>
                             {{-- Optional: Show Work Link here --}}
                        @else
                            <div class="text-center">
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#declineOffer" class="btn btn-sm rounded btn-danger m-r-sm">Decline</a>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#freeAlternativeOffer" class="btn btn-sm rounded white m-r-sm">Free Alternative</a>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#confirmPayUSCModal" class="btn btn-sm rounded btn-success">Pay {{ !empty($send_offer->curatorOfferTemplate) ? $send_offer->curatorOfferTemplate->contribution : 0 }} USC</a>
                            </div>
                        @endif
                    </div>

                </div>
            </div>

            {{-- SIDEBAR --}}
            <div class="col-lg-4">
                @if($send_offer->status == \App\Templates\IOfferTemplateStatus::EXPIRED)
                    @include('pages.curators.panels.right-sidebar')
                @else
                    @include('pages.chat.right-sidebar-chat')
                @endif
            </div>
        </div>
    </div>

    @include('pages.artists.artist-offers.modal.modal')
    @endsection

@section('page-script')
    <script src="{{asset('app-assets/js/artist/artist.js')}}"></script>
    <script>
        // Bio Expansion
        var curator_bio_full = {!! json_encode($send_offer->userCurator->curatorUser->curator_bio ?? '') !!};
        function seeMoreBio() {
            $('#bioInfo').html(curator_bio_full);
            $('.seeMoreBio').hide();
        }

        // Pitch Expansion
        var pitch_full = {!! json_encode($send_offer->artistTrack->pitch_description ?? '') !!};
        function seeMorePitch() {
            $('#pitchInfo').html(pitch_full);
        }

        // AJAX Payment
        $('#payUSCOffer').click(function (event) {
            event.preventDefault();
            var send_offer_id = "{!! encrypt($send_offer->id) !!}";
            var contribution = $('.UscOfferPay').attr('data-contribution');
            $.ajax({
                type: "POST",
                url: "{{route('artist.offer.pay')}}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    "send_offer_id": send_offer_id,
                    "contribution": contribution,
                },
                success: function (data) {
                    if(data.success){
                        toastr.success(data.success);
                        window.location = '{{ URL::to('/accepted-offer') }}';
                    }
                    if (data.error_wallet) {
                        toastr.error(data.error_wallet);
                        window.open('{{ URL::to('/wallet') }}', '_blank');
                    }
                }
            });
        });
    </script>
@endsection
