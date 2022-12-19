@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title', "Contact Section")

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Contact Section</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Contact Section </li>
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

                            <form method="post" class="basicform_with_reload" action="{{route('admin.contact.section.store')}}" enctype="multipart/form-data">
                                @csrf
                              @php
                                $theme = !empty($theme) ? json_decode($theme->value) : '';
                              @endphp
                                <h4 class="card-title">Contact Us Section</h4>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="address" name="address" type="text" value="{{ !empty($theme->address) ? $theme->address : null }}">
                                        <input id="address_detail" name="address_detail" type="text" value="{{ !empty($theme->address_detail) ? $theme->address_detail : null }}">
                                        <label for="heading_one">Address</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="working_hours" name="working_hours" type="text" value="{{ !empty($theme->working_hours) ? $theme->working_hours : null }}">
                                        <label for="working_hours">Working Hour</label>
                                    </div>
                                    <div class="input-field col s12">
                                        <input id="email" name="email" type="text" value="{{ !empty($theme->email) ? $theme->email : null }}">
                                        <label for="email">Email</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email_title" name="email_title" type="text" value="{{ !empty($theme->email_title) ? $theme->email_title : null }}">
                                        <label for="email_title">Email Title</label>
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

