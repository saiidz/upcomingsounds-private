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
        <div data-flex class="hide-scroll">
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
                        <a href="{{ route('curator.dashboard') }}" data-toggle="dropdown">
                            <span class="nav-icon">
                                <i class="fa fa-dashboard"></i>
                            </span>
                            <span class="nav-text">Dashboard</span>
                        </a>
                        <div class="dropdown-menu w dropdown-menu-scale ">
                            <a class="dropdown-item" href="{{ route('artist.submission') }}">
                                <span class="nav-icon">
                                    <i class="fa fa-music"></i>
                                </span>
                                <span class="nav-text">Artist Submission</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('artist.saved') }}">
                                <span class="nav-icon">
                                    <i class="fa fa-bookmark-o"></i>
                                </span>
                                <span class="nav-text">Saved</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('artist.accepted') }}">
                                <span class="nav-icon">
                                    <i class="fa fa-check-circle"></i>
                                </span>
                                <span class="nav-text">Accepted</span>
                            </a>
                            <a class="dropdown-item" href="{{ route('artist.rejected') }}">
                                <span class="nav-icon">
                                    <i class="fa fa-minus-circle"></i>
                                </span>
                                <span class="nav-text">Rejected</span>
                            </a>
                        </div>
                    </li>
                    {{-- <li>
                        <a href="javascript:void(0)">
                            <span class="nav-icon">
                                <i class="fa fa-music"></i>
                            </span>
                            <span class="nav-text">Artist Submission</span>
                        </a>
                    </li> --}}
                    <li>
                        <a href="javascript:void(0)">
                            <span class="nav-icon">
                                <i class="fa fa-suitcase"></i>
                            </span>
                            <span class="nav-text">Offers</span>
                        </a>
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
                    <li class="active">
                        <a href="{{url('/taste-maker-profile')}}#profile">
                            <span class="nav-icon">
                            <i class="fa fa-user"></i>
                            </span>
                            <span class="nav-text">Profile</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('/taste-maker-profile')}}#stats">
                            <span class="nav-icon">
                                <i class="material-icons">
                                portrait
                                </i>
                            </span>
                            <span class="nav-text">Stats</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{url('/taste-maker-profile')}}#tracks">
                            <span class="nav-icon">
                                <i class="material-icons">
                                list
                                </i>
                            </span>
                            <span class="nav-text">Tracks</span>
                        </a>
                    </li>


                    <li>
                        <a href="{{url('/taste-maker-profile')}}#playlists">
                            <span class="nav-icon">
                                <i class="material-icons">
                                queue_music
                                </i>
                            </span>
                            <span class="nav-text">Lists</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0)">
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
                        <a href="javascript:void(0)">
                          <span class="nav-icon">
                            <i class="fa fa-question-circle"></i>
                          </span>
                            <span class="nav-text">Need help?</span>
                        </a>
                    </li>



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
