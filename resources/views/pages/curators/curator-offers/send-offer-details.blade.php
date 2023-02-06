@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Send Offer Details')


@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0">Send Offer Details</h1>
                        <a href="{{ url()->previous() }}"
                           class="btn btn-sm rounded proposition basicbtn">
                            Back</a>
                    </div>
                </div>
            </div>
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
@endsection

