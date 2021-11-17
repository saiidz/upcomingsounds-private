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
@include('pages.artists.panels.sidebar')
<!-- END: SideNav-->

@yield('content')


@include('pages.artists.panels.generic_modals')
</div>

<!-- BEGIN VENDOR JS-->
@include('pages.artists.panels.scripts')
<!-- END PAGE LEVEL JS-->

</body>
</html>
