@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title', @isset($banner) ? "Update Banner":"Create Banner")

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
            <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
            <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Create Banner</span></h5>
                            <ol class="breadcrumbs mb-0">
                                @include('admin.panels.breadcrumbs')
                                <li class="breadcrumb-item active">Create Banner </li>
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

                                {!! Form::model($banner ?? null, [
                                    'class' => 'basicform_with_reload',
                                    'reset'=> 'true',
                                    'method' => isset($banner) ? 'put' : 'post',
                                    'url' => isset($banner)
                                    ? route('admin.banners.update', $banner->id)
                                    : route('admin.banners.store')
                            ]) !!}
                                @csrf
                                <div class="row">
                                    <div class="input-field col s6">
                                        {!! Form::text('artist_name',$banner->artist_name ?? null,['placeholder'=>'Farhan','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                        <label for="artist_title">Artist Name</label>
                                    </div>
                                    <div class="col m6 s12 file-field input-field">
                                        <div class="btn float-right">
                                            <span>Artist Thumbnail</span>
                                            {!! Form::file('track_thumbnail',['placeholder'=>'Farhan','accept' => 'image/*','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                        </div>
                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($banner->track_thumbnail) ? 'uploads/track_thumbnail/'.$banner->track_thumbnail : 'images/logo.png') }}" alt="" height="50" style="object-fit: contain">
                                        </div>
                                    </div>
                                    <div class="input-field col s12">
                                        {!! Form::text('track_name',$banner->track_name ?? null,['placeholder'=>'Classic','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                        <label for="track_name">Track Name</label>
                                    </div>
                                    <div class="input-field col s12">
                                        {!! Form::textarea('track_description',$banner->track_description ?? null,['class'=>"materialize-textarea", 'required'=>false]) !!}
                                        <label for="track_description">Artist Description</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m4 s12">
                                        <div class="input-field col s12">
                                            <button class="btn cyan waves-effect waves-light basicbtn" type="submit">{{ isset($banner) ? 'Update' : 'Save' }}</button>
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

