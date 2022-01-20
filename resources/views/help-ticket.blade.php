{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Ticket Help')

@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/custom/help-ticket.css')}}">
@endsection

{{-- page content --}}
@section('content')
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

        <!-- ############ PAGE START-->
        <div class="hero fullscreen">
            <div class="hero-body">
                <div style="margin: auto">
                    <form class="frame p-0" method="POST" action="{{url('help/ticket')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="frame__body p-0">
                            <div class="row p-0 level fill-height">
                                <div class="col">
                                    <div class="space xlarge"></div>
                                    <div class="padded">
                                        <h1 class="u-text-center u-font-alt">Hello. How can we help you?</h1>
                                        <div class="divider"></div>
                                        <p class="u-text-center">Someone from the Upcoming Sounds community will try to answer your question</p>
                                        <div class="divider"></div>

                                        <div class="form-group">
                                            <label class="form-group-label">
                                                <span class="icon">
                                                    <i class="fa-wrapper fa fa-user"></i>
                                                </span>
                                            </label>
                                            <input type="text" name="name" value="{{old('name')}}" required class="form-group-input" placeholder="Enter your name" />
                                            @error('name')
                                                <small class="red-text" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-group-label">
                                                <span class="icon">
                                                    <i class="fa-wrapper fa fa-envelope"></i>
                                                </span>
                                            </label>
                                            <input type="email" name="email" value="{{old('email')}}" required class="form-group-input" placeholder="Enter your email" />
                                            @error('email')
                                                <small class="red-text" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label class="form-group-label">
                                                <span class="icon">
                                                    <i class="fa-wrapper fa fa-phone"></i>
                                                </span>
                                            </label>
                                            <input type="number" name="phone_number" value="{{old('phone_number')}}" required class="form-group-input" placeholder="Enter your phone number" />
                                            @error('phone_number')
                                                <small class="red-text" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>

                                        <div class="form-section section-inline">
                                            <div class="section-body row">
                                                <div class="form-group col-6 pr-0">
                                                    <label class="form-group-label">
                                                        <span class="icon">
                                                            <i class="fa-wrapper fa fa-ticket"></i>
                                                        </span>
                                                    </label>
                                                    <select class="select form-group-input" id="ticket_issue" name="ticket_issue" required>
                                                        <option value="" disabled selected>Ticket Issue</option>
                                                        <option value="Artist support">Artist support</option>
                                                        <option value="Influencer support">Influencer support</option>
                                                        <option value="Tastemaker  support">Tastemaker  support</option>
                                                        <option value="Payment / Credit / Wallet support">Payment / Credit / Wallet support</option>
                                                        <option value="Account / Technical support">Account / Technical support</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-6 pr-0">
                                                    <label class="form-group-label">
                                                        <span class="icon">
                                                            <i class="fa-wrapper fa fa-list"></i>
                                                        </span>
                                                    </label>
                                                    <select id="country_name" name="country_name" required>
                                                        <option value="" disabled selected>Choose Country</option>
                                                        @isset($countries)
                                                            @foreach($countries as $country)
                                                                <option value="{{$country->id}}"
                                                                        class="@error('country_name') is-invalid @enderror">{{$country->name}}</option>
                                                            @endforeach
                                                        @endisset
                                                    </select>
                                                    @error('country_name')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="form-group-label">
                                                <span class="icon">
                                                    <i class="fa-wrapper fa fa-file-upload"></i>
                                                </span>
                                            </label>
                                            <input type="file" name="image" required class="form-group-input" id="image" accept=".png, .jpg, .jpeg" />
                                            @error('image')
                                                <small class="red-text" role="alert">
                                                    {{ $message }}
                                                </small>
                                            @enderror
                                        </div>

                                        <div class="imgPreview">
                                            <img src=""
                                                 id="imgPreview" style="display:none; width: 300px;">
                                        </div>

                                        <textarea name="description" placeholder="Tell us what's wrong" required></textarea>
                                        @error('description')
                                            <small class="red-text" role="alert">
                                                {{ $message }}
                                            </small>
                                        @enderror

                                        <div class="form-group">
                                            {!! NoCaptcha::renderJs() !!}
                                            {!! NoCaptcha::display() !!}
                                            @error('g-recaptcha-response')
                                            <small class="red-text ml-10" role="alert">
                                                {{ $message }}
                                            </small>
                                            @enderror
                                        </div>

                                        <div class="space"></div>

                                        <div class="btn-group u-pull-right">
                                            <button type="submit" class="btn circle btn-outline b-primary p-x-md auth_btn Rigister">Send</button>
                                        </div>

                                    </div>
                                    <div class="space xlarge"></div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- ############ PAGE END-->

    </div>
    @include('welcome-panels.welcome-footer')
@endsection

@section('page-script')
<script>
    // Image Track Song Preview
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                document.getElementById('imgPreview').setAttribute('src', e.target.result );
                $('#imgPreview').hide();
                $('#imgPreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#image").change(function () {
        readURL(this);
    });
</script>
@endsection
