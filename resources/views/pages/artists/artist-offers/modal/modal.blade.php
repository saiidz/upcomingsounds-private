<!-- Offer Decline Modal -->
<div id="declineOffer" class="modal fade black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Decline Offer send To {{!empty($send_offer->userCurator) ? $send_offer->userCurator->name : ''}}</h5>
            </div>
            <form class="new_basicform_approved_with_reload" action="{{route('artist.offer.decline',)}}" method="post">
                @csrf
                <input type="hidden" name="send_offer_id" class="sendOfferID" value="{{!empty($send_offer) ? encrypt($send_offer->id) : ''}}">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-group">
                            <textarea class="form-control ckeditor" name="description_details" id="descriptionApprovedDetails" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Offer Decline Modal -->
