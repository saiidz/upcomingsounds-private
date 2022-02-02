{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Music Promotion Shop')

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom/wallet.css')}}">
@endsection

{{-- page content --}}
@section('content')
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

        <!-- ############ PAGE START-->

        <section class="wallet">
            <div class="container group">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="b-b b-primary nav-active-primary">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#" data-toggle="tab" data-target="#buyUS">Buy UpcomingSounds</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="tab" data-target="#myHT">My history</a>
                                </li>
                                <li>
                                    <div class="tw-w-full tw-flex tw-justify-end">
                                        <span class="text">
                                            <div class="tw-relative">
                                                <div class="tw-flex tw-items-center">
                                                    <span class="amount">0 UCS</span>
                                                    <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </li>
                            </ul>

                        </div>
                        <div class="tab-content m-b-md">
                            <div class="tab-pane animated fadeIn text-muted active" id="buyUS">
                                <div class="purchasedUCS">
                                    <span class="buyUCS">Buy USC (Credits)</span>
                                    <div class="dropdownCurrency">
                                        <select id="selectCurrency" onchange="selectCurrency(this.value)">
                                            <option value="gbp">£ GBP</option>
                                            <option value="cad">$ CAD</option>
                                            <option value="aud">$ AUD</option>
                                            <option value="usd">$ USD</option>
                                            <option value="eur">€ EUR</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid-1-5 BG_product" style="background-image:url({{asset('images/Standard_w_BG.jpg')}})">
                                    <h2>Standard</h2>
                                    <h3><span class="uppercase">5% discount</span></h3>
                                    <div class="priceCurrency" id="priceCurrencyStandard">
                                        <span class="currencySymbolWrapper">£</span>
                                        <span class="currencyWrap"><span>@isset($standard_products){{number_format($standard_products['data'][4]['unit_amount'] / 100, 2)}} @endisset</span></span>
                                    </div>
                                    <ul>
                                        <li class="price_bold">52 <img class="icon_UP" src="{{asset('images/coin_bg.png')}}"></li>
                                        <li class="price_bold">(= 26 contacts)</li>
                                    </ul>
                                    <a href="" class="button">Buy now</a>
                                </div>
                                <div class="grid-1-5 BG_product" style="background-image:url({{asset('images/plus_w_BG.jpg')}})">
                                    <h2>Plus</h2>
                                    <h3><span class="uppercase">17% discount</span></h3>

{{--                                    <h3><sup>$</sup>79<span class="small">/mo</span></h3>--}}
                                    <div class="priceCurrency" id="priceCurrencyPlus">
                                        <span class="currencySymbolWrapper">£</span>
                                        <span class="currencyWrap"><span>@isset($plus_products){{number_format($plus_products['data'][4]['unit_amount'] / 100, 2)}} @endisset</span></span>
                                    </div>
                                    <ul>
                                        <li class="price_bold">120 <img class="icon_UP" src="{{asset('images/coin_bg.png')}}"></li>
                                        <li class="price_bold">(= 60 contacts)</li>
                                    </ul>
                                    <a href="" class="button">Buy now</a>
                                </div>
                                <div class="grid-1-5 BG_product" style="background-image:url({{asset('images/Most_popular-_w_BG.jpg')}})">
                                    <h2 style="font-size: 29px;">Most Popular</h2>
                                    <h3><span class="uppercase">20% discount</span></h3>
                                    <div class="priceCurrency" id="priceCurrencyMostPopular">
                                        <span class="currencySymbolWrapper">£</span>
                                        <span class="currencyWrap"><span>@isset($most_popular_products){{number_format($most_popular_products['data'][4]['unit_amount'] / 100, 2)}} @endisset</span></span>
                                    </div>
                                    <ul>
                                        <li class="price_bold">250 <img class="icon_UP" src="{{asset('images/coin_bg.png')}}"></li>
                                        <li class="price_bold">(= 125 contacts)</li>
                                    </ul>
                                    <a href="" class="button">Buy now</a>
                                </div>
                                <div class="grid-1-5 BG_product" style="background-image:url({{asset('images/Premium_w_BG.jpg')}})">
                                    <h2>Premium</h2>
                                    <h3><span class="uppercase">25% discount</span></h3>
                                    <div class="priceCurrency" id="priceCurrencyPremium">
                                        <span class="currencySymbolWrapper">£</span>
                                        <span class="currencyWrap"><span>@isset($premium_products){{number_format($premium_products['data'][4]['unit_amount'] / 100, 2)}} @endisset</span></span>
                                    </div>
                                    <ul>
                                        <li class="price_bold">520 <img class="icon_UP" src="{{asset('images/coin_bg.png')}}"></li>
                                        <li class="price_bold">(= 260 contacts) </li>
                                    </ul>
                                    <a href="" class="button">Buy now</a>
                                </div>
                                <div class="grid-1-5 BG_product" style="background-image:url({{asset('images/Platinum_w_BG.jpg')}})">
                                    <h2>Platinum</h2>
                                    <h3><span class="uppercase">29% discount</span></h3>
                                    <div class="priceCurrency" id="priceCurrencyPlatinum">
                                        <span class="currencySymbolWrapper">£</span>
                                        <span class="currencyWrap"><span>@isset($platinum_products){{number_format($platinum_products['data'][4]['unit_amount'] / 100, 2)}} @endisset</span></span>
                                    </div>
                                    <ul>
                                        <li class="price_bold">1,100 <img class="icon_UP" src="{{asset('images/coin_bg.png')}}"></li>
                                        <li class="price_bold">(= 550 contacts)</li>
                                    </ul>
                                    <a href="" class="button">Buy now</a>
                                </div>
                            </div>
                            <div class="tab-pane animated fadeIn text-muted" id="myHT">
                                Empty
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="wantUP">
            <div class="mainParentContainer">
                <span class="wantBUCS">Want to buy Upcoming Sounds<br class="br"> by unit?</span>
                <span class="text-black possibleUCS">It's possible! All you have to do is start a campaign.<br class="tw-block"> When you send your campaign, you will be able to buy the exact number of Upcoming Sounds required to send your campaign</span>
                <span class="text-muted pleaseNoteUCS">Please note that by buying credits individually, you do not benefit from the discounts offered by the packs.</span>
                <a href="" class="startCampaign">Start a campaign</a>
            </div>
        </div>
    <!-- ############ PAGE END-->

    </div>
    @include('welcome-panels.welcome-footer')
@endsection

@section('page-script')
    <script>
        //eur currency
        //Standard package
        var standard_eur = {!! (isset($standard_products)) ? json_encode(number_format($standard_products['data'][0]['unit_amount'] / 100, 2)) : '' !!};
        //Plus package
        var plus_eur = {!! (isset($plus_products)) ? json_encode(number_format($plus_products['data'][0]['unit_amount'] / 100, 2)) : '' !!};
        //Most popular package
        var most_popular_eur = {!! (isset($most_popular_products)) ? json_encode(number_format($most_popular_products['data'][0]['unit_amount'] / 100, 2)) : '' !!};
        //Premium package
        var premium_eur = {!! (isset($premium_products)) ? json_encode(number_format($premium_products['data'][0]['unit_amount'] / 100, 2)) : '' !!};
        //Platinum package
        var platinum_eur = {!! (isset($platinum_products)) ? json_encode(number_format($platinum_products['data'][0]['unit_amount'] / 100, 2)) : '' !!};

        //cad currency
        //Standard package
        var standard_cad = {!! (isset($standard_products)) ? json_encode(number_format($standard_products['data'][1]['unit_amount'] / 100, 2)) : '' !!};
        //Plus package
        var plus_cad = {!! (isset($plus_products)) ? json_encode(number_format($plus_products['data'][1]['unit_amount'] / 100, 2)) : '' !!};
        //Most popular package
        var most_popular_cad = {!! (isset($most_popular_products)) ? json_encode(number_format($most_popular_products['data'][1]['unit_amount'] / 100, 2)) : '' !!};
        //Premium package
        var premium_cad = {!! (isset($premium_products)) ? json_encode(number_format($premium_products['data'][1]['unit_amount'] / 100, 2)) : '' !!};
        //Platinum package
        var platinum_cad = {!! (isset($platinum_products)) ? json_encode(number_format($platinum_products['data'][1]['unit_amount'] / 100, 2)) : '' !!};

        //aud currency
        //Standard package
        var standard_aud = {!! (isset($standard_products)) ? json_encode(number_format($standard_products['data'][2]['unit_amount'] / 100, 2)) : '' !!};
        //Plus package
        var plus_aud = {!! (isset($plus_products)) ? json_encode(number_format($plus_products['data'][2]['unit_amount'] / 100, 2)) : '' !!};
        //Most popular package
        var most_popular_aud = {!! (isset($most_popular_products)) ? json_encode(number_format($most_popular_products['data'][2]['unit_amount'] / 100, 2)) : '' !!};
        //Premium package
        var premium_aud = {!! (isset($premium_products)) ? json_encode(number_format($premium_products['data'][2]['unit_amount'] / 100, 2)) : '' !!};
        //Platinum package
        var platinum_aud = {!! (isset($platinum_products)) ? json_encode(number_format($platinum_products['data'][2]['unit_amount'] / 100, 2)) : '' !!};

        //usd currency
        //Standard package
        var standard_usd = {!! (isset($standard_products)) ? json_encode(number_format($standard_products['data'][3]['unit_amount'] / 100, 2)) : '' !!};
        //Plus package
        var plus_usd = {!! (isset($plus_products)) ? json_encode(number_format($plus_products['data'][3]['unit_amount'] / 100, 2)) : '' !!};
        //Most popular package
        var most_popular_usd = {!! (isset($most_popular_products)) ? json_encode(number_format($most_popular_products['data'][3]['unit_amount'] / 100, 2)) : '' !!};
        //Premium package
        var premium_usd = {!! (isset($premium_products)) ? json_encode(number_format($premium_products['data'][3]['unit_amount'] / 100, 2)) : '' !!};
        //Platinum package
        var platinum_usd = {!! (isset($platinum_products)) ? json_encode(number_format($platinum_products['data'][3]['unit_amount'] / 100, 2)) : '' !!};

        //gbp currency
        //Standard package
        var standard_gbp = {!! (isset($standard_products)) ? json_encode(number_format($standard_products['data'][4]['unit_amount'] / 100, 2)) : '' !!};
        //Plus package
        var plus_gbp = {!! (isset($plus_products)) ? json_encode(number_format($plus_products['data'][4]['unit_amount'] / 100, 2)) : '' !!};
        //Most popular package
        var most_popular_gbp = {!! (isset($most_popular_products)) ? json_encode(number_format($most_popular_products['data'][4]['unit_amount'] / 100, 2)) : '' !!};
        //Premium package
        var premium_gbp = {!! (isset($premium_products)) ? json_encode(number_format($premium_products['data'][4]['unit_amount'] / 100, 2)) : '' !!};
        //Platinum package
        var platinum_gbp = {!! (isset($platinum_products)) ? json_encode(number_format($platinum_products['data'][4]['unit_amount'] / 100, 2)) : '' !!};

        function selectCurrency(value){
            if(value == 'eur'){
                //Standard package
                $('#priceCurrencyStandard').html('');
                //Plus package
                $('#priceCurrencyPlus').html('');
                //Most popular package
                $('#priceCurrencyMostPopular').html('');
                //Premium package
                $('#priceCurrencyPremium').html('');
                //Platinum package
                $('#priceCurrencyPlatinum').html('');

                //Standard package
                $('#priceCurrencyStandard').append('<span class="currencyWrap">'+standard_eur+'<span></span></span><span class="currencySymbolWrapper">€</span>');
                //Plus package
                $('#priceCurrencyPlus').append('<span class="currencyWrap">'+plus_eur+'<span></span></span><span class="currencySymbolWrapper">€</span>');
                //Most popular package
                $('#priceCurrencyMostPopular').append('<span class="currencyWrap">'+most_popular_eur+'<span></span></span><span class="currencySymbolWrapper">€</span>');
                //Premium package
                $('#priceCurrencyPremium').append('<span class="currencyWrap">'+premium_eur+'<span></span></span><span class="currencySymbolWrapper">€</span>');
                //Platinum package
                $('#priceCurrencyPlatinum').append('<span class="currencyWrap">'+platinum_eur+'<span></span></span><span class="currencySymbolWrapper">€</span>');
            }else if(value == 'cad'){
                //Standard package
                $('#priceCurrencyStandard').html('');
                //Plus package
                $('#priceCurrencyPlus').html('');
                //Most popular package
                $('#priceCurrencyMostPopular').html('');
                //Premium package
                $('#priceCurrencyPremium').html('');
                //Platinum package
                $('#priceCurrencyPlatinum').html('');

                //Standard package
                $('#priceCurrencyStandard').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+standard_cad+'<span></span></span>');
                //Plus package
                $('#priceCurrencyPlus').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+plus_cad+'<span></span></span>');
                //Most popular package
                $('#priceCurrencyMostPopular').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+most_popular_cad+'<span></span></span>');
                //Premium package
                $('#priceCurrencyPremium').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+premium_cad+'<span></span></span>');
                //Platinum package
                $('#priceCurrencyPlatinum').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+platinum_cad+'<span></span></span>');
            }else if(value == 'aud'){
                //Standard package
                $('#priceCurrencyStandard').html('');
                //Plus package
                $('#priceCurrencyPlus').html('');
                //Most popular package
                $('#priceCurrencyMostPopular').html('');
                //Premium package
                $('#priceCurrencyPremium').html('');
                //Platinum package
                $('#priceCurrencyPlatinum').html('');

                //Standard package
                $('#priceCurrencyStandard').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+standard_aud+'<span></span></span>');
                //Plus package
                $('#priceCurrencyPlus').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+plus_aud+'<span></span></span>');
                //Most popular package
                $('#priceCurrencyMostPopular').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+most_popular_aud+'<span></span></span>');
                //Premium package
                $('#priceCurrencyPremium').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+premium_aud+'<span></span></span>');
                //Platinum package
                $('#priceCurrencyPlatinum').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+platinum_aud+'<span></span></span>');
            }else if(value == 'usd'){
                //Standard package
                $('#priceCurrencyStandard').html('');
                //Plus package
                $('#priceCurrencyPlus').html('');
                //Most popular package
                $('#priceCurrencyMostPopular').html('');
                //Premium package
                $('#priceCurrencyPremium').html('');
                //Platinum package
                $('#priceCurrencyPlatinum').html('');

                //Standard package
                $('#priceCurrencyStandard').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+standard_usd+'<span></span></span>');
                //Plus package
                $('#priceCurrencyPlus').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+plus_usd+'<span></span></span>');
                //Most popular package
                $('#priceCurrencyMostPopular').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+most_popular_usd+'<span></span></span>');
                //Premium package
                $('#priceCurrencyPremium').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+premium_usd+'<span></span></span>');
                //Platinum package
                $('#priceCurrencyPlatinum').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+platinum_usd+'<span></span></span>');
            }else if(value == 'gbp'){
                //Standard package
                $('#priceCurrencyStandard').html('');
                //Plus package
                $('#priceCurrencyPlus').html('');
                //Most popular package
                $('#priceCurrencyMostPopular').html('');
                //Premium package
                $('#priceCurrencyPremium').html('');
                //Platinum package
                $('#priceCurrencyPlatinum').html('');

                //Standard package
                $('#priceCurrencyStandard').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+standard_gbp+'<span></span></span>');
                //Plus package
                $('#priceCurrencyPlus').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+plus_gbp+'<span></span></span>');
                //Most popular package
                $('#priceCurrencyMostPopular').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+most_popular_gbp+'<span></span></span>');
                //Premium package
                $('#priceCurrencyPremium').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+premium_gbp+'<span></span></span>');
                //Platinum package
                $('#priceCurrencyPlatinum').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+platinum_gbp+'<span></span></span>');
            }
        }
    </script>
@endsection
