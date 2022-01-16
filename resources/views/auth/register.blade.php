{{-- layout --}}
@extends('layouts.guest')

{{-- page title --}}
@section('title','Signup')

@section('page-style')
    <style>
        .artist_sides {
            height: 62px;
            font-size: 20px;
            padding-top: 17px;
        }
    </style>
@endsection

{{-- page content --}}
@section('content')

        <div id="snackbar"></div>
        <div id="snackbarError"></div>
        <div class="b-t">
            <div class="center-block w-xxl w-auto-xs p-y-md text-center">
                <div class="p-a-md">
                    <div>
                        <a href="{{ url('/login/google/?request_from=artist') }}" class="btn-block">
                            <img src="{{asset('images/google_new.png')}}" style="width: 100%;">
{{--                            <img src="{{asset('images/google_new.png')}}" style="width: 278px;height: 62px;">--}}
                            {{--                            <i class="fa fa-google pull-left"></i>--}}
                            {{--                            Sign up with Google--}}
                        </a>

                        <a href="{{ url('/login/facebook/?request_from=artist') }}" class="btn-block">
                            <img src="{{asset('images/facebook.png')}}"  style="width: 100%;">
                        </a>

                        <a href="{{ url('/login/twitter/?request_from=artist') }}" class="btn-block">
                            <img src="{{asset('images/twitter.png')}}"  style="width: 100%;">
                        </a>
                        <a href="{{url('/login/spotify/?request_from=artist')}}" style="background-color: #1ed760;;" class="btn btn-block artist_sides text-white m-b-sm">
                            <i class="fa fa-spotify pull-left"></i>
                            Sign up with Spotify
                        </a>
                    </div>
                    <div class="m-y text-sm">
                        OR
                    </div>

                    <form method="POST" action="{{ route('register') }}" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Username" required>
                            @error('name')
                            <small class="red-text ml-10" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required>
                            @error('email')
                            <small class="red-text ml-10" role="alert">
                                {{ $message }}
                            </small>
                            @enderror
                        </div>
                        <div class="form-group createPassword">
                              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password" placeholder="Password">
                            @error('password')
                            <small class="red-text ml-10" role="alert">
                                {{ $message }}
                            </small>
                            @enderror

                            <span toggle="#password" class="show-pas toggle-password create_password">
                            <img src="{{asset('images/toggle.svg')}}" alt="" class="password-toggle show" />
							<img src="{{asset('images/show-pas_black.svg')}}" alt="" class="password-toggle hide" />
									</span>
                        </div>
                        <div class="m-b-md text-sm">
                            <span class="text-muted">By clicking Sign Up, I agree to the</span>
                            <a href="{{url('/term-of-service')}}">Terms of service</a>
{{--                            <a href="javascript:void(0)" data-toggle="modal" data-target="#m-a-a" data-ui-toggle-class="zoom" data-ui-target="#animate">Terms of service</a>--}}
                            <span class="text-muted">and</span>
                            <a href="{{url('/privacy-policy')}}">Policy Privacy.</a>
{{--                            <a href="javascript:void(0)" data-toggle="modal" data-target="#m-a-a-policy" data-ui-toggle-class="zoom" data-ui-target="#animatepolicy">Policy Privacy.</a>--}}
                        </div>
                        <button type="submit" class="btn circle btn-outline b-primary p-x-md auth_btn Rigister">Sign Up</button>
{{--                        <button type="submit" class="btn btn-lg black p-x-lg">Sign Up</button>--}}
                    </form>

                    <div class="p-y-lg text-center">
                        <div>Already have an account? <a href="{{route('login')}}" class="text-primary _600">Sign in</a></div>
                    </div>
                </div>
            </div>
        </div>


        <!-- .Terms of service -->
        <div id="m-a-a" class="modal fade animate" data-backdrop="true">
            <div class="modal-dialog" id="animate">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Terms of service</h5>
                    </div>
                    <div class="modal-body text-center p-lg">
                        <p>Terms of service</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark-white p-x-md transparent  tellMeMore" data-dismiss="modal">No</button>
                        <button type="button" class="btn danger p-x-md transparent  tellMeMore" data-dismiss="modal">Yes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
        <!-- / .Terms of service -->

        <!-- .Policy Privacy -->
        <div id="m-a-a-policy" class="modal fade animate" data-backdrop="true">
            <div class="modal-dialog" id="animatepolicy">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Policy Privacy</h5>
                    </div>
                    <div class="modal-body text-center p-lg">
                        <p>Policy Privacy</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn dark-white p-x-md transparent tellMeMore" data-dismiss="modal">No</button>
                        <button type="button" class="btn danger p-x-md transparent tellMeMore " data-dismiss="modal">Yes</button>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
        <!-- / .Policy Privacy -->

    {{--<div id="register-page" class="row">--}}
    {{--  <div class="col s12 m6 l4 z-depth-4 card-panel border-radius-6 register-card bg-opacity-8">--}}
    {{--    <form class="login-form" method="POST" action="{{ route('register') }}">--}}
    {{--      @csrf--}}
    {{--      <div class="row">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <h5 class="ml-4">Register</h5>--}}
    {{--          <p class="ml-4">Join to our community now !</p>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row margin">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <i class="material-icons prefix pt-2">person_outline</i>--}}
    {{--          <input id="name" type="text" class="@error('name') is-invalid @enderror" name="name" value="{{ old('name') }}"--}}
    {{--            required autocomplete="name" autofocus>--}}
    {{--          <label for="name" class="center-align">Name</label>--}}
    {{--          @error('name')--}}
    {{--          <small class="red-text ml-10" role="alert">--}}
    {{--            {{ $message }}--}}
    {{--          </small>--}}
    {{--          @enderror--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row margin">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <i class="material-icons prefix pt-2">mail_outline</i>--}}
    {{--          <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email"--}}
    {{--            value="{{ old('email') }}" required autocomplete="email">--}}
    {{--          <label for="email">Email</label>--}}
    {{--          @error('email')--}}
    {{--          <small class="red-text ml-10" role="alert">--}}
    {{--            {{ $message }}--}}
    {{--          </small>--}}
    {{--          @enderror--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row margin">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <i class="material-icons prefix pt-2">lock_outline</i>--}}
    {{--          <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required--}}
    {{--            autocomplete="new-password">--}}
    {{--          <label for="password">Password</label>--}}
    {{--          @error('password')--}}
    {{--          <small class="red-text ml-10" role="alert">--}}
    {{--            {{ $message }}--}}
    {{--          </small>--}}
    {{--          @enderror--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row margin">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <i class="material-icons prefix pt-2">lock_outline</i>--}}
    {{--          <input id="password-confirm" type="password" name="password_confirmation" required--}}
    {{--            autocomplete="new-password">--}}
    {{--          <label for="password-confirm">Password again</label>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--        <div class="row margin">--}}
    {{--            <div class="input-field col s12">--}}
    {{--                <i class="material-icons prefix pt-2">location_on</i>--}}
    {{--                <input id="address" type="text" class="@error('address') is-invalid @enderror" name="address" value="{{ old('address') }}"--}}
    {{--                       required autocomplete="address" autofocus>--}}
    {{--                <label for="address" class="center-align">Address</label>--}}
    {{--                @error('address')--}}
    {{--                <small class="red-text ml-10" role="alert">--}}
    {{--                    {{ $message }}--}}
    {{--                </small>--}}
    {{--                @enderror--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--      <div class="row">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <button type="submit"--}}
    {{--            class="btn waves-effect waves-light border-round gradient-45deg-purple-deep-orange col s12">Register</button>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--      <div class="row">--}}
    {{--        <div class="input-field col s12">--}}
    {{--          <p class="margin medium-small"><a href="{{ route('login')}}">Already have an account? Login</a></p>--}}
    {{--        </div>--}}
    {{--      </div>--}}
    {{--    </form>--}}
    {{--  </div>--}}
    {{--</div>--}}
@endsection
{{-- page script --}}
@section('page-script')

<script>
    $(".toggle-password").click(function () {
        $(this).toggleClass("show-pas");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });
    {{--$.ajaxSetup({--}}
    {{--    headers: {--}}
    {{--        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')--}}
    {{--    }--}}
    {{--});--}}
    {{--function socialiteLogin(provider){--}}
    {{--    alert('{{url('login')}}/'+provider);--}}
    {{--    $.ajax({--}}
    {{--        type:"GET",--}}
    {{--        url:'{{url('login')}}/'+provider,--}}
    {{--        data:{--}}
    {{--            "_token": "{{ csrf_token() }}",--}}
    {{--            "artist": 'artist',--}}
    {{--        },--}}
    {{--        dataType: 'JSON',--}}
    {{--        success:function (data){--}}
    {{--            console.log(data);--}}
    {{--        },--}}
    {{--    });--}}
    {{--}--}}
</script>
@endsection
