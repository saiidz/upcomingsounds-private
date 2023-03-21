@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Artist Track View')

@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/extensions/responsive/css/responsive.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/data-tables/css/select.dataTables.min.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/page-users.css')}}">
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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Artist Track View</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Artist Track View </li>
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


                                @if(!empty($artist_track->track_thumbnail))
                                    <a href="{{URL('/')}}/uploads/track_thumbnail/{{$artist_track->track_thumbnail}}" target="_blank" class="avatar">
                                        <img src="{{URL('/')}}/uploads/track_thumbnail/{{$artist_track->track_thumbnail}}" alt="users view avatar" class="z-depth-4 circle"
                                        height="64" width="64">
                                    </a>
                                @else
                                    <a href="../../../app-assets/images/avatar/avatar-15.png" target="_blank" class="avatar">
                                        <img src="../../../app-assets/images/avatar/avatar-15.png" alt="users view avatar" class="z-depth-4 circle"
                                            height="64" width="64">
                                    </a>
                                @endif

                            <div class="media-body">
                            <h6 class="media-heading">
                                <span class="users-view-name">{{ $artist_track->name ?? '--' }}</span>
                            </h6>
                            <span>ID:</span>
                            <span class="users-view-id">{{ $artist_track->id ?? '--' }}</span>
                            </div>
                        </div>
                        </div>
                        <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                            @if ($artist_track->is_approved == 0)
                                <a href="#approvedTrackModal" class="btn-small btn-light-indigo dropdown-item has-icon modal-trigger approvedArtistTrack-confirm" data-id={{ $artist_track->id }}>
                                    Approve
                                </a>
                            @endif


{{--                            @if ($artist_track->is_approved == 1 && $artist_track->is_rejected == 0)--}}
                                <a href="#rejectTrackModal" class="btn-small btn-light-red dropdown-item has-icon modal-trigger reject-track-confirm" data-id={{ $artist_track->id }} >
                                    Reject
                                </a>
{{--                            @endif--}}
                        </div>
                    </div>
                    </div>
                    <!-- users view media object ends -->
                    @if(!empty($artist_track->request_edit_des))
                        <div class="card-panel">
                            <div class="row">
                                <div class="col s12">
                                    <div class=" media">
                                        <span>Request Edit Track: </span>&nbsp;&nbsp;<span>{!! $artist_track->request_edit_des !!}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- users view card data start -->
                    <div class="card">
                        <div class="card-content">
                            <div class="row">
                                <div class="col s12 m4">
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                            <td>Created Date:</td>
                                            <td>{{ getDateFormat($artist_track->created_at) ?? '--' }}</td>
                                            </tr>
                                            <tr>
                                            <td>Track Name:</td>
                                            <td class="users-view-latest-activity">{{ !empty($artist_track) ? $artist_track->name : '--' }}</td>
                                            </tr>
                                            <tr>
                                            <td>Approved Track:</td>
                                            <td class="users-view-verified">{{ ($artist_track->is_approved == 1) ? 'Yes' : 'No' }}</td>
                                            </tr>
                                            <tr>
                                            <td>Release Date:</td>
                                            <td class="users-view-role">{{ getDateFormat($artist_track->release_date) ?? '--'}}</td>
                                            </tr>
                                            <tr>
                                                <td>Display Profile:</td>
                                                <td class="users-view-role">{{ ($artist_track->display_profile == 1) ? 'On' : 'Off' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Status:</td>
                                                <td>
                                                    @if ($artist_track->is_approved == 1)
                                                        <span class=" users-view-status chip green lighten-5 green-text">Approved</span>
                                                    @else
                                                        <span class=" users-view-status chip red lighten-5 red-text">Pending</span>
                                                    @endif

                                                </td>
                                            </tr>
                                            @if ($artist_track->is_approved == 0 && $artist_track->is_rejected == 1)
                                                <tr>
                                                    <td>Rejected:</td>
                                                    <td>
                                                        <span class=" users-view-status chip red lighten-5 red-text">Rejected</span>

                                                    </td>
                                                </tr>
                                            @endif

                                            <tr>
                                                <td>EP/LP Link:</td>
                                                <td>
                                                    <a href="{{ $artist_track->ep_lp_link ?? '--'  }}" target="_blank">{{ $artist_track->ep_lp_link ?? '--'  }}</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Release Type:</td>
                                                <td>
                                                    {{$artist_track->release_type}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Permission Copyright:</td>
                                                <td>
                                                    {{$artist_track->permission_copyright}}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="col s12 m8">
                                    <table class="responsive-table">
                                        <thead>
                                            <tr>
                                                <th>Artist Tags:</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if(count($artist_track->artistTrackTags) > 0)
                                                @php
                                                    $artistTrackTags = $artist_track->artistTrackTags->chunk(6);
                                                @endphp
                                                @foreach($artistTrackTags as $tags)
                                                    <tr>
                                                        @foreach($tags as $tag)
                                                            <td>{{$tag->curatorFeatureTag->name}}</td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            @endif
                                            @if(!empty($artist_track->track_thumbnail))
                                                <tr>
                                                    <td>Song Thumbnail:</td>
                                                    <td>
                                                        <a href="{{URL('/')}}/uploads/track_thumbnail/{{$artist_track->track_thumbnail}}" target="_blank" class="avatar">
                                                            <img src="{{URL('/')}}/uploads/track_thumbnail/{{$artist_track->track_thumbnail}}" alt="users view avatar" class="z-depth-4"
                                                                 height="100" width="100">
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- users view card data ends -->

                    <!-- users view card details start -->
                    <div class="card">
                    <div class="card-content">
                        <div class="row">
                            <div class="col s12">
                                <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Description</h6>
                                <table class="striped">
                                    <tbody>
                                        <tr>
                                            <td>{{$artist_track->description}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                                @if ($artist_track->demo == 'on')
                                    <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Audio Info</h6>
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Demo:</td>
                                                <td>
                                                    {{$artist_track->demo}}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Audio Cover:</td>
                                                <td>{{$artist_track->audio_cover}}</td>
                                            </tr>
                                            <tr>
                                                <td>Audio Description:</td>
                                                <td>{{$artist_track->audio_description}}</td>
                                            </tr>
                                            <tr>
                                                <td>Audio MP3:</td>
                                                <td>
                                                    <audio controls="" src="{{URL('/')}}/uploads/audio/{{$artist_track->audio}}" type="audio/mp3" controlslist="nodownload" id=""></audio>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                @endif
                                <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Artist Track Languages</h6>
                                <table class="striped">
                                    <tbody>
                                    @if(count($artist_track->artistTrackLanguages) > 0)
                                        @php
                                            $artistTrackLanguages = $artist_track->artistTrackLanguages->chunk(2);
                                        @endphp
                                        @foreach($artistTrackLanguages as $tags)
                                            <tr>
                                                @foreach($tags as $tag)
                                                    <td>{{$tag->language->name}}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                                <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Artist Track Links</h6>

                                <div class="row">
                                    @if(count($artist_track->artistTrackLinks) > 0)
                                        @foreach($artist_track->artistTrackLinks as $link)
                                            @if(!empty($link->link))
                                                <div class="col-lg-4" style="display:inline-block">
                                                    @php
                                                        echo $link->link;
                                                    @endphp
                                                </div>
                                            @endif
                                        @endforeach

                                    @endif
                                </div>

                                <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Artist Track Images</h6>

                                <div class="row">
                                    @if(count($artist_track->artistTrackImages) > 0)
                                        @foreach($artist_track->artistTrackImages as $path)
                                            @if(!empty($path->type == 'pdf'))
                                                <div class="col-lg-4" style="display:inline-block">
                                                    <iframe width=560 height=315 src="{{URL('/')}}/uploads/track_images/{{$path->path}}" allow=accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture allowfullscreen></iframe>
                                                </div>
                                            @else
                                                <div class="col-lg-4" style="display:inline-block">
                                                    <img src="{{URL('/')}}/uploads/track_images/{{$path->path}}" alt="{{$path->type}}" style=" width:560px; height:315px">
                                                </div>
                                            @endif
                                        @endforeach
                                    @endif
                                </div>

{{--                                <table class="striped">--}}
{{--                                    <tbody>--}}
{{--                                    @if(count($artist_track->artistTrackLinks) > 0)--}}
{{--                                        <tr>--}}
{{--                                            @foreach($artist_track->artistTrackLinks as $link)--}}
{{--                                                @if(!empty($link->link))--}}
{{--                                                    <td>--}}
{{--                                                        @php--}}
{{--                                                            echo $link->link;--}}
{{--                                                        @endphp--}}
{{--                                                    </td>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        </tr>--}}
{{--                                    @endif--}}
{{--                                    </tbody>--}}
{{--                                </table>--}}
                            </div>
                        </div>
                        <!-- </div> -->
                    </div>
                    </div>
                    <!-- users view card details ends -->

                </div>
                <!-- users view ends -->
			</div>
			<div class="content-overlay"></div>
		</div>
	</div>
</div>
<!-- END: Page Main-->

@include('admin.pages.artist-tracks.artist_track_modal')



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
    <script src="{{asset('app-assets/js/artist/artist.js')}}"></script>
    <script>
        $(function () {
            $('.reject-track-confirm').on('click', function () {
                $(".modal").modal(),
                $("#modal3").modal("open"),
                $("#modal3").modal("close")
            });
        });
        $(function () {
            $('.approvedArtistTrack-confirm').on('click', function () {
                $(".modal").modal(),
                $("#modal3").modal("open"),
                $("#modal3").modal("close")
            });
        });
    </script>
     {{-- CkEditor --}}
 <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
 {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script> --}}
 <script>
//    $(document).ready(function () {
//         $('#rejectArtistForm').validate({ // initialize the plugin
//             rules: {
//                 description_artist_reject_message: {
//                     required: function()
//                         {
//                          CKEDITOR.instances.descriptionArtistRejectMessage.updateElement();
//                         },

//                          minlength:10
//                 },
//             },
//             messages: {
//                 description_artist_reject_message: "The description field is required",
//             }
//         });
//     });
    $(document).ready(function() {

        $('.ckeditor').ckeditor();

    });
    //  CKEDITOR.replace( 'description_artist_reject_message' );
 </script>
@endsection
