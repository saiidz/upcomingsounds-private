@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','All System Users')

{{-- vendor style --}}
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/sweetalert/sweetalert.css')}}">
@endsection

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
            <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
            <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>System Users List</span></h5>
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
                        <!-- Page Length Options -->
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
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Phone Number</th>
                                                        <th>Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @isset($system_users)
                                                        @foreach($system_users as $system_user)
                                                            <tr>
                                                                <td>{{ null !== Request::query('page') ?  $loop->iteration + (((int) Request::query('page') - 1) * 10)  : $loop->iteration }}</td>
                                                                <td>{{$system_user->name}}</td>
                                                                <td>{{$system_user->email}}</td>
                                                                <td>{{$system_user->address}}</td>
                                                                <td>{{$system_user->phone_number}}</td>
                                                                <td>
                                                                    @if($system_user->type == 'admin')
                                                                        <span class="chip green lighten-5 green-text">Admin</span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <div class="action-button">
                                                                        <a href="{{route('system-users.edit',$system_user->id)}}" class="action-button-edit">
                                                                            <img src="{{asset('images/edit_blue.svg')}}">
                                                                        </a>
                                                                        <a class="action-button-edit modal-trigger get_link"
                                                                           href="#viewSystemUser"
                                                                           id="{{$system_user->id}}"
                                                                           onclick="viewSystemUser(id)"><img
                                                                                src="{{asset('images/eye-view.svg')}}"></a>
                                                                        <!-- Modal Trigger -->
                                                                        <a href="javascript:void(0)" onclick="deleteSystemUser({{$system_user->id}})" class="waves-light action-button-delete mr-4">
                                                                            <img src="{{asset('images/delete_forever.svg')}}">
                                                                        </a>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Phone Number</th>
                                                        <th>Type</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </tfoot>
                                                </table>
                                                {{ $system_users->links() }}
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
    <!-- Delete Model-->
    @include('admin.panels.generic_models')
@endsection

{{-- vendor style --}}
@section('vendor-script')
    <script src="{{asset('vendors/sweetalert/sweetalert.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
    <script src="{{asset('vendors/data-tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendors/data-tables/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('vendors/data-tables/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('js/scripts/data-tables.js')}}"></script>
    <script src="{{asset('js/scripts/advance-ui-modals.js')}}"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <script src="{{asset('js/scripts/extra-components-sweetalert.js')}}"></script>
    <script>
         function deleteSystemUser(id) {
              url = '{{ route("system-users.destroy",":id") }}';
              var url = url.replace(':id', id);
            swal({
                title: "Are you sure?",
                text: "Do you want to delete this system user!",
                icon: 'warning',
                dangerMode: true,
                buttons: {
                    cancel: 'No, Please!',
                    delete: 'Yes, Delete It'
                }
            }).then(function (willDelete) {
                if (willDelete) {
                    $.ajax({
                        type: "DELETE",
                        url: url,
                        success: function (data) {
                            swal(data.success, {
                                icon: "success",
                            });
                            setInterval(function(){
                                location.reload();
                            }, 2000);

                        },
                    });
                } else {
                    swal("Your system user is safe", {
                        title: 'Cancelled',
                        icon: "error",
                    });
                }
            });
        }

        //View System User
         function viewSystemUser(system_user_id) {
             var url = "{{route('viewSystemUser')}}";
             $.ajax({
                 type: "GET",
                 url: url,
                 data: {
                     'system_user_id': system_user_id,
                     _token: '{{ csrf_token() }}'
                 },
                 dataType: 'json',
                 success: function (data) {
                     $('#system_user_name').html(data.system_user.name);
                     $('#system_user_email').html(data.system_user.email);
                     $('#system_user_address').html(data.system_user.address);
                     $('#system_user_phone_number').html(data.system_user.phone_number);
                     $('#system_user_type').html('<span class="chip green lighten-5 green-text">Admin</span>');
                 }
             });
         }
    </script>
@endsection
