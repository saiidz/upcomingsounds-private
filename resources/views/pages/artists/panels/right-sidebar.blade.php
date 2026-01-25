<div class="col-lg-3 w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        {{-- Profile Section: Using auth() directly prevents 'Undefined variable' crashes --}}
        <div class="nav text-sm _600">
            @if(auth()->check())
                <p class="text-muted m-b-0">Logged in as:</p>
                <p class="titleColor"><strong>{{ auth()->user()->name }}</strong></p>
                <p class="text-xs text-muted">{{ auth()->user()->email }}</p>
            @else
                <p class="text-muted"><strong>Artist Dashboard</strong></p>
            @endif
        </div>

        <div class="b-b m-y"></div>

        {{-- Navigation Links --}}
        <div class="nav text-sm _600">
            <a href="{{ url('about-us') }}" class="nav-link text-muted m-r-xs">About</a>
            <a href="{{ url('contact-us') }}" class="nav-link text-muted m-r-xs">Contact</a>
            <a href="{{ url('term-of-service') }}" class="nav-link text-muted m-r-xs">Terms</a>
            <a href="{{ url('privacy-policy') }}" class="nav-link text-muted m-r-xs">Privacy Policy</a>
        </div>

        <div class="m-y">
            <p class="text-muted text-xs p-b-lg">&copy; {{ date('Y') }} UpComing Sounds</p>
        </div>
    </div>
</div>
