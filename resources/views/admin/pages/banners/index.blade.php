@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Banners')

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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Banners</span></h5>
                            <ol class="breadcrumbs mb-0">
                                @include('admin.panels.breadcrumbs')
                                <li class="breadcrumb-item active">Banners </li>
                            </ol>
                        </div>
                        <div class="col s2 m6 l6">
                            <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="{{ route('admin.banners.create') }}" data-target="dropdown1">
                                <span class="hide-on-small-onl">Add New Banner</span>
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
                                                        <th>Artist Name</th>
                                                        <th>Artist Thumbnail</th>
                                                        <th>Track Name</th>
                                                        <th>Track Description</th>
                                                        <th>Created At</th>
                                                        <th>Add Days</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @if (!empty($banners))
                                                        @foreach ($banners as $banner)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $banner->artist_name ?? '----' }}</td>
                                                                <td>
                                                                    @if(!empty($banner->track_thumbnail))
                                                                        <a href="{{asset('uploads/track_thumbnail')}}/{{$banner->track_thumbnail}}" target="_blank">
                                                                            <img style="height:40px" src="{{asset('uploads/track_thumbnail')}}/{{$banner->track_thumbnail}}">
                                                                        </a>
                                                                    @else
                                                                        {{ __('-------') }}
                                                                    @endif
                                                                </td>
                                                                <td>{{ $banner->track_name ?? '----' }}</td>
                                                                <td>{{ Str::limit($banner->track_description,50) ?? '----' }}</td>
                                                                <td>{{ getDateFormat($banner->created_at) }}</td>
                                                                <td>
                                                                    <form action="{{route('admin.add-days',$banner->id)}}" method="POST" class="basicform_with_reload">
                                                                        @csrf
                                                                        <input type="number" min="1" name="add_days" value="{{!empty($banner->add_days) ? $banner->add_days : \App\Templates\IPackages::ADD_DAYS}}" style="width:70%">
                                                                        <button type="submit" class="btn-floating mb-1 btn-sm waves-effect waves-light mr-1">
                                                                            <i class="material-icons">add</i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <div class="action-button">
                                                                        <a href="{{route('admin.banners.edit',$banner->id)}}" class="action-button-edit">
                                                                            <img class="editDell" src="{{asset('images/edit_blue.svg')}}">
                                                                        </a>
                                                                        <a class="dropdown-item has-icon delete-confirm" href="javascript:void(0)" data-id={{ $banner->id }}>
                                                                            <img class="editDell" src="{{asset('images/delete_forever.svg')}}">
                                                                        </a>
                                                                        <!-- Delete Form -->
                                                                        <form class="d-none" id="delete_form_{{ $banner->id }}" action="{{ route('admin.banners.destroy', $banner->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                        </form>
                                                                        @if($banner->add_remove_banner == \App\Templates\IPackages::REMOVE_BANNER)
                                                                            <a href="javascript:void(0)" data-id={{ $banner->id }} class="waves-effect waves-light btn-small gradient-45deg-green-teal box-shadow-none border-round mr-1 mb-1 add_banner">
                                                                            Add Banner
                                                                            </a>
                                                                        @endif
                                                                        @if($banner->add_remove_banner == \App\Templates\IPackages::ADD_BANNER)
                                                                            <a class="waves-effect waves-light btn-small gradient-45deg-red-pink box-shadow-none border-round mr-1 mb-1 remove_banner" data-id={{ $banner->id }} href="javascript:void(0)" data-id={{ $banner->id }}>
                                                                                Remove Banner
                                                                            </a>
                                                                        @endif
                                                                        <!-- add banner Form -->
                                                                        <form class="d-none" id="add_banner_form_{{ $banner->id }}" action="{{route('admin.banner-add',$banner->id)}}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="add_remove_banner" value="{{ \App\Templates\IPackages::ADD_BANNER }}">
                                                                        </form>
                                                                        <!-- remove banner Form -->
                                                                        <form class="d-none" id="remove_form_{{ $banner->id }}" action="{{route('admin.banner-remove',$banner->id)}}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="add_remove_banner" value="{{ \App\Templates\IPackages::REMOVE_BANNER }}">
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
