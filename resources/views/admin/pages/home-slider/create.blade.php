@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title', @isset($homeSlider) ? "Update Slider":"Create Slider")

@section('page-style')
    <style>
        hr {
            width: 273px;
        }
        #loadings {
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
    </style>
@endsection

@section('content')

    <!-- BEGIN: Page Main-->
    <div id="main">
        <div class="row">
            @include('admin.panels.bg-color')
            <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>@if(isset($homeSlider)) Update Slider @else Create Slider @endif</span></h5>
                            <ol class="breadcrumbs mb-0">
                                @include('admin.panels.breadcrumbs')
                                <li class="breadcrumb-item active">@if(isset($homeSlider)) Update Slider @else Create Slider @endif </li>
                            </ol>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col s12">
                <div class="container">
                    <!-- Form Advance -->
                    <div class="col s12 m12 l12">
                        <div id="Form-advance" class="card card card-default scrollspy">
                            <div class="card-content">

                                {!! Form::model($homeSlider ?? null, [
                                    'class' => 'basicform_with_reload',
                                    'reset'=> 'true',
                                    'method' => isset($homeSlider) ? 'put' : 'post',
                                    'url' => isset($homeSlider)
                                    ? route('admin.home-sliders.update', $homeSlider->id)
                                    : route('admin.home-sliders.store')
                            ]) !!}
                                @csrf
                                <div class="row">
                                    <div class="input-field col s12">
                                        {!! Form::text('title',$homeSlider->title ?? null,['placeholder'=>'New Level','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                        <label for="title">Title</label>
                                    </div>
                                    <div class="input-field col s12">
                                        {!! Form::textarea('details',$homeSlider->details ?? null,['class'=>"materialize-textarea", 'required'=>false]) !!}
                                        <label for="details">Description</label>
                                    </div>

                                    <div class="input-field col s6">
                                        {!! Form::text('button_one_text',$homeSlider->button_one_text ?? null,['placeholder'=>'Classic','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                        <label for="button_one_text">Button One Text</label>
                                    </div>
                                    <div class="input-field col s6">
                                        {!! Form::text('button_one_link',$homeSlider->button_one_link ?? null,['placeholder'=>'Classic','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                        <label for="button_one_link">Button One Link</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <span>Button One Status</span>
                                        <select class="form-control-label" name="button_one_status">
                                            <option value="1" {{!empty($homeSlider) ? ($homeSlider->button_one_status == 1 ? 'selected' : '' ) : ''}}>Active</option>
                                            <option value="0" {{!empty($homeSlider) ? ($homeSlider->button_one_status == 0 ? 'selected' : '' ) : ''}}>InActive</option>
                                        </select>
                                    </div>

                                    <div class="input-field col s6">
                                        {!! Form::text('button_two_text',$homeSlider->button_two_text ?? null,['placeholder'=>'Classic','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                        <label for="button_two_text">Button Two Text</label>
                                    </div>
                                    <div class="input-field col s6">
                                        {!! Form::text('button_two_link',$homeSlider->button_two_link ?? null,['placeholder'=>'Classic','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                        <label for="button_two_link">Button Two Link</label>
                                    </div>

                                    <div class="input-field col s6">
                                        <span>Button Two Status</span>
                                        <select class="form-control-label" name="button_two_status">
                                            <option value="1" {{!empty($homeSlider) ? ($homeSlider->button_two_status == 1 ? 'selected' : '' ) : ''}}>Active</option>
                                            <option value="0" {{!empty($homeSlider) ? ($homeSlider->button_two_status == 0 ? 'selected' : '' ) : ''}}>InActive</option>
                                        </select>
                                    </div>

                                    <div class="input-field col m6 s12 file-field">
                                        <div class="btn float-right">
                                            <span>Slider Image</span>
                                            {!! Form::file('image',['placeholder'=>'Farhan','accept' => 'image/*','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                        </div>

                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($homeSlider->image) ? $homeSlider->image : 'images/logo.png') }}" alt="" height="50" style="object-fit: contain">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col m6 s12 file-field">
                                            <span>Slider Status</span>
                                            <select class="form-control-label" name="status">
                                                <option value="1" {{!empty($homeSlider) ? ($homeSlider->status == 1 ? 'selected' : '' ) : ''}}>Active</option>
                                                <option value="0" {{!empty($homeSlider) ? ($homeSlider->status == 0 ? 'selected' : '' ) : ''}}>InActive</option>
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <div class="input-field col s12">
                                            <button class="btn cyan waves-effect waves-light basicbtn" type="submit">{{ isset($homeSlider) ? 'Update' : 'Save' }}</button>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
    <!-- END: Page Main-->
@endsection

{{-- page scripts --}}
@section('page-script')

@endsection
