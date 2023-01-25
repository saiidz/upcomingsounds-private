<!-- BEGIN: SideNav-->
<aside class="sidenav-main nav-expanded nav-lock nav-collapsible sidenav-light sidenav-active-square">
    <div class="brand-sidebar">
        <h1 class="logo-wrapper">
            <a class="brand-logo darken-1" href="{{route('admin.dashboard')}}">
{{--                <img class="hide-on-med-and-down" src="{{asset('images/logo/logo1.svg')}}" alt="materialize logo"/>--}}
                <img class="show-on-medium-and-down hide-on-med-and-up" src="{{asset('images/logo.png')}}" alt="materialize logo"/>
                <span class="logo-text hide-on-med-and-down">
                    <img class="hide-on-med-and-down" src="{{asset('images/logo.png')}}" alt="materialize logo"/>
                </span>
            </a>
            <a class="navbar-toggler" href="#">
                <i class="material-icons">radio_button_checked</i>
            </a>
        </h1>
    </div>
    <ul class="sidenav sidenav-collapsible leftside-navigation collapsible sidenav-fixed menu-shadow" id="slide-out" data-menu="menu-navigation" data-collapsible="menu-accordion">
        <li class="bold">
            <a class="waves-effect waves-cyan {{Request::is('admin/dashboard') ? 'active' : ''}}" href="{{route('admin.dashboard')}}">
                <i class="material-icons">settings_input_svideo</i>
                <span class="menu-title" data-i18n="Dashboard">Dashboard</span>
            </a>
        </li>

        <li class="bold {{ Request::is('admin/artist-approved') || Request::is('admin/artist-pending') || Request::is('admin/artist-features*') || Request::is('admin/artist-profile*') ? 'active open' : '' }}">
            <a class="collapsible-header waves-effect waves-cyan" href="javascript:void(0)">
                <i class="material-icons">face</i>
                <span class="menu-title" data-i18n="User">Artists</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="{{ Request::is('admin/artist-approved') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/artist-approved') ? 'active' : '' }}" href="{{ route('admin.approved.artist') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Artist Approved</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/artist-pending') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/artist-pending') ? 'active' : '' }}" href="{{ route('admin.pending.artist') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Artist Pending</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/artist-features*') || Request::is('admin/artist-sub-feature*') ? 'active' : '' }}">
                        <a class="waves-effect waves-cyan  {{ Request::is('admin/artist-features*') || Request::is('admin/artist-sub-feature*') ? 'active' : '' }}" href="{{ route('admin.artist-features.index') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Artist Features</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- artist tracks --}}
        <li class="bold {{ Request::is('admin/track-approved')
          || Request::is('admin/active-campaign')
            || Request::is('admin/track-pending')

            || Request::is('admin/track-details*')? 'active open' : '' }}">
            <a class="collapsible-header waves-effect waves-cyan" href="javascript:void(0)">
                <i class="material-icons">face</i>
                <span class="menu-title" data-i18n="User">Artist Tracks</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="{{ Request::is('admin/track-approved') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/track-approved') ? 'active' : '' }}" href="{{ route('admin.approved.track') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Approved</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/track-pending') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/track-pending') ? 'active' : '' }}" href="{{ route('admin.pending.track') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Pending</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/active-campaign') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/active-campaign') ? 'active' : '' }}" href="{{ route('admin.campaign.active') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Active Campaign</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="bold {{ Request::is('admin/curator-approved') || Request::is('admin/curator-pending')
        || Request::is('admin/curator-profile*') || Request::is('admin/curator-verification*')
        || Request::is('admin/curator-features*') || Request::is('admin/curator-sub-feature*') || Request::is('admin/offer*') ? 'active open' : '' }}">
            <a class="collapsible-header waves-effect waves-cyan" href="javascript:void(0)">
                <i class="material-icons">face</i>
                <span class="menu-title" data-i18n="User">Curators</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="{{ Request::is('admin/curator-approved') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/curator-approved') ? 'active' : '' }}" href="{{ route('admin.approved.curator') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Curator Approved</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/curator-pending') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/curator-pending') ? 'active' : '' }}" href="{{ route('admin.pending.curator') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Curator Pending</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/curator-verification*') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/curator-verification*') ? 'active' : '' }}" href="{{ route('admin.verification.curator') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Curator Verification</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/curator-features*') || Request::is('admin/curator-sub-feature*') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/curator-features*') || Request::is('admin/curator-sub-feature*') ? 'active' : '' }}" href="{{ route('admin.curator-features.index') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Curator Features</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/offers*') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/offers*') ? 'active' : '' }}" href="{{ route('admin.offers') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Offers - Proposition</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/offer-types*') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/offer-types*') ? 'active' : '' }}" href="{{ route('admin.offer-types.index') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Offer Types</span>
                        </a>
                    </li>
                    <li class="{{ Request::is('admin/alternative-options*') ? 'active' : '' }}">
                        <a class="{{ Request::is('admin/alternative-options*') ? 'active' : '' }}" href="{{ route('admin.alternative-options.index') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Alternative Options</span>
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="bold">
            <a class="waves-effect waves-cyan {{Request::is('admin/tickets') || Request::is('admin/ticket*') ? 'active' : ''}}" href="{{route('admin.help.ticket')}}">
                <i class="material-icons">help_outline</i>
                <span class="menu-title" data-i18n="Support">Tickets</span>
            </a>
        </li>

        <li class="bold {{ Request::is('admin/frontend/settings/home-section')
        || Request::is('admin/frontend/settings/about-section')
        || Request::is('admin/frontend/settings/curators')
        || Request::is('admin/banners*')
        || Request::is('admin/frontend/settings/contact-section') ? 'active open' : '' }}">
            <a class="collapsible-header waves-effect waves-cyan" href="javascript:void(0)">
                <i class="material-icons">face</i>
                <span class="menu-title" data-i18n="User">Frontend Settings</span>
            </a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="{{Request::is('admin/frontend/settings/home-section') ? 'active' : ''}}">
                        <a class="{{Request::is('admin/frontend/settings/home-section') ? 'active' : ''}}" href="{{ route('admin.home.settings') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Home Page</span>
                        </a>
                    </li>
                    <li class="{{Request::is('admin/frontend/settings/about-section') ? 'active' : ''}}">
                        <a class="{{Request::is('admin/frontend/settings/about-section') ? 'active' : ''}}" href="{{ route('admin.about.settings') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">About Us Page</span>
                        </a>
                    </li>
                    <li class="{{Request::is('admin/frontend/settings/contact-section') ? 'active' : ''}}">
                        <a class="{{Request::is('admin/frontend/settings/contact-section') ? 'active' : ''}}" href="{{ route('admin.contact.settings') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Contact Page</span>
                        </a>
                    </li>
                    <li class="{{Request::is('admin/frontend/settings/curators') ? 'active' : ''}}">
                        <a class="{{Request::is('admin/frontend/settings/curators') ? 'active' : ''}}" href="{{ route('admin.curators.settings') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Curators Settings</span>
                        </a>
                    </li>
                    <li class="{{Request::is('admin/banners*') ? 'active' : ''}}">
                        <a class="{{Request::is('admin/banners*') ? 'active' : ''}}" href="{{ route('admin.banners.index') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">Banners</span>
                        </a>
                    </li>
                    {{-- <li class="{{Request::is('admin/frontend/settings/for-artists-section') ? 'active' : ''}}">
                        <a class="{{Request::is('admin/frontend/settings/for-artists-section') ? 'active' : ''}}"
                            href="{{ route('admin.for.artists.settings') }}">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">For Artists Page</span>
                        </a>
                    </li>
                    <li class="">
                        <a class="" href="#!">
                            <i class="material-icons">radio_button_unchecked</i>
                            <span data-i18n="List">For Curators Page</span>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </li>


        <li class="bold">
            <a class="waves-effect waves-cyan {{Request::is('admin/theme/settings') ? 'active' : ''}}" href="{{ route('admin.theme.settings') }}">
                <i class="material-icons">settings</i>
                <span class="menu-title" data-i18n="Settings">Theme Settings</span>
            </a>
        </li>

        {{-- <li class="bold {{Request::segment(2) == 'categories' ? 'active open' : ''}}"><a class="collapsible-header waves-effect waves-cyan {{Request::segment(2) == 'categories'  && Request::segment(4) == 'edit' ? 'active' : ''}}" href="JavaScript:void(0)"><i class="material-icons">view_agenda</i><span class="menu-title" data-i18n="Categories">Category</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="{{route('categories.index')}}" class="{{Request::segment(2) == 'categories'  && Request::segment(3) == '' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Category List">Category List</span></a>
                    </li>
                    <li><a href="{{route('categories.create')}}" class="{{Request::segment(2) == 'categories' && Request::segment(3) == 'create' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Category Add">Category Add</span></a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="bold {{Request::segment(2) == 'vehicles' || Request::segment(2) == 'unapproved-user-vehicle' || Request::segment(2) == 'list-approved-user-vehicle' || Request::segment(2) == 'view-user-vehicle' ? 'active open' : ''}}"><a class="collapsible-header waves-effect waves-cyan {{Request::segment(2) == 'vehicles'  && Request::segment(4) == 'edit' || Request::segment(2) == 'view-user-vehicle' ? 'active' : ''}}" href="JavaScript:void(0)"><i class="material-icons">directions_car</i><span class="menu-title" data-i18n="Vehicles">Vehicles</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="{{route('vehicles.index')}}" class="{{Request::segment(2) == 'vehicles'  && Request::segment(3) == '' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Vehicle List">Vehicle List</span></a>
                    </li>
                    <li><a href="{{route('vehicles.create')}}" class="{{Request::segment(2) == 'vehicles' && Request::segment(3) == 'create' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Vehicle Add">Vehicle Add</span></a>
                    </li>
                    <li><a href="{{route('listApprovedVehicles.user')}}" class="{{Request::segment(2) == 'list-approved-user-vehicle' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Approved User Vehicles">Approved User Vehicles</span></a>
                    </li>
                    <li><a href="{{route('unapprovedVehicles.user')}}" class="{{Request::segment(2) == 'unapproved-user-vehicle' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Unapproved User Vehicles">Unapproved User Vehicles</span></a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="bold {{Request::segment(2) == 'auctions' ? 'active open' : ''}}"><a class="collapsible-header waves-effect waves-cyan {{Request::segment(2) == 'auctions'  && Request::segment(4) == 'edit' ? 'active' : ''}}" href="JavaScript:void(0)"><i class="material-icons">query_builder</i><span class="menu-title" data-i18n="Auctions">Auctions</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="{{route('auctions.index')}}" class="{{Request::segment(2) == 'auctions'  && Request::segment(3) == '' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Auction List">Auction List</span></a>
                    </li>
                    <li><a href="{{route('auctions.create')}}" class="{{Request::segment(2) == 'auctions' && Request::segment(3) == 'create' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Auction Add">Auction Add</span></a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="bold {{Request::segment(2) == 'bidders' || Request::segment(2) == 'suspend-bidders' || Request::segment(2) == 'block-bidders' ? 'active open' : ''}}"><a class="collapsible-header waves-effect waves-cyan {{Request::segment(2) == 'bidders'  && Request::segment(4) == 'edit' || Request::segment(2) == 'suspend-bidders' || Request::segment(2) == 'block-bidders' ? 'active' : ''}}" href="JavaScript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="Bidders">Bidders</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="{{route('bidders.index')}}" class="{{Request::segment(2) == 'bidders'  && Request::segment(3) == '' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Bidder List">Bidders List</span></a>
                    </li>
                    <li><a href="{{route('bidders.create')}}" class="{{Request::segment(2) == 'bidders' && Request::segment(3) == 'create' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Bidder Add">Bidder Add</span></a>
                    </li>
                    <li><a href="{{route('suspendBidders')}}" class="{{Request::segment(2) == 'suspend-bidders'  && Request::segment(3) == '' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Bidder List">Suspend Bidders</span></a>
                    </li>
                    <li><a href="{{route('blockBidders')}}" class="{{Request::segment(2) == 'block-bidders'  && Request::segment(3) == '' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Bidder List">Block Bidders</span></a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="bold {{Request::segment(2) == 'system-users' ? 'active open' : ''}}"><a class="collapsible-header waves-effect waves-cyan {{Request::segment(2) == 'system-users'  && Request::segment(4) == 'edit' ? 'active' : ''}}" href="JavaScript:void(0)"><i class="material-icons">face</i><span class="menu-title" data-i18n="System Users">System Users</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="{{route('system-users.index')}}" class="{{Request::segment(2) == 'system-users'  && Request::segment(3) == '' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="System Users List">System Users List</span></a>
                    </li>
                    <li><a href="{{route('system-users.create')}}" class="{{Request::segment(2) == 'system-users' && Request::segment(3) == 'create' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="System User Add">System User Add</span></a>
                    </li>
                </ul>
            </div>
        </li>


        <li class="bold {{Request::segment(2) == 'feature_tags' ? 'active open' : ''}}"><a class="collapsible-header waves-effect waves-cyan {{Request::segment(2) == 'feature_tags'  && Request::segment(4) == 'edit' ? 'active' : ''}}" href="JavaScript:void(0)"><i class="material-icons">view_list</i><span class="menu-title" data-i18n="Categories">Feature Tags</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li><a href="{{route('feature_tags.index')}}" class="{{Request::segment(2) == 'feature_tags'  && Request::segment(3) == '' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Feature List">Feature List</span></a>
                    </li>
                    <li><a href="{{route('feature_tags.create')}}" class="{{Request::segment(2) == 'feature_tags' && Request::segment(3) == 'create' ? 'active' : ''}}"><i class="material-icons">radio_button_unchecked</i><span data-i18n="Feature Add">Feature Add</span></a>
                    </li>
                </ul>
            </div>
        </li>

        <li class="bold {{Request::segment(2) == 'settings' ? 'active open' : ''}}"><a class="collapsible-header waves-effect waves-cyan {{Request::segment(2) == 'settings'  && Request::segment(4) == 'edit' ? 'active' : ''}}" href="JavaScript:void(0)"><i class="material-icons">view_list</i><span class="menu-title" data-i18n="settings">Settings</span></a>
            <div class="collapsible-body">
                <ul class="collapsible collapsible-sub" data-collapsible="accordion">
                    <li class="bold"><a class="waves-effect waves-cyan {{Request::segment(3) == null && Request::segment(2) == 'settings' ? 'active' : ''}}" href="{{route('settings.index')}}"><i class="material-icons">settings_input_svideo</i><span class="menu-title" data-i18n="Feature Add">View Settings</span></a></li>

                    </li>
                </ul>
            </div>
        </li> --}}



    </ul>
    <div class="navigation-background"></div><a class="sidenav-trigger btn-sidenav-toggle btn-floating btn-medium waves-effect waves-light hide-on-large-only" href="#" data-target="slide-out"><i class="material-icons">menu</i></a>
</aside>
<!-- END: SideNav-->
