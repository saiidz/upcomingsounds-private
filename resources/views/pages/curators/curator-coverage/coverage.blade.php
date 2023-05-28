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
                        <div class="col-xs-12 remove_campaign" id="remove_campaign-">
                            <div class="item r" data-id="item-" data-src="">
                                <div class="item-media mediaItem">
                                    <a href="javascript:void(0)" class="item-media-content"
                                       style="background-image: url({{asset('images/b9.jpg')}});"></a>

                                    <div class="item-overlay center">
                                        <button  class="btn-playpause">Play</button>
                                    </div>
                                </div>
                                <div class="item-info">
                                    <div class="item bottom text-right">
                                        <span class="text-primary">Completed</span>
                                        <div class="item-action visible-list m-t-lg">
                                            <a href="javascript:void(0)" onclick="" class="btn btn-xs black">View Coverage</a>
                                        </div>
                                    </div>
                                    <div class="item-title text-ellipsis">
                                        <a href="javascript:void(0)">Test Coverage <span class="text-muted">(Medium)</span></a>
                                    </div>
                                    <div class="item-author text-sm text-ellipsis hide">
                                        <a href="javascript:void(0)" class="text-muted">Farhan</a>
                                    </div>
                                    <div class="item-meta text-sm text-muted">
                                        <span class="item-meta-date text-xs">{{\Carbon\Carbon::now()}}</span>
                                    </div>

                                    <div
                                        class="item-except visible-list text-sm text-muted h-2x m-t-sm">
                                        Test Des
                                    </div>

                                    <div class="item-action visible-list m-t-sm">
                                        <div>
                                            <span class="btn btn-xs white">Tags</span>
                                            <span class="btn btn-xs white">Tags</span>
                                        </div>
                                    </div>

                                    <div class="item-action visible-list m-t-sm">
{{--                                        <a href="javascript:void(0)" onclick="" class="btn btn-xs white">Resubmit Your Track</a>--}}
                                        <a href="javascript:void(0)" onclick="" class="btn btn-xs white" data-toggle="modal"
                                           data-target="#delete-campaign-modal">Delete</a>
                                    </div>

                                </div>
                            </div>
                        </div>
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
    {{--    Promote to track redirect and checked track--}}
@endsection
