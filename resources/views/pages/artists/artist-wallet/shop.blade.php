{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Music Promotion Shop')

@section('page-style')
<style>
    .wallet{
        background-color: rgb(33,31,35);
        background-repeat: no-repeat;
        color: #fff;
        font-size: 100%;
        min-height: 100%;
        line-height: 1.5;
        padding: 2.5em 0;
    }
    .container {
        margin: 0 auto;
        width: 90%;
        max-width: 1200px;
    }
    .group:after {
        content: "";
        display: table;
        clear: both;
    }
    .grid-1-5 {
        border: 2px solid #02b875;
        min-height: 400px;
        padding: 1.25em;
        position: relative;
        text-align: center;
        transition: all .2s ease-in-out;
    }
    @media screen and (min-width: 700px) {
        .grid-1-5{
            float: left;
            width: 50%;
        }
        .grid-1-5:nth-child(odd) {
            /*clear: left;*/
        }
    }

    @media screen and (min-width: 800px) {
        .grid-1-5 {
            width: 33.3333333%;
        }
        .grid-1-5:nth-child(3n+1) {
            /*clear: left;*/
        }
        .grid-1-5:nth-child(odd) {
             clear: none;
         }
    }

    @media screen and (min-width: 1120px) {
        .grid-1-5{
            width: 20%;
        }
        .grid-1-5:nth-child(odd), .grid-1-5:nth-child(3n+1) {
           clear: none;
        }
    }

    .button {
        background-color: #02b875;
        border-radius: 20px;
        color: #fff;
        font-size: 1em;
        font-weight: 700;
        padding: 0.75em 1.5em;
        position: absolute;
        bottom: 1.25em;
        left: 50%;
        margin-left: -60px;
        text-decoration: none;
        width: 120px;
    }
    .grid-1-5:hover {
        background-color: rgb(83,69,91);
    }
    .tw-justify-end {
        justify-content: flex-end;
    }
    .tw-flex{
        display: flex;
    }
    .tw-relative {
         position: relative;
    }
    .amount {
         margin-right: 4px;
    }
    .tw-items-center {
        align-items: center;
    }
    .icon_UP{
        width:18px;
    }
    .purchasedUCS{
        justify-content: center;
        flex-wrap: wrap;
        display: flex;
        width: 100%;
        margin-top: 32px;
        margin-bottom: 24px;
        align-items: flex-end;
    }
    .buyUCS{
        font-size: 1.5rem;
        font-weight: 700;
        line-height: 1.25rem;
        width: auto;
        color:#02b875;
        text-align: center;
        display: block;
    }
    .dropdownCurrency{
        margin-left: 12px;
        position: relative;
        align-items: center;
        margin-top: 0px;
        display: flex;
        justify-content: flex-start;
    }
    #selectCurrency{
        font-size: 0.8125rem;
        font-weight: 600;
        display: flex;
        color:#02b875;
        border: none;
    }
    option {
        color: #02b875;
    }
    .wantUP {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: rgba(255, 255, 255, 1);
    }
    @media (min-width: 480px){
        .wantUP {
            padding-left: 32px;
            padding-right: 32px;
        }
    }
    @media (min-width: 320px) and (max-width: 382px) {
        .buyUCS{
            padding-bottom:18px !important;
        }
    }
    @media (min-width: 600px){
        .wantUP {
            padding-top: 40px;
            padding-bottom: 40px;
        }
    }
    .mainParentContainer{
        max-width: 752px;
        text-align: center;
        width: 100%;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
    .wantBUCS{
        margin-bottom: 24px;
        display: block;
        font-size: 1.5rem;
        font-weight: 700;
        color:#02b875;
    }
    br.br {
        display: none;
    }
    .possibleUCS{
        font-size: 1rem;
        font-weight: 400;
        margin-bottom: 8px;
    }
    .tw-block {
        display: block;
    }
    .pleaseNoteUCS{
        font-size: 0.8125rem;
        font-weight: 400;
        margin-bottom: 40px;
        display: block;
    }
    .startCampaign{
        background-color: #02b875;
        border-radius: 20px;
        color: #fff;
        font-size: 1em;
        font-weight: 700;
        padding: 0.75em 1.5em;
        text-decoration: none;
    }
    .startCampaign:hover{
        color: #fff;
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
                                                    <span class="amount">0</span>
                                                    <img class="icon_UP" src="{{asset('images/favicon.png')}}">
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
