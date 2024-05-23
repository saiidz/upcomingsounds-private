@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Verified Coverages')

@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Verified Coverages</span></h5>
                            <ol class="breadcrumbs mb-0">
                                @include('admin.panels.breadcrumbs')
                                <li class="breadcrumb-item active">Verified Coverages </li>
                            </ol>
                        </div>
                        <div class="col s2 m6 l6">
                            <a class="btn waves-effect waves-light breadcrumbs-btn right" href="{{ route('admin.curator.verified.coverage') }}" data-target="dropdown1">
                                <span class="hide-on-small-onl">Back</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="container">
                    <div class="section section-data-tables">
                        <!-- Page Length Options -->
                        <div class="row">
                            <div class="col s12">
                                <div class="card">
                                    <div class="card-content">
                                        <h4 class="card-title">Page Length Options</h4>
                                        <div class="row">
                                            <div class="col s12">
                                                <table id="page-length-option" class="display">
                                                    <thead>
                                                    <tr>
                                                        <th>S#</th>
                                                        <th>Offer Type</th>
                                                        <th>Time To Publish</th>
                                                        <th>Contribution</th>
                                                        <th>Created At</th>
                                                        <th>Status</th>
                                                        <th>View</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if (!empty($verifiedCoverages))
                                                        @foreach ($verifiedCoverages as $verifiedCoverage)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{!empty($verifiedCoverage->offerType) ? $verifiedCoverage->offerType->name : '---' }}</td>
                                                                <td>{{ $verifiedCoverage->time_to_publish ?? '---' }}</td>
                                                                <td>{{ $verifiedCoverage->contribution ?? '---' }} USC</td>
                                                                <td>{{ getDateFormat($verifiedCoverage->created_at) }}</td>
                                                                <td>
                                                                    @if ($verifiedCoverage->is_approved == 1)
                                                                        <span class="chip green lighten-5">
                                                                            <span class="green-text">Approved</span>
                                                                        </span>
                                                                    @elseif($verifiedCoverage->is_rejected == 1)
                                                                        <span class="chip red lighten-5">
                                                                            <span class="red-text">Rejected</span>
                                                                        </span>
                                                                    @else
                                                                        <span class="chip red lighten-5">
                                                                            <span class="red-text">Pending</span>
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('admin.curator.show.verified.coverage', $verifiedCoverage->id) }}"><i class="material-icons">remove_red_eye</i></a>
{{--                                                                    <a href="{{ route('admin.template-offer', $verifiedCoverage->id) }}"><i class="material-icons">remove_red_eye</i></a>--}}
                                                                    <a class="dropdown-item has-icon delete-confirm" href="javascript:void(0)" data-id={{ $verifiedCoverage->id }}>
                                                                        <img class="editDell" src="{{asset('images/delete_forever.svg')}}">
                                                                    </a>
                                                                    <!-- Delete Form -->
                                                                    <form class="d-none" id="delete_form_{{ $verifiedCoverage->id }}" action="{{ route('admin.curator.delete.verified.coverage', $verifiedCoverage->id) }}" method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>S#</th>
                                                        <th>Offer Type</th>
                                                        <th>Time To Publish</th>
                                                        <th>Contribution</th>
                                                        <th>Created At</th>
                                                        <th>Status</th>
                                                        <th>View</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->
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
@endsection
