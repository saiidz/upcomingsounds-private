@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Verified Coverage')

@section('page-style')
    <style>
        .Item{
            background-color: rgba(120, 120, 120, 0.1);
        }
        .icon_UP{
            width:20px;
            height:20px;
        }
        .blue-tag {
            color: blue;
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-8 b-r no-border-md">
                <div class="padding p-y-0 m-b-md">
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0 titleColor">Coverage Presets</h1>
                        <a href="{{route('curator.create.verified.coverage')}}"
                           class="btn btn-sm rounded proposition basicbtn">
                            Setup a new verified coverage</a>
                    </div>

                    <div class="row item-list item-list-by m-b">
                        @if(count($verifiedCoverages) > 0)
                            @foreach($verifiedCoverages as $verifiedCoverage)
                                <div class="col-xs-12 remove_offer m-b" id="remove_offer-{{$verifiedCoverage->id}}">
                                    <div class="item r Item" data-id="item-{{$verifiedCoverage->id}}">
                                        <div class="item-info">
                                            <div class="bottom text-right">
                                                <div id="deMo">
                                                    <label class="switch">
                                                        <input type="checkbox" name="demo" onclick="changeActiveStatus({{$verifiedCoverage->id}})" id="changeActiveStatus{{$verifiedCoverage->id}}" value="" {{ ($verifiedCoverage->is_active == 1) ? 'checked' : ''  }}>
                                                        <span class="slider round switchDemo"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="item-title text-ellipsis">
                                                <span class="text-muted">{{__('Created At')}}</span>
                                            </div>
                                            <div class="item-meta text-sm text-muted">
                                                <span class="item-meta-date text-xs">{{($verifiedCoverage->created_at) ? \Carbon\Carbon::parse($verifiedCoverage->created_at)->format('M d Y') : ''}}</span>
                                            </div>
                                            <div
                                                class="item-except visible-list text-sm text-muted m-t-sm" id="descriptionContainer">
                                                {!! preg_replace(
                                                '/<p>((http|https):\/\/[^\s]+)<\/p>/',
                                                '<a href="$1" class="blue-tag" target="_blank">$1</a>',
                                                $verifiedCoverage->description ?? '--'
                                            ) !!}
{{--                                                {!! $verifiedCoverage->description ?? '--' !!}--}}
                                            </div>
                                            <div class="m-t-sm offerAlternative">
                                                @if(!empty($verifiedCoverage->contribution))
                                                    <div>
                                                        <span style="color:#02b875 !important">Contribution: </span><span class="btn btn-xs white">{{$verifiedCoverage->contribution ?? 0}} USC
                                                        <img class="icon_UP" src="{{asset('images/coin_bg.png')}}">
                                                        </span>
                                                    </div>
                                                @endif

                                                @if(!empty($verifiedCoverage->offerType))
                                                    <div>
                                                        <span style="color:#02b875 !important">Offer Type: </span><span class="btn btn-xs white">{{$verifiedCoverage->offerType->name}}</span>
                                                    </div>
                                                @endif
                                                @if(!empty($verifiedCoverage->time_to_publish))
                                                    <div>
                                                        <span style="color:#02b875 !important">Time To Publish: </span><span class="btn btn-xs white">{{$verifiedCoverage->time_to_publish}} day</span>
                                                    </div>
                                                @endif
                                            </div>


                                            <div class="m-t-sm campaignBtn" style="display:flex;justify-content: space-between;">
                                                <div>
                                                    <form id="form-offer{{$verifiedCoverage->id}}" action="{{route('curator.edit.verified.coverage',encrypt($verifiedCoverage->id))}}">
                                                        <a href="javascript:void(0)" class="btn btn-xs white" onclick="verifiedCoverageEdit({{$verifiedCoverage->id}})" id="offerTemplateEdit">Edit</a>
                                                    </form>
                                                </div>
                                                <div>
                                                    @if($verifiedCoverage->is_approved == 1)
                                                        <span class="text-primary" style="float: right !important;">Approved</span>
                                                    @elseif($verifiedCoverage->is_rejected == 1)
                                                        <span class="text-danger" style="float: right !important;">Rejected</span>
                                                        <div>
                                                            <span id="mgAdmin{{$verifiedCoverage->id}}" style="display:none">{!! $verifiedCoverage->reason_reject !!}</span>
                                                            <a href="javascript:void(0)" class="btn btn-xs white"  onclick="adminMsgModalCenter({{$verifiedCoverage->id}})">
                                                                Admin Reject Message
                                                            </a>
                                                        </div>
                                                    @else
                                                        <span class="text-danger" style="float: right !important;">Pending</span>
                                                    @endif
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
    @include('pages.curators.verified-coverage.modal')
@endsection

@section('page-script')
    <script>
        function verifiedCoverageEdit(id)
        {
            var form = document.getElementById("form-offer"+id);
            form.submit();
        }


        // Delete Offer Template Model
        function deleteOfferTemplate(offer_template_id){
            $('.deleteOfferTemplate').attr('data-offer_template-id',offer_template_id);
        }
        $('#delete_offer_template').click(function (event) {
            event.preventDefault();
            var offer_template_id = $('.deleteOfferTemplate').attr('data-offer_template-id');
            var url= "{{url('/delete-offer-template')}}/"+offer_template_id;
            $.ajax({
                type: "DELETE",
                url: url,
                data:{
                    "_token": "{{ csrf_token() }}",
                    "offer_template_id": offer_template_id,
                },
                success: function (data) {
                    if(data.success){
                        $('#remove_offer-'+offer_template_id).remove();
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
    {{--    Active Display--}}
    <script>
        function changeActiveStatus(id)
        {
            let checked = $('#changeActiveStatus'+id).is(':checked');
            if(checked == 'true'){
                var data = checked;
            }else{
                var data = checked;
            }
            var url = "{{route('curator.verified.coverage.change.status')}}";
            $.ajax({
                type: "POST",
                url: url,
                data:{
                    "_token": "{{ csrf_token() }}",
                    "is_active": data,
                    "verified_coverage_id": id,
                },
                success: function (data) {
                    if(data.success){
                        $('#snackbar').html(data.success);
                        $('#snackbar').addClass("show");
                        setTimeout(function () {
                            $('#snackbar').removeClass("show");
                        }, 5000);
                        location.reload();
                    }
                }
            });
        }
    </script>
    {{--    Active Display--}}
    <script>
        function adminMsgModalCenter(id)
        {
            let msg = $('#mgAdmin'+id).html();
            $('#msgAdmin').html(msg);
            $('#adminMsgModalCenter').modal('show');

        }
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Check if the description contains a certain tag (e.g., <a>)
            var description = document.getElementById("descriptionContainer").innerHTML;
            var containsTag = description.includes("<a");

            // If the tag exists, add a CSS class to change its color
            if (containsTag) {
                var tags = document.querySelectorAll("#descriptionContainer a");
                tags.forEach(function(tag) {
                    tag.classList.add("blue-tag");
                });
            }
        });
    </script>
@endsection
