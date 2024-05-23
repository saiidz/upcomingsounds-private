@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Artist Approved')

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Artist Approved</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Artist Approved </li>
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
										<div class="col s12 responsive-table">
											<table id="page-length-option" class="table">
                                                <thead>
                                                  <tr>
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Created At</th>
                                                    <th>Verified</th>
                                                    <th>Role</th>
                                                    <th>Status</th>
                                                    <th>View</th>
                                                  </tr>
                                                </thead>
                                                <tbody>
                                                    @if (!empty($approved_artists))
                                                        @foreach ($approved_artists as $approved_artist)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>
                                                                    <a href="{{ route('admin.artist.profile', $approved_artist->id) }}">{{ $approved_artist->name ?? '' }}</a>
                                                                </td>
                                                                <td>{{ getDateFormat($approved_artist->created_at) }}</td>
                                                                <td>{{ ($approved_artist->is_verified == 1) ? 'Yes' : 'No' }}</td>
                                                                <td>{{ ($approved_artist->type == 'artist') ? 'Artist' : '--' }}</td>
                                                                <td>
                                                                    @if ($approved_artist->is_approved == 1)
                                                                        <span class="chip green lighten-5">
                                                                            <span class="green-text">Approved</span>
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('admin.artist.profile', $approved_artist->id) }}"><i class="material-icons">remove_red_eye</i></a>
                                                                    <a class="dropdown-item has-icon delete-confirm" href="javascript:void(0)" data-id={{ $approved_artist->id }}>
                                                                        <img class="editDell" src="{{asset('images/delete_forever.svg')}}">
                                                                    </a>
                                                                    <!-- Delete Form -->
                                                                    <form class="d-none" id="delete_form_{{ $approved_artist->id }}" action="{{ route('admin.artist.destroy', $approved_artist->id) }}" method="POST">
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
                                                    <th></th>
                                                    <th>Name</th>
                                                    <th>Created At</th>
                                                    <th>Verified</th>
                                                    <th>Role</th>
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
