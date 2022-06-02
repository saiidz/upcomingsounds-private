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
{{--{{dd($artist_billing_info)}}--}}
        <!-- ############ PAGE START-->
       <section class="m-t-lg">
           <div class="container">
               <div class="py-5 text-center">
                   <h2>UpcomingSounds Checkout form</h2>
                   <p class="lead">Provide your billing information</p>
               </div>
               <div class="row">
                   <div class="col-md-8 order-md-1">
                       <div class="card">
                           <div class="card-body billing_address">
                               <h5 class="card-title">Billing Information</h5>
                               <p class="card-text">Enter the required information and choose your payment method</p>
                               <form class="form-contact"
                                     method="POST" action="{{url('/artist-billing-info')}}" autocomplete="off"
                                     id="checkoutForm" novalidate>
                                   @csrf
                                   <input type="hidden" name="transaction_user_infos_id" value="{{isset($artist_billing_info) ? $artist_billing_info->id : ''}}">
                                   <div class="row m-t-sm">
                                       <div class="col-md-6 mb-3">
                                           <label for="firstName">First name</label>
                                           <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name" placeholder="Enter First Name" value="{{isset($artist_billing_info) ? $artist_billing_info->first_name : ''}}" required>
                                           @error('first_name')
                                               <small class="red-text ml-10" role="alert">
                                                   {{ $message }}
                                               </small>
                                           @enderror
                                       </div>
                                       <div class="col-md-6 mb-3">
                                           <label for="lastName">Last name</label>
                                           <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="Enter Last Name" value="{{isset($artist_billing_info) ? $artist_billing_info->last_name : ''}}" required>
                                           @error('last_name')
                                               <small class="red-text ml-10" role="alert">
                                                   {{ $message }}
                                               </small>
                                           @enderror
                                       </div>
                                   </div>

                                   <div class="row m-t-sm">
                                       <div class="col-md-6 mb-3">
                                           <label for="firstName">Phone Number</label>
                                           <input type="number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Enter Phone Number" value="{{isset($artist_billing_info) ? $artist_billing_info->phone_number : ''}}" required>
                                           @error('phone_number')
                                               <small class="red-text ml-10" role="alert">
                                                   {{ $message }}
                                               </small>
                                           @enderror
                                       </div>
                                       <div class="col-md-6 mb-3">
                                           <label for="address">Address</label>
                                           <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="1234 Main St" value="{{isset($artist_billing_info) ? $artist_billing_info->address : ''}}" required>
                                           @error('address')
                                               <small class="red-text ml-10" role="alert">
                                                   {{ $message }}
                                               </small>
                                           @enderror
                                       </div>
                                   </div>

                                   <div class="row m-t-sm">
                                       <div class="col-md-5 mb-3">
                                           <label for="country">Country</label>
                                           <select class="custom-select d-block w-100" id="country_name" name="country_name" required>
                                               <option value="" disabled selected>Choose Country</option>
                                               @isset($countries)
                                                   @foreach($countries as $country)
                                                       <option value="{{$country->id}}" @isset($artist_billing_info) @if($artist_billing_info->city->country_id == $country->id) selected @endif @endisset
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
                                           <select class="custom-select d-block w-100" id="city_name" name="city_name" required><sup>*</sup>
                                               @isset($artist_billing_info)
                                                   <option value="" disabled selected>Choose City</option>
                                                   @foreach($artist_billing_info->city->country->city as $city)
                                                       <option @if($artist_billing_info->city_id == $city->id) selected @endif value="{{$city->id}}" class="@error('city_name') is-invalid @enderror">{{$city->name}}</option>
                                                   @endforeach
                                               @endisset()
                                           </select>
                                           @error('city_name')
                                               <small class="red-text" role="alert">
                                                   {{ $message }}
                                               </small>
                                           @enderror
                                       </div>
                                       <div class="col-md-3 mb-3">
                                           <label for="postal_code">Postal Code</label>
                                           <input type="number" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" placeholder="" value="{{isset($artist_billing_info) ? $artist_billing_info->postal_code : ''}}" required>
                                           @error('postal_code')
                                           <small class="red-text" role="alert">
                                               {{ $message }}
                                           </small>
                                           @enderror
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
                                   <button class="btn circle btn-outline b-primary p-x-md auth_btn Rigister billingInfo" type="submit">{{isset($artist_billing_info) ? 'Edit Information' : 'Save Information'}}</button>
                               </form>
                           </div>
                       </div>

                       <div class="card">
                           <div class="card-body billing_address">
                               <h5 class="card-title">Payment options</h5>
                               <p class="card-text">How would you like to pay?</p>
                               <div class="row m-t-sm">
                                   <div class="col-md-12 mb-3">
                                       <div class="custom-control custom-radio">
                                           <input id="credit" class="stripeChanged" onchange="stripeChanged()" name="paymentMethod" type="radio" checked required>
                                           <label class="custom-control-label" for="credit">PAY WITH CARD</label>
                                       </div>
                                       <div class="custom-control custom-radio">
                                           <input id="paypal" class="paypalChanged" onchange="paypalChanged()" name="paymentMethod" type="radio" required>
                                           <label class="custom-control-label" for="paypal">PAY WITH PAYPAL</label>
                                       </div>
                                   </div>
                               </div>

                               @if(isset($artist_billing_info))
                                   {{--  Stripe Form --}}
                                   @include('pages.artists.artist-wallet.stripe-payment')

                                   {{--  Paypal Form --}}
                                   @include('pages.artists.artist-wallet.paypal-payment')
                               @endif
                               <p class="byMaking">By making a payment you are agreeing to our <a href="{{url('/term-of-service')}}" class="terMs" target="_blank">terms and conditions</a></p>
                           </div>
                       </div>
                   </div>
                   <div class="col-md-4 order-md-2 mb-4">
                       <ul class="list-group mb-3">
                           <li class="list-group-item d-flex justify-content-between lh-condensed">
                               <div class="purchasedUCS">
                                   <div class="icon_check">
                                       <img class="icon_UP_check" src="{{asset('images/coin_bg.png')}}">
                                   </div>
                                   <div class="m-t-sm">
                                       <span class="buyUCS">{{!empty($purchase_data['package']) ? $purchase_data['package'] : ''}}</span>
                                   </div>

{{--                                   <div class="dropdownCurrency">--}}
{{--                                       <select id="selectCurrency" onchange="selectCurrency(this.value)">--}}
{{--                                           <option value="gbp">£ GBP</option>--}}
{{--                                           <option value="cad">$ CAD</option>--}}
{{--                                           <option value="aud">$ AUD</option>--}}
{{--                                           <option value="usd">$ USD</option>--}}
{{--                                           <option value="eur">€ EUR</option>--}}
{{--                                       </select>--}}
{{--                                   </div>--}}
                               </div>
                           </li>
                           <li class="list-group-item d-flex justify-content-between lh-condensed">
                               <span class="available_credit">Available credits</span>
                               <span class="credit_right">
                                    <div class="tw-relative">
                                        <div class="tw-flex tw-items-center">
                                            <span class="amount">{{!empty(Auth::user()->TransactionUserInfo) ? number_format(Auth::user()->TransactionUserInfo->transactionHistory->sum('credits')) : 0}} UCS</span>
                                            <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                    </div>
                                </span>
                           </li>
                           <li class="list-group-item d-flex justify-content-between lh-condensed">
                               <span class="available_credit">Amount of USC purchased in credits</span>
                               <span class="credit_right">
                                    <div class="tw-relative">
                                        <div class="tw-flex tw-items-center">
                                            <span class="amount">{{!empty($purchase_data['contacts']) ? $purchase_data['contacts'] : ''}}</span>
                                        </div>
                                    </div>
                                </span>
                           </li>
                           <li class="list-group-item d-flex justify-content-between lh-condensed">
                               <span class="total_UP">Total</span>

                               <span class="total_UP_price text-muted">
                                   <strong>
                                       @if(!empty($purchase_data['currency'] == 'gbp'))
                                            <span class="currencySymbol">£</span>{{!empty($purchase_data['price']) ? $purchase_data['price'] : ''}}
                                       @elseif(!empty($purchase_data['currency'] == 'cad'))
                                            <span class="currencySymbol">$</span>{{!empty($purchase_data['price']) ? $purchase_data['price'] : ''}}
                                       @elseif(!empty($purchase_data['currency'] == 'aud'))
                                           <span class="currencySymbol">$</span>{{!empty($purchase_data['price']) ? $purchase_data['price'] : ''}}
                                       @elseif(!empty($purchase_data['currency'] == 'usd'))
                                           <span class="currencySymbol">$</span>{{!empty($purchase_data['price']) ? $purchase_data['price'] : ''}}
                                       @else
                                           {{!empty($purchase_data['price']) ? $purchase_data['price'] : ''}}<span class="currencySymbol">€</span>
                                       @endif
                                   </strong>
                               </span>
                           </li>
                           <li class="list-group-item d-flex justify-content-between">

                           </li>
                       </ul>
                        <div class="imaGe m-t">
                            <img src="{{asset('images/artist/stripe-paypal.png')}}" alt="">
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
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $('#country_name').change(function () {
            var cid = $(this).val();
            if (cid) {
                var url = '/get-cites-artist/'+cid;
                $.ajax({
                    type: "GET",
                    url: url,
                    dataType: 'json',
                    success: function (res) {
                        if (res) {
                            $("#city_name").empty();
                            $("#city").html('');
                            $("#city_name").append('<option value="">Choose City</option>');
                            $.each(res.data.cities, function (key, value) {
                                $("#city_name").append('<option value="' + value.id + '">' + value.name + '</option>');
                            });
                            // $('#city_name').formSelect();
                        } else {
                            $("#city_name").empty();
                        }
                    }

                });
            } else {
                $("#city_name").empty();
            }
        });

    </script>

    <script>

        $('#submit-paypal').click(function (){
            $('#submit-paypal').prop('disabled', true);
            $('#submit-paypal').addClass('no-click');

            $('.billingInfo').prop('disabled', true);
            $('.billingInfo').addClass('no-click');

            $("#paypal-form").submit();
        });

        // stripe javascript
        var stripe = Stripe("{{ \Config::get('services.stripe.key') }}");
        // Create an instance of Elements.
        var elements = stripe.elements();
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        // Create an instance of the card Element.
        var card = elements.create('card', {
            hidePostalCode: true,
            style: style
        });
        // Add an instance of the card Element into the `card-element` <div>.
        card.mount('#card-element');
        // Handle real-time validation errors from the card Element.
        card.on('change', function (event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('stripe-form');
        document.getElementById('submit-stripe').addEventListener('click', function () {
            // console.log(form);
            const cardButton = document.getElementById('client_secret');
            const clientSecret = cardButton.getAttribute('value');
            console.log(clientSecret);
            stripe.createToken(card).then(function(result) {
                var form = document.getElementById('stripe-form');
                var hiddenCardInput = document.createElement('input');
                hiddenCardInput.setAttribute('type', 'hidden');
                hiddenCardInput.setAttribute('name', 'cardMethod');
                hiddenCardInput.setAttribute('value', result.token.id);
                form.appendChild(hiddenCardInput);
            });
            stripe.handleCardSetup(clientSecret, card, {
                payment_method_data: {
                }
            })
                .then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error.
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                    } else {
                        // Send the token to your server.
                        stripeTokenHandler(result.setupIntent.payment_method);
                        $('#submit-stripe').prop('disabled', true);
                        $('#submit-stripe').addClass('no-click');

                        $('.billingInfo').prop('disabled', true);
                        $('.billingInfo').addClass('no-click');
                        // $('#confirmMsg').modal('show');
                    }
                });
        });
        // Submit the form with the token ID.
        function stripeTokenHandler(paymentMethod) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('stripe-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'paymentMethod');
            hiddenInput.setAttribute('value', paymentMethod);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }

        // check stripe
        function stripeChanged(){
            if($('.stripeChanged').is(":checked")){
                $("#paypalHideShowForm").hide();
                $("#stripeHideShowForm").show();
            }
        }

        // check paypal
        function paypalChanged(){
            if($('.paypalChanged').is(":checked")){
                card.clear();
                $("#stripeHideShowForm").hide();
                $("#paypalHideShowForm").show();
            }
        }
    </script>
    <script src="https://www.paypal.com/sdk/js?client-id={{ env('PAYPAL_SANDBOX_CLIENT_ID') }}"></script>
@endsection
