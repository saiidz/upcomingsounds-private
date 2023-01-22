@extends('pages.curators.panels.layout')

{{-- page title --}}
@section('title','Create Template')


@section('page-style')

@endsection

@section('content')
    <!-- ############ PAGE START-->

    <div class="page-content">
        <div class="row-col">
            <div class="col-lg-9 b-r no-border-md">
                <div class="padding">
                    <div class="page-title m-b proposition_header">
                        <h1 class="inline m-a-0">Offer Template</h1>
                    </div>
                    <form method="POST" action=""
                          enctype="multipart/form-data" class="basicform_with_reload">
                        @csrf
                        <div class="form-group">
                            <label class="control-label form-control-label text-muted">Title</label>
                            <div>
                                <input type="text" name="name"
                                       class="form-control"
                                       value=""
                                       placeholder="Your Title">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label form-control-label text-muted">Offer Type</label>
                            <div>
                                <select class="form-control" name="language">
                                    <option disabled selected>Please Choose</option>
                                    @if(!empty($offer_types))
                                        @foreach($offer_types as $offer_type)
                                            <option value="{{$offer_type->id}}">{{$offer_type->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label form-control-label text-muted">Offer Text</label>
                            <div>
                                   <textarea name="pitch_description"
                                             placeholder="Your description..."
                                             class="form-control ckeditor"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label form-control-label text-muted">Contribution</label>
                            <div>
                                <input type="number" name="usc" min="1"
                                       class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="control-label form-control-label text-muted">Alternative Option</label>
                            <div>
                                <select class="form-control" name="language">
                                    <option disabled selected>Please Choose</option>
                                    @if(!empty($alternative_options))
                                        @foreach($alternative_options as $alternative_option)
                                            <option value="{{$alternative_option->id}}">{{$alternative_option->name}}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group modal-footer">
                            <button type="submit" id="updateTrack" class="btn btn-sm rounded add_track basicbtn">
                                Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            @include('pages.curators.panels.right-sidebar')
        </div>
    </div>

    <!-- ############ PAGE END-->
@endsection

@section('page-script')
    <script src="https://cdn.ckeditor.com/4.17.1/standard/ckeditor.js"></script>
    <script>
        $(document).ready(function() {

            $('.ckeditor').ckeditor();

        });
    </script>
@endsection
