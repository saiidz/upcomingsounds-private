@extends('layouts.app')

@section('content')
<div class="container py-4">

  {{-- Top Bar --}}
  <div class="d-flex flex-wrap align-items-start justify-content-between gap-2 mb-3">
    <div>
      <h3 class="mb-1">Offer Details</h3>
      <div class="text-muted small">
        Offer #{{ $offer->id ?? '—' }}
        <span class="mx-2">•</span>
        Created {{ optional($offer->created_at)->format('M d, Y') ?? '—' }}
      </div>
    </div>

    @php
      $status = strtolower($offer->status ?? 'pending');
      $badge = match ($status) {
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

    {{-- Main --}}
    <div class="col-lg-8">

      {{-- Core Info --}}
      <div class="card shadow-sm">
        <div class="card-body">

          <h5 class="mb-3">Offer Summary</h5>

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
                {{ !empty($offer->release_date)
                    ? \Carbon\Carbon::parse($offer->release_date)->format('M d, Y')
                    : (!empty(optional($offer->track)->release_date)
                        ? \Carbon\Carbon::parse(optional($offer->track)->release_date)->format('M d, Y')
                        : '—')
                }}
              </div>
            </div>

            <div class="col-md-6">
              <div class="text-muted small">Offer Amount</div>
              <div class="fw-semibold">
                {{ isset($offer->price) ? '$'.number_format((float)$offer->price, 2) : '—' }}
              </div>
            </div>

            <div class="col-md-6">
              <div class="text-muted small">Updated</div>
              <div class="fw-semibold">
                {{ optional($offer->updated_at)->format('M d, Y g:i A') ?? '—' }}
              </div>
            </div>
          </div>

          <hr class="my-4">

          <h5 class="mb-2">Message / Terms</h5>
          <div class="border rounded p-3 bg-light">
            <div class="small" style="white-space: pre-wrap;">
              {{ $offer->terms ?? $offer->message ?? 'No message provided.' }}
            </div>
          </div>

        </div>
      </div>

      {{-- Optional: Requirements --}}
      <div class="card shadow-sm mt-3">
        <div class="card-body">
          <h5 class="mb-3">Requirements</h5>

          <div class="row g-3">
            <div class="col-md-6">
              <div class="text-muted small">Platforms</div>
              <div class="fw-semibold">{{ $offer->platforms ?? '—' }}</div>
            </div>

            <div class="col-md-6">
              <div class="text-muted small">Promo Window</div>
              <div class="fw-semibold">{{ $offer->promo_window ?? '—' }}</div>
            </div>

            <div class="col-12">
              <div class="text-muted small">Notes</div>
              <div class="fw-semibold" style="white-space: pre-wrap;">
                {{ $offer->requirements ?? '—' }}
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

    {{-- Sidebar --}}
    <div class="col-lg-4">
      <div class="card shadow-sm">
        <div class="card-body">
          <h5 class="mb-3">Actions</h5>

          <div class="d-grid gap-2">
            @if(($offer->status ?? '') === 'pending')
              <form method="POST" action="{{ route('offers.accept', $offer->id) }}">
                @csrf
                <button class="btn btn-success" type="submit">Accept</button>
              </form>

              <form method="POST" action="{{ route('offers.reject', $offer->id) }}">
                @csrf
                <button class="btn btn-outline-danger" type="submit">Reject</button>
              </form>
            @endif

            <a class="btn btn-outline-secondary" href="{{ url()->previous() }}">Back</a>
          </div>

          <hr class="my-4">

          <div class="small text-muted">
            If the release date is missing, it will try:
            <span class="fw-semibold text-dark">{{ '{' }}{{ ' $offer->release_date ' }}{{ '}' }}</span>
            then
            <span class="fw-semibold text-dark">{{ '{' }}{{ ' optional($offer->track)->release_date ' }}{{ '}' }}</span>
          </div>

        </div>
      </div>
    </div>

  </div>
</div>
@endsection
