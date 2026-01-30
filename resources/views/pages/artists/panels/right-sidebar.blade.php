<div class="col-lg-3 w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">

        {{-- Logged-in user --}}
        <div class="nav text-sm _600">
            <p class="text-muted">
                Logged in as:
                <strong>
                    @if (auth()->check())
                        {{ auth()->user()->name }}
                    @else
                        Artist
                    @endif
                </strong>
            </p>
        </div>

        <div class="b-b m-y"></div>

        {{-- Static pages --}}
        <div class="nav text-sm _600">
            <a href="{{ url('/about-us') }}" class="nav-link text-muted m-r-xs">About</a>
            <a href="{{ url('/
