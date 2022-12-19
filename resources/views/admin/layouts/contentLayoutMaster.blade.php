<!DOCTYPE html>
<!--================================================================================
Item Name: Materialize - Material Design Admin Template
Version: 4.0
Author: PIXINVENT
Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================ -->
<html class="loading" lang="en" data-textdirection="ltr">
<div id="loadings"></div>
<!-- BEGIN: Head-->
{{-- Include core + vendor Styles --}}
@include('admin.panels.styles')
<!-- END: Head-->

<body class="vertical-layout vertical-menu-collapsible page-header-dark vertical-modern-menu preload-transitions 2-columns   " data-open="click" data-menu="vertical-modern-menu" data-col="2-columns">
<!-- BEGIN: Header-->
@include('admin.panels.header')
<!-- END: Header-->

<!-- BEGIN: SideNav-->
@include('admin.panels.sidebar')
<!-- END: SideNav-->

@yield('content')

<!-- BEGIN: Footer-->
@include('admin.panels.footer')
<!-- END: Footer-->

<!-- BEGIN VENDOR JS-->
@include('admin.panels.scripts')
<!-- END PAGE LEVEL JS-->

</body>
</html>
