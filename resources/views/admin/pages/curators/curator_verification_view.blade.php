@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Curator Verification View')

{{-- page styles --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Curator Verifications</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Curator Verifications</li>
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
                                    <a href="{{URL('/')}}/uploads/profile/{{$user->profile}}" target="_blank" class="avatar">
                                        @if(!empty($user->profile))
                                            <img src="{{URL('/')}}/uploads/profile/{{$user->profile}}" alt="users view avatar" class="z-depth-4 circle"
                                            height="64" width="64">
                                        @else
                                            <img src="../../../app-assets/images/avatar/avatar-15.png" alt="users view avatar" class="z-depth-4 circle"
                                                height="64" width="64">
                                        @endif

                                    </a>
                                    <div class="media-body">
                                        <h6 class="media-heading">
                                            <span class="users-view-name">{{ $user->name ?? '--' }}</span>
                                        </h6>
                                        <span>Apply Count:</span>
                                        <span class="users-view-id">{{count($verification_curators) ?? '--' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">

                                @if($curatorVerificationFormCount >= 3 && $user->is_verified == 0 && $user->is_rejected == 1
                                        && $user->is_allow_curator_verification == 0)
                                    <a href="{{ route('admin.allow-curator-verification',$user->id) }}" class="btn-small btn-light-indigo dropdown-item has-icon">
                                        Allow Curator Verification
                                    </a>
                                @endif
                                @if($curatorVerificationFormCount >= 3 && $user->is_verified == 0 && $user->is_rejected == 1
                                       && $user->is_allow_curator_verification == 1)
                                    <a href="{{ route('admin.remove-allow-curator-verification',$user->id) }}" class="btn-small btn-light-red dropdown-item has-icon">
                                        Deny Curator Verification
{{--                                        Remove Allow Curator Verification--}}
                                    </a>
                                @endif
{{--                                @if ($user->is_verified == 0 && $user->is_rejected == 0)--}}

{{--                                    <a href="#verifiedModal" data-id={{ $user->id }} class="btn-small btn-light-indigo dropdown-item has-icon modal-trigger verified-curator-confirm">--}}
{{--                                        Verified--}}
{{--                                    </a>--}}

{{--                                    --}}{{-- <a href="javascript:void(0)" data-id={{ $user->id }} class="btn-small btn-light-indigo dropdown-item has-icon verified-curator-confirm">--}}
{{--                                        Verified--}}
{{--                                    </a>--}}

{{--                                    <!-- Delete Form -->--}}
{{--                                    <form class="d-none" id="verified_curator_form_{{ $user->id }}" action="{{ route('admin.store.verified.curator', $user->id) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                    </form> --}}
{{--                                @elseif (($user->is_verified == 1 && $user->is_rejected == 0))--}}
{{--                                    <span class="btn disabled">Verified</span>--}}
{{--                                @endif--}}

{{--                                @if ($user->is_rejected == 0 && $user->is_verified == 0)--}}
{{--                                    <a href="#rejectVerifyModal" data-id={{ $user->id }} class="btn-small btn-light-red dropdown-item has-icon modal-trigger rejected-curator-confirm">--}}
{{--                                        Reject--}}
{{--                                    </a>--}}

{{--                                    --}}{{-- <a href="javascript:void(0)" data-id={{ $user->id }} class="btn-small btn-light-red dropdown-item has-icon rejected-curator-confirm">--}}
{{--                                        Rejected--}}
{{--                                    </a>--}}

{{--                                    <!-- Delete Form -->--}}
{{--                                    <form class="d-none" id="rejected_curator_form_{{ $user->id }}" action="{{ route('admin.store.rejected.curator', $user->id) }}" method="POST">--}}
{{--                                        @csrf--}}
{{--                                    </form> --}}
{{--                                @elseif ($user->is_verified == 0 && $user->is_rejected == 1)--}}
{{--                                    <span class="btn disabled">Rejected</span>--}}
{{--                                @endif--}}

                            </div>
                        </div>
                    </div>
                    <!-- users view media object ends -->
                    <!-- users view card data start -->
                    @if (!empty($verification_curators) && (count($verification_curators) > 0))
                        @foreach ($verification_curators as $verification_curator)
                            <div class="card">
                                <div class="card-content">
                                    <div class="row">
                                        <div class="col s12 m4">
                                            <table class="striped">
                                                <tbody>
                                                    <tr>
                                                        <td>Name:</td>
                                                        <td>{{ $verification_curator->name ?? '--' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Curator Type:</td>
                                                        <td>{{ Str::ucfirst($verification_curator->curator_type) ?? '--' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Sub Curator Type:</td>
                                                        <td>{{ Str::ucfirst($verification_curator->sub_curator_type) ?? '--' }}</td>
                                                    </tr>

                                                    <tr>
                                                        <td>Information:</td>
                                                        <td>{{ $verification_curator->information ?? '--' }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Descriptions:</td>
                                                        <td>{!! $verification_curator->descriptions ?? '--' !!}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status:</td>
                                                        <td>
                                                            @if ($verification_curator->status == \App\Templates\IOfferTemplateStatus::ACCEPTED)
                                                                <span class="chip green lighten-5">
                                                                            <span class="green-text">Approved</span>
                                                                        </span>
                                                            @elseif($verification_curator->status == \App\Templates\IOfferTemplateStatus::REJECTED)
                                                                <span class="chip red lighten-5">
                                                                    <span class="grey-text">Rejected</span>
                                                                </span>
                                                            @else
                                                                <span class="chip red lighten-5">
                                                                    <span class="red-text">Pending</span>
                                                                </span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col s12 m8">
                                            @if (!empty($verification_curator->image))
                                                <table class="responsive-table">
{{--                                                    <thead>--}}
{{--                                                        <tr>--}}
{{--                                                            <th>ID/Passport</th>--}}
{{--                                                        </tr>--}}
{{--                                                    </thead>--}}
                                                    <tbody>
                                                    <tr>
                                                        <td>Action:</td>
                                                        <td>
                                                            @if ($verification_curator->status == \App\Templates\IOfferTemplateStatus::PENDING)

                                                                <a href="#verifiedModal" data-id="{{ $verification_curator->id }}" class="btn-small btn-light-indigo dropdown-item has-icon modal-trigger verified-curator-confirm">
                                                                    Verify
{{--                                                                    Verified--}}
                                                                </a>
                                                            @elseif ($verification_curator->status == \App\Templates\IOfferTemplateStatus::ACCEPTED)
                                                                <span class="btn disabled">Verify</span>
                                                            @endif

                                                            @if ($verification_curator->status == \App\Templates\IOfferTemplateStatus::PENDING)
                                                                <a href="#rejectVerifyModal" data-id="{{ $verification_curator->id }}" class="btn-small btn-light-red dropdown-item has-icon modal-trigger rejected-curator-confirm">
                                                                    Reject
                                                                </a>
                                                            @elseif ($verification_curator->status == \App\Templates\IOfferTemplateStatus::REJECTED)
                                                                <span class="btn disabled">Rejected</span>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                        <tr>
                                                            <td>ID/Passport:</td>
                                                            <td>
                                                                @if(str_contains($verification_curator->image,'.png') || str_contains($verification_curator->image,'.jpeg') || str_contains($verification_curator->image,'.jpg'))
                                                                    <a href="#modal2" class="pop modal-trigger">
                                                                        <img src="{{asset('uploads/verification_form')}}/{{ $verification_curator->image }}" height="300" width="100%"
                                                                            img-fluid stye="object-fit:container"/>
                                                                    </a>
                                                                @else
                                                                    <iframe src="{{asset('uploads/verification_form')}}/{{ $verification_curator->image }}"
                                                                            type="application/pdf" width="100%" height="300"></iframe>
                                                                @endif
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif

                    <!-- users view card data ends -->
                </div>
                <!-- users view ends -->
			</div>
			<div class="content-overlay"></div>
		</div>
	</div>
</div>
<!-- END: Page Main-->
@include('admin.pages.curators.curator_modal')
<div id="modal2" class="modal modal-fixed-footer">
    <div class="modal-content">
        <img src="" class="imagepreview" style="width: 100%;">
    </div>
    <div class="modal-footer">
      <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancle</a>
    </div>
</div>


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
    <script src="{{asset('app-assets/js/curator/curator.js')}}"></script>
    <script>
        $(function () {
            $('.rejected-curator-confirm').on('click', function () {
                $(".modal").modal()
                $("#modal3").modal("open")
                $("#modal3").modal("close")

                var verified_id = $(this).data('id');
                $('#rejectCuratorVerificationFormID').val('');
                $('#rejectCuratorVerificationFormID').val(verified_id);
            });
        });
        $(function () {
            $('.verified-curator-confirm').on('click', function () {
                $(".modal").modal()
                $("#modal3").modal("open")
                $("#modal3").modal("close")

                var verified_id = $(this).data('id');
                $('#verifiedCuratorVerificationFormID').val('');
                $('#verifiedCuratorVerificationFormID').val(verified_id);
            });
        });
    </script>
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
            $(document).ready(function() {

                $('.ckeditor').ckeditor();

            });
            //  CKEDITOR.replace( 'description_artist_reject_message' );
    </script>
@endsection
