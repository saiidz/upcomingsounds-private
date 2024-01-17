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
                                    <h4 class="card-title">Get Verified Add Iframe Links</h4>
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <input id="get_verified_link_1" name="get_verified_link_1" type="text" value="{{ !empty($theme->get_verified_link_1) ? $theme->get_verified_link_1 : null }}">
                                            <label for="get_verified_link_1">Get Verified One</label>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <input id="get_verified_link_2" name="get_verified_link_2" type="text" value="{{ !empty($theme->get_verified_link_2) ? $theme->get_verified_link_2 : null }}">
                                            <label for="get_verified_link_2">Get Verified Two</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <input id="get_verified_link_3" name="get_verified_link_3" type="text" value="{{ !empty($theme->get_verified_link_3) ? $theme->get_verified_link_3 : null }}">
                                            <label for="get_verified_link_3">Get Verified Three</label>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <input id="get_verified_link_4" name="get_verified_link_4" type="text" value="{{ !empty($theme->get_verified_link_4) ? $theme->get_verified_link_4 : null }}">
                                            <label for="get_verified_link_4">Get Verified Four</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <input id="get_verified_link_5" name="get_verified_link_5" type="text" value="{{ !empty($theme->get_verified_link_5) ? $theme->get_verified_link_5 : null }}">
                                            <label for="get_verified_link_5">Get Verified Five</label>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <input id="get_verified_link_6" name="get_verified_link_6" type="text" value="{{ !empty($theme->get_verified_link_6) ? $theme->get_verified_link_6 : null }}">
                                            <label for="get_verified_link_6">Get Verified Six</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <input id="get_verified_link_7" name="get_verified_link_7" type="text" value="{{ !empty($theme->get_verified_link_7) ? $theme->get_verified_link_7 : null }}">
                                            <label for="get_verified_link_7">Get Verified Seven</label>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <input id="get_verified_link_8" name="get_verified_link_8" type="text" value="{{ !empty($theme->get_verified_link_8) ? $theme->get_verified_link_8 : null }}">
                                            <label for="get_verified_link_8">Get Verified Eight</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col m6 s12">
                                            <input id="get_verified_link_9" name="get_verified_link_9" type="text" value="{{ !empty($theme->get_verified_link_9) ? $theme->get_verified_link_9 : null }}">
                                            <label for="get_verified_link_9">Get Verified Nine</label>
                                        </div>
                                        <div class="input-field col m6 s12">
                                            <input id="get_verified_link_10" name="get_verified_link_10" type="text" value="{{ !empty($theme->get_verified_link_10) ? $theme->get_verified_link_10 : null }}">
                                            <label for="get_verified_link_10">Get Verified Ten</label>
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

