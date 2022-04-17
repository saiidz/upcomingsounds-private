{{-- layout --}}
@extends('layouts.curator-guest')

{{-- page title --}}
@section('title','Verify Otp Taste Maker Signup')

{{-- page style --}}
@section('page-style')
    {{--    <link rel="stylesheet" type="text/css" href="{{asset('vendors/vendors.min.css')}}">--}}
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/pages/page-faq.css')}}">
    <style>
        .digit-group input {
            width: 30px!important;
            height: 50px!important;
            background-color: #02b875!important;
            border: none!important;
            line-height: 50px!important;
            text-align: center!important;
            font-size: 24px!important;
            color: white!important;
            /*margin: 0 2px!important;*/
        }

        .splitter {
            padding: 0 5px!important;
            color: #02b875!important;
            font-size: 24px!important;
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
                        <h4><span class="Gary">Gary</span> from UpcomingSounds</h4>
                        <p class="text-muted m-y">
                          Excellent, and you are one step ahead. Simply enter the code you will receive by text message 
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- BEGIN: Page Main-->
        <div id="main">
            <div class="row">
                <div class="col s9 sTep3">
                    <div class="container">
                        <!-- Input Fields -->
                        <div class="row">
                            <div class="col s12">
                                <div id="input-fields" class="card card-tabs cardsTep2">
                                    <div class="card-content">
                                        <div class="card-title">
                                            <div class="row">
                                                <div class="col s12 m6 l10">
                                                    <h4 class="card-title bold">OTP Code Verification</h4>
                                                    <p class="text-muted text-md m-b-lg">Enter the OTP code you received.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="view-input-fields">
                                            <div class="row">
                                                <div class="col s12">
                                                    <form method="POST" action="{{route('curator.verify.otp.post')}}" class="digit-group" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="hidden" name="user_id" value="{{(!empty(Auth::user())) ? Auth::user()->id : ''}}">
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="input-field col s12">
                                                                    <input type="number" id="digit-1" name="otp[]" data-next="digit-2" required />
                                                                    <input type="number" id="digit-2" name="otp[]" data-next="digit-3" data-previous="digit-1" required />
                                                                    <input type="number" id="digit-3" name="otp[]" data-next="digit-4" data-previous="digit-2" required />
                                                                    <span class="splitter">&ndash;</span>
                                                                    <input type="number" id="digit-4" name="otp[]" data-next="digit-5" data-previous="digit-3" required />
                                                                    <input type="number" id="digit-5" name="otp[]" data-next="digit-6" data-previous="digit-4" required />
                                                                    <input type="number" id="digit-6" name="otp[]" data-next="digit-1" data-previous="digit-5" required />
                                                                </div>
                                                                @error('otp')
                                                                <small class="red-text ml-10" role="alert">
                                                                    {{ $message }}
                                                                </small>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col s12 m6 l10">
                                                                <p class="text-muted text-md m-b-lg">
                                                                    Did not receive the code
                                                                    <a href="javascript:void(0)" id="send_again" data-id="{{(Auth::user()) ? Auth::user()->id : ''}}" data-number="{{(Auth::user()) ? Auth::user()->phone_number : ''}}" onclick="sendAgain()">Send again</a> (<span id="count"></span>)
                                                                </p>
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
    <script>
        $('.digit-group').find('input').each(function() {
            $(this).attr('maxlength', 1);
            $(this).on('keyup', function(e) {
                var parent = $($(this).parent());

                if(e.keyCode === 8 || e.keyCode === 37) {
                    var prev = parent.find('input#' + $(this).data('previous'));

                    if(prev.length) {
                        $(prev).select();
                    }
                } else if((e.keyCode >= 48 && e.keyCode <= 57) || (e.keyCode >= 65 && e.keyCode <= 90) || (e.keyCode >= 96 && e.keyCode <= 105) || e.keyCode === 39) {
                    var next = parent.find('input#' + $(this).data('next'));

                    if(next.length) {
                        $(next).select();
                    } else {
                        if(parent.data('autosubmit')) {
                            parent.submit();
                        }
                    }
                }
            });
        });

        // send code again
        function sendAgain(){
            document.getElementById('send_again').style.pointerEvents="none";
            document.getElementById('send_again').style.cursor="default";
            var count=59;

            var counter=setInterval(timer, 1000); //1000 will  run it every 1 second

            function timer()
            {
                count=count-1;
                if (count <= -1)
                {
                    clearInterval(counter);
                    //counter ended, do something here
                    return;
                }

                //Do code for showing the number of seconds here
                document.getElementById("count").innerHTML=count;

                if(count <= 0){
                    document.getElementById('send_again').style.pointerEvents="auto";
                    document.getElementById('send_again').style.cursor="pointer";
                    document.getElementById("count").remove();
                }
            }
            var url = "{{url('/send-again-otp-code')}}";
            var user_id = $('#send_again').attr("data-id");
            var phone_number = $('#send_again').attr("data-number");

            $.ajax({
                type: "POST",
                url: url,
                data: {
                    user_id: user_id,
                    phone_number: phone_number,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success:function (data){

                    $('#snackbar').html(data.success);
                    $('#snackbar').addClass("show");
                    setTimeout(function () {
                        $('#snackbar').removeClass("show");
                    }, 5000);
                },
            });
        }
    </script>
@endsection
