@extends('pages.artists.panels.layout')

@section('title','Rejected Offers')

@section('content')
<div class="page-content">
    <div class="padding">
        <h1 class="titleColor">Rejected Campaigns</h1>
        <div class="row item-list m-b">
            @if(!empty($sendOffers) && count($sendOffers) > 0)
                @foreach($sendOffers as $sendOffer)
                    <div class="col-xs-12 m-b">
                        <div class="item r p-a-sm shadow-sm" style="background: #fff; border-radius: 8px; border: 1px solid #eee;">
                            <div class="item-info">
                                <div class="item-title">
                                    <strong>{{ $sendOffer->userCurator->name ?? 'Curator' }}</strong>
                                </div>
                                <div class="text-sm text-muted">
                                    Rejected on: {{ $sendOffer->updated_at->format('M d, Y') }}
                                </div>
                                <div class="m-t-sm">
                                    {{-- Use the unique route name we created --}}
                                    <form action="{{ route('artist.offer.custom_details', encrypt($sendOffer->id)) }}" method="GET">
                                        <button type="submit" class="btn btn-xs white shadow-sm">View Details</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="padding text-center">
                    <p class="text-muted">No rejected offers found.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
