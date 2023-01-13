<fieldset class="active__form" id="form2">
    <div class="sub__title__container">
        <p>Step 2/3</p>
        <h2>Right now... What are you looking for?</h2>
        <p>Choosing any of these options will let us guide you to the media outlets, curators, and music professionals who best meet your needs. At UpcomingSounds, we guarantee that they'll listen to your track and give you feedback. If your music catches their attention, they are likely to share it or contact you!!</p>
        <span class="text-muted">Your answer is private and will not be shared with influencers.</span>
    </div>
    <div class="input__container">
        <div class="selection selection_media exitB" id="getVisibility1" onclick="stepTwoMediaTrack()">
            <div class="imoji">
                <img src="{{asset('images/get.svg')}}">
{{--                <img src="{{asset('images/objective_visibility.png')}}">--}}
                {{--                                                    <ion-icon name="business"></ion-icon>--}}
            </div>
            <div class="descriptionTitle">
                <h3>Get media coverage and social media exposure</h3>
                <p>Specifically, I am looking for YouTube uploads, playlist placements, radio broadcasts, social media posts, or reviews from media outlets.</p>
            </div>
            <div class="item-title bottom text-right form2CheckedBox">
                <input type="checkbox" class="stepTwoVisibility"  name="establish_receive_media" id="get_visibility" value="2" />
            </div>
        </div>
        <div class="selection selection_establish exitB" id="buildProfessional1" onclick="stepTwoEstablishTrack()">
            <div class="imoji">
                <img src="{{asset('images/establish .svg')}}">
{{--                <img src="{{asset('images/objective_partnerships.png')}}">--}}
                {{--                                                    <ion-icon name="business"></ion-icon>--}}
            </div>
            <div class="descriptionTitle">
                <h3>Establish my Professorial Music Career</h3>
                <p>It is my goal to secure record deals with labels, booking agents, publishers, and music supervisors (those who place music in movies or TV commercials).</p>
            </div>
            <div class="item-title bottom text-right form2CheckedBox">
                <input type="checkbox" class="stepTwoEstablish" name="establish_receive_media" id="get_establish" value="3"/>
            </div>
        </div>
        <div class="selection selection_received newB" id="receivedDetails1" onclick="stepTwoReceivedTrack()">
            <div class="imoji">
                <img src="{{asset('images/recieve.svg')}}">
{{--                <img src="{{asset('images/objective_coaching.png')}}">--}}
{{--                                                    <ion-icon name="happy"></ion-icon>--}}
            </div>
            <div class="descriptionTitle">
                <h3>Recieve Detailed Advice</h3>
                <p>I'm looking for professional feedback for my project and demos in order to know what to improve: arrangement, mixing, production, visual content.</p>
            </div>
            <div class="item-title bottom text-right form2CheckedBox">
                <input type="checkbox" class="stepTwoReceived" name="establish_receive_media" id="received_details" value="1" />
            </div>
        </div>

        <div class="sub__title__container">
            <h2>Please activate your campaign</h2>
{{--            <h2>Do you have a budget in mind?</h2>--}}
        </div>
        <div class="row item-list item-list-md m-b">
            <div class="col-sm-6 budgetMind" onclick="budgetMind('yes')" >
                <div class="item r" id="budgetMindYes" data-id="item-5">
                    <div class="item-info">
                        <div class="item-title bottom text-right">
                            <input type="checkbox" class="budgetYes budget_mind" name="pay_now" value="yes" />
                        </div>
                        <div class="item-title text-ellipsis">
                            <div>Start your campaign</div>
                        </div>
                        <div class="item-author text-sm text-ellipsis ">
                            <div class="text-muted">4 coverage plans to choose from</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 budgetMind" onclick="budgetMind('not')" >
                <div class="item r" id="budgetMindNot" data-id="item-5">
                    <div class="item-info">
                        <div class="item-title bottom text-right">
                            <input type="checkbox" class="budgetNot budget_mind" name="budget_not" value="not" />
                        </div>
                        <div class="item-title text-ellipsis">
                            <div>No, I don't have a specific budget in mind</div>
                        </div>
                        <div class="item-author text-sm text-ellipsis ">
                            <div class="text-muted">I'll see where the wind takes me</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
{{--        <div class="row item-list item-list-md m-b">--}}
{{--            <div class="col-sm-6 budgetMind" onclick="budgetMind('yes')" >--}}
{{--                <div class="item r" id="budgetMindYes" data-id="item-5">--}}
{{--                    <div class="item-info">--}}
{{--                        <div class="item-title bottom text-right">--}}
{{--                            <input type="checkbox" class="budgetYes budget_mind" name="budget_yes" value="yes" />--}}
{{--                        </div>--}}
{{--                        <div class="item-title text-ellipsis">--}}
{{--                            <div>Yes, I'd like to indicate my budget to UpcomingSounds</div>--}}
{{--                        </div>--}}
{{--                        <div class="item-author text-sm text-ellipsis ">--}}
{{--                            <div class="text-muted">It will allow me to be better directed</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-sm-6 budgetMind" onclick="budgetMind('not')" >--}}
{{--                <div class="item r itemNot" id="budgetMindNot" data-id="item-5">--}}
{{--                    <div class="item-info">--}}
{{--                        <div class="item-title bottom text-right">--}}
{{--                            <input type="checkbox" checked class="budgetNot budget_mind" name="budget_not" value="not" />--}}
{{--                        </div>--}}
{{--                        <div class="item-title text-ellipsis">--}}
{{--                            <div>No, I don't have a specific budget in mind</div>--}}
{{--                        </div>--}}
{{--                        <div class="item-author text-sm text-ellipsis ">--}}
{{--                            <div class="text-muted">I'll see where the wind takes me</div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="sub__title__container" id="yesTitle" style="display: none">--}}
{{--                <h5>We will highlight up to {{ allCurators() }} curators & pros who would suit you best ❤️</h5>--}}
{{--                <p>Catch our detailed advice to define the most adapted budget to invest on UpcomingSounds depending on your targets and to help you get the most out of your campaign!</p>--}}
{{--            </div>--}}
{{--            <div class="sub__title__container" id="notTitle">--}}
{{--                <h5>It will allow us to recommend the best curators & pros for you ❤️</h5>--}}
{{--                <p>Catch our detailed advice to define the most adapted budget to invest on UpcomingSounds depending on your targets and to help you get the most out of your campaign!</p>--}}
{{--            </div>--}}
{{--            <div class="form-group TrackReleased">--}}
{{--                <a href="javascript:void(0)" rel="noopener" class="tw-p-4 tw-mb-2 tw-mt-2">--}}
{{--                    <div class="tw-bg-white tw-rounded-sm tw-shadow tw-transition-shadow tw-duration-150 vCardContainer helpBlockContainer tw-p-4">--}}
{{--                        <div class="tw-flex">--}}
{{--                            <div class="logoContainer">--}}
{{--                                <img src="{{asset('images/favicon.png')}}" class="logo">--}}
{{--                            </div>--}}
{{--                            <div class="tw-flex tw-flex-col">--}}
{{--                                <span class="text 375:tw-mb-2">--}}
{{--                                    What budget should I invest in my UpcomingSounds campaign?--}}
{{--                                </span>--}}
{{--                                <span class="text description">--}}
{{--                                    How and how much to invest to optimize your results--}}
{{--                                </span>--}}
{{--                            </div>--}}
{{--                        </div> <!---->--}}
{{--                    </div>--}}
{{--                </a>--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="buttons">
            <a class="m-b-md rounded addTrack prev__btn" onclick="prevForm();">Back</a>
            <a class="m-b-md rounded addTrack rightNowClass" id="rightNowID" style="display:none;" data-id="" onclick="selectSelection()">Select Selection</a>
             <a class="m-b-md rounded addTrack nxt__btn twoStep" onclick="nextForm('step_two');">Next</a>
        </div>
    </div>
</fieldset>
