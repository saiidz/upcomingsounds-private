@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Add Vehicle')

@section('content')
<div id="main">
        <div class="row">
            <div class="content-wrapper-before gradient-45deg-indigo-purple"></div>
            <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
                <!-- Search for small screen-->
                <div class="container">
                    <div class="row">
                        <div class="col s10 m6 l6">
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Add Settings</span></h5>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col s12">
                <div class="container">
                    <div class="section">

                        @if ($message = Session::get('success'))
                            <div class="card-alert card green lighten-5 remove_message">
                                <div class="card-content green-text">
                                    <p>{{ $message }}</p>
                                </div>
                                <button type="button" class="close red-text" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                        @endif
                        <!-- jQuery Plugin Initialization -->
                        <div class="row">
                            <!-- Form Advance -->
                            <div class="col s12 m12 l12">
                                <div id="Form-advance" class="card card card-default scrollspy">
                                    <div class="card-content">
                                        <form method="POST" action="{{ isset($update) ? route('settings.update', $setting->id) : route('settings.store')}}" enctype="multipart/form-data">
                                            @if(isset($update))
                                                @method("PUT")
                                            @endif
                                            @csrf
                                            <div class="row">
                                                <div class="input-field col m6 s12">
                                                    <input id="title" class="@error('title') is-invalid @enderror" name="title" value="{{ isset($setting) ? $setting->title : old('title')}}" type="text" readonly>
                                                    <label for="title">Title</label>
                                                    @error('title')
                                                        <small class="red-text" role="alert">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                                <div class="input-field col m6 s12">
                                                    <input id="value" class="@error('value') is-invalid @enderror" name="value" value="{{ isset($setting) ? $setting->value : old('value')}}" type="text">
                                                    <label for="value">Value</label>
                                                    @error('value')
                                                    <small class="red-text" role="alert">
                                                        {{ $message }}
                                                    </small>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                <div class="input-field col s12">
                                                    <button class="btn cyan waves-effect waves-light right" type="submit"> {{ isset($update) ? __('Update') : __('Create')}}
                                                        <i class="material-icons right">send</i>
                                                    </button>
                                                </div>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="content-overlay"></div>
            </div>
        </div>
    </div>
@endsection
