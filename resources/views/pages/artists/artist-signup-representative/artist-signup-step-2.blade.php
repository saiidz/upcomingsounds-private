{{-- layout --}}
@extends('layouts.artist-guest')

{{-- page title --}}
@section('title','Artist Signup ')

{{-- page style --}}
@section('page-style')
{{--    <link rel="stylesheet" type="text/css" href="{{asset('vendors/vendors.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/style.css')}}">
@endsection

{{-- page content --}}
@section('content')
    <div class="app-body">
        <div class="b-t">
            <div class="center-block text-center">
                <div class="p-a-md">
                    <div>
                        <h4><span class="saiidzeidan">Gary</span> from Upcoming Sounds</h4>
                        <p class="text-muted m-y">
                            Delighted to meet an artist helper! What do you do exactly?
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN: Page Main-->
        <div id="main">
            <div class="row">
                <div class="col s9 sTep2">
                    <div class="container">
                        <!-- Input Fields -->
                        <div class="row">
                            <div class="col s12">
                                <div id="input-fields" class="card card-tabs cardsTep2">
                                    <div class="card-content">
                                        <div id="view-input-fields">
                                            <div class="row">
                                                <div class="col s12 m6 l10">
                                                    <h4 class="card-title bold">What kind of artist representative are you ?</h4>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <form method="POST" action="{{route('artist.signup.representative.step.2.post')}}" enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="col s12">
                                                                    <p class="mb-1">
                                                                        <label>
                                                                            <input type="checkbox" class="filled-in" name="artist_representative_record"  value="1" />
                                                                            <span>Record Label 🎧</span>
                                                                        </label>
                                                                        <label class="record_label">
                                                                            <input type="checkbox" class="filled-in" name="artist_representative_manager"  value="2" />
                                                                            <span>Manager 🚀</span>
                                                                        </label>
                                                                    </p>
                                                                </div>
                                                                <div class="col s12">
                                                                    <p class="mb-1">
                                                                        <label>
                                                                            <input type="checkbox" class="filled-in" name="artist_representative_press"  value="3" />
                                                                            <span>Press Officer 🎤</span>
                                                                        </label>
                                                                        <label class="record_label">
                                                                            <input type="checkbox" class="filled-in" name="artist_representative_publisher"  value="4" />
                                                                            <span>Publisher 🎯</span>
                                                                        </label>
                                                                    </p>
                                                                </div>
                                                                <div class="input-field col s12">
                                                                    <select id="country_name" name="artist_country_name">
                                                                        <option value="" disabled selected>Your Country of residence</option>
                                                                        @isset($countries)
                                                                            @foreach($countries as $country)
                                                                                <option value="{{$country->id}}"
                                                                                        class="@error('country_name') is-invalid @enderror">{{$country->name}}</option>
                                                                            @endforeach
                                                                        @endisset
                                                                    </select>
                                                                    @error('artist_country_name')
                                                                    <small class="red-text" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button class="tellMeMore left LeftSide" onclick="window.history.go(-1); return false;" style="border:none;">Previous</button>
                                                                <button class="tellMeMore right RightSide" style="border:none;" type="submit">Next
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
                        </div>
                    </div>
                    <div class="content-overlay"></div>
                </div>
            </div>
        </div>
        <!-- END: Page Main-->


    </div>



@endsection


{{-- page script --}}
@section('page-script')
    <script src="{{asset('js/vendors.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
@endsection
