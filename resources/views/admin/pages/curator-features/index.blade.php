@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Curator Features')

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Curator Features</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Curator Features </li>
						</ol>
					</div>
                    <div class="col s2 m6 l6">
                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="{{ route('admin.curator-features.create') }}" data-target="dropdown1">
                            {{-- <i class="material-icons hide-on-med-and-up">settings</i> --}}
                            <span class="hide-on-small-onl">Add New</span>
                            {{-- <i class="material-icons right">arrow_drop_down</i> --}}
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
														<th>Name</th>
														<th>Created At</th>
                                                        <th>Action</th>
													</tr>
												</thead>
												<tbody>
                                                    @if (!empty($curator_features))
                                                        @foreach ($curator_features as $curator_feature)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $curator_feature->name }}</td>
                                                                <td>{{ getDateFormat($curator_feature->created_at) }}</td>
                                                                <td>
                                                                    <div class="action-button">
                                                                        <a href="{{route('admin.curator-features.edit',$curator_feature->id)}}" class="action-button-edit">
                                                                            <img class="editDell" src="{{asset('images/edit_blue.svg')}}">
                                                                        </a>
                                                                        <a class="dropdown-item has-icon delete-confirm" href="javascript:void(0)" data-id={{ $curator_feature->id }}>
                                                                            <img class="editDell" src="{{asset('images/delete_forever.svg')}}">
                                                                        </a>
                                                                        <!-- Delete Form -->
                                                                        <form class="d-none" id="delete_form_{{ $curator_feature->id }}" action="{{ route('admin.curator-features.destroy', $curator_feature->id) }}" method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                        </form>
                                                                        {{-- <a href="javascript:void(0)" onclick="deleteCategory({{$curator_feature->id}})" class="waves-light action-button-delete mr-4">
                                                                            <img class="editDell" src="{{asset('images/delete_forever.svg')}}">
                                                                        </a> --}}
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
