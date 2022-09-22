@extends('admin.layouts.contentLayoutMaster')

{{-- page title --}}
@section('title','Create Curator Features')


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
						<h5 class="breadcrumbs-title mt-0 mb-0"><span>Curator Features</span></h5>
						<ol class="breadcrumbs mb-0">
                            @include('admin.panels.breadcrumbs')
							<li class="breadcrumb-item active">Add New Curator Features </li>
						</ol>
					</div>
                    <div class="col s2 m6 l6">
                        <a class="btn dropdown-settings waves-effect waves-light breadcrumbs-btn right" href="{{ route('admin.curator-features.create') }}" data-target="dropdown1">
                            {{-- <i class="material-icons hide-on-med-and-up">settings</i> --}}
                            <span class="hide-on-small-onl">Add New Sub Curators</span>
                            {{-- <i class="material-icons right">arrow_drop_down</i> --}}
                        </a>
                    </div>
				</div>

			</div>
		</div>
		<div class="col s12">
			<div class="container">

			</div>
			<div class="content-overlay"></div>
		</div>
	</div>
</div>
<!-- END: Page Main-->
@endsection

