@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Rejected')


@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b">
                        <h1 class="inline m-a-0">Rejected</h1>
                    </div>
                    <div class="row item-list item-list-by m-b">
                        @if(!empty($sendOffers) && count($sendOffers) > 0)
                            @foreach($sendOffers as $sendOffer)
                                <div class="col-xs-12 remove_offer m-b" id="remove_offer-{{$sendOffer->id}}">
                                    <div class="item r Item" data-id="item-{{$sendOffer->id}}">
                                        <div class="item-media">
                                            @php
                                                $mystring = $sendOffer->userCurator->profile;
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
                                                @if(!empty($sendOffer->userCurator->profile))
                                                    <div class="item-media-content" id="upload_profile"
                                                         style="background-image: url({{URL('/')}}/uploads/profile/{{$sendOffer->userCurator->profile}});"></div>
                                                @else
                                                    <div class="item-media-content" id="upload_profile"
                                                         style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                                @endif
                                            @elseif($pos == 0)
                                                <div class="item-media-content" id="upload_profile"
                                                     style="background-image: url({{$sendOffer->userCurator->profile}});"></div>
                                            @else
                                                <div class="item-media-content" id="upload_profile"
                                                     style="background-image: url({{asset('images/profile_images_icons.svg')}});"></div>
                                            @endif
                                        </div>
                                        <div class="item-info">
                                            <div class="bottom text-right">
                                                @if($sendOffer->status == \App\Templates\IOfferTemplateStatus::PENDING)
                                                    <span style="color:#02b875 !important">Offer Status: </span><span class="text-danger">{{$sendOffer->status}}</span>
                                                @elseif($sendOffer->status == \App\Templates\IOfferTemplateStatus::REJECTED)
                                                    <span style="color:#02b875 !important">Offer Status: </span><span class="text-danger">{{$sendOffer->status}}</span>
                                                @else
                                                    <span style="color:#02b875 !important">Offer Status: </span><span class="text-primary">{{$sendOffer->status}}</span>
                                                @endif
                                            </div>
                                            <div class="item-title text-ellipsis">
                                                <span class="text-muted">{{!empty($sendOffer->userCurator) ? $sendOffer->userCurator->name : '----'}}</span>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis hide">
                                            </div>
                                            <div class="item-meta text-sm text-muted">
                                                <span class="item-meta-date text-xs">{{($sendOffer->created_at) ? \Carbon\Carbon::parse($sendOffer->created_at)->format('M d Y') : ''}}</span>
                                            </div>

                                            <div class="m-t-sm offerAlternative">
                                                <div>
                                                    <span style="color:#02b875 !important">Offer Type: </span><span class="btn btn-xs white">{{!empty($sendOffer->curatorOfferTemplate->offerType) ? $sendOffer->curatorOfferTemplate->offerType->name : '----'}}</span>
                                                </div>
                                                <div>
                                                    <span style="color:#02b875 !important">Expiry Date: </span><span class="btn btn-xs white">{{($sendOffer->expiry_date) ? \Carbon\Carbon::parse($sendOffer->expiry_date)->format('M d Y') : ''}}</span>
                                                </div>
                                                <div>
                                                    <span style="color:#02b875 !important">Approximate Publish Date: </span><span class="btn btn-xs white">{{($sendOffer->publish_date) ? \Carbon\Carbon::parse($sendOffer->publish_date)->format('M d Y') : ''}}</span>
                                                </div>
                                            </div>
                                            <div class="m-t-sm campaignBtn" style="display:flex">
                                                <form id="form-offer{{$sendOffer->id}}" action="{{route('artist.offer.show',encrypt($sendOffer->id))}}">
                                                    <a href="javascript:void(0)" class="btn btn-xs white" onclick="OfferShow({{$sendOffer->id}})" id="offerTemplateEdit">View Offer</a>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="item-title text-ellipsis">
                                <h3 class="white" style="text-align:center">There are no result to show</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @include('pages.artists.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
@endsection

