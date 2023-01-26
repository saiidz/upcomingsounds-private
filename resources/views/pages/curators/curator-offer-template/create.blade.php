@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title',@isset($offer_template) ? "Update Offer Template":"Create Offer Template")


@section('page-style')
    <style>
        .iconUsc {
            /*padding-left: 25px;*/
            {{--background: url({{asset('images/coin_bg.png')}}) no-repeat left;--}}
            /*background-size: 20px;*/
            height: 25px;
            margin-top: 3px;
            margin-right: 2px;
        }
        .coinContribution{
            display:flex;
        }
        .coinContribution .form-control{
            /*border-left: 2px solid grey;*/
            width: 500px;
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
{RELEASE_DATE}"><span style="color: #02b875 !important;">
                                        <a href="javascript:void(0)" data-toggle="modal" data-target="#provideModalCenter">
                    {{\App\Templates\IMessageTemplates::PROVIDE_A}}
                </a></span></span>
                            </div>
                            <div>
                                   <textarea name="description_details" id="descriptionDetails"
                                             placeholder="Offer Text..."
                                             class="form-control ckeditor">{!! !empty($offer_template) ? $offer_template->offer_text : old('description_details') !!}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6">
                                <label class="control-label form-control-label text-muted">Contribution</label>
                                <div class="coinContribution">
                                    <img src="{{asset('images/coin_bg.png')}}" class="iconUsc" alt="">
                                    <input type="number" name="contribution" value="{{!empty($offer_template) ? $offer_template->contribution : old('contribution')}}" min="1" data-toggle="tooltip" title="{{ \App\Templates\IMessageTemplates::CONTRIBUTION_TEXT }}"
                                           class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label form-control-label text-muted">Is Active</label>
                                <select class="form-control" name="is_active">
                                    <option disabled selected>Please Choose</option>
                                    <option value="1" {{(!empty($offer_template) && $offer_template->is_active == 1) ? 'selected' : '' }}>{{ __('Active') }}</option>
                                    <option value="0" {{(!empty($offer_template) && $offer_template->is_active == 0) ? 'selected' : '' }}>{{ __('Non Active') }}</option>
                                </select>
                            </div>
                        </div>

{{--                        <div class="form-group">--}}
{{--                            <label class="control-label form-control-label text-muted">Contribution</label>--}}
{{--                            <div class="coinContribution">--}}
{{--                                <img src="{{asset('images/coin_bg.png')}}" class="iconUsc" alt="">--}}
{{--                                <input type="number" name="contribution" value="{{!empty($offer_template) ? $offer_template->contribution : old('contribution')}}" min="1" data-toggle="tooltip" title="{{ \App\Templates\IMessageTemplates::CONTRIBUTION_TEXT }}"--}}
{{--                                       class="form-control">--}}
{{--                            </div>--}}
{{--                        </div>--}}

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

                        <div class="form-group m-t-2">
                            <label class="control-label form-control-label text-muted">
                                <input type="checkbox" class="radio permissionCopyright has-value" {{(!empty($offer_template) && $offer_template->confirm == 1) ? 'checked' : ''}} value="1" name="confirm">
                                As a representative of the organization selected for this offer, by clicking this box I confirm my authority to create, edit, and post offers for the proposal I have created.
                            </label>
                        </div>

                        <div class="form-group modal-footer">
                            <button type="submit" id="updateTrack" class="btn btn-sm rounded add_track basicbtn">
                                {{ !empty($offer_template) ? "Submit" : "Submit" }}</button>
                            <a href="{{route('curator.proposition')}}" class="btn btn-sm rounded add_track">Back</a>
                        </div>
                    </form>
                </div>
            </div>
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>
    <!-- ############ PAGE END-->

    <!-- Permission Copy Right Modal -->
    <div id="provideModalCenter" class="modal fade black-overlay" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Provide a customised experience</h5>
                </div>
                <div class="modal-body">
                    <p>You can personalize your offers by entering the shortcodes below, which will replace campaign specific information when displayed to artists</p>

                    <p>{ARTIST}</p>
                    <p>{TITLE}</p>
                    <p>{RELEASE_DATE}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
    <!-- Permission Copy Right Modal -->
@endsection

@section('page-script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
    </script>
@endsection
