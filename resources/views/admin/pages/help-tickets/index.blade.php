@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Tickets')

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Tickets</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Tickets </li>
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
										<div class="col s12">
											<table id="page-length-option" class="display">
												<thead>
													<tr>
														<th>S#</th>
														<th>Ticket No</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
														<th>Created At</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
													</tr>
												</thead>
												<tbody>
                                                    @if (!empty($ticket_helps))
                                                        @foreach ($ticket_helps as $ticket_help)
                                                            <tr>
                                                                <td>{{ $loop->iteration }}</td>
                                                                <td>{{ $ticket_help->ticket_no }}</td>
                                                                <td>{{ $ticket_help->name }}</td>
                                                                <td>{{ $ticket_help->email }}</td>
                                                                <td>{{ getDateFormat($ticket_help->created_at) }}</td>
                                                                <td>
                                                                    @if ($ticket_help->status == 1)
                                                                        <span class="chip green lighten-5">
                                                                            <span class="green-text">Solved</span>
                                                                        </span>
                                                                    @else
                                                                        <span class="chip red lighten-5">
                                                                            <span class="red-text">Pending</span>
                                                                        </span>
                                                                    @endif
                                                                </td>
                                                                <td><a href="{{ route('admin.view.ticket.help', $ticket_help->id) }}"><i class="material-icons">remove_red_eye</i></a></td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
												</tbody>
												<tfoot>
													<tr>
														<th>S#</th>
														<th>Ticket No</th>
                                                        <th>Name</th>
                                                        <th>Email</th>
														<th>Created At</th>
                                                        <th>Status</th>
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
