{{-- layout --}}
@extends('layouts.artist-guest')

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
    <div class="app-body">
        <div class="b-t">
            <div class="center-block text-center">
                <div class="p-a-md">
                    <div>
                        <h4><span class="Gary">Gary</span> from Upcoming Sounds</h4>
                        <p class="text-muted m-y">
                            Finally, can you tell us more about your timing with the track by {{(auth()->user()) ? auth()->user()->name : 'test'}} which you wish to send to curators and professionals on Upcoming Sounds?
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
                                <div id="input-fields" class="card card-tabs cardsTep2">
                                    <div class="card-content">
                                        <div id="view-input-fields">
                                            <div class="row">
                                                <div class="col s12">
                                                    <form method="POST" action="{{route('artist.signup.representative.step.7.post')}}"
                                                          enctype="multipart/form-data">
                                                        @csrf

                                                        <div class="section" id="faq">
                                                            <p class="mb-1">
                                                                <label>
                                                                    <input type="radio" class="bothchanged" onchange="bothChanged()" name="released"  value="1" />
                                                                    <span>The track is finished and already released</span>
                                                                </label>
                                                            </p>
                                                            <p class="mb-1">
                                                                <label>
                                                                    <input type="radio" class="releasedSoon" name="released" onchange="releasedSoonChanged()" value="2"/>
                                                                    <span>The track is finished and should be released soon</span>
                                                                </label>
                                                            <div class="input-field col s8" id="releasedSoon1">
                                                                <select name="released_finished">
                                                                    <option value="" disabled selected>Choose your option</option>
                                                                    <optgroup label="Days">
                                                                        <option value="today">today</option>
                                                                        <option value="tomorrow">tomorrow</option>
                                                                    </optgroup>
                                                                    <optgroup label="Weeks">
                                                                        <option value="this_week">this week</option>
                                                                        <option value="next_week">next week</option>
                                                                        <option value="in_2_weeks">in 2 weeks</option>
                                                                        <option value="in_3_weeks">in 3 weeks</option>
                                                                    </optgroup>
                                                                    <optgroup label="Months">
                                                                        <option value="in_1_month">in 1 month</option>
                                                                        <option value="in_2_month">in 2 month</option>
                                                                        <option value="in_3_month">in 3 month</option>
                                                                        <option value="in_4_month">in 4 month</option>
                                                                        <option value="in_5_month">in 5 month</option>
                                                                        <option value="in_6_month">in 6 month</option>
                                                                    </optgroup>
                                                                </select>
                                                                <label>The release is planned</label>
                                                            </div>
                                                            </p>
                                                            <p class="mb-1">
                                                                <label>
                                                                    <input type="radio" name="released" class="alreadyReleased" onchange="alreadyReleasedChanged()"  value="3" />
                                                                    <span>The track is currently in the creation / finalization phase</span>
                                                            <div class="input-field col s8" id="releasedSoon2">
                                                                <select name="released_current">
                                                                    <option value="" disabled selected>Choose your option</option>
                                                                    <optgroup label="Days">
                                                                        <option value="today">today</option>
                                                                        <option value="tomorrow">tomorrow</option>
                                                                    </optgroup>
                                                                    <optgroup label="Weeks">
                                                                        <option value="this_week">this week</option>
                                                                        <option value="next_week">next week</option>
                                                                        <option value="in_2_weeks">in 2 weeks</option>
                                                                        <option value="in_3_weeks">in 3 weeks</option>
                                                                    </optgroup>
                                                                    <optgroup label="Months">
                                                                        <option value="in_1_month">in 1 month</option>
                                                                        <option value="in_2_month">in 2 month</option>
                                                                        <option value="in_3_month">in 3 month</option>
                                                                        <option value="in_4_month">in 4 month</option>
                                                                        <option value="in_5_month">in 5 month</option>
                                                                        <option value="in_6_month">in 6 month</option>
                                                                    </optgroup>
                                                                </select>
                                                                <label>The release is planned</label>
                                                            </div>
                                                            </label>
                                                            </p>
                                                        </div>

                                                        <div class="section" id="faq">
                                                            <div class="faq row">
                                                                <div class="col s12 m12 l12">
                                                                    <ul class="collapsible categories-collapsible">
                                                                        <li class="active">
                                                                            <div class="collapsible-header">Q: Why share this information? <i class="material-icons">
                                                                                    keyboard_arrow_right </i></div>
                                                                            <div class="collapsible-body">
                                                                                <p>Only the Groover team has access to your answer, it will help us guide you towards the curators & pros at the right time. And don't worry, you'll be able to change this indicative release date whenever you want :)</p>
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
                                                                <button class="tellMeMore right RightSide" style="border:none;"
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
    </div>





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

        function bothChanged(){
            if($('.bothchanged').is(":checked")){
                $("#releasedSoon1").hide();
                $("#releasedSoon2").hide();
            }
        }
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
