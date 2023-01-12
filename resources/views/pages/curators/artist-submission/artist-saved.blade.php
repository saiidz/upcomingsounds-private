@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Saved')

@section('page-style')
    <link rel="stylesheet" href="{{ asset('css/curator-dashboard.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('css/gijgo.min.css')}}" type="text/css" />
    <style>
        #loadings {
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->
    <div id="campaignAddRemove">
        @include('pages.curators.collapsed_sidebar')
    </div>
    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b">
                        <h1 class="inline m-a-0">Saved</h1>
                    </div>
                    <div data-ui-jp="jscroll" class="jscroll-loading-center" data-ui-options="{
                autoTrigger: true,
                loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',
                padding: 50,
                nextSelector: 'a.jscroll-next:last'
              }">
                        <div class="jscroll-inner">
                            <div class="row">
                                @if(count($saved) > 0)
                                    @foreach($saved as $save)
                                        @if(!empty($save->campaign))
                                            <div class="col-xs-4 col-sm-4 col-md-3">
                                                <div class="item r" data-id="item-{{$save->campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$save->campaign->artistTrack->audio}}">
                                                    <div class="item-media">
                                                        @if(!empty($save->campaign->artistTrack->track_thumbnail))
                                                            <a href="javascript:void(0)" class="item-media-content" onclick="openNav({{$save->campaign->id}})"
                                                               style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$save->campaign->artistTrack->track_thumbnail}});"></a>
                                                        @else
                                                            <a href="javascript:void(0)" onclick="openNav({{$save->campaign->id}})" class="item-media-content"
                                                               style="background-image: url({{asset('images/b4.jpg')}});"></a>
                                                        @endif

                                                        @if(!empty($save->campaign->artistTrack->audio))
                                                            <div class="item-overlay center">
                                                                <button  class="btn-playpause">Play</button>
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="item-info">
                                                        <div class="item-overlay bottom text-right">
                                                            @if(!empty($save->campaign->curatorFavoriteTrack) && $save->campaign->curatorFavoriteTrack->status == \App\Templates\IFavoriteTrackStatus::SAVE)
                                                                <a href="javascript:void(0)" class="btn-favorite" @if($save->campaign->artistTrack) onclick="favoriteTrack({{$save->campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                                    <i class=" {{ !empty($save->campaign->curatorFavoriteTrack) ? 'fa fa-heart colorAdd' : 'fa fa-heart-o' }}"></i>
                                                                </a>
                                                            @else
                                                                @if(empty($save->campaign->curatorFavoriteTrack))
                                                                    <a href="javascript:void(0)" class="btn-favorite" @if($save->campaign->artistTrack) onclick="favoriteTrack({{$save->campaign->artistTrack->id}},'{{\App\Templates\IFavoriteTrackStatus::SAVE}}')" @endif>
                                                                        <i class="fa fa-heart-o"></i>
                                                                    </a>
                                                                @endif
                                                            @endif
                                                        </div>
                                                        <div class="item-title text-ellipsis">
                                                            <a href="javascript:void(0)" onclick="openNav({{$save->campaign->id}})">{{$save->campaign->artistTrack->name}}</a>
                                                        </div>
                                                        <div class="item-author text-ellipsis">
                                                            <span class="text-muted">Release Date: {{ getDateFormat($save->campaign->artistTrack->created_at) }}</span>
                                                        </div>
                                                        <div class="item-author text-ellipsis">
                                                            @if(!empty($save->campaign->user) && !empty($save->campaign->user->artistUser->country))
                                                                <div class="clearfix m-b-sm">
                                                                    <img class="flag_icon" src="{{asset('images/flags')}}/{{$save->campaign->user->artistUser->country->flag_icon}}.png" alt="{{$save->campaign->user->artistUser->country->flag_icon}}">
                                                                    <span class="text-muted"
                                                                          style="font-size:15px">{{($save->campaign->user->artistUser->country) ? $save->campaign->user->artistUser->country->name : ''}}</span>
                                                                </div>
                                                            @endif
                                                        </div>
                                                        <div class="item-author text-sm text-ellipsis">
                                                            <a href="javascript:void(0)" class="text-muted">{{Str::ucfirst($save->campaign->package_name) ?? '----'}}</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            <div class="item-title text-ellipsis">
                                                <h3 class="white" style="text-align:center;font-size: 15px;">No Active Campaign</h3>
                                            </div>
                                        @endif
                                    @endforeach
                                @else
                                    <div class="item-title text-ellipsis">
                                        <h3 class="white" style="text-align:center;font-size: 15px;">Not Saved Found</h3>
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
                        $('#mySidebarCollapsed').addClass('mySidebarCollapsed');
                        // document.getElementById("mySidebarCollapsed").style.width = "490px";
                        document.getElementById("app-body").style.marginLeft = "490px";
                    }
                    if (data.error) {
                        toastr.error(data.error);
                    }
                },
            });
        }

        function closeNav() {
            $('#mySidebarCollapsed').addClass('mySidebarCollapsedRemove');
            // document.getElementById("mySidebarCollapsed").style.width = "0";
            document.getElementById("app-body").style.marginLeft= "0";
        }
    </script>
@endsection
