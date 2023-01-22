@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title', @isset($alternative_option) ? "Update Alternative Option":"Create Alternative Option")

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Offer Type</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Add New Offer Type </li>
						</ol>
					</div>
				</div>

			</div>
		</div>
		<div class="col s12">
			<div class="container">
                <!-- Form with validation -->
                    <div class="col s12 m12 l12">
                        <div id="form-with-validation" class="card card card-default scrollspy">
                            <div class="card-content">
                                {!! Form::model($alternative_option ?? null, [
                                    'class' => 'basicform_with_reload',
                                    'reset'=> 'true',
                                    'method' => isset($alternative_option) ? 'put' : 'post',
                                    'url' => isset($alternative_option)
                                    ? route('admin.alternative-options.update', $alternative_option->id)
                                    : route('admin.alternative-options.store')
                            ]) !!}
                                     @csrf
                                    <div class="row">
                                        <div class="input-field col m4 s6">
                                            {!! Form::text('name',$alternative_option->name ?? null,['placeholder'=>'Twitter mention','class'=>"validate", 'id' => 'name', 'required'=>false]) !!}
                                            <label for="icon_prefix2">Alternative Option Name</label>
                                        </div>
                                        <div class="input-field col m4 s12">
                                            <div class="input-field col s12">
                                                {{-- {!! Form::submit(isset($alternative_option) ? 'Update' : 'Save',['class'=>'btn cyan waves-effect waves-light basicbtn']) !!} --}}
                                                <button class="btn cyan waves-effect waves-light basicbtn" type="submit">{{ isset($alternative_option) ? 'Update' : 'Save' }}</button>
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

