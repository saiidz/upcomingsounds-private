@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Verified Coverage Submit Work')

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
            <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
            <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Pending Verified Coverage</span></h5>
                            <ol class="breadcrumbs mb-0">
                                @include('admin.panels.breadcrumbs')
                                <li class="breadcrumb-item active">Pending Verified Coverage </li>
                            </ol>
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
                                                        <th>Curator Name</th>
                                                        <th>Created At</th>
                                                        <th>Status</th>
                                                        <th>View</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if (!empty($submitWorks))
                                                        @foreach ($submitWorks as $submitWork)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>
                                                                    @if(!empty($submitWork->user))
                                                                        <a href="{{ route('admin.curator.profile', $submitWork->user->id) }}">
                                                                            {{ $submitWork->user->name }}
                                                                        </a>
                                                                    @endif
                                                                </td>
                                                                <td>{{ getDateFormat($submitWork->created_at) }}</td>
                                                                <td>
                                                                    @if ($submitWork->status == \App\Templates\IOfferTemplateStatus::APPROVED)
                                                                        <span class="chip green lighten-5">
                                                                            <span class="green-text">Approved</span>
                                                                        </span>
                                                                    @elseif($submitWork->status == \App\Templates\IOfferTemplateStatus::REJECTED)
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
                                                                    <a href="{{ route('admin.verified.coverage.submit.work.detail', $submitWork->id) }}"><i class="material-icons">remove_red_eye</i></a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>S#</th>
                                                        <th>Curator Name</th>
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
