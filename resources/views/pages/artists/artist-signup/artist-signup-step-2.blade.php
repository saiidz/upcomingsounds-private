{{-- layout --}}
@extends('layouts.artist-guest')

{{-- page title --}}
@section('title','Artist Signup ')

{{-- page style --}}
@section('page-style')
{{--    <link rel="stylesheet" type="text/css" href="{{asset('vendors/vendors.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/style.css')}}">
    <style>
        ul:not(.browser-default) {
            padding-left: 0;
            list-style-type: none;
        }

        ul:not(.browser-default) > li {
            list-style-type: none;
        }
    </style>
@endsection

{{-- page content --}}
@section('content')
    <div class="app-body">
        <div class="b-t">
            <div class="center-block text-center">
                <div class="p-a-md">
                    <div>
                        <h4><span class="Gary">Gary</span> from Upcoming Sounds</h4>
                        <p class="text-muted m-y">
                            Great! Now tell us a bit more about you :)
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
                                                <div class="col s12">
                                                    <form method="POST" action="{{route('artist.signup.step.2.post')}}" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="input-field col s12">
                                                                    <input id="artist_name" class="@error('artist_name') is-invalid @enderror" name="artist_name" value="{{old('artist_name')}}" type="text">
                                                                    <label for="artist_name">Your Artist name</label>
                                                                    @error('artist_name')
                                                                    <small class="red-text" role="alert">
                                                                        {{ $message }}
                                                                    </small>
                                                                    @enderror
                                                                </div>
                                                                <div class="input-field col s12">
                                                                    <select id="country_name" name="country_name">
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
                                                        <div class="row">
                                                            <div class="input-field col s12">
    {{--                                                            <a class="tellMeMore left LeftSide" onclick="window.history.go(-1); return false;" href="javascript:void(0)">Previous--}}
    {{--                                                            </a>--}}
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
