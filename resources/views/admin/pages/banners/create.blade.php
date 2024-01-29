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
                                    <div class="input-field col s12">
                                        {!! Form::text('artist_name',$banner->artist_name ?? null,['placeholder'=>'Farhan','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                        <label for="artist_title">Artist Name</label>
                                    </div>
                                    <div class="col m6 s12 file-field">
{{--                                    <div class="col m6 s12 file-field input-field">--}}
                                        <div class="btn float-right">
                                            <span>Track Thumbnail</span>
                                            {!! Form::file('track_thumbnail',['placeholder'=>'Farhan','accept' => 'image/*','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                        </div>

                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($banner->track_thumbnail) ? 'uploads/track_thumbnail/'.$banner->track_thumbnail : 'images/logo.png') }}" alt="" height="50" style="object-fit: contain">
                                        </div>
                                    </div>
                                    @if(!empty($banner))
                                        <a href="javascript:void(0)" data-id="{{ $banner->id }}" class="dropdown-item has-icon remove_thumbnail">
                                            Remove Thumbnail
                                        </a>
                                    @endif
                                    <div class="col m6 s12 file-field input-field">
                                        <div class="btn float-right">
                                            <span>Track Audio</span>
                                            {!! Form::file('audio',['accept' => '.mp3','class'=>"validate", 'required'=>false]) !!}
                                        </div>
                                        <div class="file-path-wrapper">
                                            <audio controls="" src="{{ asset(!empty($banner->audio) ? 'uploads/audio/'.$banner->audio : '') }}" type="audio/mp3" controlslist="nodownload" id="audioTrackPreview"></audio>
                                        </div>
                                    </div>
                                    <br>
                                    @if(!empty($banner))
                                        <a href="javascript:void(0)" data-id="{{ $banner->id }}" class="dropdown-item has-icon remove_audio">
                                            Remove Audio
                                        </a>
                                    @endif
                                    <div class="input-field col s6">
                                        {!! Form::text('track_name',$banner->track_name ?? null,['placeholder'=>'Classic','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                        <label for="track_name">Track Name</label>
                                    </div>
                                    <div class="input-field col s6">
                                        {!! Form::url('link',$banner->link ?? null,['placeholder'=>'link','class'=>"validate", 'id' => 'link', 'required'=>false]) !!}
                                        <label for="link">Url Link(https only link allow)</label>
                                    </div>
                                    <div class="input-field col s12">
                                        {!! Form::textarea('track_description',$banner->track_description ?? null,['class'=>"materialize-textarea", 'required'=>false]) !!}
                                        <label for="track_description">Artist Description</label>
                                    </div>

                                    <div class="row">
                                        <div class="col m6 s12 file-field">
                                            <div class="btn float-right">
                                                <span>Banner Image</span>
                                                {!! Form::file('banner_img',['placeholder'=>'Farhan','accept' => 'image/*','class'=>"validate", 'id' => 'banner_img', 'required'=>false]) !!}
                                            </div>

                                            <div class="file-path-wrapper">
                                                <img class=" ml-3 img-fluid" src="{{ asset(!empty($banner->banner_img) ? 'uploads/banner_img/'.$banner->banner_img : 'images/border.png') }}" alt="" height="50" style="object-fit: contain">
                                            </div>
                                        </div>
                                        @if(!empty($banner->banner_img))
                                            <a href="javascript:void(0)" data-id="{{ $banner->id }}" class="dropdown-item has-icon remove_banner_image">
                                                Remove Banner Image
                                            </a>
                                        @endif

                                        <div class="col m6 s12 file-field">
                                            <span>Banner Status</span>
                                            <select class="form-control-label" name="banner_img_status">
                                                <option value="1" {{!empty($banner) ? ($banner->banner_img_status == 1 ? 'selected' : '' ) : ''}}>Active</option>
                                                <option value="0" {{!empty($banner) ? ($banner->banner_img_status == 0 ? 'selected' : '' ) : ''}}>InActive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col m6 s12 file-field">
                                            <div class="btn float-right">
                                                <span>Banner Image One</span>
                                                {!! Form::file('banner_img',['placeholder'=>'Farhan','accept' => 'image/*','class'=>"validate", 'id' => 'banner_img_one', 'required'=>false]) !!}
                                            </div>

                                            <div class="file-path-wrapper">
                                                <img class=" ml-3 img-fluid" src="{{ asset(!empty($banner->banner_img_one) ? 'uploads/banner_img/'.$banner->banner_img_one : 'images/border.png') }}" alt="" height="50" style="object-fit: contain">
                                            </div>
                                        </div>
                                        @if(!empty($banner->banner_img_one))
                                            <a href="javascript:void(0)" data-id="{{ $banner->id }}" class="dropdown-item has-icon remove_banner_image">
                                                Remove Banner Image One
                                            </a>
                                        @endif

                                        <div class="col m6 s12 file-field">
                                            <span>Banner One Status</span>
                                            <select class="form-control-label" name="banner_img_one_status">
                                                <option value="1" {{!empty($banner) ? ($banner->banner_img_one_status == 1 ? 'selected' : '' ) : ''}}>Active</option>
                                                <option value="0" {{!empty($banner) ? ($banner->banner_img_one_status == 0 ? 'selected' : '' ) : ''}}>InActive</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s6">
                                            {!! Form::text('button_text',$banner->button_text ?? null,['placeholder'=>'','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                            <label for="button_text">Button Text</label>
                                        </div>
                                        <div class="input-field col s6">
                                            {!! Form::text('button_link',$banner->button_link ?? null,['placeholder'=>'','class'=>"validate", 'id' => 'artist_name', 'required'=>false]) !!}
                                            <label for="button_link">Button Link</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col m6 s12 file-field">
                                            <span>Button Status</span>
                                            <select class="form-control-label" name="button_status">
                                                <option value="1" {{!empty($banner) ? ($banner->button_status == 1 ? 'selected' : '' ) : ''}}>Active</option>
                                                <option value="0" {{!empty($banner) ? ($banner->button_status == 0 ? 'selected' : '' ) : ''}}>InActive</option>
                                            </select>
                                        </div>
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

{{-- page scripts --}}
@section('page-script')
    <script>
        /*-------------------------------
        Remove Banner Alert
      -----------------------------------*/
        $('.remove_thumbnail').on('click', function(event) {
            const id = $(this).data('id');
            console.log(id);

            $.ajax({
                type: "POST",
                url: '{{ route("admin.banner.thumbnail.remove") }}',
                data: {
                    'campaign_id': id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (data) {
                    location.reload();
                }
            });
        });

        /*-------------------------------
        Remove Banner Image Alert
      -----------------------------------*/
        $('.remove_banner_image').on('click', function(event) {
            const id = $(this).data('id');
            console.log(id);

            $.ajax({
                type: "POST",
                url: '{{ route("admin.banner.img.remove") }}',
                data: {
                    'campaign_id': id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (data) {
                    location.reload();
                }
            });
        });

        $('.remove_audio').on('click', function(event) {
            const id = $(this).data('id');
            $.ajax({
                type: "POST",
                url: '{{ route("admin.banner.audio.remove") }}',
                data: {
                    'campaign_id': id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function (data) {
                    location.reload();
                }
            });
        });
    </script>
@endsection
