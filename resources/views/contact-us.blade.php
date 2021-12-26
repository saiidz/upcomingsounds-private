{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Contact-us')

{{-- page content --}}
@section('content')
    <div class="app-body">

        <!-- ############ PAGE START-->

        <div class="row-col amber h-v">
            <div class="row-cell v-m">
                <div class="text-center col-sm-6 offset-sm-3 p-y-lg">
                    <h1 class="display-3 m-y-lg">Contact Us</h1>
                </div>
            </div>
        </div>

        <div class="container m-t-2">
            <div class="row-col h-v">
            </div>
        </div>
        <!-- ############ PAGE END-->

    </div>
    @include('welcome-panels.welcome-footer')
@endsection
