@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title',@isset($verified_coverage) ? "Update Verified Coverage":"Create Verified Coverage")


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
            <div class="col-lg-8 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0 titleColor">{{ !empty($verified_coverage) ? "Edit Verified Coverage" : "Verified Coverage" }}</h1>
                    </div>
                    <form method="POST" action="{{!empty($verified_coverage)
                                    ? route('curator.update.verified.coverage', encrypt($verified_coverage->id))
                                    : route('curator.store.verified.coverage')}}"
                          enctype="multipart/form-data" class="new_basicform_with_reload">
                        @csrf
                        <div class="form-group">
                            <label class="control-label form-control-label text-muted">Offer Type</label>
                            <div>
                                <select class="form-control" name="offer_type">
                                    <option disabled selected>Please Choose</option>
                                    @if(!empty($offer_types))
                                        @foreach($offer_types as $offer_type)
                                            <option value="{{$offer_type->id}}" {{(!empty($verified_coverage) && $offer_type->id == $verified_coverage->v_c_offer_type) ? 'selected' : '' }}>{{$offer_type->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="textOffer">
                                <label class="control-label form-control-label text-muted">Description</label>
                            </div>
                            <div>
                                   <textarea name="description_details" id="descriptionDetails"
                                             placeholder="Offer Text..."
                                             class="form-control ckeditor">{!! !empty($verified_coverage) ? $verified_coverage->description : old('description_details') !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="control-label form-control-label text-muted">Time To Publish</label>
                                <select class="form-control" name="time_to_publish">
                                    <option disabled selected>Please Choose</option>
                                    @for ($i = 1; $i <= 30; $i++)
                                        <option value="{{ $i }}" {{ !empty($verified_coverage) ? $i == $verified_coverage->time_to_publish ? 'selected' : '' : ''}}>
                                            {{ $i }} {{ __('day' . ($i > 1 ? 's' : '')) }}
                                        </option>
                                    @endfor
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label class="control-label form-control-label text-muted">Contribution</label>
                                <div class="coinContribution">
                                    <img src="{{asset('images/coin_bg.png')}}" class="iconUsc" alt="">
                                    <input type="number" name="contribution" min="1" max="100" value="{{!empty($verified_coverage) ? $verified_coverage->contribution : old('contribution')}}" min="1" data-toggle="tooltip"
                                           class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="form-group m-t-2">
                            <label class="control-label form-control-label text-muted">
                                <input type="checkbox" class="radio permissionCopyright has-value" {{(!empty($verified_coverage) && $verified_coverage->confirm == 1) ? 'checked' : ''}} value="1" name="confirm">
                                As a representative of the organization selected for this offer, by clicking this box I confirm my authority to create, edit, and post offers for the proposal I have created.
                            </label>
                        </div>

                        <div class="form-group modal-footer">
                            <button type="submit" id="updateTrack" class="btn btn-sm rounded add_track basicbtn">
                                {{ !empty($verified_coverage) ? "Update" : "Submit" }}</button>
                            <a href="{{route('curator.verified.coverage')}}" class="btn btn-sm rounded add_track">Back</a>
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
