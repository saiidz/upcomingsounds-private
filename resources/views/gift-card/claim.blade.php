{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Claim Gift Card')

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
        .cb_code{
            position: relative;
            display: block;
            top: 20px;
        }
        .couponCode{
            margin-right: 164px;
        }
        .couponCode span{
            position: absolute;
            top: 273px;
            font-size: 20px;
        }
        .r_gf{
            text-align: center;
            margin-top: 15px;
        }
        .r_cy{
            margin-top: 35px;
        }
        .card-img-top{
            width:60%;
        }
</style>
@endsection

{{-- page content --}}
@section('content')
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

        <!-- ############ PAGE START-->

        <div class="row-col bgGift h-v">
            <div class="row-cell v-m">
            </div>
        </div>

        <section class="cd-faq js-cd-faq container max-width-md margin-top-lg margin-bottom-lg">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 r_gf">
                        <h3 class="_600">Congratulations on receiving such a valuable gift card</h3>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="card mb-6">
                            <div class="card-body cb_code">
                                <div class="couponCode">
                                    <span class="_600">{{!empty($sessionStripe) ? $sessionStripe->coupon_code : null}}</span>
                                </div>
                                <img src="{{ asset('images/gift-card/GC-USC_CODE-CLAIM.png')  }}"  class="card-img-top" alt="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-xs-12 r_cy">
                        <h6>To claim your USC credits, follow these steps: </h6>
                        <ul>
                            <li>
                                1. Locate your distinct gift card code. For reference, it might appear as *USC-00000RJC.
                            </li>
                            <li>
                                2. Register or login at Upcomingsounds.com. If you haven't registered yet, please create an artist account. If you're already a member, simply login. Once logged in, input the gift card code into the designated field within your artist wallet to claim its value.
                            </li>
                            <li>3. Click Claim: Once you’ve entered the code, hit the "Claim now" button.</li>
                            <li>4. Shop Away: Upon successful redemption, the balance will be added to your account, and you can start shopping immediately! Remember, treat this balance as you would any cash in your pocket. </li>
                        </ul>
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
