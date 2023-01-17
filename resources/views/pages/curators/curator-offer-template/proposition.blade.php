@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Proposition')


@section('page-style')
    <style>
        .proposition_header {
            justify-content: space-between !important;
            align-items: center !important;
            display: flex !important;
        }

        .proposition {
            margin-top: 20px;
            border-color: #02b875 !important;
            background-color: #1f1f25;
            color: white !important;
            text-align: center !important;
            padding: 10px 1.5rem 10px 1.5rem !important;
            white-space: nowrap !important;
            vertical-align: middle !important;
            box-shadow: inset 0 0 1px rgb(0 0 0 / 30%) !important;
            border-radius: 500px !important;
            margin-left: 10px !important;
        }
    </style>
@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0">Proposition</h1>
                        <a href="{{route('curator.create.offer.template')}}"
                           class="btn btn-sm rounded proposition basicbtn">
                            Setup a new offer template</a>
                    </div>
                </div>
            </div>
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
@endsection

