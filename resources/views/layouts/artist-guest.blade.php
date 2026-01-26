<!DOCTYPE html>
<html lang="en">
<head>
    {{-- Safety check for style include --}}
    @if(view()->exists('panels.auth-styles'))
        @include('panels.auth-styles')
    @else
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    @endif
</head>

<body>
<div class="app dk" id="app">
    <div id="snackbar"></div>
    <div id="snackbarError"></div>
    
    <div id="content" class="app-content" role="main">
        <div class="app-header navbar-md black box-shadow-z1">
            <div class="navbar" data-pjax>
                <a href="{{ url('/') }}" class="navbar-brand md">
                    {{-- Uses the theme variable from our AppServiceProvider fix --}}
                    <img src="{{ asset($theme->logo ?? 'images/logo.png') }}" alt="Logo">
                </a>

                <ul class="nav navbar-nav pull-right">
                    @if(Auth::check())
                        <li class="nav-item">
                            {{-- Standard Laravel Logout logic (Prevents 405/500 errors) --}}
                            @if(Route::has('logout'))
                                <a href="{{ route('logout') }}" class="nav-link" 
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Sign out
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            @endif
                        </li>
                    @else
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="nav-link">Signup</a>
                            </li>
                        @endif
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="nav-link">
                                    <span class="btn btn-sm rounded primary _600">Signin</span>
                                </a>
                            </li>
                        @endif
                    @endif
                </ul>

                <div class="collapse navbar-toggleable-sm l-h-0 text-center" id="navbar">
                    <ul class="nav navbar-nav nav-md inline text-primary-hover">
                        <li class="nav-item">
                            <a href="{{ url('/artist-offers') }}" class="nav-link">
                                <span class="nav-text">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        @yield('content')
        
        @if(view()->exists('panels.footer'))
            @include('panels.footer')
        @endif
    </div>
</div>

@if(view()->exists('panels.auth-scripts'))
    @include('panels.auth-scripts')
@endif
</body>
</html>
