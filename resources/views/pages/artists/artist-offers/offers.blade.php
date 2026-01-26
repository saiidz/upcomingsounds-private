@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Offers')

@section('page-style')
    <style>
        .Item{
            background-color: rgba(120, 120, 120, 0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .status-badge {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
        }
    </style>
@endsection

@section('content')
    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b m-t-2">
                        <h1 class="inline m-a-0 titleColor">My Offers</h1>
                    </div>
                    <div class="row item-list item-list-by m-b">
                        @if(!empty($sendOffers) && $sendOffers->count() > 0)
                            @foreach($sendOffers as $sendOffer)
                                <div class="col-xs-12 remove_offer m-b" id="remove_offer-{{$sendOffer->id}}">
                                    <div class="item r Item" data-id="item-{{$sendOffer->id}}">
                                        
                                        {{-- Fixed Profile Image Logic --}}
                                        <div class="item-media">
                                            @php
                                                $profile = $sendOffer->userCurator->profile ?? '';
                                                $isExternal = (strpos($profile, 'http') !== false);
                                                
                                                if ($isExternal) {
                                                    $imgUrl = $profile;
                                                } elseif (!empty($profile)) {
                                                    $imgUrl = url('/uploads/profile/' . $profile);
                                                } else {
                                                    $imgUrl = asset('images/profile_images_icons.svg');
                                                }
                                            @endphp
                                            <div class="item-media-content" style="background-image: url('{{ $imgUrl }}');"></div>
                                        </div>

                                        <div class="item-info">
                                            {{-- Defensive Status Coloring --}}
                                            <div class="bottom text-right">
                                                <span style="color:#02b875 !important">Status: </span>
                                                @php 
                                                    $status = strtolower($sendOffer->status ?? 'pending');
                                                    $colorClass = in_array($status, ['rejected', 'expired', 'pending']) ? 'text-danger' : 'text-primary';
                                                @endphp
                                                <span class="{{ $colorClass }} status-badge">{{ $status }}</span>
                                            </div>

                                            <div class="item-title text-ellipsis">
                                                <span class="text-muted font-weight-bold">{{ $sendOffer->userCurator->name ?? 'Curator Not Found' }}</span>
                                            </div>

                                            <div class="item-meta text-sm text-muted">
                                                <span class="item-meta-date text-xs">
                                                    Sent: {{ $sendOffer->created_at ? $sendOffer->created_at->format('M d Y') : 'N/A' }}
                                                </span>
                                            </div>

                                            <div class="m-t-sm offerAlternative">
                                                <div>
                                                    <span style="color:#02b875 !important">Type: </span>
                                                    <span class="btn btn-xs white">{{ $sendOffer->curatorOfferTemplate->offerType->name ?? 'Standard' }}</span>
                                                </div>
                                                <div>
                                                    <span style="color:#02b875 !important">Expires: </span>
                                                    <span class="btn btn-xs white">{{ $sendOffer->expiry_date ? \Carbon\Carbon::parse($sendOffer->expiry_date)->format('M d Y') : 'N/A' }}</span>
                                                </div>
                                            </div>

                                            <div class="m-t-sm campaignBtn">
                                                <form id="form-offer{{$sendOffer->id}}" action="{{route('artist.offer.show', encrypt($sendOffer->id))}}">
                                                    <button type="submit" class="btn btn-xs white shadow-sm">View Full Details</button>
                                                </form>
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
            @include('pages.artists.panels.right-sidebar')
        </div>
    </div>
@endsection

@section('page-script')
    <script>
        function OfferShow(id) {
            document.getElementById("form-offer" + id).submit();
        }
    </script>
@endsection
