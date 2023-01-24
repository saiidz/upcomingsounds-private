@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title',@isset($offer_template) ? "Update Offer Template":"Create Offer Template")


@section('page-style')
    <style>
        .iconUsc {
            padding-left: 25px;
            background: url({{asset('images/coin_bg.png')}}) no-repeat left;
            background-size: 20px;
        }
        .textOffer{
            justify-content: space-between !important;
            align-items: center !important;
            display: flex !important;
        }
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
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0">{{ !empty($offer_template) ? "Update Offer Template" : "Offer Template" }}</h1>
                    </div>
                    <form method="POST" action="{{!empty($offer_template)
                                    ? route('curator.update.offer.template', encrypt($offer_template->id))
                                    : route('curator.store.offer.template')}}"
                          enctype="multipart/form-data" class="new_basicform_with_reload">
                        @csrf
                        <div class="form-group">
                            <label class="control-label form-control-label text-muted">Title</label>
                            <div>
                                <input type="text" name="title"
                                       class="form-control"
                                       value="{{!empty($offer_template) ? $offer_template->title : old('title')}}"
                                       placeholder="Your Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label form-control-label text-muted">Offer Type</label>
                            <div>
                                <select class="form-control" name="offer_type">
                                    <option disabled selected>Please Choose</option>
                                    @if(!empty($offer_types))
                                        @foreach($offer_types as $offer_type)
                                            <option value="{{$offer_type->id}}" {{(!empty($offer_template) && $offer_type->id == $offer_template->offer_type) ? 'selected' : '' }}>{{$offer_type->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="textOffer">
                                <label class="control-label form-control-label text-muted">Offer Text</label>
                                <span class="h6 _800 text-white" data-toggle="tooltip" title="You can personalize your offers by entering the shortcodes below, which will replace campaign specific information when displayed to artists

{ARTIST}
{TITLE}
{RELEASE_DATE}"><span style="color: #02b875 !important;">{{\App\Templates\IMessageTemplates::PROVIDE_A}}</span></span>
                            </div>
                            <div>
                                   <textarea name="description_details" id="descriptionDetails"
                                             placeholder="Offer Text..."
                                             class="form-control ckeditor">{!! !empty($offer_template) ? $offer_template->offer_text : old('description_details') !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label form-control-label text-muted">Contribution</label>
                            <div>
                                <input type="number" name="contribution" value="{{!empty($offer_template) ? $offer_template->contribution : old('contribution')}}" min="1" data-toggle="tooltip" title="{{ \App\Templates\IMessageTemplates::CONTRIBUTION_TEXT }}"
                                       class="form-control iconUsc">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label form-control-label text-muted">Alternative Option</label>
                            <div>
                                <select class="form-control" name="alternative_option">
                                    <option disabled selected>Please Choose</option>
                                    @if(!empty($alternative_options))
                                        @foreach($alternative_options as $alternative_option)
                                            <option value="{{$alternative_option->id}}" {{(!empty($offer_template) && $alternative_option->id == $offer_template->alternative_option) ? 'selected' : '' }}>{{$alternative_option->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group modal-footer">
                            <button type="submit" id="updateTrack" class="btn btn-sm rounded add_track basicbtn">
                                {{ !empty($offer_template) ? "Update" : "Create" }}</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>
    <!-- ############ PAGE END-->
@endsection

@section('page-script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
    </script>
@endsection
