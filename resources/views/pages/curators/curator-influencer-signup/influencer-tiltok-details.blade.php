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
                        <h4><span class="saiidzeidan">Gary</span> from UpcomingSounds</h4>
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
                                                    <h2 class="card-title bold" style="font-size: 20px;">How UpcomingSounds works</h2>
                                                    <ul class="instagram_details">
                                                        <li class="text-muted">Musicians /artists will send you music.</li>
                                                        <li class="text-muted">You will need to listen and decide if you like their music and share it (or not).</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <h2 class="card-title bold" style="font-size: 20px;">Guaranteed shares</h2>
                                                    <ul class="instagram_details">
                                                        <li class="text-muted">You are required to share each submission that you receive to get paid via UpcomingSounds.</li>
                                                        <li class="text-muted">If you decide not to share their song, you will not get paid. A refund will be issued to the artists.</li>
                                                        <li class="text-muted">TIf you are not a verified influencer, you will receive the standard fee of 1 USC coin = 1 GBP. For verified influencers, submissions pay between $1 and $120, depending on your engagement and followers. (you can apply for verification in your dashboard.</li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col s12">
                                                    <h2 class="card-title bold" style="font-size: 20px;">Sharing songs</h2>
                                                    <ul class="instagram_details">
                                                        <li class="text-muted">Use their song as background music in your TikTok videos or upload a video to say what you like about their music</li>
                                                        <li class="text-muted">If your shares are high quality, artists will want to send you more songs to promote and you will make more money</li>
                                                        <li class="text-muted">If someone complains we might have to refund them, so make it a good share!</li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="view-input-fields">
                                            <div class="row">
                                                <div class="col s12">
                                                    <form method="POST" action="{{route('influencer.signup.step.4.post')}}" id="mobile-login-form" enctype="multipart/form-data">
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
