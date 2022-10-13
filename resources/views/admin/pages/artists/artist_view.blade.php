@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Artist Profile')

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Artist Profile</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Artist Profile </li>
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
                                {{-- <span class="grey-text">@</span>
                                <span class="users-view-username grey-text">candy007</span> --}}
                            </h6>
                            <span>ID:</span>
                            <span class="users-view-id">{{ $user->id ?? '--' }}</span>
                            </div>
                        </div>
                        </div>
                        <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                            @if ($user->is_approved == 0)
                                <a href="#" class="btn-small btn-light-indigo">Approved</a>
                            @endif
                            {{-- <a href="app-email.html" class="btn-small btn-light-indigo"><i class="material-icons">mail_outline</i></a>
                            <a href="user-profile-page.html" class="btn-small btn-light-indigo">Profile</a>
                            <a href="page-users-edit.html" class="btn-small indigo">Edit</a> --}}
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
                                <td>Registered:</td>
                                <td>{{ getDateFormat($user->created_at) ?? '--' }}</td>
                                </tr>
                                <tr>
                                <td>Latest Activity:</td>
                                <td class="users-view-latest-activity">{{ !empty($user->last_active_at) ? getDateFormat($user->last_active_at) : '--' }}</td>
                                </tr>
                                <tr>
                                <td>Verified:</td>
                                <td class="users-view-verified">{{ ($user->is_verified == 1) ? 'Yes' : 'No' }}</td>
                                </tr>
                                <tr>
                                <td>Role:</td>
                                <td class="users-view-role">{{ ($user->type == 'artist') ? 'Artist' : '--' }}</td>
                                </tr>
                                <tr>
                                <td>Status:</td>
                                <td>
                                    @if ($user->is_approved == 1)
                                        <span class=" users-view-status chip green lighten-5 green-text">Approved</span>
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
                                    <th>Artist Tags</th>
                                </tr>
                            </thead>
                                <tbody>
                                    @if(count($user->userTags) > 0)
                                        @php
                                            $userTags = $user->userTags->chunk(6);
                                        @endphp
                                        @foreach($userTags as $tags)
                                            <tr>
                                                @foreach($tags as $tag)
                                                    <td>{{$tag->featureTag->name}}</td>
                                                @endforeach
                                            </tr>
                                        @endforeach
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
                        <div class="row indigo lighten-5 border-radius-4 mb-2">
                        <div class="col s12 m4 users-view-timeline">
                            <h6 class="indigo-text m-0">Tracks: <span>{{ !empty($user->artistTrack) ? count($user->artistTrack) : 0 }}</span></h6>
                        </div>
                        <div class="col s12 m4 users-view-timeline">
                            <h6 class="indigo-text m-0">Lists: <span>0</span></h6>
                        </div>
                        <div class="col s12 m4 users-view-timeline">
                            <h6 class="indigo-text m-0">Saved: <span>0</span></h6>
                        </div>
                        </div>
                        <div class="row">
                        <div class="col s12">
                            <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Personal Info</h6>
                            <table class="striped">
                                <tbody>
                                    <tr>
                                        <td>Name:</td>
                                        <td class="users-view-name">{{ $user->name ?? '--' }}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail:</td>
                                        <td class="users-view-email">{{ $user->email ?? '--' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Country:</td>
                                        <td>{{ !empty($user->artistUser) ? (($user->artistUser->country) ? $user->artistUser->country->name : '--') : '--' }}</td>
                                    </tr>
                                    <tr>
                                        <td>Contact:</td>
                                        <td>{{ $user->phone_number ?? '--' }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Artist Info</h6>
                            <table class="striped">
                                <tbody>
                                    <tr>
                                        <td>Artist Name:</td>
                                        <td class="users-view-name">{{ !empty($user->artistUser) ? $user->artistUser->artist_name : '--'  }}</td>
                                    </tr>
                                    <tr>
                                        <td>Artist Signup From:</td>
                                        <td class="users-view-email">{{ !empty($user->artistUser) ? Str::ucfirst($user->artistUser->artist_signup_from) : '--'  }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Artist Bio</h6>
                            <table class="striped">
                                <tbody>
                                    <tr>
                                        <td>{{ !empty($user->artistUser) ? $user->artistUser->artist_bio : '---'  }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Artist Hot News</h6>
                            <table class="striped">
                                <tbody>
                                    <tr>
                                        <td>{{ !empty($user->artistUser) ? $user->artistUser->hot_news : '---'  }}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <h6 class="mb-2 mt-2"><i class="material-icons">link</i> Social Links</h6>
                            <table class="striped">
                            <tbody>
                                <tr>
                                    <td>Instagram:</td>
                                    <td><a href="{{ !empty($user->artistUser) ? $user->artistUser->instagram_url : '--'  }}" target="_blank">{{ !empty($user->artistUser) ? $user->artistUser->instagram_url : '--'  }}</a></td>
                                </tr>
                                <tr>
                                    <td>Facebook:</td>
                                    <td><a href="{{ !empty($user->artistUser) ? $user->artistUser->facebook_url : '--'  }}" target="_blank">{{ !empty($user->artistUser) ? $user->artistUser->facebook_url : '--'  }}</a></td>
                                </tr>
                                <tr>
                                    <td>Spotify:</td>
                                    <td><a href="{{ !empty($user->artistUser) ? $user->artistUser->spotify_url : '--'  }}" target="_blank">{{ !empty($user->artistUser) ? $user->artistUser->spotify_url : '--'  }}</a></td>
                                </tr>
                                <tr>
                                    <td>Soundcloud:</td>
                                    <td><a href="{{ !empty($user->artistUser) ? $user->artistUser->soundcloud_url : '--'  }}" target="_blank">{{ !empty($user->artistUser) ? $user->artistUser->soundcloud_url : '--'  }}</a></td>
                                </tr>
                                <tr>
                                    <td>Youtube:</td>
                                    <td><a href="{{ !empty($user->artistUser) ? $user->artistUser->youtube_url : '--'  }}" target="_blank">{{ !empty($user->artistUser) ? $user->artistUser->youtube_url : '--'  }}</a></td>
                                </tr>
                                <tr>
                                    <td>Deezer:</td>
                                    <td><a href="{{ !empty($user->artistUser) ? $user->artistUser->deezer_url : '--'  }}" target="_blank">{{ !empty($user->artistUser) ? $user->artistUser->deezer_url : '--'  }}</a></td>
                                </tr>
                                <tr>
                                    <td>Bandcamp:</td>
                                    <td><a href="{{ !empty($user->artistUser) ? $user->artistUser->bandcamp_url : '--'  }}" target="_blank">{{ !empty($user->artistUser) ? $user->artistUser->bandcamp_url : '--'  }}</a></td>
                                </tr>
                                <tr>
                                    <td>Tiktok:</td>
                                    <td><a href="{{ !empty($user->artistUser) ? $user->artistUser->tiktok_url : '--'  }}" target="_blank">{{ !empty($user->artistUser) ? $user->artistUser->tiktok_url : '--'  }}</a></td>
                                </tr>
                                <tr>
                                    <td>Website:</td>
                                    <td><a href="{{ !empty($user->artistUser) ? $user->artistUser->website_url : '--'  }}" target="_blank">{{ !empty($user->artistUser) ? $user->artistUser->website_url : '--'  }}</a></td>
                                </tr>
                            </tbody>
                            </table>

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
