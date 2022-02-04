<div class="white dk pos-rlt">
    <div class="p-a-md">
        <div class="footer p-y-md text-primary-hover">
            <div class="row">
                <div class="col-md-3">
                    <div class="clearfix m-b-sm">
                        <!-- brand -->
                        <a href="{{url('/')}}" class="navbar-brand md">
                            {{--                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 48" width="32" height="32">--}}
                            {{--                            <circle cx="24" cy="24" r="24" fill="rgba(255,255,255,0.2)"/>--}}
                            {{--                            <circle cx="24" cy="24" r="22" fill="#1c202b" class="brand-color"/>--}}
                            {{--                            <circle cx="24" cy="24" r="10" fill="#ffffff"/>--}}
                            {{--                            <circle cx="13" cy="13" r="2"  fill="#ffffff" class="brand-animate"/>--}}
                            {{--                            <path d="M 14 24 L 24 24 L 14 44 Z" fill="#FFFFFF" />--}}
                            {{--                            <circle cx="24" cy="24" r="3" fill="#000000"/>--}}
                            {{--                        </svg>--}}

                            <img src="{{asset('images/logo.png')}}" alt="">
                            {{--                        <img src="{{asset('images/logo.png')}}" alt="." class="hide">--}}
                            {{--                        <span class="hidden-folded inline">pulse</span>--}}
                        </a>
                        <!-- / brand -->
                    </div>


                    <div class="m-b m-l-md">
                        <a href="https://www.facebook.com/Upcomingsounds" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color "
                           title="Facebook">
                            <i class="fa fa-facebook"></i>
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://www.instagram.com/upcomingsounds_" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Instagram">
                            <i class="fa fa-instagram"></i>
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="https://open.spotify.com/user/0ksxb1tbymq3tx778ybi7659r" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Spotify">
                            <i class="fa fa-spotify"></i>
                            <i class="fa fa-spotify"></i>
                        </a>
                        <a href="https://twitter.com/Upcomingsounds_" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Twitter">
                            <i class="fa fa-twitter"></i>
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="https://www.youtube.com/channel/UC1HUg1XVehD3RAkdQDay32A" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Youtube">
                            <i class="fa fa-youtube"></i>
                            <i class="fa fa-youtube"></i>
                        </a>
                        <a href="https://www.tiktok.com/@upcomingsounds_" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color tiktok_footer"
                           title="Tiktok">
                            <i class="iconify" data-icon="fa-brands:tiktok"></i>
                        </a>
                    </div>


                </div>
                <div class="col-sm-2 col-xs-6">
                    <h6 class="text-u-c m-b text-muted">About</h6>
                    <div class="m-b-md">
                        <ul class="nav l-h-2x _600">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/about-us')}}">About us</a>
                            </li>
                            {{--<li class="nav-item">
                                <a class="nav-link" href="#">Mobile apps</a>
                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/blog')}}">Blog</a>
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/term-of-service')}}" class="nav-link">Term of Service</a>
                                {{--                                            <a class="nav-link" href="#">Jobs</a>--}}
                            </li>
                            <li class="nav-item">
                                <a href="{{url('/privacy-policy')}}" class="nav-link">Policy Privacy</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <h6 class="text-u-c m-b text-muted">Links</h6>
                    <div class="m-b-md">
                        <ul class="nav l-h-2x _600">
                            @if(Auth::check())

                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/register')}}">Sign up</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/login')}}">Login</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{url('/for-curators')}}">Apply as Tastemaker / Pro</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/contact-us')}}">Contact us</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-sm-2 col-xs-6">
                    <h6 class="text-u-c m-b text-muted">Connect</h6>
                    <div class="m-b-md">
                        <ul class="nav l-h-2x _600">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/artist-home')}}">For Artists</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/curator-home')}}">For Curators / Tastmakers </a>
                            </li>
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="https://www.instagram.com/upcomingsounds_">Help</a>--}}
{{--                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/how-to-help')}}">Help</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <h6 class="text-u-c m-b text-muted">Subscribe</h6>
                    <p>Do not want to miss our newsletter?</p>
                    <form class="m-b-1" method="POST" action="{{url('/newsletter')}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Subscriber email" required>
                            @error('email')
                                <small class="red-text" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline b-dark rounded">Subscribe
                        </button>
                    </form>
{{--                    <div class="text-left">--}}
{{--                        <div>If you want to unsubscribed? <a href="javascript:void(0)" data-toggle="modal"--}}
{{--                                                             data-target="#unsubscribed" class="text-primary _600">Unsubscribed</a></div>--}}
{{--                    </div>--}}
                </div>
            </div>
            <div class="b b-b m-b m-t-lg"></div>
            <div class="row">
                <div class="col-sm-8">
{{--                    <a href="javascript:void(0)" class="text-muted text-sm">Cookies</a>--}}
                </div>
                <div class="col-sm-4">
                    <div class="text-sm-right text-xs-left">
                        <small class="text-muted">&copy; @php echo date('Y'); @endphp  <a href="https://upcomingsounds.com/" target="_blank">UpcomingSounds.com</a> All rights reserved.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('welcome-panels.generic-model')
