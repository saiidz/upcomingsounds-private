{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Music Promotion Shop')

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom/wallet.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        #loadings {
            position: absolute;
            top: 0;
            left: 0;
            height: 100vh;
            width: 100%;
            z-index: 9999999;
            background: rgba(255, 255, 255, .4) url({{asset('images/USW_GIF.gif')}}) no-repeat center center !important;
        }
        #walletLoadings {
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
        #myHistory .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active,
        #myCouponHistory .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
            color: white !important;
        }
        #myHistory a.paginate_button ,
        #myCouponHistory a.paginate_button
        {
            color: white!important;
        }
        #myHistory.dataTables_wrapper .dataTables_paginate .paginate_button:active,
        #myCouponHistory.dataTables_wrapper .dataTables_paginate .paginate_button:active
        {
            background-color: #2b2b2b!important;
            background: linear-gradient(to bottom, #2b2b2b 0%, #0c0c0c 100%)!important;
            box-shadow: inset 0 0 3px #111!important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
            background-color: #2b2b2b!important;
            background: linear-gradient(to bottom, #2b2b2b 0%, #0c0c0c 100%)!important;
            box-shadow: inset 0 0 3px #111!important;
        }
        #myHistory tr.odd,
        #myHistory tr.even,
        #myCouponHistory tr.odd,
        #myCouponHistory tr.even
        {
            color: black;
        }
        /*input.has-value {*/
        /*    color: white !important;*/
        /*}*/
        .dataTables_wrapper .dataTables_filter input {
            color: white !important;
        }
    </style>
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
                                    <a class="nav-link active" href="#" data-toggle="tab" onclick="myHistory()" data-target="#buyUS">Buy UpcomingSounds Credits</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" onclick="myHistory()" data-toggle="tab" data-target="#myHistory">My History</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="javascript:void(0)" onclick="myCouponHistory()" data-toggle="tab" data-target="#myCouponHistory">Coupon/Gift Card</a>
                                </li>
                                <li>
                                    <div class="tw-w-full tw-flex tw-justify-end" id="uscStyle">
                                        <span class="text">
                                            <div class="tw-relative">
                                                <div class="tw-flex tw-items-center">
                                                    <span class="amount">{{\App\Models\User::artistBalance()}} USC</span>
{{--                                                    <span class="amount">{{!empty(Auth::user()->TransactionUserInfo) ? Auth::user()->TransactionUserInfo->transactionHistory->sum('credits') - (!empty(Auth::user()->campaign) ? Auth::user()->campaign->sum('usc_credit') : 0) : 0}} USC</span>--}}
{{--                                                    <span class="amount">{{!empty(Auth::user()->TransactionUserInfo) ? number_format(Auth::user()->TransactionUserInfo->transactionHistory->sum('credits')) - (!empty(Auth::user()->campaign) ? number_format(Auth::user()->campaign->sum('usc_credit')) : 0) : 0}} UCS</span>--}}
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
{{--                                        <select id="selectCurrency" onchange="selectCurrency(this.value)">--}}
{{--                                            <option value="gbp">£ GBP</option>--}}
{{--                                            <option value="cad">$ CAD</option>--}}
{{--                                            <option value="aud">$ AUD</option>--}}
{{--                                            <option value="usd">$ USD</option>--}}
{{--                                            <option value="eur">€ EUR</option>--}}
{{--                                        </select>--}}
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
                                        <li class="price_bold">52
{{--                                            <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">--}}
                                        </li>
{{--                                        <li class="price_bold">(= 26 contacts)</li>--}}
                                    </ul>
                                    <a href="javascript:void(0)" class="button buyStandardNow" onclick="buyStandardNow()" data-standard-package="Standard" data-standard-contacts="52" data-standard-currency="gbp" data-standard-price="@isset($standard_products){{number_format($standard_products['data'][4]['unit_amount'] / 100, 2)}} @endisset">Buy now</a>
                                </div>
                                <div class="grid-1-5 BG_product" style="background-image:url({{asset('images/Standard_w_BG.jpg')}})">
                                    <h2>Plus</h2>
                                    <h3><span class="uppercase">17% discount</span></h3>

{{--                                    <h3><sup>$</sup>79<span class="small">/mo</span></h3>--}}
                                    <div class="priceCurrency" id="priceCurrencyPlus">
                                        <span class="currencySymbolWrapper">£</span>
                                        <span class="currencyWrap"><span>@isset($plus_products){{number_format($plus_products['data'][4]['unit_amount'] / 100, 2)}} @endisset</span></span>
                                    </div>
                                    <ul>
                                        <li class="price_bold">120
{{--                                            <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">--}}
                                        </li>
{{--                                        <li class="price_bold">(= 60 contacts)</li>--}}
                                    </ul>
                                    <a href="javascript:void(0)" class="button buyPlusNow" onclick="buyPlusNow()" data-plus-package="Plus" data-plus-contacts="120" data-plus-currency="gbp" data-plus-price="@isset($plus_products){{number_format($plus_products['data'][4]['unit_amount'] / 100, 2)}} @endisset">Buy now</a>
                                </div>
                                <div class="grid-1-5 BG_product" style="background-image:url({{asset('images/Standard_w_BG.jpg')}})">
                                    <h2 style="font-size: 29px;">Most Popular</h2>
                                    <h3><span class="uppercase">20% discount</span></h3>
                                    <div class="priceCurrency" id="priceCurrencyMostPopular">
                                        <span class="currencySymbolWrapper">£</span>
                                        <span class="currencyWrap"><span>@isset($most_popular_products){{number_format($most_popular_products['data'][4]['unit_amount'] / 100, 2)}} @endisset</span></span>
                                    </div>
                                    <ul>
                                        <li class="price_bold">250
{{--                                            <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">--}}
                                        </li>
{{--                                        <li class="price_bold">(= 125 contacts)</li>--}}
                                    </ul>
                                    <a href="javascript:void(0)" class="button buyMostNow" onclick="buyMostNow()" data-most-package="Most Popular" data-most-contacts="250" data-most-currency="gbp" data-most-price="@isset($most_popular_products){{number_format($most_popular_products['data'][4]['unit_amount'] / 100, 2)}} @endisset">Buy now</a>
                                </div>
                                <div class="grid-1-5 BG_product" style="background-image:url({{asset('images/Standard_w_BG.jpg')}})">
                                    <h2>Premium</h2>
                                    <h3><span class="uppercase">25% discount</span></h3>
                                    <div class="priceCurrency" id="priceCurrencyPremium">
                                        <span class="currencySymbolWrapper">£</span>
                                        <span class="currencyWrap"><span>@isset($premium_products){{number_format($premium_products['data'][4]['unit_amount'] / 100, 2)}} @endisset</span></span>
                                    </div>
                                    <ul>
                                        <li class="price_bold">520
{{--                                            <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">--}}
                                        </li>
{{--                                        <li class="price_bold">(= 260 contacts) </li>--}}
                                    </ul>
                                    <a href="javascript:void(0)" class="button buyPremiumNow" onclick="buyPremiumNow()" data-premium-package="Premium" data-premium-contacts="520" data-premium-currency="gbp" data-premium-price="@isset($premium_products){{number_format($premium_products['data'][4]['unit_amount'] / 100, 2)}} @endisset">Buy now</a>
                                </div>
                                <div class="grid-1-5 BG_product" style="background-image:url({{asset('images/Standard_w_BG.jpg')}})">
                                    <h2>Platinum</h2>
                                    <h3><span class="uppercase">29% discount</span></h3>
                                    <div class="priceCurrency" id="priceCurrencyPlatinum">
                                        <span class="currencySymbolWrapper">£</span>
                                        <span class="currencyWrap"><span>@isset($platinum_products){{number_format($platinum_products['data'][4]['unit_amount'] / 100, 2)}} @endisset</span></span>
                                    </div>
                                    <ul>
                                        <li class="price_bold">1,100
{{--                                            <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">--}}
                                        </li>
{{--                                        <li class="price_bold">(= 550 contacts)</li>--}}
                                    </ul>
                                    <a href="javascript:void(0)" class="button buyPlantinumNow" onclick="buyPlantinumNow()" data-plantinum-package="Platinum" data-plantinum-contacts="1100" data-plantinum-currency="gbp" data-plantinum-price="@isset($platinum_products){{number_format($platinum_products['data'][4]['unit_amount'] / 100, 2)}} @endisset">Buy now</a>
{{--                                    <a href="" class="button">Buy now</a>--}}
                                </div>
                            </div>
                            {{--  History  Wallet --}}
                            @include('pages.artists.artist-wallet.history')

                            {{-- Coupon gift card history --}}
                            @include('pages.artists.artist-wallet.coupon-gift-card-history')
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="wantUP">
            <div class="mainParentContainer">
                <div class="wantTOBuy">
                    <span class="wantBUCS">Want to buy USC<br class="br"> by unit?</span>
                    <span class="wantPUCS">You can purchase between 1 and 1000 | USC credits</span>

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="purchase_credit_wallet">
                                <img class="icon_UP_check_wallet" src="{{asset('images/coin_bg.png')}}">
                                <input type="number" min="1" class="form-control" name="amountUSC" id="amountUSC" placeholder="Please enter the amount of credits you would like to purchase" value="" required>
                                <a href="javascript:void(0)" class="buyNow_P_C buyOneUSCNow" id="buyOneUSCNow" onclick="buyOneUSCNow()" data-one-usc-package="1 USC" data-one-usc-contacts="1" data-one-usc-currency="gbp" data-one-usc-price="@isset($one_usc_products){{number_format($one_usc_products['data'][0]['unit_amount'] / 100, 2)}} @endisset">Buy now</a>
                            </div>
                        </div>
                    </div>

                    <span class="text-black possibleUCS">It's possible! All you have to do is start a campaign.<br class="tw-block"> When you send your campaign, you will be able to buy the exact number of Upcoming Sounds required to send your campaign</span>
                    <span class="text-muted pleaseNoteUCS">Please note that by buying credits individually, you do not benefit from the discounts offered by the packs.</span>
                </div>

                {{--Claim Coupons Code--}}
                <div class="row couponClaimNow" style="margin-bottom:25px; display:none;">
                    <div class="col-sm-12">
                        <div class="purchase_credit_wallet">
                            <img class="icon_UP_check_wallet" src="{{asset('images/coin_bg.png')}}">
                            <input type="text" min="1" class="form-control" id="couponCode" placeholder="Enter Coupon Code" value="" required>
                            <a href="javascript:void(0)" class="buyNow_P_C couponCodeClaimNow" id="couponCodeClaimNow" onclick="couponClaimNow()">Claim Now</a>
                        </div>
                    </div>
                </div>
                {{--Claim Coupons Code--}}

                <a href="{{url('welcome-your-track')}}" class="startCampaign">Start a campaign</a>
            </div>
        </div>
    <!-- ############ PAGE END-->
{{--        @include('pages.artists.artist-wallet.stripe-model')--}}
    </div>
    @include('welcome-panels.welcome-footer')
@endsection

@section('page-script')
{{--    <script src="{{asset('js/jquery.min.js')}}"></script>--}}
    <script src="https://js.stripe.com/v3/"></script>

    <script>
        // couponClaimNow js
        function couponClaimNow()
        {
            let coupon_code = $('#couponCode').val();
            if(coupon_code === "")
            {
                toastr.error('Please Add Coupon Code');
                return false;
            }

            document.getElementById('couponCodeClaimNow').style.pointerEvents="none";
            document.getElementById('couponCodeClaimNow').style.cursor="default";

            $.ajax({
                type: 'POST',
                url: '{{route('claim.now.coupon')}}',
                data: {
                    coupon_code: coupon_code,
                },
                success:function (response){
                    document.getElementById('couponCodeClaimNow').style.pointerEvents="auto";
                    document.getElementById('couponCodeClaimNow').style.cursor="pointer";

                    if(response.success)
                    {
                        toastr.success(response.success);
                        $('#couponCode').val('');
                        setTimeout(function() {
                            location.reload();
                        }, 3000);
                        return false;
                    }
                    if(response.error)
                    {
                        toastr.error(response.error);
                        return false;
                    }
                },
            });
        }
    </script>
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
                // empty data-standard-price
                $('.buyStandardNow').attr('data-standard-price','');
                $('.buyStandardNow').attr('data-standard-currency','');

                //Plus package
                $('#priceCurrencyPlus').html('');
                // empty data-plus-price
                $('.buyPlusNow').attr('data-plus-price','');
                $('.buyPlusNow').attr('data-plus-currency','');

                //Most popular package
                $('#priceCurrencyMostPopular').html('');
                // empty data-most-price
                $('.buyMostNow').attr('data-most-price','');
                $('.buyMostNow').attr('data-most-currency','');

                //Premium package
                $('#priceCurrencyPremium').html('');
                // empty data-premium-price
                $('.buyPremiumNow').attr('data-premium-price','');
                $('.buyPremiumNow').attr('data-premium-currency','');

                //Platinum package
                $('#priceCurrencyPlatinum').html('');
                // empty data-plantinum-price
                $('.buyPlantinumNow').attr('data-plantinum-price','');
                $('.buyPlantinumNow').attr('data-plantinum-currency','');

                //Standard package
                $('#priceCurrencyStandard').append('<span class="currencyWrap">'+standard_eur+'<span></span></span><span class="currencySymbolWrapper">€</span>');
                $('.buyStandardNow').attr('data-standard-price',standard_eur);
                $('.buyStandardNow').attr('data-standard-currency',value);

                //Plus package
                $('#priceCurrencyPlus').append('<span class="currencyWrap">'+plus_eur+'<span></span></span><span class="currencySymbolWrapper">€</span>');
                $('.buyPlusNow').attr('data-plus-price',plus_eur);
                $('.buyPlusNow').attr('data-plus-currency',value);

                //Most popular package
                $('#priceCurrencyMostPopular').append('<span class="currencyWrap">'+most_popular_eur+'<span></span></span><span class="currencySymbolWrapper">€</span>');
                $('.buyMostNow').attr('data-most-price',most_popular_eur);
                $('.buyMostNow').attr('data-most-currency',value);

                //Premium package
                $('#priceCurrencyPremium').append('<span class="currencyWrap">'+premium_eur+'<span></span></span><span class="currencySymbolWrapper">€</span>');
                $('.buyPremiumNow').attr('data-premium-price',premium_eur);
                $('.buyPremiumNow').attr('data-premium-currency',value);

                //Platinum package
                $('#priceCurrencyPlatinum').append('<span class="currencyWrap">'+platinum_eur+'<span></span></span><span class="currencySymbolWrapper">€</span>');
                $('.buyPlantinumNow').attr('data-plantinum-price',platinum_eur);
                $('.buyPlantinumNow').attr('data-plantinum-currency',value);

            }else if(value == 'cad'){
                //Standard package
                $('#priceCurrencyStandard').html('');
                // empty data-standard-price
                $('.buyStandardNow').attr('data-standard-price','');
                $('.buyStandardNow').attr('data-standard-currency','');

                //Plus package
                $('#priceCurrencyPlus').html('');
                // empty data-plus-price
                $('.buyPlusNow').attr('data-plus-price','');
                $('.buyPlusNow').attr('data-plus-currency','');

                //Most popular package
                $('#priceCurrencyMostPopular').html('');
                // empty data-most-price
                $('.buyMostNow').attr('data-most-price','');
                $('.buyMostNow').attr('data-most-currency','');

                //Premium package
                $('#priceCurrencyPremium').html('');
                // empty data-premium-price
                $('.buyPremiumNow').attr('data-premium-price','');
                $('.buyPremiumNow').attr('data-premium-currency','');

                //Platinum package
                $('#priceCurrencyPlatinum').html('');
                // empty data-plantinum-price
                $('.buyPlantinumNow').attr('data-plantinum-price','');
                $('.buyPlantinumNow').attr('data-plantinum-currency','');

                //Standard package
                $('#priceCurrencyStandard').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+standard_cad+'<span></span></span>');
                $('.buyStandardNow').attr('data-standard-price',standard_cad);
                $('.buyStandardNow').attr('data-standard-currency',value);

                //Plus package
                $('#priceCurrencyPlus').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+plus_cad+'<span></span></span>');
                $('.buyPlusNow').attr('data-plus-price',plus_cad);
                $('.buyPlusNow').attr('data-plus-currency',value);

                //Most popular package
                $('#priceCurrencyMostPopular').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+most_popular_cad+'<span></span></span>');
                $('.buyMostNow').attr('data-most-price',most_popular_cad);
                $('.buyMostNow').attr('data-most-currency',value);

                //Premium package
                $('#priceCurrencyPremium').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+premium_cad+'<span></span></span>');
                $('.buyPremiumNow').attr('data-premium-price',premium_cad);
                $('.buyPremiumNow').attr('data-premium-currency',value);

                //Platinum package
                $('#priceCurrencyPlatinum').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+platinum_gbp+'<span></span></span>');
                $('.buyPlantinumNow').attr('data-plantinum-price',platinum_gbp);
                $('.buyPlantinumNow').attr('data-plantinum-currency','gbp');

                // $('#priceCurrencyPlatinum').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+platinum_cad+'<span></span></span>');
                // $('.buyPlantinumNow').attr('data-plantinum-price',platinum_cad);
                // $('.buyPlantinumNow').attr('data-plantinum-currency',value);

            }else if(value == 'aud'){
                //Standard package
                $('#priceCurrencyStandard').html('');
                // empty data-standard-price
                $('.buyStandardNow').attr('data-standard-price','');
                $('.buyStandardNow').attr('data-standard-currency','');

                //Plus package
                $('#priceCurrencyPlus').html('');
                // empty data-plus-price
                $('.buyPlusNow').attr('data-plus-price','');
                $('.buyPlusNow').attr('data-plus-currency','');

                //Most popular package
                $('#priceCurrencyMostPopular').html('');
                // empty data-most-price
                $('.buyMostNow').attr('data-most-price','');
                $('.buyMostNow').attr('data-most-currency','');

                //Premium package
                $('#priceCurrencyPremium').html('');
                // empty data-premium-price
                $('.buyPremiumNow').attr('data-premium-price','');
                $('.buyPremiumNow').attr('data-premium-currency','');

                //Platinum package
                $('#priceCurrencyPlatinum').html('');
                // empty data-plantinum-price
                $('.buyPlantinumNow').attr('data-plantinum-price','');
                $('.buyPlantinumNow').attr('data-plantinum-currency','');

                //Standard package
                $('#priceCurrencyStandard').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+standard_aud+'<span></span></span>');
                $('.buyStandardNow').attr('data-standard-price',standard_aud);
                $('.buyStandardNow').attr('data-standard-currency',value);

                //Plus package
                $('#priceCurrencyPlus').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+plus_aud+'<span></span></span>');
                $('.buyPlusNow').attr('data-plus-price',plus_aud);
                $('.buyPlusNow').attr('data-plus-currency',value);

                //Most popular package
                $('#priceCurrencyMostPopular').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+most_popular_aud+'<span></span></span>');
                $('.buyMostNow').attr('data-most-price',most_popular_aud);
                $('.buyMostNow').attr('data-most-currency',value);

                //Premium package
                $('#priceCurrencyPremium').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+premium_aud+'<span></span></span>');
                $('.buyPremiumNow').attr('data-premium-price',premium_aud);
                $('.buyPremiumNow').attr('data-premium-currency',value);

                //Platinum package
                $('#priceCurrencyPlatinum').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+platinum_gbp+'<span></span></span>');
                $('.buyPlantinumNow').attr('data-plantinum-price',platinum_gbp);
                $('.buyPlantinumNow').attr('data-plantinum-currency','gbp');

                // $('#priceCurrencyPlatinum').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+platinum_aud+'<span></span></span>');
                // $('.buyPlantinumNow').attr('data-plantinum-price',platinum_aud);
                // $('.buyPlantinumNow').attr('data-plantinum-currency',value);

            }else if(value == 'usd'){
                //Standard package
                $('#priceCurrencyStandard').html('');
                // empty data-standard-price
                $('.buyStandardNow').attr('data-standard-price','');
                $('.buyStandardNow').attr('data-standard-currency','');

                //Plus package
                $('#priceCurrencyPlus').html('');
                // empty data-plus-price
                $('.buyPlusNow').attr('data-plus-price','');
                $('.buyPlusNow').attr('data-plus-currency','');

                //Most popular package
                $('#priceCurrencyMostPopular').html('');
                // empty data-most-price
                $('.buyMostNow').attr('data-most-price','');
                $('.buyMostNow').attr('data-most-currency','');

                //Premium package
                $('#priceCurrencyPremium').html('');
                // empty data-premium-price
                $('.buyPremiumNow').attr('data-premium-price','');
                $('.buyPremiumNow').attr('data-premium-currency','');

                //Platinum package
                $('#priceCurrencyPlatinum').html('');
                // empty data-plantinum-price
                $('.buyPlantinumNow').attr('data-plantinum-price','');
                $('.buyPlantinumNow').attr('data-plantinum-currency','');

                //Standard package
                $('#priceCurrencyStandard').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+standard_usd+'<span></span></span>');
                $('.buyStandardNow').attr('data-standard-price',standard_usd);
                $('.buyStandardNow').attr('data-standard-currency',value);

                //Plus package
                $('#priceCurrencyPlus').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+plus_usd+'<span></span></span>');
                $('.buyPlusNow').attr('data-plus-price',plus_usd);
                $('.buyPlusNow').attr('data-plus-currency',value);

                //Most popular package
                $('#priceCurrencyMostPopular').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+most_popular_usd+'<span></span></span>');
                $('.buyMostNow').attr('data-most-price',most_popular_usd);
                $('.buyMostNow').attr('data-most-currency',value);

                //Premium package
                $('#priceCurrencyPremium').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+premium_usd+'<span></span></span>');
                $('.buyPremiumNow').attr('data-premium-price',premium_usd);
                $('.buyPremiumNow').attr('data-premium-currency',value);

                //Platinum package
                $('#priceCurrencyPlatinum').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+platinum_gbp+'<span></span></span>');
                $('.buyPlantinumNow').attr('data-plantinum-price',platinum_gbp);
                $('.buyPlantinumNow').attr('data-plantinum-currency','gbp');

                // $('#priceCurrencyPlatinum').append('<span class="currencySymbolWrapper">$</span><span class="currencyWrap">'+platinum_usd+'<span></span></span>');
                // $('.buyPlantinumNow').attr('data-plantinum-price',platinum_usd);
                // $('.buyPlantinumNow').attr('data-plantinum-currency',value);

            }else if(value == 'gbp'){
                //Standard package
                $('#priceCurrencyStandard').html('');
                // empty data-standard-price
                $('.buyStandardNow').attr('data-standard-price','');
                $('.buyStandardNow').attr('data-standard-currency','');

                //Plus package
                $('#priceCurrencyPlus').html('');
                // empty data-plus-price
                $('.buyPlusNow').attr('data-plus-price','');
                $('.buyPlusNow').attr('data-plus-currency','');

                //Most popular package
                $('#priceCurrencyMostPopular').html('');
                // empty data-most-price
                $('.buyMostNow').attr('data-most-price','');
                $('.buyMostNow').attr('data-most-currency','');

                //Premium package
                $('#priceCurrencyPremium').html('');
                // empty data-premium-price
                $('.buyPremiumNow').attr('data-premium-price','');
                $('.buyPremiumNow').attr('data-premium-currency','');

                //Platinum package
                $('#priceCurrencyPlatinum').html('');
                // empty data-plantinum-price
                $('.buyPlantinumNow').attr('data-plantinum-price','');
                $('.buyPlantinumNow').attr('data-plantinum-currency','');

                //Standard package
                $('#priceCurrencyStandard').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+standard_gbp+'<span></span></span>');
                $('.buyStandardNow').attr('data-standard-price',standard_gbp);
                $('.buyStandardNow').attr('data-standard-currency',value);

                //Plus package
                $('#priceCurrencyPlus').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+plus_gbp+'<span></span></span>');
                $('.buyPlusNow').attr('data-plus-price',plus_gbp);
                $('.buyPlusNow').attr('data-plus-currency',value);

                //Most popular package
                $('#priceCurrencyMostPopular').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+most_popular_gbp+'<span></span></span>');
                $('.buyMostNow').attr('data-most-price',most_popular_gbp);
                $('.buyMostNow').attr('data-most-currency',value);

                //Premium package
                $('#priceCurrencyPremium').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+premium_gbp+'<span></span></span>');
                $('.buyPremiumNow').attr('data-premium-price',premium_gbp);
                $('.buyPremiumNow').attr('data-premium-currency',value);

                //Platinum package
                $('#priceCurrencyPlatinum').append('<span class="currencySymbolWrapper">£</span><span class="currencyWrap">'+platinum_gbp+'<span></span></span>');
                $('.buyPlantinumNow').attr('data-plantinum-price',platinum_gbp);
                $('.buyPlantinumNow').attr('data-plantinum-currency',value);

            }
        }
    </script>
    <script>
        // stripe javascript
        {{--var stripe = Stripe("{{ \Config::get('services.stripe.key') }}");--}}
        {{--// Create an instance of Elements.--}}
        {{--var elements = stripe.elements();--}}
        {{--// Custom styling can be passed to options when creating an Element.--}}
        {{--// (Note that this demo uses a wider set of styles than the guide below.)--}}
        {{--var style = {--}}
        {{--    base: {--}}
        {{--        color: '#32325d',--}}
        {{--        fontFamily: '"Helvetica Neue", Helvetica, sans-serif',--}}
        {{--        fontSmoothing: 'antialiased',--}}
        {{--        fontSize: '16px',--}}
        {{--        '::placeholder': {--}}
        {{--            color: '#aab7c4'--}}
        {{--        }--}}
        {{--    },--}}
        {{--    invalid: {--}}
        {{--        color: '#fa755a',--}}
        {{--        iconColor: '#fa755a'--}}
        {{--    }--}}
        {{--};--}}
        {{--// Create an instance of the card Element.--}}
        {{--var card = elements.create('card', {--}}
        {{--    hidePostalCode: true,--}}
        {{--    style: style--}}
        {{--});--}}
        {{--// Add an instance of the card Element into the `card-element` <div>.--}}
        {{--card.mount('#card-element');--}}
        {{--// Handle real-time validation errors from the card Element.--}}
        {{--card.on('change', function (event) {--}}
        {{--    var displayError = document.getElementById('card-errors');--}}
        {{--    if (event.error) {--}}
        {{--        displayError.textContent = event.error.message;--}}
        {{--    } else {--}}
        {{--        displayError.textContent = '';--}}
        {{--    }--}}
        {{--});--}}
        {{--// Handle form submission.--}}
        {{--var form = document.getElementById('stripe-form');--}}
        {{--document.getElementById('submit-stripe').addEventListener('click', function () {--}}
        {{--    // console.log(form);--}}
        {{--    const cardButton = document.getElementById('client_secret');--}}
        {{--    const clientSecret = cardButton.getAttribute('value');--}}
        {{--    console.log(clientSecret);--}}
        {{--    stripe.createToken(card).then(function(result) {--}}
        {{--        var form = document.getElementById('stripe-form');--}}
        {{--        var hiddenCardInput = document.createElement('input');--}}
        {{--        hiddenCardInput.setAttribute('type', 'hidden');--}}
        {{--        hiddenCardInput.setAttribute('name', 'cardMethod');--}}
        {{--        hiddenCardInput.setAttribute('value', result.token.id);--}}
        {{--        form.appendChild(hiddenCardInput);--}}
        {{--    });--}}
        {{--    stripe.handleCardSetup(clientSecret, card, {--}}
        {{--        payment_method_data: {--}}
        {{--        }--}}
        {{--    })--}}
        {{--        .then(function(result) {--}}
        {{--            if (result.error) {--}}
        {{--                // Inform the user if there was an error.--}}
        {{--                var errorElement = document.getElementById('card-errors');--}}
        {{--                errorElement.textContent = result.error.message;--}}
        {{--            } else {--}}
        {{--                // Send the token to your server.--}}
        {{--                stripeTokenHandler(result.setupIntent.payment_method);--}}
        {{--                // $('#confirmMsg').modal('show');--}}
        {{--            }--}}
        {{--        });--}}
        {{--});--}}
        {{--// Submit the form with the token ID.--}}
        {{--function stripeTokenHandler(paymentMethod) {--}}
        {{--    // Insert the token ID into the form so it gets submitted to the server--}}
        {{--    var form = document.getElementById('stripe-form');--}}
        {{--    var hiddenInput = document.createElement('input');--}}
        {{--    hiddenInput.setAttribute('type', 'hidden');--}}
        {{--    hiddenInput.setAttribute('name', 'paymentMethod');--}}
        {{--    hiddenInput.setAttribute('value', paymentMethod);--}}
        {{--    form.appendChild(hiddenInput);--}}
        {{--    // Submit the form--}}
        {{--    form.submit();--}}
        {{--}--}}

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function buyStandardNow(){
            $('.buyStandardNow').prop('disabled', true);
            // $('#model_stripe').modal('show');
            var standard_price = $('.buyStandardNow').attr('data-standard-price');
            var standard_currency = $('.buyStandardNow').attr('data-standard-currency');
            var standard_contacts = $('.buyStandardNow').attr('data-standard-contacts');
            var standard_package = $('.buyStandardNow').attr('data-standard-package');

            $.ajax({
                type: 'POST',
                url: '{{url('checkout')}}',
                data: {
                    price: standard_price,
                    currency: standard_currency,
                    contacts: standard_contacts,
                    package: standard_package,
                },
                success:function (data){
                    $('.buyStandardNow').prop('disabled', false);
                    window.location.href = "/artist-checkout";
                    // window.location.href = "/artist-checkout?price="+ data.price + "&currency="+ data.currency + "&contacts="+ data.contacts + "&package="+ data.package;
                },
            });

            //set value on stripe form
            // document.getElementById('total_amount_stripe').value = Math.abs(standard_price);
            // document.getElementById('currency_stripe').value = standard_currency;
            // document.getElementById('contacts').value = standard_contacts;
            // document.getElementById('package_name').value = standard_package;
        }

        function buyPlusNow(){
            $('.buyPlusNow').prop('disabled', true);
            // $('#model_stripe').modal('show');
            var plus_price = $('.buyPlusNow').attr('data-plus-price');
            var plus_currency = $('.buyPlusNow').attr('data-plus-currency');
            var plus_contacts = $('.buyPlusNow').attr('data-plus-contacts');
            var plus_package = $('.buyPlusNow').attr('data-plus-package');

            $.ajax({
                type: 'POST',
                url: '{{url('checkout')}}',
                data: {
                    price: plus_price,
                    currency: plus_currency,
                    contacts: plus_contacts,
                    package: plus_package,
                },
                success:function (data){
                    $('.buyPlusNow').prop('disabled', false);
                    window.location.href = "/artist-checkout";
                    // window.location.href = "/artist-checkout?price="+ data.price + "&currency="+ data.currency + "&contacts="+ data.contacts + "&package="+ data.package;
                },
            });

            //set value on stripe form
            // document.getElementById('total_amount_stripe').value = Math.abs(plus_price);
            // document.getElementById('currency_stripe').value = plus_currency;
            // document.getElementById('contacts').value = plus_contacts;
            // document.getElementById('package_name').value = plus_package;
        }

        function buyMostNow(){
            $('.buyMostNow').prop('disabled', true);
            // $('#model_stripe').modal('show');
            var most_price = $('.buyMostNow').attr('data-most-price');
            var most_currency = $('.buyMostNow').attr('data-most-currency');
            var most_contacts = $('.buyMostNow').attr('data-most-contacts');
            var most_package = $('.buyMostNow').attr('data-most-package');

            $.ajax({
                type: 'POST',
                url: '{{url('checkout')}}',
                data: {
                    price: most_price,
                    currency: most_currency,
                    contacts: most_contacts,
                    package: most_package,
                },
                success:function (data){
                    $('.buyMostNow').prop('disabled', false);
                    window.location.href = "/artist-checkout";
                    // window.location.href = "/artist-checkout?price="+ data.price + "&currency="+ data.currency + "&contacts="+ data.contacts + "&package="+ data.package;
                },
            });

            //set value on stripe form
            // document.getElementById('total_amount_stripe').value = Math.abs(most_price);
            // document.getElementById('currency_stripe').value = most_currency;
            // document.getElementById('contacts').value = most_contacts;
            // document.getElementById('package_name').value = most_package;
        }

        function buyPremiumNow(){
            $('.buyPremiumNow').prop('disabled', true);
            // $('#model_stripe').modal('show');
            var premium_price = $('.buyPremiumNow').attr('data-premium-price');
            var premium_currency = $('.buyPremiumNow').attr('data-premium-currency');
            var premium_contacts = $('.buyPremiumNow').attr('data-premium-contacts');
            var premium_package = $('.buyPremiumNow').attr('data-premium-package');

            $.ajax({
                type: 'POST',
                url: '{{url('checkout')}}',
                data: {
                    price: premium_price,
                    currency: premium_currency,
                    contacts: premium_contacts,
                    package: premium_package,
                },
                success:function (data){
                    $('.buyPremiumNow').prop('disabled', false);
                    window.location.href = "/artist-checkout";
                    // window.location.href = "/artist-checkout?price="+ data.price + "&currency="+ data.currency + "&contacts="+ data.contacts + "&package="+ data.package;
                },
            });

            //set value on stripe form
            // document.getElementById('total_amount_stripe').value = Math.abs(premium_price);
            // document.getElementById('currency_stripe').value = premium_currency;
            // document.getElementById('contacts').value = premium_contacts;
            // document.getElementById('package_name').value = premium_package;
        }

        function buyPlantinumNow(){
            $('.buyPlantinumNow').prop('disabled', true);
            // $('#model_stripe').modal('show');
            var plantinum_price = $('.buyPlantinumNow').attr('data-plantinum-price');
            var plantinum_currency = $('.buyPlantinumNow').attr('data-plantinum-currency');
            var plantinum_contacts = $('.buyPlantinumNow').attr('data-plantinum-contacts');
            var plantinum_package = $('.buyPlantinumNow').attr('data-plantinum-package');

            $.ajax({
                type: 'POST',
                url: '{{url('checkout')}}',
                data: {
                    price: plantinum_price,
                    currency: plantinum_currency,
                    contacts: plantinum_contacts,
                    package: plantinum_package,
                },
                success:function (data){
                    $('.buyPlantinumNow').prop('disabled', false);
                    window.location.href = "/artist-checkout";
                    // window.location.href = "/artist-checkout?price="+ data.price + "&currency="+ data.currency + "&contacts="+ data.contacts + "&package="+ data.package;
                },
            });

            //set value on stripe form
            // let nf = new Intl.NumberFormat('en-US');
            // alert(nf.format('1,346.00'));
            // document.getElementById('total_amount_stripe').value = plantinum_price;
            // document.getElementById('currency_stripe').value = plantinum_currency;
            // document.getElementById('contacts').value = plantinum_contacts;
            // document.getElementById('package_name').value = plantinum_package;
        }


        // one usc purchase credit js
        function buyOneUSCNow()
        {
            let amount_USC = $('#amountUSC').val();
            if(amount_USC === "")
            {
                toastr.error('Please Add Credits');
                return false;
            }

            // $('.buyOneUSCNow').prop('disabled', true);
            //  button disabled
            document.getElementById('buyOneUSCNow').style.pointerEvents="none";
            document.getElementById('buyOneUSCNow').style.cursor="default";

            var one_usc_price = $('.buyOneUSCNow').attr('data-one-usc-price');
            var one_usc_currency = $('.buyOneUSCNow').attr('data-one-usc-currency');
            var one_usc_contacts = $('.buyOneUSCNow').attr('data-one-usc-contacts');
            var one_usc_package = $('.buyOneUSCNow').attr('data-one-usc-package');

            // showLoaderWallet();
            $.ajax({
                type: 'POST',
                url: '{{url('checkout')}}',
                data: {
                    requestFrom: 'oneUSC',
                    amount_USC: amount_USC,
                    price: amount_USC,
                    // price: one_usc_price,
                    currency: one_usc_currency,
                    contacts: amount_USC,
                    // contacts: one_usc_contacts,
                    package: one_usc_package,
                },
                success:function (data){
                    document.getElementById('buyOneUSCNow').style.pointerEvents="auto";
                    document.getElementById('buyOneUSCNow').style.cursor="pointer";
                    // loaderWallet();
                    // $('.buyOneUSCNow').prop('disabled', false);
                    window.location.href = "/artist-checkout";
                },
            });
        }

        // document.getElementById('closeStripe').addEventListener('click', function (){
        //     card.clear();
        // });
    </script>
<script>
    $(document).ready(function() {
        //Only needed for the filename of export files.
        //Normally set in the title tag of your page.
        document.title='Artist History';
        // DataTable initialisation
        $('#historyWallet').DataTable(
            {
                "paging": true,
                "buttons": [
                    'colvis',
                    'copyHtml5',
                    'csvHtml5',
                    'excelHtml5',
                    'pdfHtml5',
                    'print'
                ]
            }
        );
    });
    $(document).ready(function() {
        //Only needed for the filename of export files.
        //Normally set in the title tag of your page.
        document.title='Coupon/ Gift Card History';
        // DataTable initialisation
        $('#couponGiftHistoryWallet').DataTable(
            {
                "paging": true,
                "buttons": [
                    'colvis',
                    'copyHtml5',
                    'csvHtml5',
                    'excelHtml5',
                    'pdfHtml5',
                    'print'
                ]
            }
        );
    });
</script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>

<script>
    function myHistory()
    {
        $('.couponClaimNow').css('display','none');
        $('.wantTOBuy').css('display','block');
    }

    function myCouponHistory()
    {
        $('.wantTOBuy').css('display','none');
        $('.couponClaimNow').css('display','block');
    }
</script>
@endsection
