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
        <!-- ############ LAYOUT START-->
    <div class="padding">
        <div class="navbar">
            <div class="pull-center">
                <!-- brand -->
                <a href="{{url('/')}}" class="navbar-brand md">
                    <img src="{{asset('images/logo.png')}}" alt="">
                </a>
                <!-- / brand -->
            </div>
        </div>
    </div>


@yield('content')

    <!-- BEGIN VENDOR JS-->
@include('panels.auth-scripts')
    <!-- END PAGE LEVEL JS-->
</div>
</body>
</html>
