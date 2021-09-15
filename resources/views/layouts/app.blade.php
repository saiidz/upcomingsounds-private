<!DOCTYPE html>
<!--================================================================================
Item Name: Materialize - Material Design Admin Template
Version: 4.0
Author: PIXINVENT
Author URL: https://themeforest.net/user/pixinvent/portfolio
================================================================================ -->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('layouts.partials._head')
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>
    <!-- START FOOTER -->
        @include('layouts.partials._footer')
    <!-- END FOOTER -->
    </body>
</html>
