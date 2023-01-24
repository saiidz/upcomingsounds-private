@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Proposition')


@section('page-style')
    <style>
        .proposition_header {
            justify-content: space-between !important;
            align-items: center !important;
            display: flex !important;
        }

        .proposition {
            margin-top: 20px;
            border-color: #02b875 !important;
            background-color: #1f1f25;
            color: white !important;
            text-align: center !important;
            padding: 10px 1.5rem 10px 1.5rem !important;
            white-space: nowrap !important;
            vertical-align: middle !important;
            box-shadow: inset 0 0 1px rgb(0 0 0 / 30%) !important;
            border-radius: 500px !important;
            margin-left: 10px !important;
        }
        .offerAlternative{
            justify-content: space-between;
            align-items: center !important;
            display: flex !important;
        }
        .Item{
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
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0">Proposition</h1>
                        <a href="{{route('curator.create.offer.template')}}"
                           class="btn btn-sm rounded proposition basicbtn">
                            Setup a new offer template</a>
                    </div>

                    <div class="row item-list item-list-by m-b">
                        @if(count($offerTemplates) > 0)
                            @foreach($offerTemplates as $offerTemplate)
                                <div class="col-xs-12 remove_offer" id="remove_offer-{{$offerTemplate->id}}">
                                    <div class="item r Item" data-id="item-{{$offerTemplate->id}}">
                                        <div class="item-info">
                                            <div class="item bottom text-right">
                                                @if($offerTemplate->is_approved == 1)
                                                    <span class="text-primary">Approved</span>
                                                @elseif($offerTemplate->is_rejected == 1)
                                                    <span class="text-danger">Rejected</span>
                                                @else
                                                    <span class="text-danger">Pending</span>
                                                @endif
                                            </div>
                                            <div class="item-title text-ellipsis">
                                                <span class="text-muted">{{$offerTemplate->title}}</span>
                                            </div>
                                            <div class="item-author text-sm text-ellipsis hide">
{{--                                                <a href="javascript:void(0)" class="text-muted">{{($campaign->artistTrack->user->name) ? $campaign->artistTrack->user->name : ''}}</a>--}}
                                            </div>
                                            <div class="item-meta text-sm text-muted">
                                                <span class="item-meta-date text-xs">{{($offerTemplate->created_at) ? \Carbon\Carbon::parse($offerTemplate->created_at)->format('M d Y') : ''}}</span>
                                            </div>

                                            <div
                                                class="item-except visible-list text-sm text-muted m-t-sm">
                                                {!! $offerTemplate->offer_text ?? '--' !!}
                                            </div>


                                            <div class="m-t-sm offerAlternative">
                                                @if(!empty($offerTemplate->offerType))
                                                    <div>
                                                        <span style="color:#02b875 !important">Contribution: </span><span class="btn btn-xs white">{{$offerTemplate->contribution ?? 0}} USC</span>
                                                    </div>
                                                @endif
                                                @if(!empty($offerTemplate->offerType))
                                                    <div>
                                                        <span style="color:#02b875 !important">Offer Type: </span><span class="btn btn-xs white">{{$offerTemplate->offerType->name}}</span>
                                                    </div>
                                                @endif
                                                @if(!empty($offerTemplate->alternativeOption))
                                                    <div>
                                                        <span style="color:#02b875 !important">Alternative Option: </span><span class="btn btn-xs white">{{$offerTemplate->alternativeOption->name}}</span>
                                                    </div>
                                                @endif
                                            </div>


                                            <div class="m-t-sm campaignBtn" style="display:flex">
{{--                                                <a href="javascript:void(0)" class="btn btn-xs white" id="offerTemplateEdit">Edit</a>--}}
                                                <form id="form-offer" action="{{route('curator.edit.offer.template',encrypt($offerTemplate->id))}}">
                                                    <a href="javascript:void(0)" class="btn btn-xs white" id="offerTemplateEdit">Edit</a>
                                                </form>
{{--                                                <a href="{{route('curator.edit.offer.template',encrypt($offerTemplate->id))}}" class="btn btn-xs white">Edit</a>--}}
                                                <a href="javascript:void(0)" onclick="deleteOfferTemplate({{$offerTemplate->id}})" class="btn btn-xs white" data-toggle="modal"
                                                   data-target="#delete-offer-template-modal">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach
                        @else
                            <div class="item-title text-ellipsis">
                                <h3 class="white" style="text-align:center">Not Offer Template Found</h3>
                            </div>
                        @endif
                    </div>

                </div>
            </div>
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
    @include('pages.curators.curator-offer-template.modal')
@endsection

@section('page-script')
    <script>
        var form = document.getElementById("form-offer");

        document.getElementById("offerTemplateEdit").addEventListener("click", function () {
            form.submit();
        });

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
@endsection
