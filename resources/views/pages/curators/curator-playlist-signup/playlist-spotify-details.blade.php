{{-- layout --}}
@extends('layouts.curator-guest')

{{-- page title --}}
@section('title','Taste Maker Signup ')

{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/style.css')}}">zz
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
                                        <div class="card-title">
                                            <div class="row">
                                                <div class="col s12">
                                                    <h2 class="card-title bold" style="font-size: 20px;">How Upcoming Sounds works</h2>
                                                    <ul class="instagram_details">
                                                        <li class="text-muted">Musicians send you music</li>
                                                        <li class="text-muted">You listen and decide to share it (or not)</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <h2 class="card-title bold" style="font-size: 20px;">"Premium" submissions</h2>
                                                    <ul class="instagram_details">
                                                        <li class="text-muted">You get paid per song</li>
                                                        <li class="text-muted">You have 48 hours to respond and must listen for at least 20 seconds</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <h2 class="card-title bold" style="font-size: 20px;">"Standard" submissions</h2>
                                                    <ul class="instagram_details">
                                                        <li class="text-muted">Free</li>
                                                        <li class="text-muted">You don't have to listen for very long</li>
                                                        <li class="text-muted">If you don't like it, you can "instant decline" with no feedback</li>
                                                        <li class="text-muted">If you share it, there's no money involved</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <h2 class="card-title bold" style="font-size: 20px;">Sharing songs</h2>
                                                    <ul class="instagram_details">
                                                        <li class="text-muted">Only share songs you really like</li>
                                                        <li class="text-muted">Most people approve 10% - 40% of their submissions</li>
                                                        <li class="text-muted">If users see that being shared by you helps them get more listeners, they'll send you more songs</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="view-input-fields">
                                            <div class="row">
                                                <div class="col s12">
                                                    <form method="POST" action="{{route('playlist.signup.step.4.post')}}" id="mobile-login-form" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="input-field col s12">
                                                                <button class="tellMeMore left LeftSide" onclick="window.history.go(-1); return false;" style="border:none;">Previous</button>
                                                                <button class="tellMeMore right RightSide" style="border:none;" type="submit">Next
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <div class="alert alert-info" style="display: none;"></div>
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
