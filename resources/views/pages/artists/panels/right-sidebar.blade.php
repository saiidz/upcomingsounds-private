<div class="col-lg-3 w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        <div class="nav text-sm _600">
            {{-- This helper works globally without needing a variable from the controller --}}
            <p class="text-muted">Logged in as: <strong>{{ auth()->check() ? auth()->user()->name : 'Artist' }}</strong></p>
        </div>
        <div class="b-b m-y"></div>
        <div class="nav text-sm _600">
            <a href="{{ url('about-us') }}" class="nav-link text-muted m-r-xs">About</a>
            <a href="{{ url('contact-us') }}" class="nav-link text-muted m-r-xs">Contact</a>
            <a href="{{ url('term-of-service') }}" class="nav-link text-muted m-r-xs">Terms</a>
            <a href="{{ url('privacy-policy') }}" class="nav-link text-muted m-r-xs">Privacy</a>
        </div>
        <p class="text-muted text-xs p-b-lg">&copy; {{ date('Y') }} UpComing Sounds</p>
    </div>
</div>
