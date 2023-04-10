<div class="tab-pane animated fadeIn text-muted" id="Widrawal">
    <section class="m-t-lg">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Withdrawal</h2>
                <p class="lead">Choose and activate your 45-day campaign (curators will offer publishing/coverage or select individual curators). </p>
            </div>
            <div class="row">
                <div class="col-md-8 order-md-1">
                    <div class="card">
                        <div class="card-body billing_address">
                            <h5 class="card-title">Beneficiary</h5>
                            <p class="card-text text-black">Asking for withdrawal requires a professional status.
                                If it's not your case please contact us at influencers@upcomingsounds.co</p>
                            <form class="form-contact"
                                  method="POST" action="" autocomplete="off"
                                  id="checkoutForm" novalidate>
                                @csrf
                                <div class="row m-t-sm">
                                    <div class="col-md-6 mb-3">
                                        <label for="city" class="text-black">Status</label>
                                        <select class="custom-select d-block w-100" id="status" name="status" required><sup>*</sup>
                                            <option value="" disabled selected>Choose Status</option>
                                            <option value="">Independent Contractor</option>
                                            <option value="">Company</option>
                                            <option value="">Association</option>
                                        </select>
                                        @error('status')
                                        <small class="red-text" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="text-black">Entity</label>
                                        <input type="text" class="form-control @error('entity') is-invalid @enderror" name="entity" id="entity" placeholder="Enter Entity" value="" required>
                                        @error('entity')
                                            <small class="red-text ml-10" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row m-t-sm">
                                    <div class="col-md-6 mb-3">
                                        <label for="firstName" class="text-black">Phone Number</label>
                                        <input type="number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" placeholder="Enter Phone Number" value="" required>
                                        @error('phone_number')
                                        <small class="red-text ml-10" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="address" class="text-black">Address</label>
                                        <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" id="address" placeholder="1234 Main St" value="" required>
                                        @error('address')
                                        <small class="red-text ml-10" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row m-t-sm">
                                    <div class="col-md-5 mb-3">
                                        <label for="country" class="text-black">Country</label>
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
                                        <label for="city" class="text-black">City</label>
                                        <select class="custom-select d-block w-100" id="city_name" name="city_name" required><sup>*</sup>
                                            <option value="" disabled selected>Choose City</option>
                                        </select>
                                        @error('city_name')
                                        <small class="red-text" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                    <div class="col-md-3 mb-3">
                                        <label for="postal_code" class="text-black">Postal Code</label>
                                        <input type="number" name="postal_code" class="form-control @error('postal_code') is-invalid @enderror" id="postal_code" placeholder="" value="" required>
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
                                <button class="btn circle btn-outline b-primary p-x-md auth_btn Rigister billingInfo" type="submit">Confirm</button>
                            </form>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-body billing_address">
                            <h5 class="card-title">Withdrawal Method</h5>
                            <p class="card-text text-black">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            <div class="row m-t-sm">
                                <div class="col-md-12 mb-3">
                                    <form class="form-contact"
                                          method="POST" action="" autocomplete="off"
                                          id="checkoutForm" novalidate>
                                        @csrf
                                        <div class="row m-t-sm m-b-sm">
                                            <div class="col-md-6 mb-3">
                                                <label for="withdrawal_method" class="text-black">Withdrawal Method</label>
                                                <select class="custom-select d-block w-100" id="withdrawalMethod" name="withdrawal_method" required><sup>*</sup>
                                                    <option value="" disabled selected>Choose Method</option>
                                                    <option value="paypal">Paypal Transfer</option>
                                                    <option value="wise">Wise Transfer</option>
                                                </select>
                                                @error('withdrawal_method')
                                                <small class="red-text" role="alert">
                                                    {{ $message }}
                                                </small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row m-t-lg" id="paypalWithdrawal" style="display:none;">
                                            <div class="col-sm-12 m-b-sm">
                                                <p class="card-text text-black">We use the Business / Services option. PayPal may apply a fee when receiving your funds, depending on where you are located in the world. For a breakdown of fees,</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email" class="text-black">Paypal Email</label>
                                                <input type="email" name="paypal_email" class="form-control @error('paypal_email') is-invalid @enderror" id="paypal_email" placeholder="Enter Paypal Email" value="" required>
                                                @error('paypal_email')
                                                    <small class="red-text ml-10" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row m-t-sm m-b-sm" id="wiseWithdrawal" style="display:none;">
                                            <div class="col-sm-12 m-b-sm">
                                                <p class="card-text text-black">We use TransferWise to process the transfer. A cashout fee may be applied by TransferWise when withdrawing your funds, depending on the country in which you're located. As an indicator, on March 13th 2021, the fee for a bank transfer towards any European country was fixed at €0.41 whatever the amount cashed out is. More details on the current amount of fees are available on TransferWise website.</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="withdrawal_method" class="text-black">Wise Method</label>
                                                <select class="custom-select d-block w-100" id="wiseMethod" name="wise_method" required><sup>*</sup>
                                                    <option value="" disabled selected>Choose Method</option>
                                                    <option value="email">Email</option>
                                                    <option value="account_add">Add Account</option>
                                                </select>
                                                @error('wise_method')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>

                                        {{--wise email--}}
                                            <div class="row m-t-lg" id="emailWise" style="display:none;">
                                                <div class="col-sm-12 m-b-sm">
                                                    <p class="card-text text-black">We use the Business / Services option. PayPal may apply a fee when receiving your funds, depending on where you are located in the world. For a breakdown of fees,</p>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="email" class="text-black">Wise Email</label>
                                                    <input type="email" name="wise_email" class="form-control @error('wise_email') is-invalid @enderror" id="wise_email" placeholder="Enter Wise Email" value="" required>
                                                    @error('wise_email')
                                                        <small class="red-text ml-10" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                        {{--wise email--}}

                                        {{--wise account detail--}}
                                        <div class="row m-t-lg" id="accountDetailWise" style="display:none;">
                                            <div class="col-sm-12 m-b-sm">
                                                <p class="card-text text-black">We use the Business / Services option. PayPal may apply a fee when receiving your funds, depending on where you are located in the world. For a breakdown of fees,</p>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="wise_account_holder" class="text-black">Account Number</label>
                                                <input type="text" name="wise_account_holder" class="form-control @error('wise_account_holder') is-invalid @enderror" id="wise_account_holder" placeholder="Account Holder" value="" required>
                                                @error('wise_account_holder')
                                                    <small class="red-text ml-10" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="wise_iban" class="text-black">IBAN</label>
                                                <input type="text" name="wise_iban" class="form-control @error('wise_iban') is-invalid @enderror" id="wise_iban" placeholder="IBAN" value="" required>
                                                @error('wise_iban')
                                                    <small class="red-text ml-10" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label for="wise_bic_swift" class="text-black">BIC/Swift</label>
                                                <input type="text" name="wise_bic_swift" class="form-control @error('wise_bic_swift') is-invalid @enderror" id="wise_bic_swift" placeholder="BIC/Swift" value="" required>
                                                @error('wise_bic_swift')
                                                    <small class="red-text ml-10" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                            <div class="col-sm-12 m-b-sm">
                                                <p class="card-text text-black">required if your account is located in a EU country other than France</p>
                                            </div>
                                        </div>
                                        {{--wise account detail--}}

                                        <hr class="mb-4">
                                        <button class="btn circle btn-outline b-primary p-x-md auth_btn Rigister billingInfo" type="submit">Add this withdrawal method</button>
                                    </form>
                                </div>
                            </div>
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
                                    <span class="buyUCS">dddfa</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <span class="available_credit">Available credits</span>
                            <span class="credit_right">
                                    <div class="tw-relative">
                                        <div class="tw-flex tw-items-center">
                                            <span class="amount">11 UCS</span>
                                            <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                                        </div>
                                    </div>
                                </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <span class="available_credit">Get Credits</span>
                            <span class="credit_right">
                                    <div class="tw-relative">
                                        <div class="tw-flex tw-items-center">
                                            <span class="amount">2222</span>
                                        </div>
                                    </div>
                                </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <span class="total_UP">Total</span>

                            <span class="total_UP_price text-muted">
                                   <strong>
                                       <span class="currencySymbol">$</span>332
                                   </strong>
                               </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between">

                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>
