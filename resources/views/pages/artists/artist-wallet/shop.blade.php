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
        border: 2px solid #5d4e65;
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
            clear: left;
        }
    }

    @media screen and (min-width: 800px) {
        .grid-1-5 {
            width: 33.3333333%;
        }
        .grid-1-5:nth-child(3n+1) {
            clear: left;
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
</style>
@endsection

{{-- page content --}}
@section('content')
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

        <!-- ############ PAGE START-->

        <section class="wallet">
            <div class="container group">
                
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
        </section>
    <!-- ############ PAGE END-->

    </div>
    @include('welcome-panels.welcome-footer')
@endsection
