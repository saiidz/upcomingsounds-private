<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head-->
{{-- Include core + vendor Styles --}}
@include('panels.auth-styles')
<!-- END: Head-->

<body>
<div class="app dk" id="app">
    <div id="snackbar"></div>
    <div id="snackbarError"></div>
    <!-- content -->
    <div id="content" class="app-content" role="main">

        <div class="app-header navbar-md black box-shadow-z1">
            <div class="navbar" data-pjax>
                <a data-toggle="collapse" data-target="#navbar"
                   class="navbar-item pull-right hidden-md-up m-r-0 m-l">
                    <i class="material-icons">menu</i>
                </a>
                <!-- brand -->
                <a href="{{url('/')}}" class="navbar-brand md">
                    <img src="{{asset('images/logo.png')}}" alt="">
                </a>
                <!-- / brand -->

                <!-- nabar right -->
                <ul class="nav navbar-nav pull-right">
                    @if(Auth::check())
                        <li class="nav-item">
                            <a href="{{ route('curator.logout') }}" class="nav-link">
                                Sign out
                            </a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="nav-link">
                                Signup
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('login') }}" class="nav-link">
                    <span class="btn btn-sm rounded primary _600">
                      Signin
                    </span>
                            </a>
                        </li>
                    @endif

                </ul>
                <!-- / navbar right -->

                <!-- navbar collapse -->
                <div class="collapse navbar-toggleable-sm l-h-0 text-center" id="navbar">
                    <!-- link and dropdown -->
                    <ul class="nav navbar-nav nav-md inline text-primary-hover">
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <span class="nav-text">Site</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                        <li class="nav-item">
                            <a href="{{url('/taste-maker-profile')}}" class="nav-link">
                                <span class="nav-text">Web App</span>
                            </a>
                        </li>
{{--                        <li class="nav-item">--}}
{{--                            <a href="#" class="nav-link">--}}
{{--                                <span class="nav-text">Rtl</span>--}}
{{--                            </a>--}}
{{--                        </li>--}}
                    </ul>
                    <!-- / link and dropdown -->
                </div>
                <!-- / navbar collapse -->
            </div>
        </div>

        @yield('content')
        @include('welcome-panels.welcome-footer')
    </div>
    <!-- / -->


{{--@yield('content')--}}

<!-- BEGIN VENDOR JS-->
    <!-- END PAGE LEVEL JS-->
</div>
@include('panels.auth-scripts')
</body>
</html>
