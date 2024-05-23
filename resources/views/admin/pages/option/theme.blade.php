@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title', "Theme Settings")

@section('page-style')
    <style>
        #loadings {
            background: rgba(255, 255, 255, .4) url({{asset('images/loader.gif')}}) no-repeat center center !important;
        }
        .switchDemo{
            height:25px !important;
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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Theme Settings</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Theme Settings </li>
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
                            <h4 class="card-title">Theme Settings</h4>
                            <form method="post" class="basicform_with_reload" action="{{route('admin.theme.settings.store')}}" enctype="multipart/form-data">
                                @csrf
                              @php
                                $theme = !empty($theme) ? json_decode($theme->value) : '';
                              @endphp
                                <div class="row">
                                    <div class="col m6 s12 file-field input-field">
                                        <div class="btn float-right">
                                            <span>Logo</span>
                                            <input type="file" name="logo" accept="image/*">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($theme->logo) ? $theme->logo : 'images/logo.png') }}" alt="" height="30" style="object-fit: contain">
                                        </div>
                                    </div>
                                    <div class="col m6 s12 file-field input-field">
                                        <div class="btn float-right">
                                            <span>Favicon</span>
                                            <input type="file" name="favicon" accept="image/*">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($theme->favicon) ? $theme->favicon : 'images/favicon.png') }}" alt="" height="30" style="object-fit: contain">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col m6 s12 file-field input-field">
                                        <div class="btn float-right">
                                            <span>Artist Banner</span>
                                            <input type="file" name="artist_banner" accept="image/*">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($theme->artist_banner) ? $theme->artist_banner : 'images/logo.png') }}" alt="" height="30" style="object-fit: contain">
                                        </div>
                                    </div>
                                    <div class="col m6 s12 file-field input-field">
                                        <div class="btn float-right">
                                            <span>Curator Banner</span>
                                            <input type="file" name="curator_banner" accept="image/*">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($theme->curator_banner) ? $theme->curator_banner : 'images/logo.png') }}" alt="" height="30" style="object-fit: contain">
                                        </div>
                                    </div>

                                    <div class="col m6 s12 file-field input-field">
                                        <div class="btn float-right">
                                            <span>Blog Banner</span>
                                            <input type="file" name="blog_banner" accept="image/*">
                                        </div>
                                        <div class="file-path-wrapper">
                                            <img class=" ml-3 img-fluid" src="{{ asset(!empty($theme->blog_banner) ? $theme->blog_banner : 'images/blog-bg.jpg') }}" alt="" height="30" style="object-fit: contain">
                                        </div>
                                    </div>

                                    <div class="col m6 s12 file-field input-field">
                                        <div class="float-left">
                                            <span>Curator Border Hide Show</span>

                                        </div>
                                        <div class="file-path-wrapper">
                                            <label class="switch">
                                                <input type="checkbox" name="curator_border" {{ !empty($theme->curator_border) && ($theme->curator_border == 'on') ? 'checked' : null }}>
                                                <span class="slider switchDemo" style="height: 1px !important;"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="facebook_icon" name="facebook_icon" type="text" value="{{ !empty($theme->facebook_icon) ? $theme->facebook_icon : null }}">
                                        <label for="facebook_icon">Facebook Icon</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="facebook_link" type="text" name="facebook_link" value="{{ !empty($theme->facebook_link) ? $theme->facebook_link : null }}">
                                        <label for="facebook_link">Facebook Link</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="instagram_icon" name="instagram_icon" type="text" value="{{ !empty($theme->instagram_icon) ? $theme->instagram_icon : null }}">
                                        <label for="instagram_icon">Instagram Icon</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="instagram_link" type="text" name="instagram_link" value="{{ !empty($theme->instagram_link) ? $theme->instagram_link : null }}">
                                        <label for="instagram_link">Instagram Link</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="spotify_icon" name="spotify_icon" type="text" value="{{ !empty($theme->spotify_icon) ? $theme->spotify_icon : null }}">
                                        <label for="spotify_icon">Spotify Icon</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="spotify_link" type="text" name="spotify_link" value="{{ !empty($theme->spotify_link) ? $theme->spotify_link : null }}">
                                        <label for="spotify_link">Spotify Link</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="twitter_icon" name="twitter_icon" type="text" value="{{ !empty($theme->twitter_icon) ? $theme->twitter_icon : null }}">
                                        <label for="twitter_icon">Twitter Icon</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="twitter_link" type="text" name="twitter_link" value="{{ !empty($theme->twitter_link) ? $theme->twitter_link : null }}">
                                        <label for="twitter_link">Twitter Link</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="youtube_icon" name="youtube_icon" type="text" value="{{ !empty($theme->youtube_icon) ? $theme->youtube_icon : null }}">
                                        <label for="youtube_icon">Youtube Icon</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="youtube_link" type="text" name="youtube_link" value="{{ !empty($theme->youtube_link) ? $theme->youtube_link : null }}">
                                        <label for="youtube_link">Youtube Link</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="tiktok_icon" name="tiktok_icon" type="text" value="{{ !empty($theme->tiktok_icon) ? $theme->tiktok_icon : null }}">
                                        <label for="tiktok_icon">Tiktok Icon</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="tiktok_link" type="text" name="tiktok_link" value="{{ !empty($theme->tiktok_link) ? $theme->tiktok_link : null }}">
                                        <label for="tiktok_link">Tiktok Link</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col m6 s12">
                                        <input id="reddit_icon" name="reddit_icon" type="text" value="{{ !empty($theme->reddit_icon) ? $theme->reddit_icon : null }}">
                                        <label for="reddit_icon">Reddit Icon</label>
                                    </div>
                                    <div class="input-field col m6 s12">
                                        <input id="reddit_link" type="text" name="reddit_link" value="{{ !empty($theme->reddit_link) ? $theme->reddit_link : null }}">
                                        <label for="reddit_link">Reddit Link</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="footer_description" class="materialize-textarea" name="footer_description">{{ $theme->footer_description ?? null }}</textarea>
                                        <label for="message">Footer Description</label>
                                    </div>
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

