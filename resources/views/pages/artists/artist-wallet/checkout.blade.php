{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Checkout Artist')

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom/wallet.css')}}">
@endsection

{{-- page content --}}
@section('content')
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

        <!-- ############ PAGE START-->
       <section class="m-t-lg">
           <div class="container">
               <div class="py-5 text-center">
                   <h2>Checkout form</h2>
                   <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
               </div>
               <div class="row">
                   <div class="col-md-8 order-md-1">
                       <div class="card">
                           <div class="card-body billing_address">
                               <h5 class="card-title">Billing Information</h5>
                               <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                               <form class="needs-validation" novalidate>
                                   <div class="row m-t-sm">
                                       <div class="col-md-6 mb-3">
                                           <label for="firstName">First name</label>
                                           <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                                       </div>
                                       <div class="col-md-6 mb-3">
                                           <label for="lastName">Last name</label>
                                           <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                                       </div>
                                   </div>

                                   <div class="row m-t-sm">
                                       <div class="col-md-6 mb-3">
                                           <label for="firstName">Phone Number</label>
                                           <input type="number" class="form-control" id="firstName" placeholder="" value="" required>
                                       </div>
                                       <div class="col-md-6 mb-3">
                                           <label for="address">Address</label>
                                           <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                                       </div>
                                   </div>

                                   <div class="row m-t-sm">
                                       <div class="col-md-5 mb-3">
                                           <label for="country">Country</label>
                                           <select class="custom-select d-block w-100" id="country" required>
                                               <option value="" disabled selected>Choose Country</option>
                                               @isset($countries)
                                                   @foreach($countries as $country)
                                                       <option value="{{$country->id}}"
                                                               class="@error('country_name') is-invalid @enderror">{{$country->name}}</option>
                                                   @endforeach
                                               @endisset
                                           </select>
                                           @error('country_name')
                                           <small class="red-text" role="alert">
                                               {{ $message }}
                                           </small>
                                           @enderror
                                       </div>
                                       <div class="col-md-4 mb-3">
                                           <label for="city">City</label>
                                           <select class="custom-select d-block w-100" id="city" required>
                                               <option value="">Choose...</option>
                                               <option>California</option>
                                               <option>California</option>
                                               <option>California</option>
                                               <option>California</option>
                                               <option>California</option>
                                           </select>
                                       </div>
                                       <div class="col-md-3 mb-3">
                                           <label for="postal_code">Postal Code</label>
                                           <input type="text" class="form-control" id="postal_code" placeholder="" required>
                                       </div>
                                   </div>

                                   <div class="row m-t-md">
                                       <div class="col-md-5 mb-3">
                                           {!! NoCaptcha::renderJs() !!}
                                           {!! NoCaptcha::display() !!}
                                           @error('g-recaptcha-response')
                                           <small class="red-text ml-10" role="alert">
                                               {{ $message }}
                                           </small>
                                           @enderror
                                       </div>
                                   </div>
                                   <hr class="mb-4">
                                   <button class="btn circle btn-outline b-primary p-x-md auth_btn Rigister" type="submit">Save Information</button>
                               </form>
                           </div>
                       </div>

                       <div class="card">
                           <div class="card-body billing_address">
                               <h5 class="card-title">Payment</h5>
                               <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                               <form class="needs-validation" novalidate>
                                   <div class="row m-t-sm">
                                       <div class="col-md-12 mb-3">
                                           <div class="custom-control custom-radio">
                                               <input id="credit" name="paymentMethod" type="radio" checked required>
                                               <label class="custom-control-label" for="credit">Credit card</label>
                                           </div>
                                           <div class="custom-control custom-radio">
                                               <input id="paypal" name="paymentMethod" type="radio" required>
                                               <label class="custom-control-label" for="paypal">PayPal</label>
                                           </div>
                                       </div>
                                   </div>
                                   <hr class="mb-4">
                                   <button class="btn circle btn-outline b-primary p-x-md auth_btn Rigister" type="submit">Pay</button>
                               </form>
                           </div>
                       </div>

{{--                       <div class="card">--}}
{{--                           <div class="card-body Payment">--}}
{{--                               <form class="needs-validation">--}}
{{--                                   <h4 class="mb-3">Payment</h4>--}}

{{--                                   <div class="d-block my-3">--}}
{{--                                       <div class="custom-control custom-radio">--}}
{{--                                           <input id="credit" name="paymentMethod" type="radio" checked required>--}}
{{--                                           <label class="custom-control-label" for="credit">Credit card</label>--}}
{{--                                       </div>--}}
{{--                                       <div class="custom-control custom-radio">--}}
{{--                                           <input id="paypal" name="paymentMethod" type="radio" required>--}}
{{--                                           <label class="custom-control-label" for="paypal">PayPal</label>--}}
{{--                                       </div>--}}
{{--                                   </div>--}}
{{--                                   <div class="row">--}}
{{--                                       <div class="col-md-6 mb-3">--}}
{{--                                           <label for="cc-name">Name on card</label>--}}
{{--                                           <input type="text" class="form-control" id="cc-name" placeholder="" required>--}}
{{--                                           <small class="text-muted">Full name as displayed on card</small>--}}
{{--                                           <div class="invalid-feedback">--}}
{{--                                               Name on card is required--}}
{{--                                           </div>--}}
{{--                                       </div>--}}
{{--                                       <div class="col-md-6 mb-3">--}}
{{--                                           <label for="cc-number">Credit card number</label>--}}
{{--                                           <input type="text" class="form-control" id="cc-number" placeholder="" required>--}}
{{--                                           <div class="invalid-feedback">--}}
{{--                                               Credit card number is required--}}
{{--                                           </div>--}}
{{--                                       </div>--}}
{{--                                   </div>--}}
{{--                                   <div class="row">--}}
{{--                                       <div class="col-md-3 mb-3">--}}
{{--                                           <label for="cc-expiration">Expiration</label>--}}
{{--                                           <input type="text" class="form-control" id="cc-expiration" placeholder="" required>--}}
{{--                                           <div class="invalid-feedback">--}}
{{--                                               Expiration date required--}}
{{--                                           </div>--}}
{{--                                       </div>--}}
{{--                                       <div class="col-md-3 mb-3">--}}
{{--                                           <label for="cc-cvv">CVV</label>--}}
{{--                                           <input type="text" class="form-control" id="cc-cvv" placeholder="" required>--}}
{{--                                           <div class="invalid-feedback">--}}
{{--                                               Security code required--}}
{{--                                           </div>--}}
{{--                                       </div>--}}
{{--                                   </div>--}}
{{--                                   <hr class="mb-4">--}}
{{--                                   <button class="btn btn-primary btn-lg btn-block" type="submit">Continue to checkout</button>--}}
{{--                               </form>--}}
{{--                           </div>--}}
{{--                       </div>--}}

                   </div>
                   <div class="col-md-4 order-md-2 mb-4">
                       <ul class="list-group mb-3">
                           <li class="list-group-item d-flex justify-content-between lh-condensed">
                               <div class="purchasedUCS">
                                   <div class="icon_check">
                                       <img class="icon_UP_check" src="{{asset('images/coin_bg.png')}}">
                                   </div>
                                   <div class="m-t-sm">
                                       <span class="buyUCS">Standard</span>
                                   </div>

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
                           </li>
                           <li class="list-group-item d-flex justify-content-between lh-condensed">
                               <span class="available_credit">Available credits</span>
                               <span class="credit_right">
                                    <div class="tw-relative">
                                        <div class="tw-flex tw-items-center">
                                            <span class="amount">0 UCS</span>
                                            <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                    </div>
                                </span>
                           </li>
                           <li class="list-group-item d-flex justify-content-between lh-condensed">
                               <span class="total_UP">Total</span>
                               <span class="total_UP_price text-muted"><strong>$20</strong></span>
                           </li>
                           <li class="list-group-item d-flex justify-content-between">

                           </li>
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
