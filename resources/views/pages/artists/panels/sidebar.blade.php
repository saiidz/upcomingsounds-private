<!-- aside -->
<div id="aside" class="app-aside modal fade nav-dropdown">
    <!-- fluid app aside -->
    <div class="left navside grey dk" data-layout="column">
       <div class="navbar no-radius">
          <!-- brand -->
          <a href="{{url('/artist-profile')}}" class="navbar-brand md">
          <img src="{{asset('images/logo.png')}}" alt=".">
          </a>
          <!-- / brand -->
       </div>
       <div class="hide-scroll">
{{--       <div data-flex class="hide-scroll">--}}
          <nav class="scroll nav-stacked nav-active-primary">
             <ul class="nav" data-ui-nav>
                <li class="nav-header hidden-folded">
                   <span class="text-xs text-muted">Main</span>
                </li>
                 @if(Request::is('artist-offers') == 'artist-offers' || Request::is('messages') == 'messages')
                     <li class="{{Request::segment(1) == 'welcome-your-track' || Request::segment(1) == 'promote-your-track' ? 'active' : ''}}">
                         <a href="{{url('/welcome-your-track')}}" class="reloadWelcomeTrack">
                            <span class="nav-icon">
                               <i class="material-icons">
                               play_circle_outline
                               </i>
                            </span>
                             <span class="nav-text">Dashboard</span>
                         </a>
                     </li>
                 @else
                     <li class="{{Request::segment(1) == 'welcome-your-track' || Request::segment(1) == 'promote-your-track' ? 'active' : ''}}">
                         <a href="{{url('/welcome-your-track')}}" class="reloadWelcomeTrack">
                            <span class="nav-icon">
                               <i class="material-icons">
                               play_circle_outline
                               </i>
                            </span>
                            <span class="nav-text">Dashboard</span>
                         </a>
                     </li>
                 @endif

                 @if(Request::is('artist-offers') != 'artist-offers' && Request::is('pending-offer') != 'pending-offer'
                          && Request::is('accepted-offer') != 'accepted-offer' && Request::is('verified-content-creator') != 'verified-content-creator' && Request::is('rejected-offer') != 'rejected-offer'
                          && Request::is('alternative-offer') != 'alternative-offer' && Request::is('completed-offer') != 'completed-offer'
                          && Request::is('new-offer') != 'new-offer' && Request::is('proposition-offer') != 'proposition-offer'
                           && Request::is('messages') != 'messages')
                     <li>
                         <a href="{{route('artist.offers')}}" id="artistOffers">
                            <span class="nav-icon">
                                <i class="fa fa-suitcase"></i>
                            </span>
                             <span class="nav-text">Offers</span>
                         </a>
                     </li>
{{--                     <li>--}}
{{--                         <a href="{{route('artist.messages')}}" id="artistMessages">--}}
{{--                              <span class="nav-label">--}}
{{--                                    <b class="label">0</b>--}}
{{--                               </span>--}}
{{--                                    <span class="nav-icon">--}}
{{--                                        <i class="fa fa-inbox"></i>--}}
{{--                                    </span>--}}
{{--                             <span class="nav-text">Messages</span>--}}
{{--                         </a>--}}
{{--                     </li>--}}
    {{--                <li>--}}
    {{--                   <a href="javascript:void(0)">--}}
    {{--                   <span class="nav-icon">--}}
    {{--                   <i class="material-icons">--}}
    {{--                   sort--}}
    {{--                   </i>--}}
    {{--                   </span>--}}
    {{--                   <span class="nav-text">Browse</span>--}}
    {{--                   </a>--}}
    {{--                </li>--}}
    {{--                <li>--}}
    {{--                   <a href="javascript:void(0)">--}}
    {{--                   <span class="nav-icon">--}}
    {{--                   <i class="material-icons">--}}
    {{--                   trending_up--}}
    {{--                   </i>--}}
    {{--                   </span>--}}
    {{--                   <span class="nav-text">Charts</span>--}}
    {{--                   </a>--}}
    {{--                </li>--}}
    {{--                <li>--}}
    {{--                   <a href="javascript:void(0)">--}}
    {{--                   <span class="nav-icon">--}}
    {{--                   <i class="material-icons">--}}
    {{--                   portrait--}}
    {{--                   </i>--}}
    {{--                   </span>--}}
    {{--                   <span class="nav-text">Artist</span>--}}
    {{--                   </a>--}}
    {{--                </li>--}}
                     <li>
                       <a href="{{route('artist.coverage')}}" id="artistSubmitCoverage">
                           <span class="nav-icon">
                                <i class="fa fa-rocket"></i>
                           </span>
                           <span class="nav-text">Coverage</span>
                       </a>
                    </li>
                     <li>
                       <a href="{{route('active.campaign')}}" id="artistCampaign">
                           <span class="nav-icon">
                                <i class="fa fa-bullhorn"></i>
                           </span>
                           <span class="nav-text">Active Campaigns</span>
                       </a>
                    </li>
{{--                    <li>--}}
{{--                       <a data-toggle="modal" data-target="#search-modal">--}}
{{--                       <span class="nav-icon">--}}
{{--                       <i class="material-icons">--}}
{{--                       search--}}
{{--                       </i>--}}
{{--                       </span>--}}
{{--                       <span class="nav-text">Search</span>--}}
{{--                       </a>--}}
{{--                    </li>--}}
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
                         <a href="{{url('/artist-profile')}}#notifications" class="reloadNotifications">
                             @if(!empty($unReadNotifications))
                                  <span class="nav-label">
                                    <b class="label">{{$unReadNotifications->count()}}</b>
                                  </span>
                             @else
                                 <span class="nav-label">
                                    <b class="label">0</b>
                               </span>
                             @endif
                             <span class="nav-icon">
                               <i class="fa fa-bell"></i>
                             </span>
                             <span class="nav-text">Notifications</span>
                         </a>
                     </li>
{{--                    <li>--}}
{{--                       <a href="{{url('/artist-profile')}}#playlists" class="reloadList">--}}
{{--                       <span class="nav-icon">--}}
{{--                       <i class="material-icons">--}}
{{--                       queue_music--}}
{{--                       </i>--}}
{{--                       </span>--}}
{{--                       <span class="nav-text">Lists</span>--}}
{{--                       </a>--}}
{{--                    </li>--}}
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
                       <a href="javascript:void(0)" class="reloadWallet">
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
                 @endif
                 {{-- Offers Pages --}}
                 @if(Request::is('artist-offers') == 'artist-offers' || Request::is('pending-offer') == 'pending-offer'
                          || Request::is('accepted-offer') == 'accepted-offer' || Request::is('verified-content-creator') == 'verified-content-creator' || Request::is('rejected-offer') == 'rejected-offer'
                          || Request::is('alternative-offer') == 'alternative-offer' || Request::is('completed-offer') == 'completed-offer'
                          || Request::is('new-offer') == 'new-offer' || Request::is('proposition-offer') == 'proposition-offer')
                     <li>
                         <a href="{{route('artist.offers')}}" id="artistOffers">
                        <span class="nav-icon">
                            <i class="fa fa-suitcase"></i>
                        </span>
                             <span class="nav-text">Offers</span>
                         </a>
                     </li>
                     <li>
                         <a class="dropdown-item" href="{{ route('artist.new') }}" id="newOfferArtist">
                                    <span class="nav-icon">
                                        <i class="fa fa-bullseye"></i>
                                    </span>
                             <span class="nav-text">New</span>
                         </a>
                     </li>
                     <li>
                         <a class="dropdown-item" href="{{ route('artist.pending') }}" id="pendingOfferArtist">
                                    <span class="nav-icon">
                                        <i class="fa fa-clock-o"></i>
                                    </span>
                             <span class="nav-text">Pending</span>
                         </a>
                     </li>
                     <li>
                         <a class="dropdown-item" href="{{ route('artist.accepted') }}" id="acceptedOfferArtist">
                                    <span class="nav-icon">
                                        <i class="fa fa-thumbs-o-up"></i>
                                    </span>
                             <span class="nav-text">Accepted</span>
                         </a>
                     </li>
                     <li>
                         <a class="dropdown-item" href="{{ route('artist.rejected') }}" id="rejectedOfferArtist">
                                    <span class="nav-icon">
                                        <i class="fa fa-thumbs-o-down"></i>
                                    </span>
                             <span class="nav-text">Rejected</span>
                         </a>
                     </li>
                     <li>
                         <a class="dropdown-item" href="{{ route('artist.alternative') }}" id="alternativeOfferArtist">
                                    <span class="nav-icon">
                                        <i class="fa fa-code-fork"></i>
                                    </span>
                             <span class="nav-text">Alternative</span>
                         </a>
                     </li>
{{--                     <li>--}}
{{--                         <a class="dropdown-item" href="{{ route('artist.artists.submissions') }}">--}}
{{--                                    <span class="nav-icon">--}}
{{--                                        <i class="fa fa-plus"></i>--}}
{{--                                    </span>--}}
{{--                             <span class="nav-text">Artists Submissions</span>--}}
{{--                         </a>--}}
{{--                     </li>--}}
                     <li>
                         <a class="dropdown-item" href="{{ route('artist.proposition') }}" id="propositionOfferArtist">
                                    <span class="nav-icon">
                                        <i class="fa fa-edit"></i>
                                    </span>
                             <span class="nav-text">Proposition</span>
                         </a>
                     </li>
                     <li>
                         <a class="dropdown-item" href="{{ route('artist.completed') }}" id="completedOfferArtist">
                                    <span class="nav-icon">
                                        <i class="fa fa-check-square-o"></i>
                                    </span>
                             <span class="nav-text">Completed</span>
                         </a>
                     </li>
                     <li>
                         <a class="dropdown-item" href="{{ route('curator.coverage.verified') }}" id="verifiedContentCreatorCurator">
                                    <span class="nav-icon">
                                        <i class="fa fa-bullseye"></i>
                                    </span>
                             <span class="nav-text">Verified Curator</span>
                         </a>
                     </li>
                 @endif
                 {{-- Offers Pages --}}

                 {{-- Message Pages --}}
                 @if(Request::is('messages') == 'messages')
                     <li>
                         <a href="{{route('artist.messages')}}" id="artistMessages">
                              <span class="nav-label">
                                    <b class="label">0</b>
                               </span>
                            <span class="nav-icon">
                                <i class="fa fa-inbox"></i>
                            </span>
                             <span class="nav-text">Messages</span>
                         </a>
                     </li>
                     <li>
                         <a href="{{route('artist.new.messages')}}">
                        <span class="nav-icon">
                            <i class="fa fa-envelope-o"></i>
                        </span>
                             <span class="nav-text">New</span>
                         </a>
                     </li>
                     <li>
                         <a class="dropdown-item" href="{{ route('artist.viewed.messages') }}">
                                    <span class="nav-icon">
                                        <i class="fa fa-eye-slash"></i>
                                    </span>
                             <span class="nav-text">Viewed</span>
                         </a>
                     </li>
                     <li>
                         <a class="dropdown-item" href="{{ route('artist.responses.messages') }}">
                                    <span class="nav-icon">
                                        <i class="fa fa-star-o"></i>
                                    </span>
                             <span class="nav-text">Responses</span>
                         </a>
                     </li>
                 @endif
                 {{-- Message Pages --}}
             </ul>
          </nav>
       </div>
       <div data-flex-no-shrink>
          <div class="nav-fold dropup">
             <a data-toggle="dropdown" href="{{url('/artist-profile')}}#profile" class="reloadProfile">
             <span class="pull-left">
                @if(!empty($user_artist->profile))
                     <img src="{{URL('/')}}/uploads/profile/{{$user_artist->profile}}" alt="..." class="w-32 img-circle">
                 @else
                     <img src="{{asset('images/a3.jpg')}}" alt="..." class="w-32 img-circle">
                 @endif
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
