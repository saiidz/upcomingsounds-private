<div class="col-lg-3 w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        <div class="b-b m-y"></div>
        
        {{-- Profile Info (Bulletproof fallback) --}}
        <div class="nav text-sm _600">
            <p class="text-muted text-xs">Logged in as: <strong>{{ auth()->user()->name ?? 'Artist' }}</strong></p>
        </div>

        <div class="nav text-sm _600">
            <a href="{{ url('about-us') }}" class="nav-link text-muted m-r-xs">About</a>
            <a href="{{ url('contact-us') }}" class="nav-link text-muted m-r-xs">Contact</a>
            <a href="{{ url('term-of-service') }}" class="nav-link text-muted m-r-xs">Term of Service</a>
            <a href="{{ url('privacy-policy') }}" class="nav-link text-muted m-r-xs">Policy Privacy</a>
        </div>
        <p class="text-muted text-xs p-b-lg">&copy; Copyright {{ date('Y') }} UpComing Sounds</p>
    </div>
</div>
