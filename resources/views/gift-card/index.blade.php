{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Gift Card')

@section('page-style')
    <style>
        .bgGift{
            background-image: url({{asset('images/gift_card_banner.png')}});
            background-size: 100%;
            background-position: top center;
            background-repeat: no-repeat;
        }
        .card-body{
            text-align: center;
            padding: 20px 20px;
        }
        .card
        {
            background-color: initial !important;
            border:none !important;
        }
        .h-v {
            height: 90vh !important;
        }
    </style>
@endsection

{{-- page content --}}
@section('content')
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

        <!-- ############ PAGE START-->

        <div class="row-col bgGift h-v">
            <div class="row-cell v-m">
{{--                <div class="text-center col-sm-6 offset-sm-3 p-y-lg">--}}
{{--                    <h1 class="display-3 m-y-lg">Gift Card</h1>--}}
{{--                </div>--}}
            </div>
        </div>

        <section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">
            <div class="container">
                <div class="row m-t-2">
                    <div class="col-md-12">
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible show" role="alert">
                                {{ session('error') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="card mb-6">
                            <img src="{{ asset('images/gift-card/GC-USC-20.png')  }}" width="100%" class="card-img-top" alt="">
                            <div class="card-body">
                                <a href="{{route('checkout.gift.card',['price_id' => encrypt(\App\Templates\IGiftCard_Product_Stripe::SANDBOX_500)])}}" class="nav-link">
                                    <span class="btn btn-small-white rounded primary _600">{{ __('Buy Now') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="card mb-6">
                            <img src="{{ asset('images/gift-card/GC-USC-50.png')  }}" width="100%" class="card-img-top" alt="">
                            <div class="card-body">
                                <a href="{{route('checkout.gift.card',['price_id' => encrypt(\App\Templates\IGiftCard_Product_Stripe::LIVE_50)])}}" class="nav-link">
                                    <span class="btn btn-small-white rounded primary _600">{{ __('Buy Now') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="card mb-6">
                            <img src="{{ asset('images/gift-card/GC-USC-100.png')  }}" width="100%" class="card-img-top" alt="">
                            <div class="card-body">
                                <a href="{{route('checkout.gift.card',['price_id' => encrypt(\App\Templates\IGiftCard_Product_Stripe::LIVE_100)])}}" class="nav-link">
                                    <span class="btn btn-small-white rounded primary _600">{{ __('Buy Now') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="card mb-6">
                            <img src="{{ asset('images/gift-card/GC-USC-250.png')  }}" width="100%" class="card-img-top" alt="">
                            <div class="card-body">
                                <a href="{{route('checkout.gift.card',['price_id' => encrypt(\App\Templates\IGiftCard_Product_Stripe::LIVE_250)])}}" class="nav-link">
                                    <span class="btn btn-small-white rounded primary _600">{{ __('Buy Now') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg" style="margin-bottom: 25px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="card mb-6">
                            <img src="{{ asset('images/gift-card/GC-USC-500.png')  }}" width="100%" class="card-img-top" alt="">
                            <div class="card-body">
                                <a href="{{route('checkout.gift.card',['price_id' => encrypt(\App\Templates\IGiftCard_Product_Stripe::LIVE_500)])}}" class="nav-link">
                                    <span class="btn btn-small-white rounded primary _600">{{ __('Buy Now') }}</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ############ PAGE END-->

    </div>
    @include('welcome-panels.welcome-footer')
@endsection

@section('page-script')
    <script src="https://js.stripe.com/v3/"></script>
@endsection
