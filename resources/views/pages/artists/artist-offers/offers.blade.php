@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','My Campaigns')

@section('page-style')
    <style>
        .Item {
            background-color: rgba(120, 120, 120, 0.05);
            border-radius: 12px;
            border: 1px solid #eee;
            transition: all 0.3s ease;
        }
        .Item:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }
        .status-badge {
            font-weight: bold;
            text-transform: uppercase;
            font-size: 11px;
        }
        .titleColor { color: #333; }
    </style>
@endsection

@section('content')
<div class="page-content">
    <div class="row-col">
        <div class="col-lg-9 b-r no-border-md">
            <div class="padding">
                <div class="page-title m-b m-t-2">
                    <h1 class="inline m-a-0 titleColor">My Campaigns</h1>
                </div>

                <div class="row item-list item-list-by m-b">
                    @if(!empty($sendOffers) && $sendOffers->count() > 0)
                        @foreach($sendOffers as $sendOffer)
                            <div class="col-xs-12 m-b" id="offer-row-{{ $sendOffer->id }}">
                                <div class="item r Item p-a-sm shadow-sm">
                                    
                                    {{-- Profile Image --}}
                                    <div class="item-media">
                                        @php
                                            $profile = $sendOffer->userCurator->profile ?? '';
                                            $imgUrl = asset('images/profile_images_icons.svg');
                                            if (!empty($profile)) {
                                                $imgUrl = (str_starts_with($profile, 'http')) ? $profile : url('/uploads/profile/' . $profile);
                                            }
                                        @endphp
                                        <div class="item-media-content" style="background-image: url('{{ $imgUrl }}');"></div>
                                    </div>

                                    <div class="item-info">
                                        <div class="bottom text-right">
                                            @php 
                                                $status = strtolower($sendOffer->status ?? 'pending');
                                                $colorClass = in_array($status, ['rejected', 'expired', 'pending']) ? 'text-danger' : 'text-primary';
                                            @endphp
                                            <span style="color:#02b875 !important">Status: </span>
                                            <span class="{{ $colorClass }} status-badge">{{ strtoupper($status) }}</span>
                                        </div>

                                        <div class="item-title text-ellipsis">
                                            <span class="text-muted font-weight-bold">{{ $sendOffer->userCurator->name ?? 'Curator Not Found' }}</span>
                                        </div>

                                        <div class="m-t-sm" style="display:flex; flex-wrap:wrap; gap:15px;">
                                            <div class="text-xs">
                                                <span style="color:#02b875">Type:</span> 
                                                <span class="btn btn-xs white">{{ $sendOffer->curatorOfferTemplate->offerType->name ?? 'Standard' }}</span>
                                            </div>
                                            <div class="text-xs">
                                                <span style="color:#02b875">Sent:</span> 
                                                {{ $sendOffer->created_at ? $sendOffer->created_at->format('M d, Y') : 'N/A' }}
                                            </div>
                                            @if($sendOffer->expiry_date)
                                            <div class="text-xs">
                                                <span style="color:#02b875">Expires:</span> 
                                                {{ \Carbon\Carbon::parse($sendOffer->expiry_date)->format('M d, Y') }}
                                            </div>
                                            @endif
                                        </div>

                                        <div class="m-t-md">
                                            <form action="{{ route('artist.offer.show', encrypt($sendOffer->id)) }}" method="GET">
                                                <button type="submit" class="btn btn-xs white shadow-sm">View Full Details</button>
                                                @if(isset($sendOffer->ratings) && $sendOffer->ratings->count() > 0)
                                                    <span class="text-success text-xs m-l-sm"><i class="fa fa-star"></i> Rated</span>
                                                @endif
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center p-a-lg w-100">
                            <h4 class="text-muted">No campaigns found.</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Right Sidebar --}}
        @include('pages.artists.panels.right-sidebar', ['user_artist' => auth()->user()])
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
