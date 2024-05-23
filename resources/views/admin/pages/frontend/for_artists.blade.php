@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title', "For Artists Section")

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>For Artists Section</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">For Artists Section </li>
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

                            <form method="post" class="basicform_with_reload" action="{{route('admin.for.artists.section.store')}}" enctype="multipart/form-data">
                                @csrf
                              @php
                                $theme = !empty($theme) ? json_decode($theme->value) : '';
                              @endphp
                                <h4 class="card-title">For Artists</h4>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="artist_title" name="artist_title" type="text" value="{{ !empty($theme->artist_title) ? $theme->artist_title : null }}">
                                        <label for="artist_title">Artist Title</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea id="artist_description" class="materialize-textarea" name="artist_description">{{ $theme->artist_description ?? null }}</textarea>
                                        <label for="message">Artist Description</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="artist_btn_text" name="artist_btn_text" type="text" value="{{ !empty($theme->artist_btn_text) ? $theme->artist_btn_text : null }}">
                                        <label for="artist_btn_text">Artist Button Text</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="artist_btn_link" type="text" name="artist_btn_link" value="{{ !empty($theme->artist_btn_link) ? $theme->artist_btn_link : null }}">
                                        <label for="artist_btn_link">Artist Button Link</label>
                                    </div>
                                </div>
                                <h4 class="card-title">For Curators</h4>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="curator_title" name="curator_title" type="text" value="{{ !empty($theme->curator_title) ? $theme->curator_title : null }}">
                                        <label for="curator_title">Curator Title</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <textarea id="curator_description" class="materialize-textarea" name="curator_description">{{ $theme->curator_description ?? null }}</textarea>
                                        <label for="curator_description">Curator Description</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="curator_btn_text" name="curator_btn_text" type="text" value="{{ !empty($theme->curator_btn_text) ? $theme->curator_btn_text : null }}">
                                        <label for="curator_btn_text">Curator Button Text</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="curator_btn_link" type="text" name="curator_btn_link" value="{{ !empty($theme->curator_btn_link) ? $theme->curator_btn_link : null }}">
                                        <label for="curator_btn_link">Curator Button Link</label>
                                    </div>
                                </div>
                                <h4 class="card-title">Home Page Slider</h4>
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
                                    <div class="col m6 s12 file-field input-field">
                                        <input id="title_one" type="text" name="title_one" value="{{ !empty($theme->title_one) ? $theme->title_one : null }}">
                                        <label for="title_one">Title</label>
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
                                    <div class="col m6 s12 file-field input-field">
                                        <input id="title_two" type="text" name="title_two" value="{{ !empty($theme->title_two) ? $theme->title_two : null }}">
                                        <label for="title_two">Title</label>
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
                                    <div class="col m6 s12 file-field input-field">
                                        <input id="title_three" type="text" name="title_three" value="{{ !empty($theme->title_three) ? $theme->title_three : null }}">
                                        <label for="title_three">Title</label>
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
                                <h4 class="card-title">UpcomingSounds Content</h4>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="upcoming_sound_content_one" class="materialize-textarea" name="upcoming_sound_content_one">{{ $theme->upcoming_sound_content_one ?? null }}</textarea>
                                        <label for="upcoming_sound_content_one">Description One</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="upcoming_sound_content_two" class="materialize-textarea" name="upcoming_sound_content_two">{{ $theme->upcoming_sound_content_two ?? null }}</textarea>
                                        <label for="upcoming_sound_content_two">Description Two</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="upcoming_sound_content_three" class="materialize-textarea" name="upcoming_sound_content_three">{{ $theme->upcoming_sound_content_three ?? null }}</textarea>
                                        <label for="upcoming_sound_content_three">Description Three</label>
                                    </div>
                                </div>
                                <h4 class="card-title">Home Page End Section</h4>

                                <div class="row">
                                    <div class="col m6 s12 file-field input-field">
                                        <div class="btn float-right">
                                            <span>Background Image</span>
                                            <input type="file" name="image" accept="image/*">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($theme->image) ? $theme->image : 'images/logo.png') }}" alt="" height="100" style="object-fit: contain; background-color: black;">
                                        </div>
                                    </div>
                                    <div class="col s12 file-field input-field">
                                        <input id="title_one_end_section" type="text" name="title_one_end_section" value="{{ !empty($theme->title_one_end_section) ? $theme->title_one_end_section : null }}">
                                        <label for="title_one_end_section">Title One</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="description_one_end_section" class="materialize-textarea" name="description_one_end_section">{{ $theme->description_one_end_section ?? null }}</textarea>
                                        <label for="description_one_end_section">Description One End Section</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 file-field input-field">
                                        <input id="title_two_end_section" type="text" name="title_two_end_section" value="{{ !empty($theme->title_two_end_section) ? $theme->title_two_end_section : null }}">
                                        <label for="title_two_end_section">Title Two</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="description_two_end_section" class="materialize-textarea" name="description_two_end_section">{{ $theme->description_two_end_section ?? null }}</textarea>
                                        <label for="description_two_end_section">Description Two End Section</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col s12 file-field input-field">
                                        <input id="title_three_end_section" type="text" name="title_three_end_section" value="{{ !empty($theme->title_three_end_section) ? $theme->title_three_end_section : null }}">
                                        <label for="title_three_end_section">Title Three</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="description_three_end_section" class="materialize-textarea" name="description_three_end_section">{{ $theme->description_three_end_section ?? null }}</textarea>
                                        <label for="description_three_end_section">Description Three End Section</label>
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

