{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Gift Card')

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom/faqs.css')}}">
    <style>
        .bgGift{
            background-image: url({{asset('images/gift_card_banner.png')}});
            background-size: 100%;
            background-position: top center;
            background-repeat: no-repeat;
        }
    </style>
@endsection

{{-- page content --}}
@section('content')
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

        <!-- ############ PAGE START-->

        <div class="row-col bgGift h-v">
            <div class="row-cell v-m">
                <div class="text-center col-sm-6 offset-sm-3 p-y-lg">
                    <h1 class="display-3 m-y-lg">Gift Card</h1>
                </div>
            </div>
        </div>

        <section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">

        </section>
        <!-- ############ PAGE END-->

    </div>
    @include('welcome-panels.welcome-footer')
@endsection

@section('page-script')
    <script>document.getElementsByTagName("html")[0].className += " js";</script>
    <script src="{{asset('js/faq/util.js')}}"></script>
    <script src="{{asset('js/faq/main.js')}}"></script>
@endsection
