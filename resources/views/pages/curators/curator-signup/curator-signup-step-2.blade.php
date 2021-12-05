{{-- layout --}}
@extends('layouts.curator-guest')

{{-- page title --}}
@section('title','Taste Maker Signup ')

{{-- page style --}}
@section('page-style')
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/materialize.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/themes/vertical-modern-menu-template/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/intlTelInput.css')}}"
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
                                                    <form method="POST" action="{{route('curator.signup.step.2.post')}}" id="mobile-login-form" enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col s12">
                                                                <div class="input-field col s12">
                                                                    <input id="tastemaker_name" class="@error('tastemaker_name') is-invalid @enderror" name="tastemaker_name" value="{{old('tastemaker_name')}}" type="text">
                                                                    <label for="tastemaker_name">Your Tastemaker name</label>
                                                                    @error('tastemaker_name')
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
                                                                <div class="input-field col s12">
                                                                    <h5 class="display-7">Your Phone Number</h5>
                                                                    <p class="text-muted text-md m-b-lg">We will send a verification code to this number.</p>
                                                                    @if(!empty(Auth::user()->phone_number) && Auth::user()->is_phone_verified == 1)
                                                                        <input id="phone" type="tel" inputmode="tel" value="{{Auth::user()->phone_number}}" class="phone" name="phone_pattern" required/>
                                                                        <input id="already_phone_pattern" name="phone_number" hidden>
                                                                    @else
                                                                        <input id="phone" type="tel" inputmode="tel" class="@error('phone_pattern') is-invalid @enderror" name="phone_pattern"  required/>
                                                                        <input name="phone_number" hidden>
                                                                    @endif
{{--                                                                    <input id="phone" type="tel" inputmode="tel" class="@error('phone_number') is-invalid @enderror" name="phone_number"  required/>--}}
                                                                    <small class="red-text ml-10 display-none" role="alert" id="errror-client-side">
                                                                    </small>
                                                                </div>
                                                                @error('phone_number')
                                                                <small class="red-text" role="alert">
                                                                    {{ $message }}
                                                                </small>
                                                                @enderror

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
    <script src="{{asset('js/jquery.inputmask.bundle.min.js')}}"></script>
    <script src="{{asset('js/intlTelInput.min.js')}}"></script>
<script>
    // const phoneInputField = document.querySelector("#phone");

    //Get
    var phone_number_isset = {!! json_encode(Auth::user()->phone_number) !!};
    var is_phone_verified_isset = {!! json_encode(Auth::user()->is_phone_verified) !!};
    if(phone_number_isset && is_phone_verified_isset){
        var bla = $('.phone').val();
        document.getElementById("already_phone_pattern").value = bla;
    }


    function getIp(callback) {
        fetch('https://ipinfo.io/json?token=db11cd33cacfad', { headers: { 'Accept': 'application/json' }})
            .then((resp) => resp.json())
            .catch(() => {
                return {
                    country: 'us',
                };
            })
            .then((resp) => callback(resp.country));
    }
    // const phoneInput = window.intlTelInput(phoneInputField, {
    //     initialCountry: "auto",
    //     geoIpLookup: getIp,
    //     utilsScript:
    //         "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    // });
    $(function () {
        var input = document.querySelectorAll("#phone");
        var iti_el = $(".iti.iti--allow-dropdown.iti--separate-dial-code");
        console.log(iti_el);
        if (iti_el.length) {
            iti.destroy();

            // Get the current number in the given format
        }
        for (var i = 0; i < input.length; i++) {
            iti = intlTelInput(input[i], {
                autoHideDialCode: false,
                autoPlaceholder: "aggressive",
                initialCountry: "auto",
                separateDialCode: true,
                preferredCountries: ["ru", "th"],
                customPlaceholder: function (
                    selectedCountryPlaceholder,
                    selectedCountryData
                ) {
                    return "" + selectedCountryPlaceholder.replace(/[0-9]/g, "_");
                },
                geoIpLookup: getIp,
                utilsScript:
                    "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            });
            $('input[name="phone_pattern"]').on(
                "focus click countrychange",
                function (e, countryData) {
                    var pl = $(this).attr("placeholder") + "";
                    var res = pl.replace(/_/g, "9");
                    if (res != "undefined") {
                        console.log(res);
                        $(this).inputmask(res, {placeholder: "_", clearMaskOnLostFocus: true});
                    }
                }
            );

            $('input[name="phone_pattern"]').on(
                "keyup",
                function (e, countryData) {
                    var intlNumber = iti.getNumber();
                    var intlCode    =   iti.getSelectedCountryData();
                    localStorage.setItem('countryCode',intlCode.dialCode);
                    console.log(intlCode.dialCode);

                    document.querySelector('[name="phone_number"]').value = intlNumber;
                }
            );
        }
    });

    document.getElementById('mobile-login-form').addEventListener('submit', function(e) {
        //mobile-login-form
        e.preventDefault()
        let phone_number = document.querySelector("input[name='phone_pattern']")
        let placeholder = phone_number.placeholder
        let value = phone_number.value.replace(/\D/g, "").length

        if((placeholder.indexOf(' ') != -1) && (placeholder.indexOf('-') == -1)) {
            if(value < placeholder.split(' ').join('').length) {
                return validateInput(placeholder.split(' ').join('').length)
            } else {
                this.submit()
            }
        } else if ((placeholder.indexOf(' ') == -1) && (placeholder.indexOf('-') != -1)) {
            if(value < placeholder.split('-').join('').length) {
                return validateInput(placeholder.split('-').join('').length)
            } else {
                this.submit()
            }
        }
    })

    const validateInput = (length) => {
        let elem = document.getElementById('errror-client-side')
        elem.innerHTML = 'Phone number must be' + length + ' characters.'
        elem.classList.remove('display-none')
    }

    // const phoneInputField = document.querySelector("#phone");
    // const phoneInput = window.intlTelInput(phoneInputField, {
    //     initialCountry: "auto",
    //     geoIpLookup: getIp,
    //     utilsScript:
    //         "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
    // });
    // const info = document.querySelector(".alert-info");
    //
    // function process(event) {
    //     event.preventDefault();
    //
    //     const phoneNumber = phoneInput.getNumber();
    //
    //     info.style.display = "";
    //     info.innerHTML = `Phone number in E.164 format: <strong>${phoneNumber}</strong>`;
    // }
</script>
@endsection
