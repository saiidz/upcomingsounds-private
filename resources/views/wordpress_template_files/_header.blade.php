<div class="app-header navbar-md black box-shadow-z1 @if(Request::is('welcome-new') == 'true') weLcoMeHeaderHide @endif">
    <div class="navbar" data-pjax>
        <!-- brand -->
        <a href="{{url('/')}}" class="navbar-brand md">
            <img src="{{asset(!empty($theme->logo) ? $theme->logo : 'images/logo.png')}}" alt="">
        </a>
        <!-- / brand -->

        <!-- nabar right -->
        <ul class="nav navbar-nav pull-right">
            @if(Auth::check())

                @if(Auth::user()->type == 'artist')
                    <li class="nav-item">
                        <a href="{{url('/artist-profile')}}" class="nav-link">
                            <span class="btn btn-sm rounded primary _600">Dashboard</span>
                            {{-- <span class="nav-text">Dashboard</span> --}}
                        </a>
                    </li>
                @elseif(Auth::user()->type == 'curator')
                    <li class="nav-item">
                        <a href="{{url('/dashboard')}}" class="nav-link">
                            <span class="btn btn-sm rounded primary _600">Dashboard</span>
                        </a>
                    </li>
                @elseif(Auth::user()->type == 'admin' && Auth::user()->is_blog == 0)
                    <li class="nav-item">
                        <a href="{{url('/admin/dashboard')}}" class="nav-link">
                            <span class="btn btn-sm rounded primary _600">Dashboard</span>
                        </a>
                    </li>
                @else
                @endif
            @else
                <li class="nav-item">
                    <a href="{{ url('/for-curators') }}" class="nav-link">
                                <span class="btn btn-sm rounded primary _600 tastemakers_signup">
                                  For Curators
                                </span>
                    </a>
                    {{-- <a href="{{ route('curator.register') }}" class="nav-link">
                        <span class="btn btn-sm rounded primary _600 tastemakers_signup">
                          Apply as Tastemaker / Pro
                        </span>
                    </a> --}}
                </li>
                <li class="nav-item" id="Login">
                    <a href="{{ route('login') }}" class="nav-link" style="color:#fff">
                        Login
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/for-artists') }}" class="nav-link">
                                <span class="btn btn-sm rounded primary _600 tastemakers_signup">
                                  Submit Now
                                </span>
                    </a>
                </li>
            @endif

        </ul>
        <!-- / navbar right -->
    </div>
</div>
