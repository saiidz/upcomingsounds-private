@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Testimonials')

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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Testimonials</span></h5>
                            <ol class="breadcrumbs mb-0">
                                @include('admin.panels.breadcrumbs')
                                <li class="breadcrumb-item active">Testimonials </li>
                            </ol>
                        </div>
                        <div class="col s2 m6 l6">
                            <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="{{ route('admin.testimonials.create') }}" data-target="dropdown1">
                                <span class="hide-on-small-onl">Add New Testimonial</span>
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
                                                        <th>Title</th>
                                                        <th>Image</th>
                                                        <th>Description</th>
                                                        <th>Created At</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if (!empty($testimonials))
                                                        @foreach ($testimonials as $testimonial)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $testimonial->title ?? '----' }}</td>
                                                                <td>
                                                                    <a href="{{asset('uploads/home_slider')}}/{{$testimonial->image}}" target="_blank">
                                                                        <img style="height:40px" src="{{asset('uploads/testimonials')}}/{{$testimonial->image}}">
                                                                    </a>
                                                                </td>
                                                                <td>{{ Str::limit($testimonial->details,50) ?? '----' }}</td>
                                                                <td>{{ getDateFormat($testimonial->created_at) }}</td>
                                                                <td>{{ ($testimonial->status == 1) ? 'Active' : 'InActive' }}</td>
                                                                <td>
                                                                    <div class="action-button">
                                                                        <a href="{{route('admin.testimonials.edit',$testimonial->id)}}" class="action-button-edit">
                                                                            <img class="editDell" src="{{asset('images/edit_blue.svg')}}">
                                                                        </a>
                                                                        <a class="dropdown-item has-icon delete-confirm" href="javascript:void(0)" data-id={{ $testimonial->id }}>
                                                                            <img class="editDell" src="{{asset('images/delete_forever.svg')}}">
                                                                        </a>
                                                                        <!-- Delete Form -->
                                                                        <form class="d-none" id="delete_form_{{ $testimonial->id }}" action="{{ route('admin.testimonials.destroy', $testimonial->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                        </form>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                    <tfoot>
                                                    <tr>
                                                        <th>S#</th>
                                                        <th>Artist Name</th>
                                                        <th>Artist Thumbnail</th>
                                                        <th>Track Name</th>
                                                        <th>Track Description</th>
                                                        <th>Created At</th>
                                                        <th>Add Days</th>
                                                        <th>Action</th>
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
    <script>
        /*-------------------------------
        Add Banner Alert
      -----------------------------------*/
        $('.add_banner').on('click', function(event) {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to add this banner!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, add it!'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('add_banner_form_' + id).submit();
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your Data is Save :)',
                        'error'
                    )
                }
            })
        });

        /*-------------------------------
        Remove Banner Alert
      -----------------------------------*/
        $('.remove_banner').on('click', function(event) {
            const id = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "You want to remove this banner!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, remove it!'
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('remove_form_' + id).submit();
                } else if (
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your Data is Save :)',
                        'error'
                    )
                }
            })
        });
    </script>
@endsection
