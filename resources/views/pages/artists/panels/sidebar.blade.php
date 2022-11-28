<!-- aside -->
<div id="aside" class="app-aside modal fade nav-dropdown">
    <!-- fluid app aside -->
    <div class="left navside grey dk" data-layout="column">
       <div class="navbar no-radius">
          <!-- brand -->
          <a href="{{url('/')}}" class="navbar-brand md">
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
                <li class="{{Request::segment(1) == 'welcome-your-track' || Request::segment(1) == 'promote-your-track' ? 'active' : ''}}">
                   <a href="{{url('/welcome-your-track')}}">
                   <span class="nav-icon">
                   <i class="material-icons">
                   play_circle_outline
                   </i>
                   </span>
                   <span class="nav-text">Promote Your Track</span>
                   </a>
                </li>
                <li>
                   <a href="javascript:void(0)">
                   <span class="nav-icon">
                   <i class="material-icons">
                   sort
                   </i>
                   </span>
                   <span class="nav-text">Browse</span>
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
                   <a href="javascript:void(0)">
                   <span class="nav-icon">
                   <i class="material-icons">
                   portrait
                   </i>
                   </span>
                   <span class="nav-text">Artist</span>
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
                {{--
                <div data-flex-no-shrink>
                   --}}
                   {{--
                   <div class="nav-fold dropup">
                      --}}
                      {{--                            <a data-toggle="dropdown">--}}
                      {{--              <span class="pull-left">--}}
                      {{--                <img src="{{asset('images/a3.jpg')}}" alt="..." class="w-32 img-circle">--}}
                      {{--              </span>--}}
                      {{--                                <span class="clear hidden-folded p-x p-y-xs">--}}
                      {{--                <span class="block _500 text-ellipsis">{{($user_artist) ? $user_artist->name : ''}}</span>--}}
                      {{--              </span>--}}
                      {{--                            </a>--}}
                      {{--
                      <div class="dropdown-menu w dropdown-menu-scale ">
                         --}}
                         {{--                                <a class="dropdown-item" href="{{url('/artist-profile')}}#profile">--}}
                         {{--                                    <span>Profile</span>--}}
                         {{--                                </a>--}}
                         {{--                                <a class="dropdown-item" href="{{url('/artist-profile')}}#tracks">--}}
                         {{--                                    <span>Tracks</span>--}}
                         {{--                                </a>--}}
                         {{--                                <a class="dropdown-item" href="{{url('/artist-profile')}}#playlists">--}}
                         {{--                                    <span>Playlists</span>--}}
                         {{--                                </a>--}}
                         {{--                                <a class="dropdown-item" href="{{url('/artist-profile')}}#likes">--}}
                         {{--                                    <span>Likes</span>--}}
                         {{--                                </a>--}}
                         {{--
                         <div class="dropdown-divider"></div>
                         --}}
                         {{--                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal"--}}
                         {{--                                   data-target="#change-password">--}}
                         {{--                                    Change Password--}}
                         {{--                                </a>--}}
                         {{--                                --}}{{--                    <button class="btn btn-xs white" onclick="changePassword()" data-toggle="modal" data-target="#edit-track">Edit</button>--}}
                         {{--                                <a class="dropdown-item" href="#">--}}
                         {{--                                    Need help?--}}
                         {{--                                </a>--}}
                         {{--                                <a class="dropdown-item" href="{{route('logout')}}">Sign out</a>--}}
                         {{--
                      </div>
                      --}}
                      {{--
                   </div>
                   --}}
                   {{--
                </div>
                --}}
                <li class="nav-header hidden-folded m-t">
                   <span class="text-xs text-muted">Your collection</span>
                </li>
                <li>
                   <a href="{{url('/artist-profile')}}#tracks" class="reloadTrack">
                   @if(!empty($artist_track_count) && $artist_track_count !== 0)
                   <span class="nav-label">
                   <b class="label">{{ $artist_track_count  }}</b>
                   </span>
                   @endif
                   <span class="nav-icon">
                   <i class="material-icons">
                   list
                   </i>
                   </span>
                   <span class="nav-text">Tracks</span>
                   </a>
                </li>
                <li>
                   <a href="{{url('/artist-profile')}}#playlists" class="reloadList">
                   <span class="nav-icon">
                   <i class="material-icons">
                   queue_music
                   </i>
                   </span>
                   <span class="nav-text">Lists</span>
                   </a>
                </li>
                <li>
                   <a href="{{url('/artist-profile')}}#likes" class="reloadSaved">
                   <span class="nav-icon">
                   <i class="material-icons">
                   favorite_border
                   </i>
                   </span>
                   <span class="nav-text">Saved</span>
                   </a>
                </li>
                <li>
                   <a href="{{url('/artist-profile')}}#profile" class="reloadProfile">
                   <span class="nav-icon">
                   <i class="fa fa-user"></i>
                   </span>
                   <span class="nav-text">Profile</span>
                   </a>
                </li>
                <li>
                   <a href="{{url('/artist-profile')}}#edit-profile" id="EditProfileTapHide">
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
                   <a href="{{ url('/wallet') }}">
                   <span class="nav-icon">
                   <i class="fa fa-plus-square"></i>
                   </span>
                   <span class="nav-text">Wallet</span>
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
                <li>
                   <a href="{{route('logout')}}">
                   <span class="nav-icon">
                   <i class="fa fa-sign-out"></i>
                   </span>
                   <span class="nav-text">Sign out</span>
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
             <span class="block _500 text-ellipsis">{{($user_artist) ? $user_artist->name : ''}}</span>
             <span class="text-xs text-muted">{{($user_artist) ? $user_artist->email : ''}}</span>
             </span>
             </a>
             {{--
             <div class="dropdown-menu w dropdown-menu-scale ">
                --}}
                {{--                            <a class="dropdown-item" href="{{url('/artist-profile')}}#profile">--}}
                {{--                                <span>Profile</span>--}}
                {{--                            </a>--}}
                {{--                            <a class="dropdown-item" href="{{url('/artist-profile')}}#tracks">--}}
                {{--                                <span>Tracks</span>--}}
                {{--                            </a>--}}
                {{--                            <a class="dropdown-item" href="{{url('/artist-profile')}}#playlists">--}}
                {{--                                <span>Playlists</span>--}}
                {{--                            </a>--}}
                {{--                            <a class="dropdown-item" href="{{url('/artist-profile')}}#likes">--}}
                {{--                                <span>Likes</span>--}}
                {{--                            </a>--}}
                {{--
                <div class="dropdown-divider"></div>
                --}}
                {{--                            <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#change-password">--}}
                {{--                                Change Password--}}
                {{--                            </a>--}}
                {{--                            <button class="btn btn-xs white" onclick="changePassword()" data-toggle="modal" data-target="#edit-track">Edit</button>--}}
                {{--                            <a class="dropdown-item" href="#">--}}
                {{--                                Need help?--}}
                {{--                            </a>--}}
                {{--                            <a class="dropdown-item" href="{{route('logout')}}">Sign out</a>--}}
                {{--
             </div>
             --}}
          </div>
       </div>
    </div>
 </div>
 <!-- / -->
