@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Add Bidder')

@section('content')
    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
            <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Add Bidder</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="container">
                    <div class="section">
                        @if (Session::has('success') || $message = Session::has('error'))
                            <div class="card-alert card @if(Session::has('success')) green @else red @endif lighten-5 remove_message">
                                <div class="card-content @if(Session::has('success')) green-text @else red-text @endif">
                                    <p>{{ Session::get('success') ?? Session::get('error') }}</p>
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
                                            <form method="POST" action="{{route('bidders.store')}}"
                                                  enctype="multipart/form-data">
                                                @csrf
                                                <div class="row">
                                                    <div class="input-field col m6 s12">
                                                        <input id="name" class="@error('name') is-invalid @enderror"
                                                               name="name" value="{{old('name')}}" type="text">
                                                        <label for="name">Name</label>
                                                        @error('name')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                        @enderror
                                                    </div>
                                                    <div class="input-field col m6 s12">
                                                        <input id="email" class="@error('email') is-invalid @enderror"
                                                               name="email" value="{{old('email')}}" type="text">
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

                                                    {{-- <div class="input-field col m6 s12">
                                                        <input id="password" class="@error('password') is-invalid @enderror"
                                                               name="password" type="text">
                                                        <label for="password">Password</label>
                                                        @error('password')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                        @enderror
                                                    </div> --}}
                                                    <div class="input-field col m6 s12">
                                                        <input id="address" class="@error('address') is-invalid @enderror"
                                                               name="address" value="{{old('address')}}" type="text">
                                                        <label for="address">Address</label>
                                                        @error('address')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col m6 s12">
                                                        <input id="phone_number" class="@error('phone_number') is-invalid @enderror"
                                                               name="phone_number" value="{{old('phone_number')}}" type="tel">
                                                        <label for="phone_number">Phone Number</label>
                                                        @error('phone_number')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                        @enderror
                                                    </div>
                                                    <div class="input-field col m6 s12">
                                                        <select id="status" name="status">
                                                                <option value="active" class="@error('status') is-invalid @enderror">Active</option>
                                                                <option value="suspend" class="@error('status') is-invalid @enderror">Suspended</option>
                                                                <option value="block" class="@error('status') is-invalid @enderror">Blocked</option>
                                                        </select>
                                                        <label for="status">User Status</label>
                                                        @error('status')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="input-field col s12">
                                                        <button class="btn cyan waves-effect waves-light right"
                                                                type="submit">Create
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
    </script>
@endsection