@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Submit Coverages')

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
        .Item {
            background-color: rgba(120, 120, 120, 0.1);
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
                        <h2 class="widget-title inline m-a-0">Submit Coverages</h2>
                    </div>
                    <div class="row item-list item-list-by m-b">
                        @if(!empty($submitCoverages) && count($submitCoverages) > 0)
                            @foreach($submitCoverages as $submitCoverage)
                                <div class="col-xs-12 remove_offer m-b">
                                    <div class="item r Item" data-id="item-{{$submitCoverage->id}}"  @if(!empty($submitCoverage->artistTrack->audio)) data-src="{{URL('/')}}/uploads/audio/{{$submitCoverage->artistTrack->audio}}" @endif>
                                        <div class="item-media">
                                            @if(!empty($submitCoverage->artistTrack->track_thumbnail))
                                                <a href="javascript:void(0)" class="item-media-content"
                                                   style="background-image: url({{asset('uploads/track_thumbnail')}}/{{$submitCoverage->artistTrack->track_thumbnail}});"></a>
                                            @else
                                                <a href="javascript:void(0)" class="item-media-content"
                                                   style="background-image: url({{asset('images/b9.jpg')}});"></a>
                                            @endif
                                            @if(!empty($submitCoverage->artistTrack->audio))
                                                <div class="item-overlay center">
                                                    <button  class="btn-playpause">Play</button>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="item-info">
                                            <div class="bottom text-right">
                                                @if($submitCoverage->status == \App\Templates\IOfferTemplateStatus::PENDING)
                                                    <span style="color:#02b875 !important">Coverage Status: </span><span class="text-danger">{{$submitCoverage->status}}</span>
                                                @else
                                                    <span style="color:#02b875 !important">Coverage Status: </span><span class="text-primary">{{$submitCoverage->status}}</span>
                                                @endif
                                                <div class="item-action visible-list m-t-lg">
                                                    <form id="form-coverage{{$submitCoverage->id}}" action="{{route('curator.view.submit.coverage',encrypt($submitCoverage->id))}}">
                                                        <a href="javascript:void(0)" class="btn btn-xs black" onclick="submitCoverageShow({{$submitCoverage->id}})">View Coverage Details</a>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="item-title text-ellipsis">
                                                <span class="text-muted">{{!empty($submitCoverage->artistTrack) ? $submitCoverage->artistTrack->name : '----'}}</span>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis hide">
                                            </div>
                                            <div class="item-meta text-sm">
                                                <span class="item-meta-date text-xs">{{($submitCoverage->created_at) ? \Carbon\Carbon::parse($submitCoverage->created_at)->format('M d Y') : ''}}</span>
                                            </div>
                                            <div class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                                {!! $submitCoverage->message ?? '----' !!}}
                                            </div>

                                            <div class="m-t-sm offerAlternative">
                                                <div>
                                                    <span style="color:#02b875 !important">Coverage Type: </span><span class="btn btn-xs white">{{!empty($submitCoverage->alternativeOption) ? $submitCoverage->alternativeOption->name : '----'}}</span>
{{--                                                    <span style="color:#02b875 !important">Coverage Type: </span><span class="btn btn-xs white">{{!empty($submitCoverage->offerType) ? $submitCoverage->offerType->name : '----'}}</span>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            @include('pages.curators.__not-found-records')
                        @endif
                    </div>
                </div>
            </div>
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
    @include('pages.curators.curator-coverage.modal')

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
                            location.reload();
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
    <script>
        function submitCoverageShow(id)
        {
            var form = document.getElementById("form-coverage"+id);
            form.submit();
        }
    </script>
    {{--    Promote to track redirect and checked track--}}
@endsection
