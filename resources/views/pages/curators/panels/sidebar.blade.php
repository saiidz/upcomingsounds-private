<!-- aside -->
<div id="aside" class="app-aside modal fade nav-dropdown">
    <!-- fluid app aside -->
    <div class="left navside grey dk" data-layout="column">
        <div class="navbar no-radius">
            <!-- brand -->
            <a href="{{ route('curator.dashboard') }}" class="navbar-brand md">
                <img src="{{asset('images/logo.png')}}" alt=".">
            </a>
            <!-- / brand -->
        </div>
{{--        <div data-flex class="hide-scroll">--}}
        <div class="hide-scroll">
            <nav class="scroll nav-stacked nav-active-primary">

                <ul class="nav" data-ui-nav>
                    <li class="nav-header hidden-folded">
                        <span class="text-xs text-muted">Main</span>
                    </li>
                    {{-- <li>
                        <a href="{{ route('artist.submission') }}">
                            <span class="nav-icon">
                                <i class="fa fa-music"></i>
                            </span>
                            <span class="nav-text">Artist Submission</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="{{ route('curator.dashboard') }}" id="curatorDashboard" class="reloadCuratorDashboard">
                            <span class="nav-icon">
                                <i class="fa fa-dashboard"></i>
                            </span>
                            <span class="nav-text">Dashboard</span>
                        </a>
                    </li>
                    @if(Request::is('artist-submission') == 'artist-submission')
                        <li>
                            <a class="dropdown-item" href="{{ route('artist.submission') }}">
                                    <span class="nav-icon">
                                        <i class="fa fa-music"></i>
                                    </span>
                                <span class="nav-text">Artist Submission</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('artist.saved') }}">
                                    <span class="nav-icon">
                                        <i class="fa fa-bookmark-o"></i>
                                    </span>
                                <span class="nav-text">Saved</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('accepted.artist') }}">
                                    <span class="nav-icon">
                                        <i class="fa fa-check-circle"></i>
                                    </span>
                                <span class="nav-text">Accepted</span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('rejected.artist') }}">
                                    <span class="nav-icon">
                                        <i class="fa fa-minus-circle"></i>
                                    </span>
                                <span class="nav-text">Rejected</span>
                            </a>
                        </li>
                    @endif
{{--                    {{dd(Request::is('artist-submission'))}}--}}
                    @if(Request::is('artist-submission') != 'artist-submission')
                        <li>
                            @if (Auth::check() && auth()->user())
                                @if (auth()->user()->is_verified == 1)
                                    <a href="{{ route('artist.submission') }}" id="artistSubmission">
                                        <span class="nav-icon">
                                            <i class="fa fa-headphones"></i>
                                        </span>
                                        {{-- <span class="nav-text">Get Verified</span> --}}
                                        <span class="nav-text">Submissions</span>
                                    </a>
                                @else
                                    <a href="javascript:void(0)">
                                        <span class="nav-icon">
                                            <i class="fa fa-headphones"></i>
                                        </span>
                                        <span class="nav-text" data-toggle="tooltip" title="You will need to submit for curator verifications in order to view this page">Submissions</span>
                                    </a>
                                @endif
                            @endif
                        </li>
{{--                    <li>--}}
{{--                        <a href="{{ route('curator.dashboard') }}" data-toggle="dropdown">--}}
{{--                            <span class="nav-icon">--}}
{{--                                <i class="fa fa-dashboard"></i>--}}
{{--                            </span>--}}
{{--                            <span class="nav-text">Dashboard</span>--}}
{{--                        </a>--}}
{{--                        <div class="dropdown-menu w dropdown-menu-scale ">--}}
{{--                            <a class="dropdown-item" href="{{ route('artist.submission') }}">--}}
{{--                                <span class="nav-icon">--}}
{{--                                    <i class="fa fa-music"></i>--}}
{{--                                </span>--}}
{{--                                <span class="nav-text">Artist Submission</span>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item" href="{{ route('artist.saved') }}">--}}
{{--                                <span class="nav-icon">--}}
{{--                                    <i class="fa fa-bookmark-o"></i>--}}
{{--                                </span>--}}
{{--                                <span class="nav-text">Saved</span>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item" href="{{ route('artist.accepted') }}">--}}
{{--                                <span class="nav-icon">--}}
{{--                                    <i class="fa fa-check-circle"></i>--}}
{{--                                </span>--}}
{{--                                <span class="nav-text">Accepted</span>--}}
{{--                            </a>--}}
{{--                            <a class="dropdown-item" href="{{ route('artist.rejected') }}">--}}
{{--                                <span class="nav-icon">--}}
{{--                                    <i class="fa fa-minus-circle"></i>--}}
{{--                                </span>--}}
{{--                                <span class="nav-text">Rejected</span>--}}
{{--                            </a>--}}
{{--                        </div>--}}
{{--                    </li>--}}
                    {{-- <li>
                        <a href="javascript:void(0)">
                            <span class="nav-icon">
                                <i class="fa fa-music"></i>
                            </span>
                            <span class="nav-text">Artist Submission</span>
                        </a>
                    </li> --}}
                        <li>
                            @if (Auth::check() && auth()->user())
                                @if (auth()->user()->is_verified == 1)
                                    <a href="javascript:void(0)">
                                        <span class="nav-icon">
                                            <i class="fa fa-suitcase"></i>
                                        </span>
                                        <span class="nav-text">Offers</span>
                                    </a>
                                @else
                                    <a href="javascript:void(0)" id="showGetVerified">
                                        <span class="nav-icon">
                                            <i class="fa fa-suitcase"></i>
                                        </span>
                                        <span class="nav-text">Offers</span>
                                    </a>
                                @endif
                            @endif

                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    favorite_border
                                    </i>
                                </span>
                                <span class="nav-text">Saved Artist</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    trending_up
                                    </i>
                                </span>
                                <span class="nav-text">Charts</span>
                            </a>
                        </li>

                        <li>
                            <a data-toggle="modal" data-target="#search-modal">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    search
                                    </i>
                                </span>
                                <span class="nav-text">Search</span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0)">
                                <span class="nav-icon">
                                    <i class="fa fa-inbox"></i>
                                </span>
                                <span class="nav-text">Messages</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)">
                                <span class="nav-icon">
                                    <i class="fa fa-info-circle"></i>
                                </span>
                                <span class="nav-text">Bio</span>
                            </a>
                        </li>

                        <li class="nav-header hidden-folded m-t">
                            <span class="text-xs text-muted">Your collection</span>
                        </li>
                        <li>
                            <a href="{{url('/taste-maker-profile')}}#profile" class="reloadProfile">
                                <span class="nav-icon">
                                <i class="fa fa-user"></i>
                                </span>
                                <span class="nav-text">Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{url('/taste-maker-profile')}}#stats" class="reloadStats">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    portrait
                                    </i>
                                </span>
                                <span class="nav-text">Stats</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{url('/taste-maker-profile')}}#tracks" class="reloadTracks">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    list
                                    </i>
                                </span>
                                <span class="nav-text">Tracks</span>
                            </a>
                        </li>


                        <li>
                            <a href="{{url('/taste-maker-profile')}}#playlists" class="reloadList">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    queue_music
                                    </i>
                                </span>
                                <span class="nav-text">Lists</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('curator.wallet')}}">
                                <span class="nav-icon">
                                    <i class="fa fa-plus-square"></i>
                                </span>
                                <span class="nav-text">Wallet {{!empty(Auth::user()->TransactionUserInfo) ? number_format(Auth::user()->TransactionUserInfo->transactionHistory->sum('credits')) : 0}} UCS</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{url('/taste-maker-profile')}}#edit-profile" id="EditProfileTapHide">
                                <span class="nav-icon">
                                    <i class="material-icons">
                                    edit
                                    </i>
                                </span>
                                <span class="nav-text">Edit Profile</span>
                            </a>
                        </li>

                        <li>
                            <a href="javascript:void(0)" data-toggle="modal"
                               data-target="#change-password">
                                <span class="nav-icon">
                                    <i class="fa fa-lock"></i>
                                </span>
                                <span class="nav-text">Change Password</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('logout')}}">
                                <span class="nav-icon">
                                    <i class="fa fa-sign-out"></i>
                                </span>
                                <span class="nav-text">Sign out</span>
                            </a>
                        </li>

                        <li>
                            <a href="{{ url('how-to-help') }}">
                              <span class="nav-icon">
                                <i class="fa fa-question-circle"></i>
                              </span>
                                <span class="nav-text">Need help?</span>
                            </a>
                        </li>
                    @endif

                </ul>
            </nav>
        </div>

                <div data-flex-no-shrink>
                    <div class="nav-fold dropup">
                        <a data-toggle="dropdown">
                      <span class="pull-left">
                        <img src="{{asset('images/a3.jpg')}}" alt="..." class="w-32 img-circle">
                      </span>
                            <span class="clear hidden-folded p-x p-y-xs">
                        <span class="block _500 text-ellipsis">{{($user_curator) ? $user_curator->name : ''}}</span>
                                <span class="text-xs text-muted">{{($user_curator) ? $user_curator->email : ''}}</span>
                      </span>
                        </a>
                    </div>
                </div>

    </div>
</div>
<!-- / -->
