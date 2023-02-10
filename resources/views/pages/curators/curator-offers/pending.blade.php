@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Pending')

@section('page-style')
    <style>
        .Item{
            background-color: rgba(120, 120, 120, 0.1);
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b m-t-2">
                        <h1 class="inline m-a-0">Pending</h1>
                    </div>
                    <div class="row item-list item-list-by m-b">
                        @if(!empty($sendOffers) && count($sendOffers) > 0)
                            @foreach($sendOffers as $sendOffer)
                                <div class="col-xs-12 remove_offer m-b" id="remove_offer-{{$sendOffer->id}}">
                                    <div class="item r Item" data-id="item-{{$sendOffer->id}}">
                                        <div class="item-info">
                                            <div class="bottom text-right">
                                                {{--                                                <div id="deMo">--}}
                                                {{--                                                    <label class="switch">--}}
                                                {{--                                                        <input type="checkbox" name="demo" onclick="changeActiveStatus({{$offerTemplate->id}})" id="changeActiveStatus{{$offerTemplate->id}}" value="" {{ ($offerTemplate->is_active == 1) ? 'checked' : ''  }}>--}}
                                                {{--                                                        <span class="slider round switchDemo"></span>--}}
                                                {{--                                                    </label>--}}
                                                {{--                                                </div>--}}
                                                @if($sendOffer->status == \App\Templates\IOfferTemplateStatus::PENDING)
                                                    <span style="color:#02b875 !important">Offer Status: </span><span class="text-danger">{{$sendOffer->status}}</span>
                                                @else
                                                    <span style="color:#02b875 !important">Offer Status: </span><span class="text-primary">{{$sendOffer->status}}</span>
                                                @endif
                                            </div>
                                            <div class="item-title text-ellipsis">
                                                <span class="text-muted">{{!empty($sendOffer->artistTrack) ? $sendOffer->artistTrack->name : '----'}}</span>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis hide">
                                            </div>
                                            <div class="item-meta text-sm text-muted">
                                                <span class="item-meta-date text-xs">{{($sendOffer->created_at) ? \Carbon\Carbon::parse($sendOffer->created_at)->format('M d Y') : ''}}</span>
                                            </div>

                                            <div class="m-t-sm offerAlternative">
                                                <div>
                                                    <span style="color:#02b875 !important">Offer Template Name: </span><span class="btn btn-xs white">{{!empty($sendOffer->curatorOfferTemplate) ? $sendOffer->curatorOfferTemplate->title : '----'}}</span>
                                                </div>
                                                <div>
                                                    <span style="color:#02b875 !important">Expiry Date: </span><span class="btn btn-xs white">{{($sendOffer->expiry_date) ? \Carbon\Carbon::parse($sendOffer->expiry_date)->format('M d Y') : ''}}</span>
                                                </div>
                                                <div>
                                                    <span style="color:#02b875 !important">Approximate Publish Date: </span><span class="btn btn-xs white">{{($sendOffer->publish_date) ? \Carbon\Carbon::parse($sendOffer->publish_date)->format('M d Y') : ''}}</span>
                                                </div>
                                            </div>
                                            <div class="m-t-sm campaignBtn" id="cOfferBtn">
                                                <div>
                                                    <form id="form-offer{{$sendOffer->id}}" action="{{route('curator.send.offer.show',encrypt($sendOffer->id))}}">
                                                        <a href="javascript:void(0)" class="btn btn-xs white" onclick="sendOfferShow({{$sendOffer->id}})" id="offerTemplateEdit">View Offer</a>
                                                    </form>
                                                </div>
                                                @if(!empty($sendOffer->curatorOfferTemplate) && $sendOffer->curatorOfferTemplate->type == \App\Templates\IOfferTemplateStatus::TYPE_DIRECT_OFFER && !empty($sendOffer->curatorOfferTemplate->reason_reject))
                                                    <div>
                                                       <span id="mgAdmin{{$sendOffer->curatorOfferTemplate->id}}" style="display:none">{!! $sendOffer->curatorOfferTemplate->reason_reject !!}</span>
                                                        <a href="javascript:void(0)" class="btn btn-xs white"  onclick="adminMsgModalCenter({{$sendOffer->curatorOfferTemplate->id}})">
                                                            Admin Message
                                                        </a>
                                                    </div>
                                                @else
                                                    @if(!empty($sendOffer->curatorOfferTemplate) && $sendOffer->curatorOfferTemplate->type == \App\Templates\IOfferTemplateStatus::TYPE_DIRECT_OFFER && empty($sendOffer->curatorOfferTemplate->reason_reject))
                                                        <span class="text-danger">Waiting For Admin Approval</span>
                                                    @endif
                                                @endif
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
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
@include('pages.curators.curator-offers.modal')

@endsection
