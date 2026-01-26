@extends('pages.artists.panels.layout')

@section('title', 'Rejected Offers')

@section('content')
<div class="page-content">
    <div class="padding">
        <div class="box">
            <div class="box-header">
                <h2 class="titleColor">Rejected Campaigns</h2>
                <small>Review the campaigns that were not accepted by curators.</small>
            </div>
            
            <div class="box-body">
                <div class="row item-list m-b">
                    @if(isset($sendOffers) && count($sendOffers) > 0)
                        @foreach($sendOffers as $sendOffer)
                            <div class="col-xs-12 m-b-sm">
                                <div class="item r p-a-sm shadow-sm" style="background: #fff; border: 1px solid #eee; border-radius: 8px;">
                                    <div class="item-info">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <strong class="text-md">{{ $sendOffer->userCurator->name ?? 'Curator' }}</strong>
                                                <div class="text-muted text-xs">
                                                    Rejected on: {{ $sendOffer->updated_at->format('M d, Y') }}
                                                </div>
                                            </div>
                                            <div class="col-sm-4 text-right">
                                                <a href="{{ route('artist.offer.details_fix', encrypt($sendOffer->id)) }}" 
                                                   class="btn btn-sm white text-primary">
                                                    View Details
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-xs-12 text-center p-a-lg">
                            <div class="text-muted">
                                <i class="material-icons md-48">info_outline</i>
                                <p class="m-t">You don't have any rejected offers at the moment.</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
