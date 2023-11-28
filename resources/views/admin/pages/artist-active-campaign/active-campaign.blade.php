@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Active Campaign')

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Active Campaign</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Active Campaign </li>
						</ol>
					</div>
                    <div class="col s2 m6 l6">
                        <a class="btn waves-effect waves-light breadcrumbs-btn right" href="{{ route('admin.banners.create') }}" data-target="dropdown1">
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
										<div class="col s12 responsive-table">
											<table id="page-length-option" class="table">
                                                <thead>
                                                  <tr>
                                                    <th></th>
                                                    <th>Artist Name</th>
                                                    <th>Artist Track</th>
                                                    <th>Campaign Name</th>
                                                    <th>USC Credit</th>
                                                    <th>Created At</th>
                                                    <th>Status</th>
                                                    <th>Add Days</th>
                                                    <th>Action</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!empty($activeCampaigns))
                                                        @foreach ($activeCampaigns as $activeCampaign)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>
                                                                    @if(!empty($activeCampaign->user))
                                                                        <a href="{{ route('admin.artist.profile', $activeCampaign->user->id) }}">{{ $activeCampaign->user->name }}</a>
                                                                    @else
                                                                        {{ '---------' }}
                                                                    @endif

                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('admin.artist.track.detail', !empty($activeCampaign->artistTrack) ? $activeCampaign->artistTrack->id : null) }}">{{ !empty($activeCampaign->artistTrack) ? $activeCampaign->artistTrack->name : '' }}</a>
                                                                </td>
                                                                <td>
                                                                    <span class="chip orange lighten-5">
                                                                        <span class="orange-text">{{ Str::ucfirst($activeCampaign->package_name) }}</span>
                                                                    </span>
                                                                </td>
                                                                <td>
                                                                    <span class="chip black lighten-5">
                                                                        <span class="white-text">{{ $activeCampaign->usc_credit }}</span>
                                                                    </span>
                                                                </td>
                                                                <td>{{ getDateFormat($activeCampaign->created_at) }}</td>
                                                                <td>
                                                                    @if(getExpiryDayCampaign($activeCampaign->created_at) == 'false')
                                                                        <span class="chip red lighten-5">
                                                                            <span class="red-text">Closed</span>
                                                                        </span>
                                                                    @else
                                                                        <span class="chip green lighten-5">
                                                                            <span class="green-text">{{getExpiryDayCampaign($activeCampaign->created_at)}}</span>
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <form action="{{route('admin.add-days',$activeCampaign->id)}}" method="POST" class="basicform_with_reload">
                                                                        @csrf
                                                                        <input type="number" min="1" name="add_days" value="{{!empty($activeCampaign->add_days) ? $activeCampaign->add_days : \App\Templates\IPackages::ADD_DAYS}}" style="width:70%">
                                                                        <button type="submit" class="btn-floating mb-1 btn-sm waves-effect waves-light mr-1">
                                                                            <i class="material-icons">add</i>
                                                                        </button>
                                                                    </form>
                                                                </td>
                                                                <td>
                                                                    <div class="action-button">
                                                                        @if($activeCampaign->add_remove_banner == \App\Templates\IPackages::REMOVE_BANNER)
                                                                            <a href="javascript:void(0)" data-id={{ $activeCampaign->id }} class="waves-effect waves-light btn-small gradient-45deg-green-teal box-shadow-none border-round mr-1 mb-1 add_banner">
                                                                                Add Banner
                                                                            </a>
                                                                        @endif
                                                                        @if($activeCampaign->add_remove_banner == \App\Templates\IPackages::ADD_BANNER)
                                                                            <a class="waves-effect waves-light btn-small gradient-45deg-red-pink box-shadow-none border-round mr-1 mb-1 remove_banner" data-id={{ $activeCampaign->id }} href="javascript:void(0)" data-id={{ $activeCampaign->id }}>
                                                                                Remove Banner
                                                                            </a>
                                                                        @endif
                                                                        <!-- add banner Form -->
                                                                        <form class="d-none" id="add_banner_form_{{ $activeCampaign->id }}" action="{{route('admin.banner-add',$activeCampaign->id)}}" method="POST">
                                                                            @csrf
                                                                            <input type="hidden" name="add_remove_banner" value="{{ \App\Templates\IPackages::ADD_BANNER }}">
                                                                        </form>
                                                                        <!-- remove banner Form -->
                                                                        <form class="d-none" id="remove_form_{{ $activeCampaign->id }}" action="{{route('admin.banner-remove',$activeCampaign->id)}}" method="POST">
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
                                                        <th></th>
                                                        <th>Artist Name</th>
                                                        <th>Artist Track</th>
                                                        <th>Campaign Name</th>
                                                        <th>USC Credit</th>
                                                        <th>Created At</th>
                                                        <th>Status</th>
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
