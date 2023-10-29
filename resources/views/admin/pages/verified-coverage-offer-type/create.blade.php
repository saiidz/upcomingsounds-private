@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title', @isset($offer_type) ? "Update Verified Coverage Offer Type":"Create Verified Coverage Offer Type")

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Verified Coverage Offer Type</span></h5>
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
                                {!! Form::model($offer_type ?? null, [
                                    'class' => 'basicform_with_reload',
                                    'reset'=> 'true',
                                    'method' => isset($offer_type) ? 'put' : 'post',
                                    'url' => isset($offer_type)
                                    ? route('admin.verified-coverage-offer-types.update', $offer_type->id)
                                    : route('admin.verified-coverage-offer-types.store')
                            ]) !!}
                                     @csrf
                                    <div class="row">
                                        <div class="input-field col m4 s6">
                                            {!! Form::text('name',$offer_type->name ?? null,['placeholder'=>'Review(Online)','class'=>"validate", 'id' => 'name', 'required'=>false]) !!}
                                            <label for="icon_prefix2">Offer Type Name</label>
                                        </div>
                                        <div class="input-field col m4 s12">
                                            <div class="input-field col s12">
                                                {{-- {!! Form::submit(isset($offer_type) ? 'Update' : 'Save',['class'=>'btn cyan waves-effect waves-light basicbtn']) !!} --}}
                                                <button class="btn cyan waves-effect waves-light basicbtn" type="submit">{{ isset($offer_type) ? 'Update' : 'Save' }}</button>
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

