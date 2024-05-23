@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Curator Withdrawal Request')

@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-tables.css')}}">
@endsection

@section('content')

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            @include('admin.panels.bg-color')
            <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Curator Withdrawal Request</span></h5>
                            <ol class="breadcrumbs mb-0">
                                @include('admin.panels.breadcrumbs')
                                <li class="breadcrumb-item active">Curator Withdrawal Request </li>
                            </ol>
                        </div>
                        <div class="col s2 m6 l6">
                            <a class="btn waves-effect waves-light breadcrumbs-btn right" href="{{ route('admin.request.withdrawal.curator') }}" data-target="dropdown1">
                                <span class="hide-on-small-onl">Back</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="container">
                    <!-- users view start -->
                    <div class="section users-view">
                        <div class="card-panel">
                            <div class="row">
                                <div class="col s12 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                    <div>
                                        @if ($transactionHistory->payment_status == \App\Templates\IStatus::PENDING)
                                            <a href="#approvedTransactionHistoryModal" data-id="{{ $transactionHistory->id }}" class="btn-small btn-light-indigo dropdown-item has-icon modal-trigger approvedWithdrawalCurator-confirm">
                                                Approve
                                            </a>
                                        @endif

                                        @if ($transactionHistory->payment_status == \App\Templates\IStatus::PENDING)
                                            <a href="#rejectTransactionHistoryModal" data-id="{{ $transactionHistory->id }}" class="btn-small btn-light-red dropdown-item has-icon modal-trigger reject-Withdrawal-SUBMIT-confirm">
                                                Reject
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- users view card data start -->
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s4 m4">
                                        <table class="striped">
                                            <tbody>
                                            <tr>
                                                <td>Curator Name:</td>
                                                <td>
                                                    <a href="{{ route('admin.curator.profile', $transactionHistory->user->id) }}">{{ !empty($transactionHistory->user) ? $transactionHistory->user->name : '---' }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Type:</td>
                                                <td>{{ $transactionHistory->type ?? '---' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Created At:</td>
                                                <td>{{ getDateFormat($transactionHistory->created_at) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Amount:</td>
                                                <td class="users-view-latest-activity">{{ $transactionHistory->amount ?? '---' }} USC</td>
                                            </tr>
                                            @php
                                                $withdrawalRequest = json_decode($transactionHistory->details);
                                            @endphp
                                            <tr>
                                                <td>Withdrawal Request:</td>
                                                <td class="users-view-latest-activity">{{ !empty($withdrawalRequest->withdrawal_request) ? ucfirst($withdrawalRequest->withdrawal_request) : '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Paypal Email:</td>
                                                <td class="users-view-latest-activity">{{ !empty($withdrawalRequest->paypal_email) ? $withdrawalRequest->paypal_email : '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Wise Email:</td>
                                                <td class="users-view-latest-activity">{{ !empty($withdrawalRequest->wise_email) ? $withdrawalRequest->wise_email : '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Is Status:</td>
                                                <td>
                                                    @if ($transactionHistory->payment_status == \App\Templates\IStatus::PENDING)
                                                        <span class="chip red lighten-5">
                                                            <span class="red-text">Pending</span>
                                                        </span>
                                                    @elseif($transactionHistory->payment_status == \App\Templates\IStatus::CANCELLED)
                                                        <span class="chip red lighten-5">
                                                            <span class="red-text">Cancelled</span>
                                                        </span>
                                                    @else
                                                        <span class="chip green lighten-5">
                                                            <span class="green-text">{{ucfirst(\App\Templates\IStatus::COMPLETED)}}</span>
                                                        </span>
                                                    @endif
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col s4 m4">
                                        <table class="striped">
                                            <tbody>
                                            <tr>
                                                <td style="text-align:center">Inside The UK</td>
                                            </tr>
                                            <tr>
                                                <td>Wise Account Holder:</td>
                                                <td>{{ !empty($withdrawalRequest->wise_account_holder_inside) ? $withdrawalRequest->wise_account_holder_inside : '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Wise Account Number:</td>
                                                <td>{{ !empty($withdrawalRequest->wise_account_number_inside) ? $withdrawalRequest->wise_account_number_inside : '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Wise Sort Code:</td>
                                                <td>{{ !empty($withdrawalRequest->wise_sort_code_inside) ? $withdrawalRequest->wise_sort_code_inside : '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Wise IBAN:</td>
                                                <td>{{ !empty($withdrawalRequest->wise_iban_inside) ? $withdrawalRequest->wise_iban_inside : '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Wise Address:</td>
                                                <td>{{ !empty($withdrawalRequest->wise_address_inside) ? $withdrawalRequest->wise_address_inside : '-----' }}</td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col s4 m4">
                                        <table class="striped">
                                            <tbody>
                                            <tr>
                                                <td style="text-align:center">Outside The UK</td>
                                            </tr>
                                            <tr>
                                                <td>Wise Account Holder:</td>
                                                <td>{{ !empty($withdrawalRequest->wise_account_holder_outside) ? $withdrawalRequest->wise_account_holder_outside : '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Wise Account Number:</td>
                                                <td>{{ !empty($withdrawalRequest->wise_account_number_outside) ? $withdrawalRequest->wise_account_number_outside : '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Wise Bic Swift:</td>
                                                <td>{{ !empty($withdrawalRequest->wise_bic_swift_outside) ? $withdrawalRequest->wise_bic_swift_outside : '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Wise IBAN:</td>
                                                <td>{{ !empty($withdrawalRequest->wise_iban_outside) ? $withdrawalRequest->wise_iban_outside : '-----' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Wise Address:</td>
                                                <td>{{ !empty($withdrawalRequest->wise_address_outside) ? $withdrawalRequest->wise_address_outside : '-----' }}</td>
                                            </tr>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- users view card data ends -->
                    </div>
                    <!-- users view ends -->
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->
    @include('admin.pages.curator-withdrawal-request.modal')

@endsection

{{-- vendor scripts --}}
@section('vendor-script')
    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/data-tables/js/dataTables.select.min.js')}}"></script>

@endsection

{{-- page scripts --}}
@section('page-script')
    <script src="{{asset('app-assets/js/scripts/data-tables.js')}}"></script>
    <script src="{{asset('app-assets/js/curator/curator.js')}}"></script>
    <script>
        $(function () {
            $('.reject-Withdrawal-SUBMIT-confirm').on('click', function () {
                $(".modal").modal(),
                    $("#modal3").modal("open"),
                    $("#modal3").modal("close")
            });
        });
        $(function () {
            $('.approvedWithdrawalCurator-confirm').on('click', function () {
                $(".modal").modal(),
                    $("#modal3").modal("open"),
                    $("#modal3").modal("close")
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
        //  CKEDITOR.replace( 'description_artist_reject_message' );
    </script>
@endsection
