{{-- layout --}}
@extends('layouts.curator-guest')

{{-- page title --}}
@section('title','Application Submission Rejected')

{{-- page style --}}
@section('page-style')
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
                        <h4><span class="Gary">Gary</span> from Upcoming Sounds</h4>
                        {{-- <p class="text-muted m-y">
                            Finally, you're done! You'll receive your application response shortly :D
                        </p> --}}
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
                                                    <h2 class="card-title bold" style="font-size: 20px; text-align:center;"> Upcomingsounds - Artist  </h2>
                                                    <p class="m-b-md" style="text-align:center;">Looks like you have already applied. The application was for: {{ ($request->user()) ? $request->user()->name : '' }} </p>
                                                    <p class="m-b-md" style="text-align:center;">Status - closed / declined</p>
                                                    <p class="m-b-md" style="text-align:center;">You re-applied within the last 45 days ({{ ($request->user()) ? Carbon\Carbon::parse($request->user()->created_at)->format('M d,Y') : '' }}). You should hear from us soon.</p>
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
    <script src="{{asset('js/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('js/intlTelInput.min.js')}}"></script>
@endsection
