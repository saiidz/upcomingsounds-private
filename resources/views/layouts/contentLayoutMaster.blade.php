<!DOCTYPE html>
<!--================================================================================
Item Name: Materialize - Material Design Admin Template
Version: 4.0
Author: PIXINVENT
Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================ -->
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
{{-- Include core + vendor Styles --}}
@include('panels.styles')
<!-- END: Head-->

<body data-open="click" data-menu="vertical-modern-menu" data-col="2-columns" onload="loader()">
    <div id="loading" >

    </div>

<!-- BEGIN: Header-->
@include('panels.header')
<!-- END: Header-->

<!-- BEGIN: SideNav-->
{{--@include('panels.sidebar')--}}
<!-- END: SideNav-->

@yield('content')

{{--@include('panels.rightsidebar')--}}

<!-- BEGIN: Footer-->
@include('panels.footer')
<!-- END: Footer-->

<!-- BEGIN: Modal-->
@include('panels.modal')
<!-- END: Modal-->

<!-- BEGIN VENDOR JS-->
@include('panels.scripts')
<!-- END PAGE LEVEL JS-->


</body>
</html>
