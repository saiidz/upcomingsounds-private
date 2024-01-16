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

                            <img src="{{asset(!empty($theme->logo) ? $theme->logo : 'images/logo.png')}}" alt="">
                            {{--                        <img src="{{asset('images/logo.png')}}" alt="." class="hide">--}}
                            {{--                        <span class="hidden-folded inline">pulse</span>--}}
                        </a>
                        <!-- / brand -->
                    </div>


                    <div class="m-b m-l-md" id="footerIcons">
                        <a href="{{ !empty($theme->facebook_link) ? $theme->facebook_link : 'https://www.facebook.com/Upcomingsounds' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color "
                           title="Facebook">
{{--                            <i class="{{ !empty($theme->facebook_icon) ? $theme->facebook_icon : 'fab fa-facebook' }}"></i>--}}
                            <i class="{{ !empty($theme->facebook_icon) ? $theme->facebook_icon : 'fa fa-facebook' }}"></i>
                            <i class="{{ !empty($theme->facebook_icon) ? $theme->facebook_icon : 'fa fa-facebook' }}"></i>
                        </a>
                        <a href="{{ !empty($theme->instagram_link) ? $theme->instagram_link : 'https://www.instagram.com/upcomingsounds' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Instagram">
{{--                            <i class="{{ !empty($theme->instagram_icon) ? $theme->instagram_icon : 'fab fa-instagram' }}"></i>--}}
                            <i class="{{ !empty($theme->instagram_icon) ? $theme->instagram_icon : 'fa fa-instagram' }}"></i>
                            <i class="{{ !empty($theme->instagram_icon) ? $theme->instagram_icon : 'fa fa-instagram' }}"></i>
{{--                            <i class="fa fa-instagram"></i>--}}
{{--                            <i class="fa fa-instagram"></i>--}}
                        </a>
                        <a href="{{ !empty($theme->spotify_link) ? $theme->spotify_link : 'https://open.spotify.com/user/0ksxb1tbymq3tx778ybi7659r' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Spotify">
{{--                            <i class="{{ !empty($theme->spotify_icon) ? $theme->spotify_icon : 'fab fa-spotify' }}"></i>--}}
                            <i class="{{ !empty($theme->spotify_icon) ? $theme->spotify_icon : 'fa fa-spotify' }}"></i>
                            <i class="{{ !empty($theme->spotify_icon) ? $theme->spotify_icon : 'fa fa-spotify' }}"></i>
{{--                            <i class="fa fa-spotify"></i>--}}
{{--                            <i class="fa fa-spotify"></i>--}}
                        </a>
                        <a href="{{ !empty($theme->twitter_link) ? $theme->twitter_link : 'https://twitter.com/Upcomingsounds' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Twitter">
{{--                            <i class="{{ !empty($theme->twitter_icon) ? $theme->twitter_icon : 'fab fa-twitter' }}"></i>--}}
                            <i class="{{ !empty($theme->twitter_icon) ? $theme->twitter_icon : 'fa fa-twitter' }}"></i>
                            <i class="{{ !empty($theme->twitter_icon) ? $theme->twitter_icon : 'fa fa-twitter' }}"></i>
{{--                            <i class="fa fa-twitter"></i>--}}
{{--                            <i class="fa fa-twitter"></i>--}}
                        </a>
                        <a href="{{ !empty($theme->youtube_link) ? $theme->youtube_link : 'https://www.youtube.com/channel/UC1HUg1XVehD3RAkdQDay32A' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Youtube">
{{--                            <i class="{{ !empty($theme->youtube_icon) ? $theme->youtube_icon : 'fab fa-youtube' }}"></i>--}}
                            <i class="{{ !empty($theme->youtube_icon) ? $theme->youtube_icon : 'fa fa-youtube' }}"></i>
                            <i class="{{ !empty($theme->youtube_icon) ? $theme->youtube_icon : 'fa fa-youtube' }}"></i>
{{--                            <i class="fa fa-youtube"></i>--}}
{{--                            <i class="fa fa-youtube"></i>--}}
                        </a>
                        <a href="{{ !empty($theme->tiktok_link) ? $theme->tiktok_link : 'https://www.tiktok.com/@upcomingsounds' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Tiktok">
{{--                            <i class="{{ !empty($theme->tiktok_icon) ? $theme->tiktok_icon : 'fa-brands fa-tiktok' }}"></i>--}}
                            <i class="{{ !empty($theme->tiktok_icon) ? $theme->tiktok_icon : 'fab fa-tiktok' }}"></i>
                            <i class="{{ !empty($theme->tiktok_icon) ? $theme->tiktok_icon : 'fab fa-tiktok' }}"></i>
{{--                            <i class="fa-brands fa-tiktok"></i>--}}
                        </a>

                        <a href="{{ !empty($theme->reddit_link) ? $theme->reddit_link : 'https://www.reddit.com/r/upcomingsounds/?utm_medium=android_app&utm_source=share' }}" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Reddit">
{{--                            <i class="{{ !empty($theme->reddit_icon) ? $theme->reddit_icon : 'fab fa-reddit' }}"></i>--}}
                            <i class="{{ !empty($theme->reddit_icon) ? $theme->reddit_icon : 'fa fa-reddit' }}"></i>
                            <i class="{{ !empty($theme->reddit_icon) ? $theme->reddit_icon : 'fa fa-reddit' }}"></i>
                        </a>

                        <a href="https://discord.com/invite/DHDChvkpny" target="_blank"
                           class="btn btn-icon btn-social btn-social-colored social_color"
                           title="Reddit">
                            <i class="fab fa-discord"></i>
                            <i class="fab fa-discord"></i>
                        </a>
{{--                        <a href="https://www.tiktok.com/@upcomingsounds_" target="_blank"--}}
{{--                           class="btn btn-icon btn-social btn-social-colored social_color tiktok_footer"--}}
{{--                           title="Tiktok">--}}
{{--                            <i class="iconify" data-icon="fa-brands:tiktok"></i>--}}
{{--                        </a>--}}
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
                            {{-- {{ dd(app('request'),config('app.locale')) }} --}}
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
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('card-gift')}}">Gift Card</a>
                                </li>
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
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="https://www.instagram.com/upcomingsounds_">Help</a>--}}
{{--                            </li>--}}
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/how-to-help')}}">Help</a>
                            </li>
                            @if(Auth::check())

                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('card-gift')}}">Gift Card</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-xs-6">
                    <h6 class="text-u-c m-b text-muted">Subscribe</h6>
                    <p>Do not want to miss our newsletter?</p>
                    <form class="m-b-1 basicform_with_reload" method="POST" action="{{route('newsLetter')}}">
                        @csrf
                        <div class="form-group">
                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your Subscriber email" required>
                            @error('email')
                                <small class="red-text" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>

                        <div class="form-group">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                            @error('g-recaptcha-response')
                                <small class="red-text" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-sm btn-outline b-dark rounded basicbtn">Subscribe
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
                        <small class="text-muted">&copy; @php echo date('Y'); @endphp  <a href="https://upcomingsounds.com/" target="_blank">UpcomingSounds.com</a> {{ !empty($theme->footer_description) ? $theme->footer_description : 'All rights reserved.' }}</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('welcome-panels.generic-model')
