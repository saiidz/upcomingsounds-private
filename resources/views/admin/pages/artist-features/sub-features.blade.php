@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Sub Artist Features')

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Sub Artist Features</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Sub Artist Features </li>
						</ol>
					</div>
                    @if ($feature)
                        <div class="col s2 m6 l6">
                            <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="{{ url('admin/artist-sub-feature/'.$feature->id.'/create') }}" data-target="dropdown1">
                                {{-- <i class="material-icons hide-on-med-and-up">settings</i> --}}
                                <span class="hide-on-small-onl">Add New Sub Features</span>
                                {{-- <i class="material-icons right">arrow_drop_down</i> --}}
                            </a>
                        </div>
                    @endif

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
														<th>Name</th>
														<th>Created At</th>
                                                        <th>Action</th>
													</tr>
												</thead>
												<tbody>
                                                    @if (!empty($sub_features))
                                                        @foreach ($sub_features as $sub_feature)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $sub_feature->name }}</td>
                                                                <td>{{ getDateFormat($sub_feature->created_at) }}</td>
                                                                <td>
                                                                    <div class="action-button">
                                                                        <a href="{{url('admin/artist-sub-feature/'.$sub_feature->id.'/edit')}}" class="action-button-edit">
                                                                            <img class="editDell" src="{{asset('images/edit_blue.svg')}}">
                                                                        </a>
                                                                        <a class="dropdown-item has-icon delete-confirm" href="javascript:void(0)" data-id={{ $sub_feature->id }}>
                                                                            <img class="editDell" src="{{asset('images/delete_forever.svg')}}">
                                                                        </a>
                                                                        <!-- Delete Form -->
                                                                        <form class="d-none" id="delete_form_{{ $sub_feature->id }}" action="{{ url('admin/artist-sub-feature/'.$sub_feature->id.'/delete') }}" method="POST">
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
														<th>Name</th>
														<th>Created At</th>
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
@endsection
