@extends('pages.artists.panels.layout')

@section('title', 'Accepted Offers')

@section('content')
<div class="page-content">
    <div class="row-col">
        <div class="col-lg-9 b-r no-border-md">
            <div class="padding">
                <div class="page-title m-b">
                    <h1 class="inline m-a-0 titleColor">Accepted Campaigns</h1>
                </div>

                <div class="row item-list item-list-by m-b">
                    @if(!empty($sendOffers) && $sendOffers->count() > 0)
                        @foreach($sendOffers as $sendOffer)
                            <div class="col-xs-12 remove_offer m-b" id="remove_offer-{{ $sendOffer->id }}">
                                <div class="item r Item" data-id="item-{{ $sendOffer->id }}">

                                    {{-- Curator Profile Image Safety --}}
                                    <div class="item-media">
                                        @php
                                            $profileImg = asset('images/profile_images_icons.svg');
                                            if (!empty($sendOffer->userCurator->profile)) {
                                                $profileImg = (strpos($sendOffer->userCurator->profile, 'http') !== false)
                                                    ? $sendOffer->userCurator->profile
                                                    : url('/uploads/profile/' . $sendOffer->userCurator->profile);
                                            }
                                        @endphp
                                        <div class="item-media-content" style="background-image: url('{{ $profileImg }}');"></div>
                                    </div>

                                    <div class="item-info">
                                        <div class="bottom text-right">
                                            <span style="color:#02b875 !important">Status: </span>
                                            <span class="text-primary font-weight-bold">{{ strtoupper($sendOffer->status ?? 'UNKNOWN') }}</span>
                                        </div>

                                        <div class="item-title text-ellipsis">
                                            {{-- Safety Check for Curator Name --}}
                                            <span class="text-muted">{{ $sendOffer->userCurator->name ?? 'Deleted Curator' }}</span>
                                        </div>

                                        <div class="item-meta text-sm text-muted">
                                            <span class="item-meta-date text-xs">
                                                {{ $sendOffer->created_at ? $sendOffer->created_at->format('M d Y') : 'Date N/A' }}
                                            </span>
                                        </div>

                                        <div class="m-t-sm offerAlternative">
                                            <div>
                                                <span style="color:#02b875 !important">Offer Type: </span>
                                                <span class="btn btn-xs white">
                                                    {{-- Safety Check for Template and Type --}}
                                                    {{ $sendOffer->curatorOfferTemplate->offerType->name ?? 'Standard' }}
                                                </span>
                                            </div>
                                            <div>
                                                <span style="color:#02b875 !important">Expiry: </span>
                                                <span class="btn btn-xs white">
                                                    {{ $sendOffer->expiry_date ? \Carbon\Carbon::parse($sendOffer->expiry_date)->format('M d Y') : 'N/A' }}
                                                </span>
                                            </div>
                                        </div>

                                        <div class="m-t-sm campaignBtn" style="display:flex; gap:10px; align-items:center; flex-wrap:wrap;">

                                            {{-- View Offer --}}
                                            <form id="form-offer{{ $sendOffer->id }}" action="{{ route('artist.offer.show', encrypt($sendOffer->id)) }}" method="GET">
                                                <a href="javascript:void(0)" class="btn btn-xs white shadow-sm"
                                                   onclick="document.getElementById('form-offer{{ $sendOffer->id }}').submit();">
                                                    View Details
                                                </a>
                                            </form>

                                            {{-- Status & Pulse Integration --}}
                                            @php $status = strtolower($sendOffer->status ?? ''); @endphp

                                            @if($status == 'accepted')
                                                <span class="badge warning p-2 shadow-sm" style="font-size:11px; border-radius: 20px;">
                                                    <i class="fa fa-clock-o"></i> Awaiting Delivery
                                                </span>

                                            @elseif($status == 'delivered')
                                                @php
                                                    // Defensive check for existing rating to avoid missing class errors
                                                    $alreadyRated = false;
                                                    try {
                                                        if(isset($sendOffer->ratings) && $sendOffer->ratings->count() > 0) {
                                                            $alreadyRated = true;
                                                        }
                                                    } catch (\Exception $e) { $alreadyRated = false; }
                                                @endphp

                                                @if(!$alreadyRated)
                                                    <button type="button"
                                                            class="btn btn-xs btn-primary rounded-pill shadow-sm"
                                                            data-toggle="modal"
                                                            data-target="#rateModal{{ $sendOffer->id }}">
                                                        Review & Finish
                                                    </button>
                                                    @include('partials.rating_modal', ['offer' => $sendOffer])
                                                @else
                                                    <span class="text-success text-xs font-weight-bold">
                                                        <i class="fa fa-check"></i> Feedback Sent
                                                    </span>
                                                @endif

                                            @elseif($status == 'completed')
                                                <span class="badge light p-2" style="font-size:11px; color:#666; border: 1px solid #ddd;">
                                                    Completed
                                                </span>
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

        {{-- Sidebar Safety --}}
        @include('pages.artists.panels.right-sidebar', ['user_artist' => $user_artist ?? auth()->user()])
    </div>
</div>
@endsection

@section('page-script')
<script>
    function OfferShow(id) {
        var form = document.getElementById("form-offer" + id);
        if (form) form.submit();
    }
</script>
@endsection
