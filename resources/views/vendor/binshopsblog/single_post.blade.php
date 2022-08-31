@extends("layouts.welcomeLayout",['title'=>$post->gen_seo_title()])

@section('blog-custom-css')
    <link type="text/css" href="{{ asset('binshops-blog.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/custom/blog/style.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/custom/blog/widgets.css') }}" rel="stylesheet">
    <link type="text/css" href="{{ asset('css/custom/blog/responsive.css') }}" rel="stylesheet">
    <style>
        .reply-btn {
            float: right !important;
        }
    </style>
@endsection

{{-- page title --}}
@section('title','Blog Detail')

@section("content")

    <div class="{{Auth::check() ? 'app-bodynew' : 'app-body'}}">
        <div class='container'>
            <div class='row'>
                <div class='col-sm-12 col-md-12 col-lg-12'>
                    @include("binshopsblog::partials.show_errors")
                </div>
            </div>
        </div>
{{-- {{ dd($post->post->author) }}} --}}
        <!-- Start Main content -->
        <main class="bg-grey pb-30">
            <div class="container single-content">
                <div class="entry-header entry-header-style-1 mb-50 pt-50">
                    @if(\Auth::check() && \Auth::user()->canManageBinshopsBlogPosts())
                        <a href="{{$post->edit_url()}}" class="btn btn-outline-secondary btn-sm pull-right float-right">Edit
                            Post</a>
                    @endif
                    <h1 class="entry-title mb-50 font-weight-900">
                        {{$post->title}}
                    </h1>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="entry-meta align-items-center meta-2 font-small color-muted">
                                <p class="mb-5">
                                    @if (!empty($post))
                                        <a class="author-avatar" href="javascript:void(0)">
                                            @if (!empty($post->post->author->profile))
                                                <img class="img-circle" src="{{ asset($post->post->author->profile) }}" alt="">
                                            @else
                                                <img class="img-circle" src="{{ asset('images/author.jpg') }}" alt="">
                                            @endif
                                        </a>
                                        By <a href="javascript:void(0)"><span class="author-name font-weight-bold">{{ $post->post->author->name }}</span></a>
                                    @else
                                        <a class="author-avatar" href="javascript:void(0)">
                                            <img class="img-circle" src="{{ asset('images/author.jpg') }}" alt="">
                                        </a>
                                        By <a href="javascript:void(0)"><span class="author-name font-weight-bold">Admin</span></a>
                                    @endif
                                </p>
                                <span class="mr-10"> {{date('d M Y', strtotime($post->post->posted_at))}}</span>
                                <span class="has-dot">{{ $post->post->posted_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <div class="col-md-6 text-right d-none d-md-inline">
                            {{-- <ul class="header-social-network d-inline-block list-inline mr-15">
                                <li class="list-inline-item text-muted"><span>Share this: </span></li>
                                <li class="list-inline-item"><a class="social-icon fb text-xs-center" target="_blank" href="#"><i class="elegant-icon social_facebook"></i></a></li>
                                <li class="list-inline-item"><a class="social-icon tw text-xs-center" target="_blank" href="#"><i class="elegant-icon social_twitter "></i></a></li>
                                <li class="list-inline-item"><a class="social-icon pt text-xs-center" target="_blank" href="#"><i class="elegant-icon social_pinterest "></i></a></li>
                            </ul> --}}
                        </div>
                    </div>
                </div>
                <!--end single header-->
                <figure class="image mb-30 m-auto text-center border-radius-10">
                    <?=$post->image_tag("large", false, 'border-radius-10'); ?>
                    {{-- <img class="border-radius-10" src="<?=$post->image_tag("medium", false, 'd-block mx-auto'); ?>" alt="{{$post->title}}"> --}}
                </figure>
                <!--figure-->
                <article class="entry-wraper mb-50">
                    <div class="mb-30 entry-main-content dropcap wow fadeIn animated">
                        {!! $post->post_body_output() !!}
                    </div>
                    @if (!empty($categories))
                        <div class="entry-bottom mt-50 mb-30 wow fadeIn animated">
                            <div class="tags">
                                <span>Tags: </span>
                                @foreach($categories as $category)
                                    <a href='{{$category->categoryTranslations[0]->url($locale)}}' rel="{{$category->categoryTranslations[0]->category_name}}">
                                            {{$category->categoryTranslations[0]->category_name}}
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <!--related posts-->
                    {{-- <div class="related-posts">
                        <div class="post-module-3">
                            <div class="widget-header-2 position-relative mb-30">
                                <h5 class="mt-5 mb-30">Related posts</h5>
                            </div>
                            <div class="loop-list loop-list-style-1">
                                <article class="hover-up-2 transition-normal wow fadeInUp  animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url(images/news-13.jpg)">
                                                    <a class="img-link" href="single.html"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category.html"><span class="post-cat text-primary">Food</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single.html">Helpful Tips for Working from Home as a Freelancer</a>
                                                    <span class="post-format-icon"><i class="elegant-icon icon_star_alt"></i></span>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">7 August</span>
                                                    <span class="time-reading has-dot">11 mins read</span>
                                                    <span class="post-by has-dot">3k views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="hover-up-2 transition-normal wow fadeInUp  animated">
                                    <div class="row mb-40 list-style-2">
                                        <div class="col-md-4">
                                            <div class="post-thumb position-relative border-radius-5">
                                                <div class="img-hover-slide border-radius-5 position-relative" style="background-image: url(images/news-4.jpg)">
                                                    <a class="img-link" href="single.html"></a>
                                                </div>
                                                <ul class="social-share">
                                                    <li><a href="#"><i class="elegant-icon social_share"></i></a></li>
                                                    <li><a class="fb" href="#" title="Share on Facebook" target="_blank"><i class="elegant-icon social_facebook"></i></a></li>
                                                    <li><a class="tw" href="#" target="_blank" title="Tweet now"><i class="elegant-icon social_twitter"></i></a></li>
                                                    <li><a class="pt" href="#" target="_blank" title="Pin it"><i class="elegant-icon social_pinterest"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-md-8 align-self-center">
                                            <div class="post-content">
                                                <div class="entry-meta meta-0 font-small mb-10">
                                                    <a href="category.html"><span class="post-cat text-success">Cooking</span></a>
                                                </div>
                                                <h5 class="post-title font-weight-900 mb-20">
                                                    <a href="single.html">10 Easy Ways to Be Environmentally Conscious At Home</a>
                                                </h5>
                                                <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                    <span class="post-on">27 Sep</span>
                                                    <span class="time-reading has-dot">10 mins read</span>
                                                    <span class="post-by has-dot">22k views</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div> --}}
                    <!--More posts-->
                    {{-- <div class="single-more-articles border-radius-5">
                        <div class="widget-header-2 position-relative mb-30">
                            <h5 class="mt-5 mb-30">You might be interested in</h5>
                            <button class="single-more-articles-close"><i class="elegant-icon icon_close"></i></button>
                        </div>
                        <div class="post-block-list post-module-1 post-module-5">
                            <ul class="list-post">
                                <li class="mb-30">
                                    <div class="d-flex hover-up-2 transition-normal">
                                        <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                            <a class="color-white" href="single.html">
                                                <img src="images/thumb-1.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.html">The Best Time to Travel to Cambodia</a></h6>
                                            <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                <span class="post-on">27 Jan</span>
                                                <span class="post-by has-dot">13k views</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="mb-10">
                                    <div class="d-flex hover-up-2 transition-normal">
                                        <div class="post-thumb post-thumb-80 d-flex mr-15 border-radius-5 img-hover-scale overflow-hidden">
                                            <a class="color-white" href="single.html">
                                                <img src="images/thumb-2.jpg" alt="">
                                            </a>
                                        </div>
                                        <div class="post-content media-body">
                                            <h6 class="post-title mb-15 text-limit-2-row font-medium"><a href="single.html">20 Photos to Inspire You to Visit Cambodia</a></h6>
                                            <div class="entry-meta meta-1 float-left font-x-small text-uppercase">
                                                <span class="post-on">27 August</span>
                                                <span class="post-by has-dot">14k views</span>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> --}}

                    <!--Comments-->
                    @if(config("binshopsblog.comments.type_of_comments_to_show","built_in") !== 'disabled')
                        <div class="" id='maincommentscontainer'>
                            <div class="comments-area">
                                <div class="widget-header-2 position-relative mb-30">
                                    <h5 class="mt-5 mb-30" id='binshopsblogcomments'>Comments</h5>
                                </div>
                                @include("binshopsblog::partials.show_comments")

                            </div>

                        </div>
                    @else
                        {{--Comments are disabled--}}
                    @endif

                </article>
            </div>
            <!--container-->
        </main>
        <!-- End Main content -->
            @include('welcome-panels.welcome-footer')
    </div>


@endsection

@section('blog-custom-js')
    <script src="{{asset('binshops-blog.js')}}"></script>
    <script src="{{asset('js/custom/blog/modernizr-3.6.0.min.js')}}"></script>
    {{-- <script src="{{asset('js/custom/blog/jquery-3.6.0.min.js')}}"></script> --}}
    <script src="{{asset('js/custom/blog/popper.min.js')}}"></script>
    <script src="{{asset('js/custom/blog/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/custom/blog/jquery.slicknav.js')}}"></script>
    <script src="{{asset('js/custom/blog/slick.min.js')}}"></script>
    <script src="{{asset('js/custom/blog/wow.min.js')}}"></script>
    <script src="{{asset('js/custom/blog/jquery.ticker.js')}}"></script>
    <script src="{{asset('js/custom/blog/jquery.vticker-min.js')}}"></script>
    <script src="{{asset('js/custom/blog/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('js/custom/blog/jquery.nice-select.min.js')}}"></script>
    <script src="{{asset('js/custom/blog/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('js/custom/blog/jquery.sticky.js')}}"></script>
    <script src="{{asset('js/custom/blog/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('js/custom/blog/waypoints.min.js')}}"></script>
    <script src="{{asset('js/custom/blog/jquery.theia.sticky.js')}}"></script>
    <script src="{{asset('js/custom/blog/main.js')}}"></script>
@endsection
