@extends('layouts.app')

@section('content')
<div class="container py-4">

    {{-- Header --}}
    <div class="d-flex flex-wrap align-items-center justify-content-between gap-2 mb-3">
        <div>
            <h3 class="mb-1">Offer Details</h3>
            <div class="text-muted small">
                Offer ID: <span class="fw-semibold">#{{ $offer->id ?? '—' }}</span>
                <span class="mx-2">•</span>
                Created: <span class="fw-semibold">
                    {{ optional($offer->created_at)->format('M d, Y') ?? '—' }}
                </span>
            </div>
        </div>

        {{-- Status Badge --}}
        @php
            $status = strtolower($offer->status ?? 'pending');
            $badge = match($status) {
                'accepted' => 'bg-success',
                'rejected' => 'bg-danger',
                'expired'  => 'bg-secondary',
                'pending'  => 'bg-warning text-dark',
                default    => 'bg-info'
            };
        @endphp
        <span class="badge {{ $badge }} px-3 py-2 text-uppercase">
            {{ $offer->status ?? 'Pending' }}
        </span>
    </div>

    <div class="row g-3">

        {{-- Left: Summary + Key fields --}}
        <div class="col-lg-8">

            {{-- Summary Card --}}
            <div class="card shadow-sm">
                <div class="card-body">

                    <h5 class="mb-3">Summary</h5>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="text-muted small">Artist</div>
                            <div class="fw-semibold">
                                {{ $offer->artist_name ?? optional($offer->artist)->name ?? '—' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-muted small">Curator</div>
                            <div class="fw-semibold">
                                {{ $offer->curator_name ?? optional($offer->curator)->name ?? '—' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-muted small">Track / Project</div>
                            <div class="fw-semibold">
                                {{ $offer->track_title ?? optional($offer->track)->title ?? '—' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-muted small">Release Date</div>
                            <div class="fw-semibold">
                                {{-- ✅ Release Date included --}}
                                {{ $offer->release_date
                                    ? \Carbon\Carbon::parse($offer->release_date)->format('M d, Y')
                                    : '—'
                                }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-muted small">Offer Amount</div>
                            <div class="fw-semibold">
                                {{ isset($offer->price) ? ('$' . number_format((float)$offer->price, 2)) : '—' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-muted small">Payout Method</div>
                            <div class="fw-semibold">
                                {{ $offer->payout_method ?? '—' }}
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    {{-- Terms / Notes --}}
                    <h5 class="mb-2">Terms</h5>
                    <div class="border rounded p-3 bg-light">
                        <div class="small" style="white-space: pre-wrap;">
                            {{ $offer->terms ?? $offer->message ?? 'No terms provided.' }}
                        </div>
                    </div>

                </div>
            </div>

            {{-- Deliverables / Requirements --}}
            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <h5 class="mb-3">Deliverables</h5>

                    <div class="row g-3">
                        <div class="col-md-6">
                            <div class="text-muted small">Platforms</div>
                            <div class="fw-semibold">
                                {{ $offer->platforms ?? '—' }}
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="text-muted small">Promo Window</div>
                            <div class="fw-semibold">
                                {{ $offer->promo_window ?? '—' }}
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="text-muted small">Requirements</div>
                            <div class="fw-semibold" style="white-space: pre-wrap;">
                                {{ $offer->requirements ?? '—' }}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        {{-- Right: Actions + Timeline --}}
        <div class="col-lg-4">

            {{-- Actions --}}
            <div class="card shadow-sm">
                <div class="card-body">
                    <h5 class="mb-3">Actions</h5>

                    <div class="d-grid gap-2">
                        @if(($offer->status ?? '') === 'pending')
                            <form method="POST" action="{{ route('offers.accept', $offer->id) }}">
                                @csrf
                                <button class="btn btn-success w-100" type="submit">
                                    Accept Offer
                                </button>
                            </form>

                            <form method="POST" action="{{ route('offers.reject', $offer->id) }}">
                                @csrf
                                <button class="btn btn-outline-danger w-100" type="submit">
                                    Reject Offer
                                </button>
                            </form>
                        @endif

                        <a class="btn btn-outline-secondary" href="{{ url()->previous() }}">
                            Back
                        </a>
                    </div>

                    <hr class="my-4">

                    <h6 class="mb-2">Quick Info</h6>
                    <div class="small text-muted">
                        Updated: <span class="fw-semibold text-dark">
                            {{ optional($offer->updated_at)->format('M d, Y g:i A') ?? '—' }}
                        </span>
                    </div>

                </div>
            </div>

            {{-- Timeline --}}
            <div class="card shadow-sm mt-3">
                <div class="card-body">
                    <h5 class="mb-3">Timeline</h5>

                    <div class="small">
                        <div class="d-flex justify-content-between">
                            <span class="text-muted">Created</span>
                            <span class="fw-semibold">
                                {{ optional($offer->created_at)->format('M d, Y') ?? '—' }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <span class="text-muted">Release Date</span>
                            <span class="fw-semibold">
                                {{ $offer->release_date
                                    ? \Carbon\Carbon::parse($offer->release_date)->format('M d, Y')
                                    : '—'
                                }}
                            </span>
                        </div>

                        <div class="d-flex justify-content-between mt-2">
                            <span class="text-muted">Status</span>
                            <span class="fw-semibold">
                                {{ $offer->status ?? 'Pending' }}
                            </span>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>
</div>
@endsection
