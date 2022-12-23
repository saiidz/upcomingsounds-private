<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head-->
{{-- Include core + vendor Styles --}}
@include('pages.artists.panels.styles')
<!-- END: Head-->

<body>
<div id="loadings"></div>
<div class="app dk" id="app">

    <!-- BEGIN: SideNav-->
    @if(Request::is('artist/public*') == 'true')
    @else
        @include('pages.artists.panels.sidebar')
    @endif

<!-- END: SideNav-->

    <!-- ############ LAYOUT START-->

    <!-- content -->
    <div id="content" class="app-content white bg box-shadow-z2" role="main">
        <div id="snackbar"></div>
        <div id="snackbarError"></div>

        @if(Request::is('artist/public*') == 'true')
            <div class="app-header navbar-md black box-shadow-z1">
                <div class="navbar" data-pjax>
                    <a href="{{url('/')}}" class="navbar-brand md">
                        <img src="{{asset(!empty($theme->logo) ? $theme->logo : 'images/logo.png')}}" alt="">
                    </a>
                </div>
            </div>
        @else
            <div class="app-header hidden-lg-up white lt box-shadow-z1">
                <div class="navbar">
                    <!-- brand -->
                    <a href="{{url('/')}}" class="navbar-brand md">
                        <img src="{{asset('images/logo.png')}}" alt=".">
                    </a>
                    <!-- / brand -->
                    <!-- nabar right -->
                    <ul class="nav navbar-nav pull-right">
                        <li class="nav-item">
                            <!-- Open side - Naviation on mobile -->
                            <a data-toggle="modal" data-target="#aside" class="nav-link">
                                <i class="material-icons">menu</i>
                            </a>
                            <!-- / -->
                        </li>
                    </ul>
                    <!-- / navbar right -->
                </div>
            </div>
        @endif


        <div class="app-footer app-player grey bg" id="playDisplay" style="display:none">
            <div class="playlist" style="width:100%"></div>
        </div>
        <div class="app-body" id="view">
            @yield('content')
        </div>
    </div>
    <!-- / -->

    <!-- ############ LAYOUT END-->

    @include('pages.artists.panels.generic_modals')
</div>

<!-- BEGIN VENDOR JS-->
@include('pages.artists.panels.scripts')
<!-- END PAGE LEVEL JS-->

</body>
</html>
