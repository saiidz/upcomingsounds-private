{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Curator Wallet')

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom/wallet.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <style>
        {{--#loadings {--}}
        {{--    background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;--}}
        {{--}--}}
        #loadings {
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
            display: none;
            position: fixed;
            width: 100%;
            height: 100vh;
            /*background: #fff url(../images/loader.gif) no-repeat center center;*/
            z-index: 999999;
        }
        #curatorHistory .dataTables_wrapper .dataTables_paginate .paginate_button.disabled, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:hover, .dataTables_wrapper .dataTables_paginate .paginate_button.disabled:active {
            color: white !important;
        }
        #curatorHistory a.paginate_button {
            color: white!important;
        }
        #curatorHistory.dataTables_wrapper .dataTables_paginate .paginate_button:active {
            background-color: #2b2b2b!important;
            background: linear-gradient(to bottom, #2b2b2b 0%, #0c0c0c 100%)!important;
            box-shadow: inset 0 0 3px #111!important;
        }
        .dataTables_wrapper .dataTables_paginate .paginate_button.current, .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover{
            background-color: #2b2b2b!important;
            background: linear-gradient(to bottom, #2b2b2b 0%, #0c0c0c 100%)!important;
            box-shadow: inset 0 0 3px #111!important;
        }
        #curatorHistory tr.odd,
        #curatorHistory tr.even {
            color: black;
        }
        input.has-value {
            color: white !important;
        }
        .dataTables_wrapper .dataTables_filter input {
            color: white !important;
        }
        #Amount-error,#email-error{
            color: red;
        }
        input.has-value {
            color: black !important;
        }
        .dataTables_wrapper .dataTables_filter input {
            color: white !important;
        }
        #withdrawalAdminBTn:hover
        {
            color:white;
        }
    </style>
@endsection

{{-- page content --}}
@section('content')
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">
        <div id="loadings"></div>
{{--        <div id="loadings"></div>--}}
        <!-- ############ PAGE START-->

        <section class="wallet">
            <div class="container group">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="b-b b-primary nav-active-primary">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" href="#" data-toggle="tab" data-target="#curatorHistory">History</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="tab" data-target="#Transfer">Transfer</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-toggle="tab" data-target="#Widrawal">Widrawal</a>
                                </li>
                                <li>
                                    <div class="tw-w-full tw-flex tw-justify-end">
                                        <span class="text">
                                            <div class="tw-relative">
                                                <div class="tw-flex tw-items-center">
                                                    <span class="amount">{{\App\Models\User::curatorBalance()}} USC</span>
{{--                                                    <span class="amount">{{!empty(Auth::user()->TransactionUserInfo) ? number_format(Auth::user()->TransactionUserInfo->transactionHistory->sum('credits')) : 0}} UCS</span>--}}
                                                    <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                                                </div>
                                            </div>
                                        </span>
                                    </div>
                                </li>
                            </ul>

                        </div>
                        <div class="tab-content m-b-md">
                            {{--  History  Wallet --}}
                            @include('pages.curators.curator-wallet.history')

                            {{--  History  transfer --}}
                            @include('pages.curators.curator-wallet.transfer')

                            {{--  History  widrawal --}}
                            @include('pages.curators.curator-wallet.widrawal')

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
    <script>
        $(document).ready(function() {
            //Only needed for the filename of export files.
            //Normally set in the title tag of your page.
            document.title='Curator History';
            // DataTable initialisation
            $('#historyCuratorWithdrawal').DataTable(
                {
                    "paging": true,
                    "buttons": [
                        'colvis',
                        'copyHtml5',
                        'csvHtml5',
                        'excelHtml5',
                        'pdfHtml5',
                        'print'
                    ]
                }
            );
            $('#curatorOfferPayments').DataTable(
                {
                    "paging": true,
                    "buttons": [
                        'colvis',
                        'copyHtml5',
                        'csvHtml5',
                        'excelHtml5',
                        'pdfHtml5',
                        'print'
                    ]
                }
            );
            $('#curatorReferralPayments').DataTable(
                {
                    "paging": true,
                    "buttons": [
                        'colvis',
                        'copyHtml5',
                        'csvHtml5',
                        'excelHtml5',
                        'pdfHtml5',
                        'print'
                    ]
                }
            );
            $('#curatorSubmitCoverageHistory').DataTable(
                {
                    "paging": true,
                    "buttons": [
                        'colvis',
                        'copyHtml5',
                        'csvHtml5',
                        'excelHtml5',
                        'pdfHtml5',
                        'print'
                    ]
                }
            );
        });
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script>
        var preload = document.getElementById('loadings');
        function hideLoader()
        {
            preload.style.display = "none";
        }

        function showLoader()
        {
            preload.style.display = "block";
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $(window).load(function() {
            $('#historyCuratorWithdrawal_wrapper').css('display', 'none');
            $('#curatorOfferPayments_wrapper').css('display', 'none');
            $('#curatorReferralPayments_wrapper').css('display', 'none');
            $('#curatorSubmitCoverageHistory_wrapper').css('display', 'none');
        });

        $('#curatorHistoryWallet').on('change', function (e){
            e.preventDefault();
            if(this.value === '{!! \App\Templates\IStatus::HISTORY_WITHDRAWAL !!}')
                var request = this.value;
            else if(this.value === '{!! \App\Templates\IStatus::OFFER_PAYMENTS !!}')
                var request = this.value;
            else if(this.value === '{!! \App\Templates\IStatus::REFERRAL_PAYMENTS !!}')
                var request = this.value;
            else if(this.value === '{!! \App\Templates\IStatus::Submit_Coverage_History !!}')
                var request = this.value;

            var url = '{{ route('curator.wallet.history') }}';
            // showLoader();
            $.ajax({
                type: "GET",
                url: url,
                data: {requestFrom:request},
                dataType: 'json',
                success: function (data) {
                    // hideLoader();
                    if(data.requestFrom === '{!! \App\Templates\IStatus::HISTORY_WITHDRAWAL !!}')
                    {
                        $('#curatorOfferPayments_wrapper').css('display', 'none');
                        $('#curatorReferralPayments_wrapper').css('display', 'none');
                        $('#curatorSubmitCoverageHistory_wrapper').css('display', 'none');
                        $('#historyCuratorWithdrawal_wrapper').css('display', 'block');

                    }
                    else if(data.requestFrom === '{!! \App\Templates\IStatus::OFFER_PAYMENTS !!}')
                    {
                        $('#historyCuratorWithdrawal_wrapper').css('display', 'none');
                        $('#curatorReferralPayments_wrapper').css('display', 'none');
                        $('#curatorSubmitCoverageHistory_wrapper').css('display', 'none');
                        $('#curatorOfferPayments_wrapper').css('display', 'block');
                    }
                    else if(data.requestFrom === '{!! \App\Templates\IStatus::REFERRAL_PAYMENTS !!}')
                    {
                        $('#historyCuratorWithdrawal_wrapper').css('display', 'none');
                        $('#curatorOfferPayments_wrapper').css('display', 'none');
                        $('#curatorSubmitCoverageHistory_wrapper').css('display', 'none');
                        $('#curatorReferralPayments_wrapper').css('display', 'block');
                    } else if(data.requestFrom === '{!! \App\Templates\IStatus::Submit_Coverage_History !!}')
                    {
                        $('#historyCuratorWithdrawal_wrapper').css('display', 'none');
                        $('#curatorOfferPayments_wrapper').css('display', 'none');
                        $('#curatorReferralPayments_wrapper').css('display', 'none');
                        $('#curatorSubmitCoverageHistory_wrapper').css('display', 'block');
                    }

                }

            });


        });
    </script>
    <script>
        $(document).ready(function () {
            $('#transferCuratorForm').validate({ // initialize the plugin
                rules: {
                    email: {
                        required: true,
                        email: true
                    },
                    amount: {
                        required: true
                    },

                },
                messages: {
                    email: "The email field is required",
                    amount: "The amount field is required",
                }
            });
        });
        $('#country_name').change(function () {
            var cid = $(this).val();
            if (cid) {
                var url = '/get-cites/'+cid;
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
        // withdrawal methods
        $('#withdrawalMethod').on('change', function (){
            var withdrawMethod = this.value;
            if(withdrawMethod == 'paypal')
            {
                document.getElementById('wiseWithdrawal').style.display = 'none';
                document.getElementById('emailWise').style.display = 'none';
                document.getElementById('accountDetailWise').style.display = 'none';
                document.getElementById('paypalWithdrawal').style.display = 'block';
                $('#wise_email').val('');
                $('#amount').val('');
                $('#wise_account_holder_inside').val('');
                $('#wise_account_number_inside').val('');
                $('#wise_sort_code_inside').val('');
                $('#wise_iban_inside').val('');
                $('#wise_address_inside').val('');
                $('#wise_account_holder_outside').val('');
                $('#wise_account_number_outside').val('');
                $('#wise_bic_swift_outside').val('');
                $('#wise_iban_outside').val('');
                $('#wise_address_outside').val('');
// alert('paypal');
            }else if(withdrawMethod == 'wise')
            {
                document.getElementById('paypalWithdrawal').style.display = 'none';
                // document.getElementById('emailWise').style.display = 'block';
                document.getElementById('wiseWithdrawal').style.display = 'block';
                $('#paypal_email').val('');
                $('#amount').val('');
                $('#wise_account_holder_inside').val('');
                $('#wise_account_number_inside').val('');
                $('#wise_sort_code_inside').val('');
                $('#wise_iban_inside').val('');
                $('#wise_address_inside').val('');
                $('#wise_account_holder_outside').val('');
                $('#wise_account_number_outside').val('');
                $('#wise_bic_swift_outside').val('');
                $('#wise_iban_outside').val('');
                $('#wise_address_outside').val('');
                // alert('wise');
            }
        });

        // wise method
        $('#wiseMethod').on('change', function (){
            var wiseMethod = this.value;
            // alert(wiseMethod);
            if(wiseMethod == 'email')
            {
                document.getElementById('accountDetailWise').style.display = 'none';
                document.getElementById('emailWise').style.display = 'block';
                $('#wise_account_holder_inside').val('');
                $('#wise_account_number_inside').val('');
                $('#wise_sort_code_inside').val('');
                $('#wise_iban_inside').val('');
                $('#wise_address_inside').val('');
                $('#wise_account_holder_outside').val('');
                $('#wise_account_number_outside').val('');
                $('#wise_bic_swift_outside').val('');
                $('#wise_iban_outside').val('');
                $('#wise_address_outside').val('');
                // alert('email');
            }else if(wiseMethod == 'account_add')
            {
                document.getElementById('emailWise').style.display = 'none';
                document.getElementById('accountDetailWise').style.display = 'block';
                $('#wise_email').val('');
                // alert('account_add');
            }
        });

        function UK(uk)
        {
            if(uk == 'inside')
            {
                $('#wise_account_holder_outside').val('');
                $('#wise_account_number_outside').val('');
                $('#wise_bic_swift_outside').val('');
                $('#wise_iban_outside').val('');
                $('#wise_address_outside').val('');
            }
            if(uk == 'outside')
            {
                $('#wise_account_holder_inside').val('');
                $('#wise_account_number_inside').val('');
                $('#wise_sort_code_inside').val('');
                $('#wise_iban_inside').val('');
                $('#wise_address_inside').val('');
            }
        }
    </script>

{{--    transfer script--}}
    <script>
        $('#AmountTransfer').keyup(function (){
            $('.amount_transfer_display').html(this.value+' UCS');
        })
    </script>

    <script>
        function adminWithdrawalMsgModalCenter(id)
        {
            let msg = $('#mgAdminWithdrawalCurator'+id).html();
            $('#msgAdminWithdrawal').html(msg);
            $('#adminWithdrawalMsgModalCenter').modal('show');
        }
    </script>
@endsection
