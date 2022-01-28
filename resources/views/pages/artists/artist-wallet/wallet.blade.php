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
                                    <span class="buyUCS">Buy UpcomingSounds</span>
                                    <div class="dropdownCurrency">
                                        <select id="selectCurrency" onchange="selectCurrency(this.value)">
                                            <option value="EUR">€ EUR</option>
                                            <option value="CAD">$ CAD</option>
                                            <option value="AUD">$ AUD</option>
                                            <option value="USD">$ USD</option>
                                            <option value="GBP">£ GBP</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="grid-1-5">
                                    <h2>Basic</h2>
                                    <h3><span class="uppercase">Free</span></h3>
                                    <p>10,000 monthly visits</p>
                                    <ul>
                                        <li>Limited Email Support</li>
                                        <li>Unlimited Data Transfer</li>
                                        <li>10GB Local Storage</li>
                                    </ul>
                                    <a href="" class="button">Buy now</a>
                                </div>
                                <div class="grid-1-5">
                                    <h2>Startup</h2>
                                    <h3><sup>$</sup>79<span class="small">/mo</span></h3>
                                    <p>25,000 monthly visits</p>
                                    <ul>
                                        <li>Limited Email Support</li>
                                        <li>Unlimited Data Transfer</li>
                                        <li>20GB Local Storage</li>
                                    </ul>
                                    <a href="" class="button">Buy now</a>
                                </div>
                                <div class="grid-1-5">
                                    <h2>Growth</h2>
                                    <h3><sup>$</sup>179<span class="small">/mo</span></h3>
                                    <p>75,000 monthly visits</p>
                                    <ul>
                                        <li>Email Support</li>
                                        <li>Unlimited Data Transfer</li>
                                        <li>30GB Local Storage</li>
                                    </ul>
                                    <a href="" class="button">Buy now</a>
                                </div>
                                <div class="grid-1-5">
                                    <h2>Premium</h2>
                                    <h3><sup>$</sup>499<span class="small">/mo</span></h3>
                                    <p>225,000 monthly visits</p>
                                    <ul>
                                        <li>Email Support</li>
                                        <li>Phone Support</li>
                                        <li>Unlimited Data Transfer</li>
                                    </ul>
                                    <a href="" class="button">Buy now</a>
                                </div>
                                <div class="grid-1-5">
                                    <h2>Enterprise</h2>
                                    <h3><span class="uppercase">Let's Talk</span></h3>
                                    <p>1M+ monthly visits</p>
                                    <ul>
                                        <li>Email Support</li>
                                        <li>Phone Support</li>
                                        <li>Dedicated Environment</li>
                                        <li>Customized Plan</li>
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
        function selectCurrency(value){
            alert(value);
        }
    </script>
@endsection
