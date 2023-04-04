<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head-->
{{-- Include core + vendor Styles --}}
@include('welcome-panels.welcome-styles')
<!-- END: Head-->

<body>
<div id="loadings"></div>
<div class="app dk" id="app">
    <div id="loading">
        <img id="loading-image" src="{{asset('images/USW_GIF.gif')}}" alt="Loading..." />
    </div>
{{--    <div id="loadings" style="display:none;"></div>--}}
    <div id="snackbar"></div>
    <div id="snackbarError"></div>
    <!-- ############ LAYOUT START-->

    <!-- content -->
    <div id="content" class="app-content" role="main">

        <div class="app-header navbar-md black box-shadow-z1">
            <div class="navbar" data-pjax>
                {{-- <a data-toggle="collapse" data-target="#navbar"
                   class="navbar-item pull-right hidden-md-up m-r-0 m-l">
                    <i class="material-icons">menu</i>
                </a> --}}
                <!-- brand -->
                <a href="{{url('/')}}" class="navbar-brand md">
                    {{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">--}}
                    {{--                            <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)"/>--}}
                    {{--                            <circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color"/>--}}
                    {{--                            <circle cx="24" cy="24" r="10" fill="#ffffff"/>--}}
                    {{--                            <circle cx="13" cy="13" r="2"  fill="#ffffff" class="brand-animate"/>--}}
                    {{--                            <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />--}}
                    {{--                            <circle cx="24" cy="24" r="3" fill="#000000"/>--}}
                    {{--                        </svg>--}}

                    <img src="{{asset(!empty($theme->logo) ? $theme->logo : 'images/logo.png')}}" alt="">
                    {{--                        <img src="{{asset('images/logo.png')}}" alt="." class="hide">--}}
                    {{--                        <span class="hidden-folded inline">pulse</span>--}}
                </a>
                <!-- / brand -->

                <!-- nabar right -->
                <ul class="nav navbar-nav pull-right">
                    @if(Auth::check())

                        @if(Auth::user()->type == 'artist')
                            <li class="nav-item">
                                <a href="{{url('/artist-profile')}}" class="nav-link">
                                    <span class="btn btn-sm rounded primary _600">Dashboard</span>
                                    {{-- <span class="nav-text">Dashboard</span> --}}
                                </a>
                            </li>
                        @elseif(Auth::user()->type == 'curator')
                            <li class="nav-item">
                                <a href="{{url('/dashboard')}}" class="nav-link">
                                    <span class="btn btn-sm rounded primary _600">Dashboard</span>
                                </a>
                            </li>
                        @elseif(Auth::user()->type == 'admin' && Auth::user()->is_blog == 0)
                            <li class="nav-item">
                                <a href="{{url('/admin/dashboard')}}" class="nav-link">
                                    <span class="btn btn-sm rounded primary _600">Dashboard</span>
                                </a>
                            </li>
                        @else
                        @endif

                        {{-- <li class="nav-item">
                            <a href="{{ route('logout') }}" class="nav-link">
                                Sign out
                            </a>
                        </li> --}}
                    @else
                        <li class="nav-item">
                            <a href="{{ url('/for-curators') }}" class="nav-link">
                                <span class="btn btn-sm rounded primary _600 tastemakers_signup">
                                  For Curators
                                </span>
                            </a>
                            {{-- <a href="{{ route('curator.register') }}" class="nav-link">
                                <span class="btn btn-sm rounded primary _600 tastemakers_signup">
                                  Apply as Tastemaker / Pro
                                </span>
                            </a> --}}
                        </li>
                        <li class="nav-item" id="Login">
                            <a href="{{ route('login') }}" class="nav-link">
                                Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/for-artists') }}" class="nav-link">
                                <span class="btn btn-sm rounded primary _600 tastemakers_signup">
                                  Submit Now
                                </span>
                            </a>
                            {{-- <a href="{{ route('register') }}" class="nav-link">
                                <span class="btn btn-sm rounded primary _600 tastemakers_signup">
                                  Signup
                                </span>
                            </a> --}}
                        </li>


                    @endif

                </ul>
                <!-- / navbar right -->

                <!-- navbar collapse -->
                {{-- <div class="collapse navbar-toggleable-sm l-h-0 text-center" id="navbar">
                    <ul class="nav navbar-nav nav-md inline text-primary-hover">
                        @if(Auth::check() && Auth::user()->type == 'artist')
                            <li class="nav-item">
                                <a href="{{url('/artist-profile')}}" class="nav-link">
                                    <span class="nav-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/wallet')}}" class="nav-link">
                                    <span class="nav-text">Wallet</span>
                                </a>
                            </li>
                        @elseif(Auth::check() && Auth::user()->type == 'curator')
                            <li class="nav-item">
                                <a href="{{url('/taste-maker-profile')}}" class="nav-link">
                                    <span class="nav-text">Dashboard</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/taste-maker-wallet')}}" class="nav-link">
                                    <span class="nav-text">Wallet</span>
                                </a>
                            </li>
                        @else
                        @endif
                    </ul>
                </div> --}}
                <!-- / navbar collapse -->
            </div>
        </div>

        @yield('content')

    </div>
    <!-- / -->

    <!-- ############ LAYOUT END-->
</div>
@include('welcome-panels.welcome-scripts')
</body>
</html>
