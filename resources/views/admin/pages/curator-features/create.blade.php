@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title', @isset($curator_feature) ? "Update Curator Features":"Create Curator Features")

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Curator Features</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Add New Curator Features </li>
						</ol>
					</div>
                    @if (!empty($curator_feature))
                        <div class="col s2 m6 l6">
                            <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="{{ url('admin/curator-sub-feature/'.$curator_feature->id) }}" data-target="dropdown1">
                                <span class="hide-on-small-onl">All Sub Curators</span>
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
                                {!! Form::model($curator_feature ?? null, [
                                    'class' => 'basicform_with_reload',
                                    'reset'=> 'true',
                                    'method' => isset($curator_feature) ? 'put' : 'post',
                                    'url' => isset($curator_feature)
                                    ? route('admin.curator-features.update', $curator_feature->id)
                                    : route('admin.curator-features.store')
                            ]) !!}
                                     @csrf
                                    <div class="row">
                                        <div class="input-field col m4 s6">
                                            {!! Form::text('name',$curator_feature->name ?? null,['placeholder'=>'Classic','class'=>"validate", 'id' => 'name', 'required'=>false]) !!}
                                            <label for="icon_prefix2">Curator Feature Name</label>
                                        </div>
                                        <div class="input-field col m4 s12">
                                            <div class="input-field col s12">
                                                {{-- {!! Form::submit(isset($curator_feature) ? 'Update' : 'Save',['class'=>'btn cyan waves-effect waves-light basicbtn']) !!} --}}
                                                <button class="btn cyan waves-effect waves-light basicbtn" type="submit">{{ isset($curator_feature) ? 'Update' : 'Save' }}</button>
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

