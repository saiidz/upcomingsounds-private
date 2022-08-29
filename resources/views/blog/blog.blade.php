{{-- layout --}}
@extends('layouts.welcomeLayout')

{{-- page title --}}
@section('title','Blog')

@section('page-style')
    <link rel="stylesheet" href="{{asset('css/custom/blog.css')}}" type="text/css" />
@endsection

{{-- page content --}}
@section('content')
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

        <!-- ############ PAGE START-->
        <div class="hero-wrap js-fullheight" style="background-image:url({{asset('images/blog-bg.jpg')}}); height: 700px;background-position: 50% 0px;"
             data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" style="height: 433px;padding-top: 190px;"
                     data-scrollax-parent="true">
                    <div class="col-md-12 ftco-animate">
                        <h1 class="mb-4 mb-md-0">UpcomingSounds blog</h1>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="text">
                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                                        there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                                        the Semantics, a large language ocean.</p>
                                    <div class="mouse">
                                        <a href="#" class="mouse-icon">
                                            <div class="mouse-wheel"><i class="fa fa-arrow-down"></i></div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="#" class="block-20" style="background-image: url({{asset('images/image_1.jpg')}});">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day">18</span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr">2021</span>
                                        <span class="mos">October</span>
                                    </div>
                                </div>
                                <h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <p><a href="#" class="btn-custom"><i class="fa fa-arrow-circle-right"></i>Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="#" class="block-20" style="background-image: url({{asset('images/image_2.jpg')}});">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day">18</span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr">2021</span>
                                        <span class="mos">October</span>
                                    </div>
                                </div>
                                <h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <p><a href="#" class="btn-custom"><i class="fa fa-arrow-circle-right"></i>Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="#" class="block-20" style="background-image: url({{asset('images/image_3.jpg')}});">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day">18</span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr">2021</span>
                                        <span class="mos">October</span>
                                    </div>
                                </div>
                                <h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <p><a href="#" class="btn-custom"><i class="fa fa-arrow-circle-right"></i>Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="#" class="block-20" style="background-image: url({{asset('images/image_4.jpg')}});">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day">18</span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr">2021</span>
                                        <span class="mos">October</span>
                                    </div>
                                </div>
                                <h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <p><a href="#" class="btn-custom"><i class="fa fa-arrow-circle-right"></i>Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="#" class="block-20" style="background-image: url({{asset('images/image_5.jpg')}});">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day">18</span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr">2021</span>
                                        <span class="mos">October</span>
                                    </div>
                                </div>
                                <h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <p><a href="#" class="btn-custom"><i class="fa fa-arrow-circle-right"></i>Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="#" class="block-20" style="background-image: url({{asset('images/image_6.jpg')}});">
                            </a>
                            <div class="text p-4 float-right d-block">
                                <div class="topper d-flex align-items-center">
                                    <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                        <span class="day">18</span>
                                    </div>
                                    <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                        <span class="yr">2021</span>
                                        <span class="mos">October</span>
                                    </div>
                                </div>
                                <h3 class="heading mb-3"><a href="#">All you want to know about industrial laws</a></h3>
                                <p>A small river named Duden flows by their place and supplies it with the necessary
                                    regelialia.</p>
                                <p><a href="#" class="btn-custom"><i class="fa fa-arrow-circle-right"></i>Read
                                        more</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    @include('welcome-panels.welcome-footer')
@endsection
