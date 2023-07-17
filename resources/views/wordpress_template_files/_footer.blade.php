<div class="white dk pos-rlt">
    <div class="p-a-md">
        <div class="footer p-y-md text-primary-hover">
            <div class="row">
                <div class="col-md-3">
                    <div class="clearfix m-b-sm">
                        <!-- brand -->
                        <a href="{{url('/')}}" class="navbar-brand md">
                            <img src="{{asset(!empty($theme->logo) ? $theme->logo : 'images/logo.png')}}" alt="">
                        </a>
                        <!-- / brand -->
                    </div>


                    <div class="m-b m-l-md" id="footerIcons">
                        <a href="{{ !empty($theme->facebook_link) ? $theme->facebook_link : 'https://www.facebook.com/Upcomingsounds' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color "
                           title="Facebook">
                            <i class="{{ !empty($theme->facebook_icon) ? $theme->facebook_icon : 'fa fa-facebook' }}"></i>
                            <i class="{{ !empty($theme->facebook_icon) ? $theme->facebook_icon : 'fa fa-facebook' }}"></i>
                        </a>
                        <a href="{{ !empty($theme->instagram_link) ? $theme->instagram_link : 'https://www.instagram.com/upcomingsounds' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Instagram">
                            <i class="{{ !empty($theme->instagram_icon) ? $theme->instagram_icon : 'fa fa-instagram' }}"></i>
                            <i class="{{ !empty($theme->instagram_icon) ? $theme->instagram_icon : 'fa fa-instagram' }}"></i>
                        </a>
                        <a href="{{ !empty($theme->spotify_link) ? $theme->spotify_link : 'https://open.spotify.com/user/0ksxb1tbymq3tx778ybi7659r' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Spotify">
                            <i class="{{ !empty($theme->spotify_icon) ? $theme->spotify_icon : 'fa fa-spotify' }}"></i>
                            <i class="{{ !empty($theme->spotify_icon) ? $theme->spotify_icon : 'fa fa-spotify' }}"></i>
                        </a>
                        <a href="{{ !empty($theme->twitter_link) ? $theme->twitter_link : 'https://twitter.com/Upcomingsounds' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Twitter">
                            <i class="{{ !empty($theme->twitter_icon) ? $theme->twitter_icon : 'fa fa-twitter' }}"></i>
                            <i class="{{ !empty($theme->twitter_icon) ? $theme->twitter_icon : 'fa fa-twitter' }}"></i>
                        </a>
                        <a href="{{ !empty($theme->youtube_link) ? $theme->youtube_link : 'https://www.youtube.com/channel/UC1HUg1XVehD3RAkdQDay32A' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Youtube">
                            <i class="{{ !empty($theme->youtube_icon) ? $theme->youtube_icon : 'fa fa-youtube' }}"></i>
                            <i class="{{ !empty($theme->youtube_icon) ? $theme->youtube_icon : 'fa fa-youtube' }}"></i>
                        </a>
                        <a href="{{ !empty($theme->tiktok_link) ? $theme->tiktok_link : 'https://www.tiktok.com/@upcomingsounds' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Tiktok">
                            <i class="{{ !empty($theme->tiktok_icon) ? $theme->tiktok_icon : 'fab fa-tiktok' }}"></i>
                            <i class="{{ !empty($theme->tiktok_icon) ? $theme->tiktok_icon : 'fab fa-tiktok' }}"></i>
                        </a>

                        <a href="{{ !empty($theme->reddit_link) ? $theme->reddit_link : 'https://www.reddit.com/r/upcomingsounds/?utm_medium=android_app&utm_source=share' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Reddit">
                            <i class="{{ !empty($theme->reddit_icon) ? $theme->reddit_icon : 'fa fa-reddit' }}"></i>
                            <i class="{{ !empty($theme->reddit_icon) ? $theme->reddit_icon : 'fa fa-reddit' }}"></i>
                        </a>

                        <a href="https://discord.com/invite/DHDChvkpny" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Reddit">
                            <i class="fab fa-discord"></i>
                            <i class="fab fa-discord"></i>
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
                            <li class="nav-item">
                                <a class="nav-link" href="https://blog.upcomingsounds.com">Blog</a>
{{--                                <a class="nav-link" href="{{route("binshopsblog.index" , config('binshopsblog.default_language'))}}">Blog</a>--}}
                                <!-- <a class="nav-link" href="{{url('/blog')}}">Blog</a> -->
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
                                    <a class="nav-link" href="{{url('/for-curators')}}">Curator</a>
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
                                <a class="nav-link" href="{{url('/for-artists')}}">For Artists</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/for-curators')}}">For Curators / Tastmakers </a>
                            </li>
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
                            <input type="text" class="form-control" name="email" placeholder="Your Subscriber email" required>
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline b-dark rounded">Subscribe
                        </button>
                    </form>
                </div>
            </div>
            <div class="b b-b m-b m-t-lg"></div>
            <div class="row">
                <div class="col-sm-8">
                </div>
                <div class="col-sm-4">
                    <div class="text-sm-right text-xs-left">
                        <small class="text-muted">&copy; @php echo date('Y'); @endphp  <a href="https://upcomingsounds.com/" target="_blank">UpcomingSounds.com</a> {{ !empty($theme->footer_description) ? $theme->footer_description : 'All rights reserved.' }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('welcome-panels.welcome-scripts')
