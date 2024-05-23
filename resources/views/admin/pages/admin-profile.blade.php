@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Profile')

{{-- vendor styles --}}
@section('vendor-style')
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/animate-css/animate.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/chartist-js/chartist.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/chartist-js/chartist-plugin-tooltip.css')}}">
@endsection

{{-- page styles --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/dashboard-modern.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/intro.css')}}">
@endsection

@section('content')
    <!-- BEGIN: Page Main-->
    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            @include('admin.panels.bg-color')
            <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Update Profile</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="container">
                    <div class="section">
                        @if ($message = Session::get('success'))
                            <div class="card-alert card green lighten-5 remove_message">
                                <div class="card-content green-text">
                                    <p>{{ $message }}</p>
                                </div>
                                <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                    @endif

                    <!-- jQuery Plugin Initialization -->
                        <div class="row">
                            <!-- Form Advance -->
                            <div class="col s12 m12 l12">
                                <div id="Form-advance" class="card card card-default scrollspy">
                                    <div class="card-content">
                                        <form method="POST" action="{{url('/admin/update-profile',$profile->id)}}"
                                              enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <input id="name" class="@error('name') is-invalid @enderror"
                                                           name="name" value="{{$profile->name}}" type="text">
                                                    <label for="name">Name</label>
                                                    @error('name')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <input id="email" class="@error('email') is-invalid @enderror"
                                                           value="{{$profile->email}}" name="email" type="email">
                                                    <label for="email">Email</label>
                                                    @error('email')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row password_shows">
                                                <div class="input-field col m6 s12">
                                                    <input readonly value="{{$profile->type}}" type="text">
                                                    <label for="role">Role</label>
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <input id="password" class=" form-control validate @error('password') is-invalid @enderror"
                                                           name="password" type="password">
                                                    <label for="password">Password</label>
                                                    @error('password')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                    <span
                                                        toggle="#password"
                                                        class="show-pas toggle-password change_password"
                                                    ><img
                                                            src="{{asset('images/toggle.svg')}}"
                                                            alt=""
                                                            class="password-toggle showing"
                                                        />

                                                        <img
                                                            src="{{asset('images/show-pas_black.svg')}}"
                                                            alt=""
                                                            class="password-toggle hiding"
                                                        />
                                                    </span>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <input id="phone_number" class="@error('phone_number') is-invalid @enderror"
                                                           name="phone_number" value="{{$profile->phone_number}}" type="tel">
                                                    <label for="phone_number">Phone Number</label>
                                                    @error('phone_number')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="col m6 s12 file-field input-field">
                                                    <div class="btn float-right">
                                                        <span>Change Profile</span>
                                                        <input type="file" id="profile" class="@error('profile') is-invalid @enderror" name="profile" accept="image/jpeg,image/jpg,image/png">
                                                    </div>
                                                    <div class="file-path-wrapper">
                                                        <input class="validate" type="text" placeholder="Upload file">
                                                    </div>
                                                    @error('profile')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <input id="address" class="@error('address') is-invalid @enderror"
                                                            name="address" value="{{$profile->address}}" type="text">
                                                    <label for="address">Address</label>
                                                    @error('address')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if(!empty($profile->profile))
                                                <img src="{{URL('/')}}/uploads/user_profile/{{$profile->profile}}" id="profile_image" style="width: 400px;" alt="">
                                            @else
                                                <img src="" id="profile_image" style="width: 400px;" alt="" class="display-none">
                                            @endif

                                            <div class="row">
                                                <div class="input-field col s12">
                                                    <button class="btn cyan waves-effect waves-light right"
                                                            type="submit">Update
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->

@endsection

{{-- vendor scripts --}}
@section('vendor-script')
    <script src="{{asset('vendors/chartjs/chart.min.js')}}"></script>
    <script src="{{asset('vendors/chartist-js/chartist.min.js')}}"></script>
    <script src="{{asset('vendors/chartist-js/chartist-plugin-tooltip.js')}}"></script>
    <script src="{{asset('vendors/chartist-js/chartist-plugin-fill-donut.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-script')
    <script src="{{asset('js/scripts/dashboard-modern.js')}}"></script>
    <script src="{{asset('js/scripts/intro.js')}}"></script>
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

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        document.getElementById('profile').addEventListener('change', function (e){
            var file = e.target.files[0];
            if(file){
                var fileReader = new FileReader();
                fileReader.onload = (function(e) {
                    let image = document.getElementById('profile_image');
                    image.src = e.target.result;
                    image.classList.remove('display-none')
                });
                fileReader.readAsDataURL(file);

            }
        });
    </script>
@endsection
