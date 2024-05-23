@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Ticket Show')

{{-- page styles --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Ticket View</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Ticket View </li>
						</ol>
					</div>
				</div>

			</div>
		</div>
		<div class="col s12">
			<div class="container">
				<!-- users view start -->
                <div class="section users-view">
                    <!-- users view media object start -->
                    <div class="card-panel">
                    <div class="row">
                        <div class="col s12 m7">
                        <div class="display-flex media">

                        </div>
                        </div>
                        <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                            @if ($ticket_help->status == 0)
                                <a href="javascript:void(0)" data-id={{ $ticket_help->id }} class="btn-small btn-light-indigo dropdown-item has-icon ticket-confirm">
                                    Solved
                                </a>

                                <!-- Delete Form -->
                                <form class="d-none" id="ticket_form_{{ $ticket_help->id }}" action="{{ route('admin.store.ticket.help', $ticket_help->id) }}" method="POST">
                                    @csrf
                                </form>

                            @endif
                        </div>
                    </div>
                    </div>
                    <!-- users view media object ends -->
                    <!-- users view card data start -->
                    <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12 m4">
                                <table class="striped">
                                    <tbody>
                                        <tr>
                                            <td>Ticket No.:</td>
                                            <td>{{ $ticket_help->ticket_no ?? '--' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Name:</td>
                                            <td>{{ $ticket_help->name ?? '--' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Email:</td>
                                            <td>{{ $ticket_help->email ?? '--' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number:</td>
                                            <td>{{ $ticket_help->phone_number ?? '--' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ticket Generated:</td>
                                            <td>{{ getDateFormat($ticket_help->created_at) ?? '--' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Ticket Issue:</td>
                                            <td>{{ Str::ucfirst($ticket_help->ticket_issue) ?? '--' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Country:</td>
                                            <td>{{ !empty($ticket_help->country) ? $ticket_help->country->name : '--' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Status:</td>
                                            <td>
                                                @if ($ticket_help->status == 1)
                                                    <span class=" users-view-status chip green lighten-5 green-text">Solved</span>
                                                @else
                                                    <span class=" users-view-status chip red lighten-5 red-text">Pending</span>
                                                @endif

                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col s12 m8">
                                <table class="responsive-table">
                                    <thead>
                                        <tr>
                                            <th>Description:</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{$ticket_help->description}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @if(!empty($ticket_help->image))
                                    <table class="responsive-table">
                                        <thead>
                                            <tr>
                                                <th>Image:</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <a href="#modal2" class="pop modal-trigger">
                                                        <img src="{{URL('/')}}/uploads/tickets/{{$ticket_help->image}}" height="300" width="100%"
                                                        class="w-100" img-fluid stye="object-fit:container"/>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- users view card data ends -->

                </div>
                <!-- users view ends -->
			</div>
			<div class="content-overlay"></div>
		</div>
	</div>
</div>

<div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
        <img src="" class="imagepreview" style="width: 100%;">
    </div>
    <div class="modal-footer">
      <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancle</a>
    </div>
</div>
<!-- END: Page Main-->
@endsection
@section('page-script')
{{-- <script src="{{asset('app-assets/js/scripts/advance-ui-modals.js')}}"></script> --}}
    <script>
        $(function () {
            $('.pop').on('click', function () {
                $(".modal").modal(),
                $("#modal3").modal("open"),
                $("#modal3").modal("close")
                $('.imagepreview').attr('src', $(this).find('img').attr('src'));
                // $('#imagemodal').modal('show');
            });
        });
    </script>
@endsection
