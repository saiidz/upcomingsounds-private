@extends('pages.artists.panels.layout')

@section('title', 'My Campaigns')

@section('page-style')
    <style>
        .Item { background: rgba(120, 120, 120, 0.05); border-radius: 12px; border: 1px solid #eee; margin-bottom: 15px; padding: 15px; }
        .status-badge { font-weight: bold; text-transform: uppercase; font-size: 11px; }
        .item-media-content { width: 50px; height: 50px; background-size: cover; border-radius: 50%; }
    </style>
@endsection

@section('content')
<div class="page-content">
    <div class="padding">
        <div class="page-title m-b">
            <h1 class="inline m-a-0">My Campaigns</h1>
        </div>

        <div class="row">
            <div class="col-lg-9">
                @if(isset($sendOffers) && $sendOffers->count() > 0)
                    @foreach($sendOffers as $sendOffer)
                        <div class="item r Item shadow-sm">
                            <div class="row align-items-center">
                                <div class="col-xs-2">
                                    @php
                                        $profile = $sendOffer->userCurator->profile ?? '';
                                        $imgUrl = (!empty($profile) && str_starts_with($profile, 'http')) ? $profile : url('/uploads/profile/' . ($profile ?: 'default.png'));
                                    @endphp
                                    <div class="item-media-content" style="background-image: url('{{ $imgUrl }}');"></div>
                                </div>
                                <div class="col-xs-7">
                                    <div class="text-muted font-weight-bold">{{ $sendOffer->userCurator->name ?? 'Curator' }}</div>
                                    <small class="text-success">Type: {{ $sendOffer->curatorOfferTemplate->offerType->name ?? 'Standard' }}</small>
                                </div>
                                <div class="col-xs-3 text-right">
                                    <span class="status-badge text-primary">{{ strtoupper($sendOffer->status ?? 'Pending') }}</span>
                                    <div class="m-t-sm">
                                        <a href="{{ route('artist.offer.show', encrypt($sendOffer->id)) }}" class="btn btn-xs btn-outline-primary">Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info">No campaigns found.</div>
                @endif
            </div>

            <div class="col-lg-3">
                {{-- Manually passing user_artist to prevent include errors --}}
                @include('pages.artists.panels.right-sidebar', ['user_artist' => auth()->user()])
            </div>
        </div>
    </div>
</div>
@endsection
