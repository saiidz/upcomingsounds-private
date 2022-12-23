@extends('pages.artists.panels.layout')

{{-- page title --}}
@section('title','Active Campaign')

@section('page-style')
    <style>
        .mediaItem{
            height: 150px !important;
        }
        .campaignBtn{
            float:right !important;
        }
        .remove_campaign {
            border-bottom: 1px solid rgba(120, 120, 120, 0.1);
        }
        .item-list .item-info:after {
            border-bottom: none !important;
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->
    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding p-y-0 m-b-md">
                    <div class="page-title m-b m-t-2">
                        <h2 class="widget-title inline m-a-0">Active Campaigns</h2>
                    </div>
                    <div class="row item-list item-list-by m-b">
                        @if(count($campaigns) > 0)
                            @foreach($campaigns as $campaign)
                                <div class="col-xs-12 remove_campaign" id="remove_campaign-{{$campaign->artistTrack->id}}">
                                    <div class="item r" data-id="item-{{$campaign->artistTrack->id}}" data-src="{{URL('/')}}/uploads/audio/{{$campaign->artistTrack->audio}}">
                                        <div class="item-media mediaItem">
                                            @if(!empty($campaign->artistTrack->track_thumbnail))
                                                <a href="javascript:void(0)" class="item-media-content"
                                                   style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$campaign->artistTrack->track_thumbnail}});"></a>
                                            @else
                                                <a href="javascript:void(0)" class="item-media-content"
                                                   style="background-image: url({{asset('images/b9.jpg')}});"></a>
                                            @endif

                                            @if(!empty($campaign->artistTrack->audio))
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="item-info">
                                            <div class="item bottom text-right">
                                                @if(getExpiryDayCampaign($campaign->created_at) == 'false')
                                                    <span class="text-danger">Closed</span>
                                                @else
                                                    <span class="text-primary">{{getExpiryDayCampaign($campaign->created_at)}}</span>
                                                @endif
                                            </div>
                                            <div class="item-title text-ellipsis">
                                                <a href="javascript:void(0)">{{$campaign->artistTrack->name}} <span class="text-muted">({{UC_FIRST($campaign->package_name) ?? '----'}})</span></a>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis hide">
                                                <a href="javascript:void(0)" class="text-muted">{{($campaign->artistTrack->user->name) ? $campaign->artistTrack->user->name : ''}}</a>
                                            </div>
                                            <div class="item-meta text-sm text-muted">
{{--                                                <span class="item-meta-category">--}}
{{--                                                    <a href="javascript:void(0)" class="label">{{($campaign->artistTrack->trackCategory) ? ucfirst($campaign->artistTrack->trackCategory->name) : ''}}</a>--}}
{{--                                                </span>--}}
                                                <span class="item-meta-date text-xs">{{($campaign->artistTrack->release_date) ? \Carbon\Carbon::parse($campaign->artistTrack->release_date)->format('M d Y') : ''}}</span>
                                            </div>

                                            <div
                                                class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                {{$campaign->artistTrack->description}}
                                            </div>

                                            @if(!empty($campaign->artistTrack->artistTrackTags))
                                                <div class="item-action visible-list m-t-sm">
                                                    <div>
                                                        @foreach($campaign->artistTrack->artistTrackTags as $tag)
                                                            <span class="btn btn-xs white">{{$tag->curatorFeatureTag->name}}</span>
                                                        @endforeach

                                                    </div>
                                                </div>
                                            @endif

                                            @if(getExpiryDayCampaign($campaign->created_at) == 'false')
                                                <div class="item-action visible-list m-t-sm campaignBtn">
                                                    <a href="javascript:void(0)" onclick="promoteTrackRedirect({{$campaign->artistTrack->id}})" class="btn btn-xs white">Resubmit Your Track</a>
                                                    <a href="javascript:void(0)" onclick="deleteCampaign({{$campaign->id}})" class="btn btn-xs white" data-toggle="modal"
                                                       data-target="#delete-campaign-modal">Delete</a>
                                                </div>
                                            @endif

                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @else
                            <div class="item-title text-ellipsis">
                                <h3 class="white" style="text-align:center">Not Campaign Found</h3>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            @include('pages.artists.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
    @include('pages.artists.artist-active-campaign.modal')

@endsection

@section('page-script')
    <script>
        // Delete Campaign Model
        function deleteCampaign(campaign_id){
            $('.deleteCampaign').attr('data-campaign-id',campaign_id);
        }
        $('#delete_campaign').click(function (event) {
            event.preventDefault();
            var campaign_id = $('.deleteCampaign').attr('data-campaign-id');
            var url= "{{url('/delete-campaign')}}/"+campaign_id;
            $.ajax({
                type: "DELETE",
                url: url,
                data:{
                    "_token": "{{ csrf_token() }}",
                    "campaign_id": campaign_id,
                },
                success: function (data) {
                    if(data.success){
                        $('#remove_campaign-'+campaign_id).remove();
                        $('#snackbar').html(data.success);
                        $('#snackbar').addClass("show");
                        setTimeout(function () {
                            $('#snackbar').removeClass("show");

                        }, 5000);
                    }
                }
            });
        });
    </script>
    {{--    Promote to track redirect and checked track--}}
    <script>
        function promoteTrackRedirect(track_id)
        {
            window.open(
                window.location.origin + '/promote-your-track/?track_id='+track_id,
                '_self' // <- This is what makes it open in a new window.
            );
        }
    </script>
    {{--    Promote to track redirect and checked track--}}
@endsection
