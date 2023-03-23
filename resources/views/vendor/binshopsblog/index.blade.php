@extends("layouts.welcomeLayout",['title'=>$title])

@section('blog-custom-css')
    <link type="text/css" href="{{ asset('binshops-blog.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/custom/blog.css')}}" type="text/css" />
    <style>
        .svgCOlor {
            color: #02b875 !important;
        }
    </style>
@endsection

{{-- page title --}}
@section('title','Blog')

@section("content")
    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">

        @if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
            <div class="text-center">
                <p class='mb-1'>You are logged in as a blog admin user.
                    <br>
                    <a href='{{route("binshopsblog.admin.index")}}'
                        class='btn border  btn-outline-primary btn-sm '>
                        <i class="fa fa-cogs" aria-hidden="true"></i>
                        Go To Blog Admin Panel</a>
                </p>
            </div>
        @endif

        @php
            $theme = \App\Models\Option::where('key', 'theme_settings')->first();
            if(!empty($theme))
            {
                $theme = json_decode($theme->value);
            }
        @endphp
        <div class="hero-wrap js-fullheight" style="background-image:url({{asset(!empty($theme->blog_banner) ? $theme->blog_banner : 'images/blog-bg.jpg')}}); height: 700px;background-position: 50% 0px;"
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

        {{-- Post Code --}}
        <section class="ftco-section bg-light">
            <div class="container">
                <div class="row d-flex">
                    @forelse($posts as $post)
                        <div class="col-md-4 d-flex ftco-animate">
                            <div class="blog-entry justify-content-end">
                                <?=$post->image_tag("medium", true, 'postImg'); ?>
                                <div class="text p-4 float-right d-block">
                                    <div class="topper d-flex align-items-center">
                                        <div class="one py-2 pl-3 pr-1 align-self-stretch">
                                            <span class="day">{{date('d', strtotime($post->post->posted_at))}}</span>
                                        </div>
                                        <div class="two pl-0 pr-3 py-2 align-self-stretch">
                                            <span class="yr">{{date('Y', strtotime($post->post->posted_at))}}</span>
                                            <span class="mos">{{date('m', strtotime($post->post->posted_at))}}</span>
                                        </div>
                                    </div>
                                    <h3 class="heading mb-3"><a href="{{$post->url($locale)}}">{{$post->title}}</a></h3>
                                    <p>{!! mb_strimwidth($post->post_body_output(), 0, 400, "...") !!}</p>
                                    <p><a href="{{$post->url($locale)}}" class="btn-custom">Read More<i class="fa fa-arrow-circle-right svgCOlor"></i></a></p>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-md-12">
                            <div class='alert alert-danger'>No posts!</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </section>
        {{-- Post Code --}}

        {{-- <div class='col-sm-12 binshopsblog_container'>
            @if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
                <div class="text-center">
                    <p class='mb-1'>You are logged in as a blog admin user.
                        <br>
                        <a href='{{route("binshopsblog.admin.index")}}'
                           class='btn border  btn-outline-primary btn-sm '>
                            <i class="fa fa-cogs" aria-hidden="true"></i>
                            Go To Blog Admin Panel</a>
                    </p>
                </div>
            @endif

            <div class="row">
                <div class="col-md-9">

                    @if($category_chain)
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    @forelse($category_chain as $cat)
                                        / <a href="{{$cat->categoryTranslations[0]->url($locale)}}">
                                            <span class="cat1">{{$cat->categoryTranslations[0]['category_name']}}</span>
                                        </a>
                                    @empty @endforelse
                                </div>
                            </div>
                        </div>
                    @endif

                    @if(isset($binshopsblog_category) && $binshopsblog_category)
                        <h2 class='text-center'> {{$binshopsblog_category->category_name}}</h2>

                        @if($binshopsblog_category->category_description)
                            <p class='text-center'>{{$binshopsblog_category->category_description}}</p>
                        @endif

                    @endif

                    <div class="container">
                        <div class="row">
                            @forelse($posts as $post)
                                @include("binshopsblog::partials.index_loop")
                            @empty
                                <div class="col-md-12">
                                    <div class='alert alert-danger'>No posts!</div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h6>Blog Categories</h6>
                    <ul class="binshops-cat-hierarchy">
                        @if($categories)
                            @include("binshopsblog::partials._category_partial", [
                            'category_tree' => $categories,
                            'name_chain' => $nameChain = ""
                            ])
                        @else
                            <span>No Categories</span>
                        @endif
                    </ul>
                </div>
            </div>

            @if (config('binshopsblog.search.search_enabled') )
                @include('binshopsblog::sitewide.search_form')
            @endif
            <div class="row">
                <div class="col-md-12 text-center">
                    @foreach($lang_list as $lang)
                        <a href="{{route("binshopsblog.index" , $lang->locale)}}">
                            <span>{{$lang->name}}</span>
                        </a>
                    @endforeach
                </div>
            </div> --}}
            @include('welcome-panels.welcome-footer')
        {{-- </div> --}}
    </div>


@endsection
