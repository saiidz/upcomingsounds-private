<style>
    .cookiealert {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        margin: 0 !important;
        z-index: 999;
        opacity: 0;
        visibility: hidden;
        border-radius: 0;
        transform: translateY(100%);
        transition: all 500ms ease-out;
        color: #ecf0f1;
        background: #02b875 !important;
    }

    .cookiealert.show {
        opacity: 1;
        visibility: visible;
        transform: translateY(0%);
        transition-delay: 1000ms;
    }

    .cookiealert a {
        text-decoration: underline
    }

    .cookiealert .acceptcookies {
        margin-left: 10px;
        vertical-align: baseline;
    }
    .acceptcookies {
        background-color: #1f1f25;
    }
    .btn.acceptcookies:not([disabled]):hover, .btn.acceptcookies:not([disabled]):focus, .btn.acceptcookies:not([disabled]).active{
        box-shadow: inset 0 -10rem 0px rgb(158 158 158 / 10%);
    }
</style>

<div class="alert text-center cookiealert" role="alert">
    <b>Do you like cookies?</b> &#x1F36A; We use cookies to ensure you get the best experience on our website. <a
        href="{{url('privacy-policy')}}" target="_blank" style="background-color: transparent !important; color:#fff">Learn more</a>
    <button type="button" class="btn btn-sm acceptcookies circle black p-x-md">
{{--    <button type="button" class="btn btn-sm acceptcookies circle white p-x-md">--}}
        I agree
    </button>
</div>
{{--<div class="js-cookie-consent cookie-consent fixed bottom-0 inset-x-0 pb-2">--}}
{{--    <div class="max-w-7xl mx-auto px-6">--}}
{{--        <div class="p-2 rounded-lg bg-yellow-100">--}}
{{--            <div class="flex items-center justify-between flex-wrap">--}}
{{--                <div class="w-0 flex-1 items-center hidden md:inline">--}}
{{--                    <p class="ml-3 text-yellow-600 cookie-consent__message">--}}
{{--                        {!! trans('cookie-consent::texts.message') !!}--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                <div class="mt-2 flex-shrink-0 w-full sm:mt-0 sm:w-auto">--}}
{{--                    <a class="js-cookie-consent-agree cookie-consent__agree cursor-pointer flex items-center justify-center px-4 py-2 rounded-md text-sm font-medium text-yellow-800 bg-yellow-400 hover:bg-yellow-300">--}}
{{--                        {{ trans('cookie-consent::texts.agree') }}--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<script>
    (function () {
        "use strict";

        var cookieAlert = document.querySelector(".cookiealert");
        var acceptCookies = document.querySelector(".acceptcookies");

        if (!cookieAlert) {
            return;
        }

        cookieAlert.offsetHeight; // Force browser to trigger reflow (https://stackoverflow.com/a/39451131)

        // Show the alert if we cant find the "acceptCookies" cookie
        if (!getCookie("acceptCookies")) {
            cookieAlert.classList.add("show");
        }

        // When clicking on the agree button, create a 1 year
        // cookie to remember user's choice and close the banner
        acceptCookies.addEventListener("click", function () {
            setCookie("acceptCookies", true, 365);
            cookieAlert.classList.remove("show");

            // dispatch the accept event
            window.dispatchEvent(new Event("cookieAlertAccept"))
        });

        // Cookie functions from w3schools
        function setCookie(cname, cvalue, exdays) {
            var d = new Date();
            d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
            var expires = "expires=" + d.toUTCString();
            document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
        }

        function getCookie(cname) {
            var name = cname + "=";
            var decodedCookie = decodeURIComponent(document.cookie);
            var ca = decodedCookie.split(';');
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) === ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(name) === 0) {
                    return c.substring(name.length, c.length);
                }
            }
            return "";
        }
    })();
</script>
