@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Artist Submission')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/curator-dashboard.css') }}">
    <style>
        #loadings {
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->
        <div class="page-content">
            <div class="row-col">
                <div class="col-lg-9 b-r no-border-md">
                    <div class="padding">
                        <div class="page-title m-b">
                            <h1 class="inline m-a-0">Artist Submission</h1>
                            <div class="dropdown inline">
                                <button class="btn btn-sm no-bg h4 m-y-0 v-b dropdown-toggle text-primary" data-toggle="dropdown">All</button>
                                <div class="dropdown-menu"><a href="#" class="dropdown-item active">All</a> <a href="#" class="dropdown-item">acoustic</a> <a href="#" class="dropdown-item">ambient</a> <a href="#" class="dropdown-item">blues</a> <a href="#" class="dropdown-item">classical</a> <a href="#" class="dropdown-item">country</a> <a href="#" class="dropdown-item">electronic</a> <a href="#" class="dropdown-item">emo</a> <a href="#" class="dropdown-item">folk</a> <a href="#" class="dropdown-item">hardcore</a> <a href="#" class="dropdown-item">hip hop</a> <a href="#" class="dropdown-item">indie</a> <a href="#" class="dropdown-item">jazz</a> <a href="#" class="dropdown-item">latin</a> <a href="#" class="dropdown-item">metal</a> <a href="#" class="dropdown-item">pop</a> <a href="#" class="dropdown-item">pop punk</a> <a href="#" class="dropdown-item">punk</a> <a href="#" class="dropdown-item">reggae</a> <a href="#" class="dropdown-item">rnb</a> <a href="#" class="dropdown-item">rock</a> <a href="#" class="dropdown-item">soul</a> <a href="#" class="dropdown-item">world</a></div>
                            </div>
                        </div>
                        <div id="campaignAddRemove">
                            @include('pages.curators.collapsed_sidebar')
                        </div>
                        <div data-ui-jp="jscroll" class="jscroll-loading-center" data-ui-options="{
                    autoTrigger: true,
                    loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',
                    padding: 50,
                    nextSelector: 'a.jscroll-next:last'
                }">
                            <div class="jscroll-inner">
                                <div class="row">
                                    @if(count($campaigns) > 0)
                                        @foreach($campaigns as $campaign)
                                            <div class="col-xs-4 col-sm-4 col-md-3">
                                                <div class="item r" data-id="item-{{$campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$campaign->artistTrack->audio}}">
                                                    <div class="item-media">
                                                        @if(!empty($campaign->artistTrack->track_thumbnail))
                                                            <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$campaign->id}})"
                                                               style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$campaign->artistTrack->track_thumbnail}});"></a>
                                                        @else
                                                            <a href="javascript:void(0)" onclick="openNav({{$campaign->id}})" class="item-media-content"
                                                               style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                                        @endif

                                                        <div class="item-overlay center">
                                                            <button class="btn-playpause">Play</button>
                                                        </div>
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="item-overlay bottom text-right"><a href="#" class="btn-favorite"><i class="fa fa-heart-o"></i></a> <a href="#" class="btn-more" data-toggle="dropdown"><i class="fa fa-ellipsis-h"></i></a>
                                                            <div class="dropdown-menu pull-right black lt"></div>
                                                        </div>
                                                        <div class="item-title text-ellipsis">
                                                            <a href="javascript:void(0)" onclick="openNav({{$campaign->id}})">{{$campaign->artistTrack->name}}</a>
                                                        </div>
                                                        <div class="item-author text-sm text-ellipsis">
                                                            <a href="javascript:void(0)" class="text-muted">{{$campaign->package_name ?? '----'}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="item-title text-ellipsis">
                                            <h3 class="white" style="text-align:center;font-size: 15px;">Not Campaign Found</h3>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @include('pages.curators.panels.right-sidebar')
            </div>
        </div>
    <!-- ############ PAGE END-->
@endsection

@section('page-script')
    <script>
        var preload = document.getElementById("loadings");
        function loader(){
            preload.style.display='none';
        }
        function showLoader(){
            preload.style.display='block';
        }
    </script>
    <script>
        function openNav(campaign_id) {
            showLoader();
            //send ajax
            $.ajax({
                type: "GET",
                url: '{{route('get.active.campaign')}}',
                data: {campaign_id:campaign_id},
                dataType: 'json',
                success: function (data) {
                    loader();
                    if (data.success) {
                        $('#campaignAddRemove').empty();
                        $('#campaignAddRemove').html(data.campaign);
                        document.getElementById("mySidebarCollapsed").style.width = "490px";
                        document.getElementById("app-body").style.marginLeft = "490px";
                    }
                    if (data.error) {
                        toastr.error(data.error);
                    }
                },
            });
        }

        function closeNav() {
            document.getElementById("mySidebarCollapsed").style.width = "0";
            document.getElementById("app-body").style.marginLeft= "0";
        }
    </script>
@endsection
