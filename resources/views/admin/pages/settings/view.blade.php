@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Settings')

@section('content')
<div id="main">
        <div class="row">
            @include('admin.panels.bg-color')
            <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Settings</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="container">
                    <div class="section section-data-tables">
                        @if ($message = Session::get('success'))
                            <div class="card-alert card green lighten-5 remove_message">
                                <div class="card-content green-text">
                                    <p>{{ $message }}</p>
                                </div>
                                <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                    @endif
                        <div class="row">
                            <div class="col s12">
                                <div class="card">
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col s12">
                                                <table id="page-length-option" class="display">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>title</th>
                                                        <th>Value</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @forelse($settings as $setting)
                                                        <tr>
                                                            <td>{{ null !== Request::query('page') ?  $loop->iteration + (((int) Request::query('page') - 1) * 10)  : $loop->iteration }}</td>
                                                            <td>{{ $setting->title }}</td>
                                                            <td>{{ $setting->value }}</td>
                                                            <td>
                                                                <div class="action-button">
                                                                    <a href="{{ route('settings.edit', $setting->id) }}" class="action-button-edit">
                                                                        <img src="{{ asset('images/edit_blue.svg') }}">
                                                                    </a>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    @empty
                                                        <td colspan="5"><p>No Record Found</p></td>
                                                    @endforelse
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Key</th>
                                                        <th>Value</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                                {{ $settings->links() }}
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
     @include('admin.panels.generic_models')
@endsection
{{-- vendor style --}}
@section('vendor-script')
    <script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>
    <script src="{{asset('js/scripts/extra-components-sweetalert.js')}}"></script>
@endsection
