@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Edit Bidder')

{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/flag-icon/css/flag-icon.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css"
          href="{{asset('vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/data-tables/css/select.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/data-tables.css')}}">
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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Bidder Edit</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="container">
                    <div class="section">
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
                        <!-- jQuery Plugin Initialization -->
                            <div class="row">
                                <!-- Form Advance -->
                                <div class="col s12 m12 l12">
                                    <div id="Form-advance" class="card card card-default scrollspy">
                                        <div class="card-content">
                                            <form method="POST" action="{{route('bidders.update',$bidder->id)}}">
                                                @csrf @method('PUT')
                                                <div class="row">
                                                    <div class="input-field col m6 s12">
                                                        <input id="name" class="@error('name') is-invalid @enderror"
                                                               name="name" value="{{$bidder->name}}" type="text">
                                                        <label for="name">Name</label>
                                                        @error('name')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                        @enderror
                                                    </div>
                                                    <div class="input-field col m6 s12">
                                                        <input id="email" class="@error('email') is-invalid @enderror"
                                                               name="email" value="{{$bidder->email}}" type="text">
                                                        <label for="email">Email</label>
                                                        @error('email')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col m6 s12">
                                                        <input id="password" class="@error('password') is-invalid @enderror"
                                                               name="password" type="text">
                                                        <label for="password">Password</label>
                                                        @error('password')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                        @enderror
                                                    </div>
                                                    <div class="input-field col m6 s12">
                                                        <input id="address" class="@error('address') is-invalid @enderror"
                                                               name="address" value="{{$bidder->address}}" type="text">
                                                        <label for="address">Address</label>
                                                        @error('address')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col m6 s12">
                                                        <input id="phone_number" class="@error('phone_number') is-invalid @enderror"
                                                               name="phone_number" value="{{$bidder->phone_number}}" type="tel">
                                                        <label for="phone_number">Phone Number</label>
                                                        @error('phone_number')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                        @enderror
                                                    </div>
                                                    <div class="input-field col m6 s12">
                                                        <select id="status" name="status">
                                                            <option value="active" {{$bidder->status == 'active' ? 'selected' : ''}} class="@error('status') is-invalid @enderror">Active</option>
                                                            <option value="suspend" {{$bidder->status == 'suspend' ? 'selected' : ''}} class="@error('status') is-invalid @enderror">Suspended</option>
                                                            <option value="block" {{$bidder->status == 'block' ? 'selected' : ''}}  class="@error('status') is-invalid @enderror">Blocked</option>
                                                        </select>
                                                        <label for="status">User Status</label>
                                                        @error('status')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <button class="btn cyan waves-effect waves-light right"
                                                                type="submit">Update
                                                            <i class="material-icons right">send</i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
    @include('admin.panels.generic_models')
@endsection

{{-- vendor style --}}
@section('vendor-script')
    <script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
@endsection

@section('page-script')
    <script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/data-tables/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('js/scripts/data-tables.js')}}"></script>
    <script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>
    <script src="{{asset('js/scripts/ui-alerts.js')}}"></script>
    <script src="{{asset('js/materializedatetimepicker.js')}}"></script>
    <script>
        $(document).ready(function(){
            $('#statusstatus').formSelect();
        });
    </script>
@endsection
