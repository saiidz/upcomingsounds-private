@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Blog Users')

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Blog Users</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Blog Users </li>
						</ol>
					</div>
                    <div class="col s2 m6 l6">
                        <a class="btn waves-effect waves-light breadcrumbs-btn right" href="{{ route('admin.blog-users.create') }}" data-target="dropdown1">
                            <span class="hide-on-small-onl">Add New</span>
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
                                                        <th>Profile</th>
														<th>Email</th>
														<th>Type</th>
														<th>Created At</th>
                                                        <th>Action</th>
													</tr>
												</thead>
												<tbody>
                                                    @if (!empty($blogUsers))
                                                        @foreach ($blogUsers as $blogUser)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $blogUser->name }}</td>
                                                                <td>
                                                                    @if(!empty($blogUser->profile))
                                                                        <img style="height:40px" src="{{asset('uploads/user_profile')}}/{{$blogUser->profile}}">
                                                                    @else
                                                                        {{__('-----------')}}
                                                                    @endif
                                                                </td>
                                                                <td>{{ $blogUser->email }}</td>
                                                                <td>{{ __('Blog') }}</td>
                                                                <td>{{ getDateFormat($blogUser->created_at) }}</td>
                                                                <td>
                                                                    <div class="action-button">
                                                                        <a href="{{route('admin.blog-users.edit',$blogUser->id)}}" class="action-button-edit">
                                                                            <img class="editDell" src="{{asset('images/edit_blue.svg')}}">
                                                                        </a>
                                                                        <a class="dropdown-item has-icon delete-confirm" href="javascript:void(0)" data-id={{ $blogUser->id }}>
                                                                            <img class="editDell" src="{{asset('images/delete_forever.svg')}}">
                                                                        </a>
                                                                        <!-- Delete Form -->
                                                                        <form class="d-none" id="delete_form_{{ $blogUser->id }}" action="{{ route('admin.blog-users.destroy', $blogUser->id) }}" method="POST">
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
                                                        <th>Email</th>
                                                        <th>Type</th>
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
