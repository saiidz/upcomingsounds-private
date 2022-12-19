@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title', "Curators Settings")

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
                            <h5 class="breadcrumbs-title mt-0 mb-0"><span>Curators Settings</span></h5>
                            <ol class="breadcrumbs mb-0">
                                @include('admin.panels.breadcrumbs')
                                <li class="breadcrumb-item active">Curators Settings </li>
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
                                <h4 class="card-title">Curators Settings</h4>
                                <form method="post" class="basicform_with_reload" action="{{route('admin.curators.store')}}" enctype="multipart/form-data">
                                    @csrf
                                    @php
                                        $theme = !empty($theme) ? json_decode($theme->value) : '';
                                    @endphp
                                    <div class="row">
                                        <div class="col m6 s12 file-field input-field">
                                            <div class="btn float-right">
                                                <span>Curator Dashboard Banner Image</span>
                                                <input type="file" name="curator_banner_img" accept="image/*">
                                            </div>
                                            <div class="file-path-wrapper">
                                                <img class=" ml-3 img-fluid" src="{{ asset(!empty($theme->curator_banner_img) ? $theme->curator_banner_img : 'images/logo.png') }}" alt="" height="50" style="object-fit: contain">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn cyan waves-effect waves-light right basicbtn" type="submit">Submit <i class="material-icons right">send</i> </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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

