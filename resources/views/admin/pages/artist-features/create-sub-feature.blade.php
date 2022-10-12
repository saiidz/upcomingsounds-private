@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title', @isset($sub_feature) ? "Update Sub Artist Feature":"Create Sub Artist Feature")

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Artist Features</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">{{ isset($sub_feature) ? 'Update Sub Artist Feature' : 'Add New Sub Artist Feature ' }}</li>
						</ol>
					</div>
                    @if (!empty($feature))
                        <div class="col s2 m6 l6">
                            <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="{{ url('admin/artist-sub-feature/'.$feature->id) }}" data-target="dropdown1">
                                <span class="hide-on-small-onl">All Sub Features</span>
                            </a>
                        </div>
                    @endif
				</div>

			</div>
		</div>
		<div class="col s12">
			<div class="container">
                <!-- Form with validation -->
                    <div class="col s12 m12 l12">
                        <div id="form-with-validation" class="card card card-default scrollspy">
                            <div class="card-content">
                                {!! Form::model($sub_feature ?? null, [
                                    'class' => 'basicform_with_reload',
                                    'reset'=> 'true',
                                    'method' => isset($sub_feature) ? 'post' : 'post',
                                    'url' => isset($sub_feature)
                                    ? url('admin/artist-sub-feature/'.$sub_feature->id.'/update')
                                    : url('admin/artist-sub-feature/store')
                            ]) !!}
                                     @csrf
                                     <input type="hidden" name="feature_id" value="{{ !empty($feature) ? $feature->id : (!empty($sub_feature->curatorFeature) ? $sub_feature->curatorFeature->id : '') }}">
                                    <div class="row">
                                        <div class="input-field col m4 s6">
                                            {!! Form::text('name',$sub_feature->name ?? null,['placeholder'=>'Acting','class'=>"validate", 'id' => 'name', 'required'=>false]) !!}
                                            <label for="icon_prefix2">Sub Feature Name</label>
                                        </div>
                                        <div class="input-field col m4 s12">
                                            <div class="input-field col s12">
                                                {{-- {!! Form::submit(isset($sub_feature) ? 'Update' : 'Save',['class'=>'btn cyan waves-effect waves-light basicbtn']) !!} --}}
                                                <button class="btn cyan waves-effect waves-light basicbtn" type="submit">{{ isset($sub_feature) ? 'Update' : 'Save' }}</button>
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

