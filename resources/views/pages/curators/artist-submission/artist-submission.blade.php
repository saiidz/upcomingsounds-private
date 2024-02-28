@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Artist Submission')

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
{{--    <div id="campaignAddRemove">--}}
{{--        @include('pages.curators.collapsed_sidebar')--}}
{{--    </div>--}}
    <!-- ############ PAGE START-->
        <div class="page-content">
            <div class="row-col">
                <div class="col-lg-9 b-r no-border-md">
                    <div class="padding">
                        <div class="page-title m-b">
                            <h1 class="inline m-a-0">Artist Submission</h1>
{{--                            <div class="dropdown inline">--}}
{{--                                <button class="btn btn-sm no-bg h4 m-y-0 v-b dropdown-toggle text-primary" data-toggle="dropdown">All</button>--}}
{{--                                <div class="dropdown-menu"><a href="#" class="dropdown-item active">All</a> <a href="#" class="dropdown-item">acoustic</a> <a href="#" class="dropdown-item">ambient</a> <a href="#" class="dropdown-item">blues</a> <a href="#" class="dropdown-item">classical</a> <a href="#" class="dropdown-item">country</a> <a href="#" class="dropdown-item">electronic</a> <a href="#" class="dropdown-item">emo</a> <a href="#" class="dropdown-item">folk</a> <a href="#" class="dropdown-item">hardcore</a> <a href="#" class="dropdown-item">hip hop</a> <a href="#" class="dropdown-item">indie</a> <a href="#" class="dropdown-item">jazz</a> <a href="#" class="dropdown-item">latin</a> <a href="#" class="dropdown-item">metal</a> <a href="#" class="dropdown-item">pop</a> <a href="#" class="dropdown-item">pop punk</a> <a href="#" class="dropdown-item">punk</a> <a href="#" class="dropdown-item">reggae</a> <a href="#" class="dropdown-item">rnb</a> <a href="#" class="dropdown-item">rock</a> <a href="#" class="dropdown-item">soul</a> <a href="#" class="dropdown-item">world</a></div>--}}
{{--                            </div>--}}
                        </div>
                        <div class="btn-group dropdown m-b m-l">
                            <button class="btn white text-primary" id="selectFilter">Sort By</button>
                            <button class="btn white dropdown-toggle text-primary" data-toggle="dropdown"></button>
                            <div class="dropdown-menu pull-right">
                                <a class="dropdown-item" href="javascript:void(0)" onclick="filterArtistSubmission('{{ \App\Templates\IMessageTemplates::OLDEST }}')">Oldest</a>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="filterArtistSubmission('{{ \App\Templates\IMessageTemplates::NEWEST }}')">Newest</a>
                                <a class="dropdown-item" href="javascript:void(0)" onclick="filterArtistSubmission('{{ \App\Templates\IMessageTemplates::RELEASE_DATE }}')">Release Date</a>
{{--                                <a class="dropdown-item" href="javascript:void(0)" onclick="filterArtistSubmission('{{ \App\Templates\IMessageTemplates::LIKED_ARTISTS }}')">Liked Artists</a>--}}
                                <a class="dropdown-item" href="javascript:void(0)" onclick="filterArtistSubmission('{{ \App\Templates\IMessageTemplates::GENRE }}')">Genre</a>
                            </div>
                        </div>
                        <div class="btn-group dropdown m-b m-l" id="genreFilters" style="display:none">
                            <button class="btn white text-primary" id="selectFilterTag">Select Genre</button>
                            <button class="btn white dropdown-toggle text-primary" data-toggle="dropdown"></button>
                            @if(!empty($curator_features))
                                <div class="dropdown-menu pull-right">
                                    @foreach($curator_features as $curator_feature)
                                        <a href="javascript:void(0)" id="curatorFeatureTag{{$curator_feature->id}}" data-value="{{ $curator_feature->name }}" class="dropdown-item" onclick="filterArtistSubmissionFeature({{ $curator_feature->id }})">{{$curator_feature->name}}</a>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                        <div data-ui-jp="jscroll" class="jscroll-loading-center" data-ui-options="{
                    autoTrigger: true,
                    loadingHtml: '<i class=\'fa fa-refresh fa-spin text-md text-muted\'></i>',
                    padding: 50,
                    nextSelector: 'a.jscroll-next:last'
                }">
                            <div class="jscroll-inner">
                                <div class="row" id="filterArtistSubmission" style="display: flex;flex-wrap: wrap;">
                                    @include('pages.curators.artist-submission.__filter-artist-submission')
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
                        $('#campaign_ID').val(data.campaign_id);
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
    <script>
        function filterArtistSubmission(option)
        {
            $('#selectFilter').html('');
            $('#selectFilterTag').html('');
            $('#selectFilterTag').html('Select Genre');

            if(option === 'oldest')
            {
                $('#genreFilters').css('display','none');
                $('#selectFilter').html('Oldest');
            }
            else if(option === 'newest')
            {
                $('#genreFilters').css('display','none');
                $('#selectFilter').html('Newest');
            }
            else if(option === 'release_date')
            {
                $('#genreFilters').css('display','none');
                $('#selectFilter').html('Release Date');
            }
            else if(option === 'liked_artists')
            {
                $('#genreFilters').css('display','none');
                $('#selectFilter').html('Liked Artists');
            }
            else if(option === 'genre')
            {
                $('#genreFilters').css('display','inline-block');
                $('#selectFilter').html('Genre');
                return false;
            }

            showLoader();
            $.ajax({
                type: "GET",
                url: '{{route('filter.artist.submission')}}',
                data: {option_filter:option},
                dataType: 'json',
                success: function (data) {
                    loader();
                    if (data.success) {
                        $('#filterArtistSubmission').css('display','flex');
                        $('#filterArtistSubmission').empty();
                        $('#filterArtistSubmission').html(data.campaign);
                    }
                    if (data.error) {
                        toastr.error(data.error);
                    }
                },
            });
        }

        function filterArtistSubmissionFeature(curator_feature_id)
        {
            var feature_name = $('#curatorFeatureTag'+ curator_feature_id).data('value');
            $('#selectFilterTag').html('');
            $('#selectFilterTag').html(feature_name);

            var genre = 'genre';
            var curatorFeatureId = curator_feature_id;
            showLoader();
            $.ajax({
                type: "GET",
                url: '{{route('filter.artist.submission')}}',
                data: {
                    option_filter:genre,
                    curator_feature_id:curatorFeatureId,
                },
                dataType: 'json',
                success: function (data) {
                    loader();
                    if (data.success) {
                        $('#filterArtistSubmission').empty();
                        if(data.campaign)
                        {
                            $('#filterArtistSubmission').css('display','flex');
                            $('#filterArtistSubmission').html(data.campaign);
                        }else{
                            $('#filterArtistSubmission').css('display','block');
                            $('#filterArtistSubmission').html('<div class="item-title text-ellipsis"><h3 class="white" style="text-align:center;font-size: 15px;">Not Campaign Found</h3></div>');
                        }
                    }
                    if (data.error) {
                        toastr.error(data.error);
                    }
                },
            });
        }
    </script>
@endsection
