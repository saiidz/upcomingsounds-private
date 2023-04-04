<div class="tab-pane animated fadeIn text-muted active" id="curatorHistory">
    <section class="m-t-lg">
        <div class="container-fluid">
            <div class="py-5 text-center">
                <h2>Please Select Wallet</h2>
            </div>
            <div class="row">
                <div class="col-md-8 order-md-1">
                    <div class="row">
                        <div class="col-md-6">
                            <select class="custom-select d-block w-100" id="curatorHistoryWallet" name="status"><sup>*</sup>
                                <option value="" disabled selected>Choose Wallet</option>
                                <option value="{{\App\Templates\IStatus::HISTORY_WITHDRAWAL}}">History Withdrawal</option>
                                <option value="{{\App\Templates\IStatus::OFFER_PAYMENTS}}">Offer Payments</option>
                                <option value="{{\App\Templates\IStatus::REFERRAL_PAYMENTS}}">Referral Payment</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{--  __history_withdrawal --}}
    @include('pages.curators.curator-wallet.__history_withdrawal')

    {{--  __offer_payments --}}
    @include('pages.curators.curator-wallet.__offer_payments')

    {{--  __referral_payments --}}
    @include('pages.curators.curator-wallet.__referral_payments')
</div>
