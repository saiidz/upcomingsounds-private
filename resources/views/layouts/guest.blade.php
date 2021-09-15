<!DOCTYPE html>
<html lang="en">
<!-- BEGIN: Head-->
{{-- Include core + vendor Styles --}}
@include('panels.auth-styles')
<!-- END: Head-->

<body>
@yield('content')

<!-- BEGIN VENDOR JS-->
@include('panels.auth-scripts')
<!-- END PAGE LEVEL JS-->

</body>
</html>
