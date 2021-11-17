{{-- layout --}}
@extends('layouts.guest')

{{-- page title --}}
@section('title','Artist Signup ')

{{-- page style --}}
@section('page-style')
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('vendors/vendors.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-faq.css')}}">
@endsection

{{-- page content --}}
@section('content')

    <div class="b-t">
        <div class="center-block text-center">
            <div class="p-a-md">
                <div>
                    <h4><span class="saiidzeidan">Gary</span> from Upcoming Sounds</h4>
                    <p class="text-muted m-y">
                        Tell us about the first artist you want to promote on Upcoming Sounds
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
                                                <form method="POST" action="{{route('artist.signup.representative.step.3.post')}}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <div class="input-field col s12">
                                                                <input id="artist_name" class="@error('vehicle_image') is-invalid @enderror" name="artist_name" value="{{old('artist_name')}}" type="text">
                                                                <label for="artist_name">Your Artist name</label>
                                                                @error('artist_name')
                                                                <small class="red-text" role="alert">
                                                                    {{ $message }}
                                                                </small>
                                                                @enderror
                                                            </div>
                                                            <div class="input-field col s12">
                                                                <select id="country_name" name="country_name">
                                                                    <option value="" disabled selected>Her/his Country</option>
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
                                                    <div class="section" id="faq">
                                                        <div class="faq row">
                                                            <div class="col s12 m12 l12">
                                                                <ul class="collapsible categories-collapsible">
                                                                    <li class="active">
                                                                        <div class="collapsible-header">Q: Do you manage several artists? <i class="material-icons">
                                                                                keyboard_arrow_right </i></div>
                                                                        <div class="collapsible-body">
                                                                            <p>No worries, you will have the possibility to add as many artist profiles as you want once the registration is finished!</p>
                                                                        </div>
                                                                    </li>
                                                                    <li>
                                                                </ul>
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






@endsection


{{-- page script --}}
@section('page-script')
    <script src="{{asset('js/vendors.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
@endsection
