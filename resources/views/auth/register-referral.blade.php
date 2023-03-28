{{-- layout --}}
@extends('layouts.guest')

{{-- page title --}}
@section('title','Referral Signup')

{{-- page content --}}
@section('content')

        <div id="snackbar"></div>
        <div id="snackbarError"></div>
        <div class="b-t">
            <div class="center-block w-xxl w-auto-xs p-y-md text-center">
                <div class="p-a-md">
                    <form method="POST" action="{{ url('/referral/register') }}" autocomplete="off">
                        @csrf
                        <input type="hidden" name="ref" value="{{ !empty($ref) ? $ref : '' }}">
                        <input type="text" class="form-control" value="Please Signup As Artist" readonly disabled>
{{--                        <div class="form-group">--}}
{{--                            <select name="type" id="registerValue" required class="form-control">--}}
{{--                                <option value="" disabled selected>Please Select Signup</option>--}}
{{--                                <option value="artist">Artist</option>--}}
{{--                                <option value="curator">Curator</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
                        <div class="form-group" id="name">
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Username" required>
                            @error('name')
                                <small class="red-text ml-10" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group" id="email">
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="Email" required>
                            @error('email')
                                <small class="red-text ml-10" role="alert">
                                    {{ $message }}
                                </small>
                            @enderror
                        </div>
                        <div class="form-group createPassword" id="password_block">
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
{{--                        <div class="form-group" id="address">--}}
{{--                            <input type="text" name="address" id="addressField"  class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" placeholder="Address">--}}
{{--                            @error('address')--}}
{{--                                <small class="red-text ml-10" role="alert">--}}
{{--                                    {{ $message }}--}}
{{--                                </small>--}}
{{--                            @enderror--}}
{{--                        </div>--}}
                        <div class="m-b-md text-sm">
                            <span class="text-muted">By clicking Sign Up, I agree to the</span>
                            <a href="{{url('/term-of-service')}}">Terms of service</a>
                            <span class="text-muted">and</span>
                            <a href="{{url('/privacy-policy')}}">Policy Privacy.</a>
                        </div>
                        <button type="submit" id="buttonRegister" class="btn circle btn-outline b-primary p-x-md auth_btn Rigister">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>
@endsection
{{-- page script --}}
@section('page-script')

<script>

    $('#registerValue').on('change', function(){
        // check artist come
        if(this.value == 'artist')
        {
            document.getElementById('name').style.display = "block";
            document.getElementById('email').style.display = "block";
            document.getElementById('password_block').style.display = "block";
            document.getElementById('buttonRegister').style.display = "inline";
            $("#addressField").prop('required',false);
            document.getElementById('address').style.display = "none";
        }

        // check curator
        if(this.value == 'curator')
        {
            document.getElementById('name').style.display = "block";
            document.getElementById('email').style.display = "block";
            document.getElementById('password_block').style.display = "block";
            $("#addressField").prop('required',true);
            document.getElementById('address').style.display = "block";
            document.getElementById('buttonRegister').style.display = "inline";
        }

    })

    $(".toggle-password").click(function () {
        $(this).toggleClass("show-pas");
        var input = $($(this).attr("toggle"));
        if (input.attr("type") == "password") {
            input.attr("type", "text");
        } else {
            input.attr("type", "password");
        }
    });

</script>
@endsection
