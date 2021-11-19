@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Add Your Track')

@section('page-style')
    <link rel="stylesheet" href="{{asset('css/custom/add-your-track.css')}}" type="text/css"/>
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">

        <div class="padding p-b-0">
            {{--            <div class="page-title m-b">--}}
            {{--                <h1 class="inline m-a-0">Add your track</h1>--}}
            {{--            </div>--}}

            <div class="row row-sm item-masonry item-info-overlay">
                <div class="col-sm-12 text-white m-b-sm">
                    <div class="form__container">
                        <div class="title__container">
                            <h1>Add your track</h1>
                            <div class="separator"></div>
                            {{--                            <p>Follow the 4 simple steps to complete your mapping</p>--}}
                        </div>
                        <div class="body__container">
                            <div class="left__container">
                                <div class="side__titles">
                                    <div class="title__name">
                                        <h3>My track</h3>
                                        <p>Step 1. In progress</p>
                                    </div>
                                    <div class="title__name">
                                        <h3>My selection</h3>
                                        <p>Step 2. Complete</p>
                                    </div>
                                    <div class="title__name">
                                        <h3>My messages</h3>
                                        <p>Step 3</p>
                                    </div>
                                    <div class="title__name">
                                        <h3>My recap</h3>
                                        <p>Step 4</p>
                                    </div>
                                    <div class="title__name">
                                        <h3>Complete</h3>
                                        <p>Finaly press submit</p>
                                    </div>
                                </div>
                                <div class="progress__bar__container">
                                    <ul>
                                        <li class="active" id="icon1">
                                            <i class="fa fa-unlock-alt"></i>
                                        </li>
                                        <li id="icon2">
                                            <i class="fa fa-unlock-alt"></i>
                                        </li>
                                        <li id="icon3">
                                            <i class="fa fa-unlock-alt"></i>
                                        </li>
                                        <li id="icon4">
                                            <i class="fa fa-unlock-alt"></i>
                                        </li>
                                        <li id="icon5">
                                            <i class="fa fa-unlock-alt"></i>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="right__container">
                                <fieldset id="form1">
                                    <div class="sub__title__container ">
                                        <p>Step 1/5</p>
                                        <h2>Which track would you like to send?</h2>
                                        <p>Here we go, let's launch this campaign together! To help you select the best
                                            influencers for you, we first need information about the your track</p>
                                    </div>
                                    <div class="input__container"><label for="name">Enter your name</label> <input
                                            type="text">
                                        <a class="nxt__btn" onclick="nextForm();"> Next</a>
                                    </div>
                                </fieldset>
                                <fieldset class="active__form" id="form2">
                                    <div class="sub__title__container">
                                        <p>Step 2/5</p>
                                        <h2>What best describes you ?</h2>
                                        <p>Please let us know what type of business best describes you as entreprenuer
                                            or businessman.</p>
                                    </div>
                                    <div class="input__container">
                                        <div class="selection newB">
                                            <div class="imoji">
                                                <ion-icon name="happy"></ion-icon>
                                            </div>
                                            <div class="descriptionTitle">
                                                <h3>New Business</h3>
                                                <p>Started trading in last 12 months</p>
                                            </div>
                                        </div>
                                        <div class="selection exitB">
                                            <div class="imoji">
                                                <ion-icon name="business"></ion-icon>
                                            </div>
                                            <div class="descriptionTitle">
                                                <h3>Existing Business</h3>
                                                <p>Have been operating beyond 12 months</p>
                                            </div>
                                        </div>
                                        <div class="buttons"><a class="prev__btn" onclick="prevForm();">Back</a> <a
                                                class="nxt__btn" onclick="nextForm();">Next</a></div>
                                    </div>
                                </fieldset>
                                <fieldset class="active__form" id="form3">
                                    <div class="sub__title__container">
                                        <p>Step 3/5</p>
                                        <h2>What service are looking for ?</h2>
                                        <p>Please let us know what type of business best describes you as entreprenuer
                                            or businessman.</p>
                                    </div>
                                    <div class="input__container">
                                        <div class="selection newB">
                                            <div class="imoji">
                                                <ion-icon name="desktop"></ion-icon>
                                            </div>
                                            <div class="descriptionTitle">
                                                <h3>Website Development</h3>
                                                <p>Development of online websites</p>
                                            </div>
                                        </div>
                                        <div class="selection exitB">
                                            <div class="imoji">
                                                <ion-icon name="phone-portrait"></ion-icon>
                                            </div>
                                            <div class="descriptionTitle">
                                                <h3>Development of Mobile App</h3>
                                                <p>Development of android and IOS mobile app</p>
                                            </div>
                                        </div>
                                        <div class="buttons"><a class="prev__btn" onclick="prevForm();">Back</a> <a
                                                class="nxt__btn" onclick="nextForm();">Next</a></div>
                                    </div>
                                </fieldset>
                                <fieldset class="active__form" id="form4">
                                    <div class="sub__title__container">
                                        <p>Step 4/5</p>
                                        <h2>Please select your budget</h2>
                                        <p>Please let us know budget for your project so yes are great that we can give
                                            the right quote thanks</p>
                                    </div>
                                    <div class="input__container"><input type="range" min="10000" max="500000"
                                                                         value="250000" class="slider">
                                        <div class="output__value"></div>
                                        <div class="buttons"><a class="prev__btn" onclick="prevForm();">Back</a> <a
                                                class="nxt__btn" onclick="nextForm();">Next</a></div>
                                    </div>
                                </fieldset>
                                <fieldset class="active__form" id="form5">
                                    <div class="sub__title__container">
                                        <p>Step 5/5</p>
                                        <h2>Complete Submission</h2>
                                        <p>Thanks for completing the form and for your time.Plss enter your email below
                                            and submit the form</p>
                                    </div>
                                    <div class="input__container"><label for="Email">Enter your email</label> <input
                                            type="text">
                                        <div class="buttons"><a class="prev__btn" onclick="prevForm();">Back</a> <a
                                                class="nxt__btn" id="submitBtn" onclick="nextForm();">Next</a></div>
                                    </div>
                                </fieldset>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- ############ PAGE END-->
@endsection

@section('page-script')
    <script>
        const nxtBtn = document.querySelector('#submitBtn');
        const form1 = document.querySelector('#form1');
        const form2 = document.querySelector('#form2');
        const form3 = document.querySelector('#form3');
        const form4 = document.querySelector('#form4');
        const form5 = document.querySelector('#form5');


        const icon1 = document.querySelector('#icon1');
        const icon2 = document.querySelector('#icon2');
        const icon3 = document.querySelector('#icon3');
        const icon4 = document.querySelector('#icon4');
        const icon5 = document.querySelector('#icon5');


        var viewId = 1;

        function nextForm() {
            console.log("hellonext");
            viewId = viewId + 1;
            progressBar();
            displayForms();

            console.log(viewId);

        }

        function prevForm() {
            console.log("helloprev");
            viewId = viewId - 1;
            console.log(viewId);
            progressBar1();
            displayForms();
        }

        function progressBar1() {
            if (viewId === 1) {
                icon2.classList.add('active');
                icon2.classList.remove('active');
                icon3.classList.remove('active');
                icon4.classList.remove('active');
                icon5.classList.remove('active');
            }
            if (viewId === 2) {
                icon2.classList.add('active');
                icon3.classList.remove('active');
                icon4.classList.remove('active');
                icon5.classList.remove('active');
            }
            if (viewId === 3) {
                icon3.classList.add('active');
                icon4.classList.remove('active');
                icon5.classList.remove('active');
            }
            if (viewId === 4) {
                icon4.classList.add('active');
                icon5.classList.remove('active');
            }
            if (viewId === 5) {
                icon5.classList.add('active');
                nxtBtn.innerHTML = "Submit"
            }
            if (viewId > 5) {
                icon2.classList.remove('active');
                icon3.classList.remove('active');
                icon4.classList.remove('active');
                icon5.classList.remove('active');

            }
        }

        function progressBar() {
            if (viewId === 2) {
                icon2.classList.add('active');
            }
            if (viewId === 3) {
                icon3.classList.add('active');
            }
            if (viewId === 4) {
                icon4.classList.add('active');
            }
            if (viewId === 5) {
                icon5.classList.add('active');
                nxtBtn.innerHTML = "Submit"
            }
            if (viewId > 5) {
                icon2.classList.remove('active');
                icon3.classList.remove('active');
                icon4.classList.remove('active');
                icon5.classList.remove('active');

            }
        }

        function displayForms() {

            if (viewId > 5) {
                viewId = 1;
            }

            if (viewId === 1) {
                form1.style.display = 'block';
                form2.style.display = 'none';
                form3.style.display = 'none';
                form4.style.display = 'none';
                form5.style.display = 'none';


            } else if (viewId === 2) {
                form1.style.display = 'none';
                form2.style.display = 'block';
                form3.style.display = 'none';
                form4.style.display = 'none';
                form5.style.display = 'none';

            } else if (viewId === 3) {
                form1.style.display = 'none';
                form2.style.display = 'none';
                form3.style.display = 'block';
                form4.style.display = 'none';
                form5.style.display = 'none';
            } else if (viewId === 4) {
                form1.style.display = 'none';
                form2.style.display = 'none';
                form3.style.display = 'none';
                form4.style.display = 'block';
                form5.style.display = 'none';

            } else if (viewId === 5) {
                form1.style.display = 'none';
                form2.style.display = 'none';
                form3.style.display = 'none';
                form4.style.display = 'none';
                form5.style.display = 'block';

            }
        }

        // for slider

        var slider = document.querySelector(".slider");
        var output = document.querySelector(".output__value");
        output.innerHTML = slider.value;

        slider.oninput = function () {
            output.innerHTML = this.value;
        }
    </script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
@endsection

