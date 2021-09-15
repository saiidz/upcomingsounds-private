<!-- BEGIN: SideNav-->
<div class="sidenav">
			<div class="text-center top-head">
<div class="sidebar_top_flex">
                @if(count(Auth::user()->userDocuments) > 0)
                    @if(Auth::user()->userDocuments->where('type', 'profile')->count() > 0)
                            <img class="upload_profile"  src="{{URL('/')}}/uploads/user_profile/{{Auth::user()->userDocuments->where('type', 'profile')->first()->path}}" alt="profile">
                    @else
                        <img src="{{asset('images/profile_images_icons.svg')}}" alt="profile">
                    @endif
                @endif
				<p>{{(Auth::user()) ? Auth::user()->name : 'Mi Auto'}}</p>
</div>
			</div>

			<ul>
				<a href="{{url('/dashboard')}}">
				<li class="{{Request::segment(1) == 'dashboard' ? 'active' : ''}}">
						<img src="{{asset('images/dashboard_icons.svg')}}" alt=""> Dashboard
					</li>
				</a>
				<a href="{{url('/get-profile')}}">
				<li class="{{Request::segment(1) == 'get-profile' || Request::segment(1) == 'manage-password' ? 'active' : ''}}">
						<img src="{{asset('images/profile_icons.svg')}}" alt=""> Profile
					</li>
				</a>
				<hr>
				<a href="{{url('/vehicles')}}">
				<li class="{{Request::segment(1) == 'vehicles' || Request::segment(1) == 'add-vehicle'|| Request::segment(1) == 'edit-vehicle' || Request::segment(1) == 'get-vehicle' ? 'active' : ''}}">
						<img src="{{asset('images/my_vehicles.svg')}}" alt=""> My Vehicles
					</li>
				</a>
				<a href="{{url('/auctions')}}">
				<li class="{{Request::segment(1) == 'auctions' || Request::segment(1) == 'get-auction' || Request::segment(1) == 'get-auction-vehicle' ? 'active' : ''}}">
						<img src="{{asset('images/Auctions_icon.svg')}}" alt=""> Auctions
					</li>
				</a>
				<a href="{{url('/my-bids')}}">
				<li class="{{Request::segment(1) == 'my-bids' ? 'active' : ''}}">
						<img src="{{asset('images/my_bids_icons.svg')}}" alt=""> My Bids
					</li>
				</a>
				<hr>
				<a href="{{url('/auction-update')}}">
				<li class="{{Request::segment(1) == 'auction-update' ? 'active' : ''}}">
						<img src="{{asset('images/Auctions_updates.svg')}}" alt=""> Auction
						Updates
					</li>
				</a>


				<a href="{{url('/notifications')}}">
					<li class="{{Request::segment(1) == 'notifications' ? 'active' : ''}}">
							<img src="{{asset('images/notifications.png')}}" alt=""> Notifications
						</li>
					</a>


				<a href="#">
				<li>
						<img src="{{asset('images/transtion_history.svg')}}" alt="">
						Transaction History
					</li>
				</a>
				<a href="#">
				<li>
						<img src="{{asset('images/invoices.svg')}}" alt=""> Invoice
					</li>
				</a>
				<a href="{{url('/contact-us')}}">
					<li>
							<img src="{{asset('images/contac-us.svg')}}" alt=""> Contact Us
						</li>
					</a>


				<a class="logout_pop" aria-haspopup="true">
				<li >
						<img src="{{asset('images/logout_icons.svg')}}" alt=""> Logout
					</li>
				</a>
			</ul>

		</div>
		<div id="ol" class=""></div>


