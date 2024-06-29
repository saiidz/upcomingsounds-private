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
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/pages/data-ttables.css')}}">
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
                                    @if(!empty($user->profile) && empty($user->provider))
                                        <a href="{{URL('/')}}/uploads/profile/{{$user->profile}}" target="_blank" class="avatar">
                                            <img src="{{URL('/')}}/uploads/profile/{{$user->profile}}" alt="users view avatar" class="z-depth-4 circle" height="64" width="64">
                                        </a>
                                    @elseif (!empty($user->profile) && !empty($user->provider))
                                        <a href="{{$user->profile}}" target="_blank" class="avatar">
                                            <img src="{{$user->profile}}" alt="users view avatar" class="z-depth-4 circle" height="64" width="64">
                                        </a>
                                    @else
                                        <a href="{{URL('/')}}/uploads/profile/{{$user->profile}}" target="_blank" class="avatar">
                                            <img src="../../../app-assets/images/avatar/avatar-15.png" alt="users view avatar" class="z-depth-4 circle" height="64" width="64">
                                        </a>
                                    @endif
                                    <div class="media-body">
                                        <h6 class="media-heading">
                                            <span class="users-view-name">{{ $user->name ?? '--' }}</span>
                                        </h6>
                                        <span>ID:</span>
                                        <span class="users-view-id">{{ $user->id ?? '--' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
                                @if ($user->is_approved == 0)
                                    <a href="#approvedModal" class="btn-small btn-light-indigo dropdown-item has-icon modal-trigger approvedArtist-confirm" data-id={{ $user->id }}>
                                        Approved
                                    </a>
                                @endif
                                @php
                                    $days = \Carbon\Carbon::parse($user->updated_at)->addDays(45);
                                @endphp
                                @if ($user->is_approved == 0 && $user->is_rejected == 0)
                                    <a href="#rejectModal" data-id={{ $user->id }} class="btn-small btn-light-red dropdown-item has-icon modal-trigger reject-artist-confirm">
                                        Reject
                                    </a>
                                @elseif ($user->is_rejected == 1 && \Carbon\Carbon::today() >= $days)
                                    <a href="#rejectModal" data-id={{ $user->id }} class="btn-small btn-light-red dropdown-item has-icon modal-trigger reject-artist-confirm">
                                        Reject
                                    </a>
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
                                            @if ($user->is_approved == 0 && $user->is_rejected == 1)
                                                <tr>
                                                    <td>Rejected:</td>
                                                    <td>
                                                        <span class=" users-view-status chip red lighten-5 red-text">Rejected</span>
                                                    </td>
                                                </tr>
                                            @endif
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
                                                            <td>{{$tag->featureTag->name ?? '--'}}</td>
                                                        @endforeach
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td>--</td>
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
                                                <td>
                                                    @if (!empty($user->artistUser->country))
                                                        <img class="flag_icon" src="{{asset('images/flags')}}/{{$user->artistUser->country->flag_icon}}.png" alt="{{$user->artistUser->country->name}}">
                                                        <span>{{$user->artistUser->country->name}}</span>
                                                    @else
                                                        <span>--</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Location:</td>
                                                <td>{{ $user->artistUser->location ?? '--' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Mobile:</td>
                                                <td>{{ $user->artistUser->mobile ?? '--' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Social Links</h6>
                                    <table class="striped">
                                        <tbody>
                                            <tr>
                                                <td>Website:</td>
                                                <td>{{ $user->artistUser->website ?? '--' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Facebook:</td>
                                                <td>{{ $user->artistUser->facebook ?? '--' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Twitter:</td>
                                                <td>{{ $user->artistUser->twitter ?? '--' }}</td>
                                            </tr>
                                            <tr>
                                                <td>Instagram:</td>
                                                <td>{{ $user->artistUser->instagram ?? '--' }}</td>
                                            </tr>
                                            <tr>
                                                <td>SoundCloud:</td>
                                                <td>{{ $user->artistUser->soundcloud ?? '--' }}</td>
                                            </tr>
                                            <tr>
                                                <td>YouTube:</td>
                                                <td>{{ $user->artistUser->youtube ?? '--' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- users view card details ends -->
                </div>
                <!-- users view ends -->
            </div>
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
<script src="{{asset('app-assets/vendors/sweetalert/sweetalert.min.js')}}"></script>
@endsection

{{-- page script --}}
@section('page-script')
<script src="{{asset('app-assets/js/scripts/data-tables.js')}}"></script>
<script src="{{asset('app-assets/js/scripts/page-users.js')}}"></script>
@endsection
