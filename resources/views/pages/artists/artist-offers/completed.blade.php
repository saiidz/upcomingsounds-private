@extends('pages.artists.panels.layout')

@section('title','Completed')

@section('content')
    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b">
                        <h1 class="inline m-a-0 titleColor">Completed Campaigns</h1>
                    </div>
                    <div class="row item-list item-list-by m-b">
                        @if(!empty($sendOffers) && $sendOffers->count() > 0)
                            @foreach($sendOffers as $sendOffer)
                                <div class="col-xs-12 remove_offer m-b" id="remove_offer-{{$sendOffer->id}}">
                                    <div class="item r Item" data-id="item-{{$sendOffer->id}}">
                                        
                                        <div class="item-media">
                                            @php
                                                $profile = $sendOffer->userCurator->profile ?? '';
                                                $imageUrl = asset('images/profile_images_icons.svg');
                                                if (!empty($profile)) {
                                                    $imageUrl = (str_starts_with($profile, 'http')) 
                                                        ? $profile 
                                                        : url('/uploads/profile/' . $profile);
                                                }
                                            @endphp
                                            <div class="item-media-content" style="background-image: url('{{ $imageUrl }}');"></div>
                                        </div>

                                        <div class="item-info">
                                            <div class="bottom text-right">
                                                <span class="text-success font-weight-bold">
                                                    <i class="fa fa-check-circle"></i> COMPLETED
                                                </span>
                                            </div>

                                            <div class="item-title text-ellipsis">
                                                <span class="text-muted font-weight-bold">
                                                    {{ $sendOffer->userCurator->name ?? 'Curator' }}
                                                </span>
                                            </div>

                                            <div class="item-meta text-sm text-muted">
                                                <span class="item-meta-date text-xs">
                                                    {{ $sendOffer->created_at ? $sendOffer->created_at->format('M d Y') : '' }}
                                                </span>
                                            </div>

                                            <div class="m-t-sm offerAlternative">
                                                <div>
                                                    <span style="color:#02b875 !important">Offer Type: </span>
                                                    <span class="btn btn-xs white">
                                                        {{ $sendOffer->curatorOfferTemplate->offerType->name ?? '----' }}
                                                    </span>
                                                </div>
                                                <div>
                                                    <span style="color:#02b875 !important">Published: </span>
                                                    <span class="btn btn-xs white">
                                                        {{ $sendOffer->publish_date ? \Carbon\Carbon::parse($sendOffer->publish_date)->format('M d Y') : 'N/A' }}
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="m-t-sm campaignBtn" style="display:flex;gap:8px;align-items:center;flex-wrap:wrap;">
                                                <form id="form-offer{{$sendOffer->id}}"
                                                      action="{{ route('artist.offer.details_hijack', encrypt($sendOffer->id)) }}">
                                                    <button type="submit" class="btn btn-xs white shadow-sm">
                                                        View Details
                                                    </button>
                                                </form>

                                                @php 
                                                    $isRated = isset($sendOffer->ratings) && $sendOffer->ratings->count() > 0;
                                                @endphp

                                                @if(!$isRated)
                                                    <button type="button"
                                                            class="btn btn-xs btn-primary rounded-pill"
                                                            data-toggle="modal"
                                                            data-target="#rateModal{{$sendOffer->id}}">
                                                        Rate Experience
                                                    </button>
                                                    @include('partials.rating_modal', ['offer' => $sendOffer])
                                                @else
                                                    <span class="text-success text-xs font-weight-bold">
                                                        <i class="fa fa-check-circle"></i> Rated
                                                    </span>
                                                @endif

                                                @if(!empty($sendOffer->sendOfferTransaction) &&
                                                    strtolower($sendOffer->sendOfferTransaction->status) == 'refund')
                                                    <div>
                                                        <span id="mgAdmin{{$sendOffer->id}}" style="display:none">
                                                            {!! $sendOffer->sendOfferTransaction->refund_message !!}
                                                        </span>
                                                        <a href="javascript:void(0)"
                                                           class="btn btn-xs btn-danger text-white"
                                                           onclick="completedOfferMsgModal({{$sendOffer->id}})">
                                                            Refund Info
                                                        </a>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @include('pages.curators.__not-found-records')
                        @endif
                    </div>
                </div>
            </div>

            @include('pages.artists.panels.right-sidebar', ['user_artist' => $user_artist ?? auth()->user()])
        </div>
    </div>

    {{-- Refund Message Modal --}}
    <div id="completedMsgModalCenter" class="modal fade" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Refund Message</h5>
                </div>
                <div class="modal-body">
                    <p id="msgCompletedCurator"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script>
    function completedOfferMsgModal(id) {
        let msg = $('#mgAdmin' + id).html();
        $('#msgCompletedCurator').html(msg);
        $('#completedMsgModalCenter').modal('show');
    }
</script>
@endsection
