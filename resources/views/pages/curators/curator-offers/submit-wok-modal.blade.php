<!-- Offer Decline Modal -->
<div id="submitWorkOffer" class="modal fade black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Offer Overview</h5>
            </div>
            <form class="basicform_with_reload" enctype="multipart/form-data" action="{{route('curator.submit.work')}}" method="post">
                @csrf
                <input type="hidden" name="send_offer_id" class="sendOfferID" value="{{!empty($send_offer) ? encrypt($send_offer->id) : ''}}">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="page-title m-b">
                                <h6 class="inline m-a-0">Once you've completed your work simply add the URL in the box below and submit for approval. We will then verify the work URL and once approved we'll send it to the artist.</h6>
                            </div>
                            <div class="page-title m-b">
                                <h6 class="inline m-a-0">If you don't have a work URL, but would like to submit an image instead as proof, please use an image hosting site (e.g Imgur.com). Upload your image and share the URL.</h6>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="">Uploads Proof Images</label>
                                <input type='file' class="form-control" required name="images[]" multiple="multiple"
                                       accept=".png, .jpg, .jpeg" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <label for="">Submit your work's URL</label>
                            </div>
                            <div id="TextBoxesGroup">
                                <div id="TextBoxDiv1">
                                    <div class="col-sm-12 m-b">
                                        <div class="addEmbeded">
                                            <div class="addMoreLinks">
                                                <input type="text" name="completion_url[]"
                                                       class="form-control moreLinks"
                                                       value="" id="textbox1"
                                                       placeholder="Please Add Completion Url">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="addMoreRemoveLink">
                                    <div class="plusIcon">
                                        <i class="fa fa-plus" id="addLinkButton">Add New Link</i>
                                    </div>
                                    <div class="plusIconRemove">
                                        <i class="fa fa-remove" id="removeButton">Remove Link</i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm rounded add_track">Send</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Offer Decline Modal -->
