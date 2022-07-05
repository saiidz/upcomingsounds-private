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
                                                    <form action="{{ route('re.apply.store',$user->id) }}" method="POST">
                                                        @csrf
                                                        <h2 class="card-title bold" style="font-size: 20px; text-align:center;"> Upcomingsounds</h2>
                                                        <p class="m-b-md" style="text-align:center;">Someone from the Upcomingsounds community will try to answer your question.</p>
                                                        <p class="m-b-md" style="text-align:center;">Please describe your issue in a few words.</p>
                                                        <textarea name="re_apply_information" required>{{ !empty($re_apply_user) ? $re_apply_user->description : '' }}</textarea>
                                                        <div style="text-align:right" class="m-t-2">
                                                            <button class="btn btn-sm rounded primary">Submit</button>​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​​
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
    {{-- CkEditor --}}
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 're_apply_information' );
    </script>
    <script src="{{asset('js/vendors.min.js')}}"></script>
    <script src="{{asset('js/plugins.js')}}"></script>
    <script src="{{asset('js/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('js/intlTelInput.min.js')}}"></script>
@endsection
