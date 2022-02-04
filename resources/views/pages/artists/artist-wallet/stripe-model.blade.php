
    <div id="model_stripe" class="modal black-overlay" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #635bff;">
                    <h5 class="modal-title" style="color:white !important;">Stripe Payment</h5>
                </div>
                <div class="modal-body p-lg">
                    <form action="{{url('/stripe-payment')}}" method="post" id="stripe-form">
                        @csrf
                        <div class="form-group">
                            <div class="card-header">
                                <label for="card-element">
                                    Please enter your credit card information
                                </label>
                            </div>
                            <div class="card-body">
                                <div id="card-element">
                                    <!-- A Stripe Element will be inserted here. -->
                                </div>
                                <!-- Used to display form errors. -->
                                <div id="card-errors" role="alert"></div>
                                <input type="hidden" id="total_amount_stripe" class="amount_stripe" name="total_amount_stripe" value="">
                                <input type="hidden" id="currency_stripe" name="currency_stripe" value="">
                                <input type="hidden" id="contacts" name="contacts" value="">
                                <input type="hidden" id="package_name" name="package_name" value="">
                                <input type="hidden" id="client_secret" value="{{ $intent->client_secret  }}">
                            </div>
                        </div>
                        <div class="form-group modal-footer">
                            <button class="btn dark-white rounded update_stripe_not" id="closeStripe" data-dismiss="modal">No</button>
                            <button class="btn btn-dark stripePayment" type="button" data-secret="" id="submit-stripe">Send payment</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
