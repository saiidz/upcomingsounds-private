<fieldset class="active__form" id="form3">
    <div class="sub__title__container">
        <p>Step 3/3</p>
        <h2>Choose Packages</h2>
        <p>Please select your package, if you have no UCS in your wallet. please go to <a href="{{ url('/wallet') }}" style="font-size:15px;color: #02b875 !important;">wallet</a> and purchased UCS credits</p>
    </div>
    <div class="input__container">
        <div class="selection selection_new selection_standard" id="cStandard" onclick="choosePackage('standard')">
            <div class="descriptionTitle">
                <h3>{{ App\Templates\IPackages::STANDARD }} </h3>
            </div>
            <h3>45 USC <img class="icon_UP" src="{{asset('images/coin_bg.png')}}"></h3>
            <div class="item-title bottom text-right form2CheckedBox">
                <input type="checkbox" class="stepThreeStandard" name="package_name" id="get_standard" value="standard"/>
                <input type="hidden" class="uscCredit" name="usc_credit" value="">
            </div>
        </div>
        <div class="selection selection_new selection_advanced" id="cAdvanced" onclick="choosePackage('advanced')">
            <div class="descriptionTitle">
                <h3>{{ App\Templates\IPackages::ADVANCED_FEATURED }}</h3>
            </div>
            <h3>60 USC <img class="icon_UP" src="{{asset('images/coin_bg.png')}}"></h3>
            <div class="item-title bottom text-right form2CheckedBox">
                <input type="checkbox" class="stepThreeAdvanced" name="package_name" id="get_advanced" value="advanced"/>
            </div>
        </div>
        <div class="selection selection_new selection_pro" id="cPro" onclick="choosePackage('pro')">
            <div class="descriptionTitle">
                <h3>{{ App\Templates\IPackages::PRO }}</h3>
            </div>
            <h3>80 USC <img class="icon_UP" src="{{asset('images/coin_bg.png')}}"></h3>
            <div class="item-title bottom text-right form2CheckedBox">
                <input type="checkbox" class="stepThreePro" name="package_name" id="get_pro" value="pro"/>
            </div>
        </div>
        <div class="selection selection_new selection_premium" id="cPremium" onclick="choosePackage('premium')">
            <div class="descriptionTitle">
                <h3>{{ App\Templates\IPackages::PREMIUM }}</h3>
            </div>
            <h3>100 USC <img class="icon_UP" src="{{asset('images/coin_bg.png')}}"></h3>
            <div class="item-title bottom text-right form2CheckedBox">
                <input type="checkbox" class="stepThreePremium" name="package_name" id="get_premium" value="premium"/>
            </div>
        </div>
        <div class="buttons"><a class="m-b-md rounded addTrack prev__btn" onclick="prevForm();">Back</a> <a
                class="m-b-md rounded addTrack nxt__btn threeStep" onclick="nextForm('step_three');">Pay Now</a></div>
    </div>
</fieldset>

{{--<fieldset class="active__form" id="form3">--}}
{{--    <div class="sub__title__container">--}}
{{--        <p>Step 3/4</p>--}}
{{--        <h2>What service are looking for ?</h2>--}}
{{--        <p>Please let us know what type of business best describes you as entreprenuer--}}
{{--            or businessman.</p>--}}
{{--    </div>--}}
{{--    <div class="input__container">--}}
{{--        <div class="selection newB">--}}
{{--            <div class="imoji">--}}
{{--                <img src="{{asset('images/objective_partnerships.png')}}">--}}
{{--                --}}{{--                                                    <ion-icon name="package_name"></ion-icon>--}}
{{--            </div>--}}
{{--            <div class="descriptionTitle">--}}
{{--                <h3>Website Development</h3>--}}
{{--                <p>Development of online websites</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="selection exitB">--}}
{{--            <div class="imoji">--}}
{{--                <ion-icon name="package_name-portrait"></ion-icon>--}}
{{--            </div>--}}
{{--            <div class="descriptionTitle">--}}
{{--                <h3>Development of Mobile App</h3>--}}
{{--                <p>Development of android and IOS mobile app</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="buttons"><a class="m-b-md rounded addTrack prev__btn" onclick="prevForm();">Back</a> <a--}}
{{--                class="m-b-md rounded addTrack nxt__btn" onclick="nextForm();">Next</a></div>--}}
{{--    </div>--}}
{{--</fieldset>--}}
