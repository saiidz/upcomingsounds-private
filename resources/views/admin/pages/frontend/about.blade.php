@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title', "About Section")

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>About Section</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">About Section </li>
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

                            <form method="post" class="basicform_with_reload" action="{{route('admin.about.section.store')}}" enctype="multipart/form-data">
                                @csrf
                              @php
                                $theme = !empty($theme) ? json_decode($theme->value) : '';
                              @endphp
                                <h4 class="card-title">About Us</h4>

                                <div class="row">
                                    <div class="col m6 s12 file-field input-field">
                                        <div class="btn float-right">
                                            <span>Banner Image</span>
                                            <input type="file" name="banner" accept="image/*">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($theme->banner) ? $theme->banner : 'images/logo.png') }}" alt="" height="100" style="object-fit: contain">
                                        </div>
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea id="heading" class="materialize-textarea" name="heading">{{ $theme->heading ?? null }}</textarea>
                                        <label for="heading">Heading</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="description" class="materialize-textarea" name="description">{{ $theme->description ?? null }}</textarea>
                                        <label for="description">Description</label>
                                    </div>
                                </div>
                                <h4 class="card-title">Inner Section</h4>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="heading_one" name="heading_one" type="text" value="{{ !empty($theme->heading_one) ? $theme->heading_one : null }}">
                                        <label for="heading_one">Heading</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea id="content_one" class="materialize-textarea" name="content_one">{{ $theme->content_one ?? null }}</textarea>
                                        <label for="content_one">Content</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="heading_two" name="heading_two" type="text" value="{{ !empty($theme->heading_two) ? $theme->heading_two : null }}">
                                        <label for="heading_two">Heading</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea id="content_two" class="materialize-textarea" name="content_two">{{ $theme->content_two ?? null }}</textarea>
                                        <label for="content_two">Content</label>
                                    </div>
                                </div>
                                <h4 class="card-title">About Us</h4>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="about_us_title" name="about_us_title" type="text" value="{{ !empty($theme->about_us_title) ? $theme->about_us_title : null }}">
                                        <label for="about_us_title">About Us Title</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col m6 s12 file-field input-field">
                                        <div class="btn float-right">
                                            <span>Banner Image One</span>
                                            <input type="file" name="banner_one" accept="image/*">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($theme->banner_one) ? $theme->banner_one : 'images/logo.png') }}" alt="" height="100" style="object-fit: contain">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="description_one" class="materialize-textarea" name="description_one">{{ $theme->description_one ?? null }}</textarea>
                                        <label for="description_one">Description</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="btn_text_one" name="btn_text_one" type="text" value="{{ !empty($theme->btn_text_one) ? $theme->btn_text_one : null }}">
                                        <label for="btn_text_one">Button Text</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="btn_link_one" type="text" name="btn_link_one" value="{{ !empty($theme->btn_link_one) ? $theme->btn_link_one : null }}">
                                        <label for="btn_link_one">Button Link</label>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col m6 s12 file-field input-field">
                                        <div class="btn float-right">
                                            <span>Banner Image Two</span>
                                            <input type="file" name="banner_two" accept="image/*">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($theme->banner_two) ? $theme->banner_two : 'images/logo.png') }}" alt="" height="100" style="object-fit: contain">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="description_two" class="materialize-textarea" name="description_two">{{ $theme->description_two ?? null }}</textarea>
                                        <label for="description_two">Description</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="btn_text_two" name="btn_text_two" type="text" value="{{ !empty($theme->btn_text_two) ? $theme->btn_text_two : null }}">
                                        <label for="btn_text_two">Button Text</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="btn_link_two" type="text" name="btn_link_two" value="{{ !empty($theme->btn_link_two) ? $theme->btn_link_two : null }}">
                                        <label for="btn_link_two">Button Link</label>
                                    </div>
                                </div>
                                <hr>

                                <div class="row">
                                    <div class="col m6 s12 file-field input-field">
                                        <div class="btn float-right">
                                            <span>Banner Image Three</span>
                                            <input type="file" name="banner_three" accept="image/*">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($theme->banner_three) ? $theme->banner_three : 'images/logo.png') }}" alt="" height="100" style="object-fit: contain">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="description_three" class="materialize-textarea" name="description_three">{{ $theme->description_three ?? null }}</textarea>
                                        <label for="description_three">Description</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="btn_text_three" name="btn_text_three" type="text" value="{{ !empty($theme->btn_text_three) ? $theme->btn_text_three : null }}">
                                        <label for="btn_text_three">Button Text</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="btn_link_three" type="text" name="btn_link_three" value="{{ !empty($theme->btn_link_three) ? $theme->btn_link_three : null }}">
                                        <label for="btn_link_three">Button Link</label>
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

