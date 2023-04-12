@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}

@section('title', @isset($blogUser) ? "Update Blog User":"Create Blog User")

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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Blog User</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Add New Blog User </li>
						</ol>
					</div>
                    @if (!empty($blogUser))
                        <div class="col s2 m6 l6">
                            <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="{{ route('admin.blog-users.index') }}" data-target="dropdown1">
                                <span class="hide-on-small-onl">All Blog Users</span>
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
                                {!! Form::model($blogUser ?? null, [
                                    'class' => 'basicform_with_reload',
                                    'reset'=> 'true',
                                    'method' => isset($blogUser) ? 'put' : 'post',
                                    'url' => isset($blogUser)
                                    ? route('admin.blog-users.update', $blogUser->id)
                                    : route('admin.blog-users.store')
                            ]) !!}
                                     @csrf
                                    <div class="row">
                                        <div class="input-field col m4 s6">
                                            {!! Form::text('name',$blogUser->name ?? null,['placeholder'=>'Classic','class'=>"validate", 'id' => 'name', 'required'=>false]) !!}
                                            <label for="icon_prefix2">Name</label>
                                        </div>
                                        <div class="input-field col m4 s6">
                                            {!! Form::text('email',$blogUser->email ?? null,['placeholder'=>'blog@gmail.com','class'=>"validate", 'id' => 'name', 'required'=>false]) !!}
                                            <label for="icon_prefix2">Email</label>
                                        </div>
                                        <div class="input-field col m4 s6">
                                            {!! Form::input('password', 'password', null, ['class' => 'validate']) !!}
                                            <label for="icon_prefix2">Password</label>
                                        </div>
                                        <div class="input-field col m4 s12">
                                            <div class="input-field col s12">
                                                <button class="btn cyan waves-effect waves-light basicbtn" type="submit">{{ isset($blogUser) ? 'Update' : 'Save' }}</button>
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

