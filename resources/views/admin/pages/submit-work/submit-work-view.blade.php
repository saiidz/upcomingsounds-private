@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Submit Work')

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
            <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
            <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Submit Work</span></h5>
                            <ol class="breadcrumbs mb-0">
                                @include('admin.panels.breadcrumbs')
                                <li class="breadcrumb-item active">Submit Work </li>
                            </ol>
                        </div>
                        <div class="col s2 m6 l6">
                            <a class="btn waves-effect waves-light breadcrumbs-btn right" href="{{ route('admin.curator.submit.work') }}" data-target="dropdown1">
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
                                    @if ($submitWork->status == \App\Templates\IOfferTemplateStatus::PENDING)
                                        <a href="#approvedModal" data-id={{ $submitWork->id }} class="btn-small btn-light-indigo dropdown-item has-icon modal-trigger approvedCurator-confirm">
                                            Approve
                                        </a>
                                    @endif

                                    @if ($submitWork->status == \App\Templates\IOfferTemplateStatus::PENDING)
                                        <a href="#rejectModal" data-id={{ $submitWork->id }} class="btn-small btn-light-red dropdown-item has-icon modal-trigger reject-curator-confirm">
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
                                    <div class="col s12 m4">
                                        <table class="striped">
                                            <tbody>
                                            <tr>
                                                <td>Curator Name:</td>
                                                <td>
                                                    <a href="{{ route('admin.curator.profile', $submitWork->user->id) }}">{{ !empty($submitWork->user) ? $submitWork->user->name : '---' }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Title:</td>
                                                <td>{{ $submitWork->sendOffer->curatorOfferTemplate->title ?? '---' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Created At:</td>
                                                <td>{{ getDateFormat($submitWork->created_at) }}</td>
                                            </tr>
                                            <tr>
                                                <td>Contribution:</td>
                                                <td class="users-view-latest-activity">{{ $submitWork->sendOffer->curatorOfferTemplate->contribution ?? '---' }} USC</td>
                                            </tr>
                                            <tr>
                                                <td>Offer Type:</td>
                                                <td class="users-view-latest-activity">{{!empty($submitWork->sendOffer->curatorOfferTemplate->offerType) ? $submitWork->sendOffer->curatorOfferTemplate->offerType->name : '---' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Alternative Type:</td>
                                                <td class="users-view-latest-activity">{{!empty($submitWork->sendOffer->curatorOfferTemplate->alternativeOption) ? $submitWork->sendOffer->curatorOfferTemplate->alternativeOption->name : '---' }}</td>
                                            </tr>
                                            @if(!empty($submitWork->sendOffer->curatorOfferTemplate->sendOffer))
                                                <tr>
                                                    <td>Expiry Date:</td>
                                                    <td class="users-view-latest-activity">{{ getDateFormat($submitWork->sendOffer->curatorOfferTemplate->sendOffer->expiry_date) }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Approximate Publish Date:</td>
                                                    <td class="users-view-latest-activity">{{getDateFormat($submitWork->sendOffer->curatorOfferTemplate->sendOffer->publish_date)}}</td>
                                                </tr>
                                            @endif
                                            <tr>
                                                <td>Is Approved:</td>
                                                <td>
                                                    @if ($submitWork->sendOffer->curatorOfferTemplate->is_approved == 1)
                                                        <span class=" users-view-status chip green lighten-5 green-text">Approved</span>
                                                    @elseif($submitWork->sendOffer->curatorOfferTemplate->is_rejected == 1)
                                                        <span class="chip red lighten-5">
                                                            <span class="red-text">Rejected</span>
                                                        </span>
                                                    @else
                                                        <span class=" users-view-status chip red lighten-5 red-text">Pending</span>
                                                    @endif

                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Offer Status:</td>
                                                <td>
                                                    @if (!empty($submitWork->sendOffer->curatorOfferTemplate->sendOffer))
                                                        <span class="chip  lighten-5">
                                                            <span class="">{{$submitWork->sendOffer->curatorOfferTemplate->sendOffer->status}}</span>
                                                        </span>
                                                    @endif

                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col s12 m8">
                                        <table class="responsive-table">
                                            <thead>
                                            <tr>
                                                <th>Offer Text</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p>
                                                            {!! $submitWork->sendOffer->curatorOfferTemplate->offer_text ?? '---' !!}
                                                        </p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- users view card data ends -->

                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s12">
                                        <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Submit Work Links</h6>

                                        <div class="row">
                                            @if(count($submitWork->submitWorkLinks) > 0)
                                                @foreach($submitWork->submitWorkLinks as $link)
                                                    @if(!empty($link->link))
                                                        <div class="col-lg-4" >
                                                            <a href="{{$link->link}}" target="_blank">{{$link->link}}</a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </div>

                                        <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Submit Work Images</h6>

                                        <div class="row">
                                            @if(count($submitWork->submitWorkImages) > 0)
                                                @foreach($submitWork->submitWorkImages as $path)
                                                    <div class="col-lg-4" style="display:inline-block">
                                                        <a href="{{URL('/')}}/uploads/submit_work_images/{{$path->path}}" target="_blank">
                                                            <img src="{{URL('/')}}/uploads/submit_work_images/{{$path->path}}" alt="{{$path->type}}" style=" width:560px; height:315px">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- </div> -->
                            </div>
                        </div>


                    </div>
                    <!-- users view ends -->
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->
{{--    @include('admin.pages.direct-send-offer-template.offer-modal')--}}

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
        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
        //  CKEDITOR.replace( 'description_artist_reject_message' );
    </script>
@endsection
