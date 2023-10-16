@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Verified Coverage')

@section('vendor-style')
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
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
            <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
            <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Verified Coverage</span></h5>
                            <ol class="breadcrumbs mb-0">
                                @include('admin.panels.breadcrumbs')
                                <li class="breadcrumb-item active">Verified Coverage</li>
                            </ol>
                        </div>
                        <div class="col s2 m6 l6">
                            <a class="btn waves-effect waves-light breadcrumbs-btn right"
                               href="{{ route('admin.verified.coverage',!empty($verified_coverage->user) ? $verified_coverage->user->id : '---') }}"
                               data-target="dropdown1">
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
                                <div
                                    class="col s12 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                    @if ($verified_coverage->is_approved == 0)
                                        <a href="#approvedModal" data-id={{ $verified_coverage->id }} class="btn-small
                                           btn-light-indigo dropdown-item has-icon modal-trigger approvedCurator-confirm
                                        ">
                                        Approve
                                        </a>
                                    @endif

                                    @if ($verified_coverage->is_approved == 0 && $verified_coverage->is_rejected == 0)
                                        <a href="#rejectModal" data-id={{ $verified_coverage->id }} class="btn-small
                                           btn-light-red dropdown-item has-icon modal-trigger reject-curator-confirm">
                                        Reject
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- users view card data start -->
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s12 m12">
                                        <table class="striped">
                                            <tbody>
                                            <tr>
                                                <td>Curator Name:</td>
                                                <td>
                                                    <a href="{{ route('admin.curator.profile', $verified_coverage->user_id) }}">{{ !empty($verified_coverage->user) ? $verified_coverage->user->name : '---' }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Offer Type:</td>
                                                <td class="users-view-latest-activity">{{!empty($verified_coverage->offerType) ? $verified_coverage->offerType->name : '---' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Time To Publish:</td>
                                                <td class="users-view-latest-activity">{{!empty($verified_coverage->time_to_publish) ? $verified_coverage->time_to_publish : '---' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Created At:</td>
                                                <td>{{ getDateFormat($verified_coverage->created_at) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Contribution:</td>
                                                <td class="users-view-latest-activity">{{ $verified_coverage->contribution ?? '---' }}
                                                    USC
                                                </td>
                                            </tr>

                                            <tr>
                                                <td>Is Approved:</td>
                                                <td>
                                                    @if ($verified_coverage->is_approved == 1)
                                                        <span
                                                            class=" users-view-status chip green lighten-5 green-text">Approved</span>
                                                    @elseif($verified_coverage->is_rejected == 1)
                                                        <span class="chip red lighten-5">
                                                            <span class="red-text">Rejected</span>
                                                        </span>
                                                    @else
                                                        <span class=" users-view-status chip red lighten-5 red-text">Pending</span>
                                                    @endif

                                                </td>
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
    @include('admin.pages.curator-verified-coverage.verified-coverage-modal')

@endsection

{{-- vendor scripts --}}
@section('vendor-script')
    <script src="{{asset('app-assets/vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script
        src="{{asset('app-assets/vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('app-assets/vendors/data-tables/js/dataTables.select.min.js')}}"></script>

@endsection

{{-- page scripts --}}
@section('page-script')
    <script src="{{asset('app-assets/js/scripts/data-tables.js')}}"></script>
    <script src="{{asset('app-assets/js/curator/curator.js')}}"></script>
    <script>
        $(function () {
            $('.reject-curator-confirm').on('click', function () {
                $(".modal").modal(),
                    $("#modal3").modal("open"),
                    $("#modal3").modal("close")
            });
        });
        $(function () {
            $('.approvedCurator-confirm').on('click', function () {
                $(".modal").modal(),
                    $("#modal3").modal("open"),
                    $("#modal3").modal("close")
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function () {

            $('.ckeditor').ckeditor();

        });
        //  CKEDITOR.replace( 'description_artist_reject_message' );
    </script>
@endsection
