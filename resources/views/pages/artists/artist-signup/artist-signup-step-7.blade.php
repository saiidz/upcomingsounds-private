{{-- layout --}}
@extends('layouts.guest')

{{-- page title --}}
@section('title','Artist Signup Step Three')

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
                    <h4><span class="saiidzeidan">Saiidzeidan</span> from Upcoming Sounds</h4>
                    <p class="text-muted m-y">
                        Thank you for all this info! Before finalising your signup one last thing...
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            <div class="col s9 sTep4">
                <div class="container">
                    <!-- Input Fields -->
                    <div class="row">
                        <div class="col s12">
                            <div id="snackbarError"></div>
                            <div id="input-fields" class="card card-tabs cardsTep2">
                                <div class="card-content">
                                    <div id="view-input-fields">
                                        <div class="row">
                                            <div class="col s12 m6 l10">
                                                <h4 class="card-title bold">How did you learn about Upcoming Sounds for first time?</h4>
                                            </div>
                                        </div>
                                        <div class="underline"></div>
                                        <div class="row">
                                            <div class="col s12">
                                                <form method="POST" action="{{route('artist.signup.step.7.post')}}"
                                                      enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="section mt-2" id="faq">
                                                        <p class="mb-1">
                                                            <label>
                                                                <input type="radio" class="" name="come_upcoming"  value="1" />
                                                                <span>Social Networks (Facebook, Instagram)</span>
                                                            </label>
                                                        </p>
                                                        <p class="mb-1">
                                                            <label>
                                                                <input type="radio" class="" name="come_upcoming"  value="2" />
                                                                <span>YouTube</span>
                                                            </label>
                                                        </p>
                                                        <p class="mb-1">
                                                            <label>
                                                                <input type="radio" class="" name="come_upcoming"  value="3" />
                                                                <span>SEvent (conference, forum, concert)</span>
                                                            </label>
                                                        </p>
                                                        <p class="mb-1">
                                                            <label>
                                                                <input type="radio" class="" name="come_upcoming"  value="4" />
                                                                <span>A friend / artist told me about it</span>
                                                            </label>
                                                        </p>
                                                        <p class="mb-1">
                                                            <label>
                                                                <input type="radio" class="" name="come_upcoming"  value="5" />
                                                                <span>Through someone from the Upcoming Sounds Team</span>
                                                            </label>
                                                        </p>
                                                        <p class="mb-1">
                                                            <label>
                                                                <input type="radio" class="" name="come_upcoming"  value="6" />
                                                                <span>Google Search</span>
                                                            </label>
                                                        </p>
                                                        <p class="mb-1">
                                                            <label>
                                                                <input type="radio" class="" name="come_upcoming"  value="7" />
                                                                <span>Upcoming Sounds Blog</span>
                                                            </label>
                                                        </p>
                                                        <p class="mb-1">
                                                            <label>
                                                                <input type="radio" class="" name="come_upcoming"  value="8" />
                                                                <span>In a mail / newsletter</span>
                                                            </label>
                                                        </p>
                                                        <p class="mb-1">
                                                            <label>
                                                                <input type="radio" class="" name="come_upcoming"  value="9" />
                                                                <span>Through a media / radio / label using Upcoming Sounds</span>
                                                            </label>
                                                        </p>
                                                        <p class="mb-1">
                                                            <label>
                                                                <input type="radio" class="" name="come_upcoming"  value="10" />
                                                                <span>In a news article mentioning Upcoming Sounds</span>
                                                            </label>
                                                        </p>
                                                        <p class="mb-1">
                                                            <label>
                                                                <input type="radio" class="" name="come_upcoming"  value="11" />
                                                                <span>Through another plateform, a partner or a springboard</span>
                                                            </label>
                                                        </p>
                                                        <p class="mb-1">
                                                            <label>
                                                                <input type="radio" class="" name="come_upcoming"  value="12" />
                                                                <span>Through Soonvibes</span>
                                                            </label>
                                                        </p>
                                                    </div>

                                                    <div class="row">
                                                        <div class="input-field col s12">
                                                            <a class="tellMeMore left"
                                                               onclick="window.history.go(-1); return false;"
                                                               href="javascript:void(0)">Previous
                                                            </a>
                                                            <button class="tellMeMore right" style="border:none;"
                                                                    type="submit">Next
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
    <script>
        // $(document).ready(function(e){
        //     $("#releasedSoon1 *").prop("disabled", "disabled");
        // });
        // $(document).ready(function(e){
        //     $("#releasedSoon2 *").prop("disabled", "disabled");
        // });
        // $("#releasedSoon1").prop("disabled",true);
        // $("#releasedSoon2").prop("disabled",true);

        $("#releasedSoon1").hide();
        $("#releasedSoon2").hide();

        function releasedSoonChanged(){
            if($('.releasedSoon').is(":checked")){
                $("#releasedSoon2").hide();
                $("#releasedSoon1").show();
            }
        }

        function alreadyReleasedChanged(){
            if($('.alreadyReleased').is(":checked")){
                $("#releasedSoon1").hide();
                $("#releasedSoon2").show();
            }
        }
        // var checkedValue = document.getElementsByClassName('.messageCheckbox:checked').value;
        // $('#releasedSoon').click(function (){
        //     alert($('#releasedSoon').is(':checked'));
        //     document.getElementById('releasedSoon1').style = 'block';
        // })
        // $("input:checkbox:not(:checked)")
        // $(".messageCheckbox:checked").change(function () {
        //     console.log('checkedValue');
        // });
    </script>
@endsection
