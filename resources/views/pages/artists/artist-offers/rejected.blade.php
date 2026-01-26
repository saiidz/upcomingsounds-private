@extends('pages.artists.panels.layout')

@section('content')
<div class="padding">
    <h1>Rejected Page Test</h1>
    <p>Total Offers Found: {{ count($sendOffers) }}</p>
    
    @foreach($sendOffers as $offer)
        <div style="border:1px solid #ccc; margin:10px; padding:10px;">
            ID: {{ $offer->id }} | Status: {{ $offer->status }}
        </div>
    @endforeach
</div>
@endsection
