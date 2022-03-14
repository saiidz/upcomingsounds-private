<div class="tab-pane animated fadeIn text-muted" id="Transfer">
    <section class="m-t-lg">
        <div class="container">
            <div class="py-5 text-center">
                <h2>Transfer</h2>
                <p class="lead">Transfer your credits to another UpcomingSounds account</p>
            </div>
            <div class="row">
                <div class="col-md-8 order-md-1">
                    <div class="card" style="min-height:426px;">
                        <div class="card-body billing_address">
                            <h5 class="card-title">Recipient</h5>
                            <p class="card-text text-black">Add a new recipient</p>
                            <form class="form-contact"
                                  method="POST" action="{{route('curator.transfer')}}" autocomplete="off"
                                  id="transferCuratorForm" novalidate>
                                @csrf
                                <div class="row m-t-sm">
                                    <div class="col-md-12 mb-3">
                                        <label for="email" class="text-black">Email Recipient:</label>
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" placeholder="Enter Your Email" required autocomplete="off"
                                               autofocus>
                                        @error('email')
                                        <small class="red-text ml-10" role="alert">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row m-t-sm">
                                    <div class="col-md-12 mb-3">
                                        <label for="Amount" class="text-black">Amount:</label>
                                        <input id="AmountTransfer" type="number"
                                               class="form-control @error('amount') is-invalid @enderror" name="amount" maxlength="6" min="1" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                               value="{{ old('amount') }}" placeholder="Enter Your Amount" required autocomplete="off"
                                               autofocus>
                                        @error('amount')
                                        <small class="red-text ml-10" role="alert">
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
                                <button class="btn circle btn-outline b-primary p-x-md auth_btn Rigister billingInfo" type="submit">Transfer</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 order-md-1">
                    <ul class="list-group mb-3">
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <div class="purchasedUCS">
                                <div class="icon_check">
                                    <img class="icon_UP_check" src="{{asset('images/coin_bg.png')}}">
                                </div>
                                <div class="m-t-sm">
                                    <span class="buyUCS">Summary</span>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <span class="available_credit text-black">Available credits</span>
                            <span class="credit_right">
                                <div class="tw-relative">
                                    <div class="tw-flex tw-items-center">
                                        <span class="amount text-black">0 UCS</span>
                                        <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                                    </div>
                                </div>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <span class="available_credit text-black">Transfer</span>
                            <span class="credit_right">
                                <div class="tw-relative">
                                    <div class="tw-flex tw-items-center">
                                        <span class="amount_transfer_display text-black">0 UCS</span>
                                        <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                                    </div>
                                </div>
                            </span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                            <span class="available_credit text-black">New balance</span>
                            <span class="credit_right">
                                <div class="tw-relative">
                                    <div class="tw-flex tw-items-center">
                                        <span class="amount text-black">0 UCS</span>
                                        <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                                    </div>
                                </div>
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
