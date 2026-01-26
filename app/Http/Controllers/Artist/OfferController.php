@extends('pages.artists.panels.layout')

@section('title','My Offers')

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
                            <div class="col-xs-12 m-b" id="offer-{{ $sendOffer->id }}">
                                <div class="item r Item p-a-sm shadow-sm" style="background: rgba(120, 120, 120, 0.05); border-radius: 12px; border: 1px solid #eee;">
                                    
                                    {{-- Safe Profile Image --}}
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
                                            <span class="text-primary font-weight-bold">{{ strtoupper($sendOffer->status ?? 'PENDING') }}</span>
                                        </div>

                                        <div class="item-title text-ellipsis">
                                            <span class="text-muted font-weight-bold">{{ $sendOffer->userCurator->name ?? 'Curator' }}</span>
                                        </div>

                                        <div class="m-t-sm" style="display:flex; gap:15px;">
                                            <div class="text-xs">
                                                <span style="color:#02b875">Type:</span> {{ $sendOffer->curatorOfferTemplate->offerType->name ?? 'Standard' }}
                                            </div>
                                            <div class="text-xs">
                                                <span style="color:#02b875">Sent:</span> {{ $sendOffer->created_at ? $sendOffer->created_at->format('M d, Y') : 'N/A' }}
                                            </div>
                                        </div>

                                        <div class="m-t-md">
                                            <form action="{{ route('artist.offer.show', encrypt($sendOffer->id)) }}" method="GET">
                                                <button type="submit" class="btn btn-xs white shadow-sm">View Details</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="text-center p-a-lg">
                            <h4 class="text-muted">No campaigns found.</h4>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- THE FIX: Passing explicit data to the sidebar to prevent 500 crashes --}}
        @php $sidebarUser = $user_artist ?? auth()->user(); @endphp
        @include('pages.artists.panels.right-sidebar', ['user_artist' => $sidebarUser])
    </div>
</div>
@endsection
