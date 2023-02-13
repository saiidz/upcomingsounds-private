<!-- Pay USC Modal -->
<div id="confirmPayUSCModal" class="modal fade animate black-overlay" data-backdrop="false">
    <div class="row-col h-v">
        <div class="row-cell v-m">
            <div class="modal-dialog modal-sm">
                <div class="modal-content flip-y">
                    <div class="modal-body text-center">
                        <p class="p-y m-t"><i class="fa fa-check-circle-o text-warning fa-3x"></i></p>
                        <p>Are you sure want to Pay {{!empty($contribution) ? $contribution : 0}} USC?</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default p-x-md" href="javascript:void(0)" data-dismiss="modal">No</a>
                        <a class="btn red p-x-md UscOfferPay" id="payUSCOffer" data-send-offer-id="{{!empty($send_offer_id) ? encrypt($send_offer_id) : null}}" data-contribution="{{!empty($contribution) ? encrypt($contribution) : 0}}" href="javascript:void(0)">Yes</a>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
    </div>
</div>
<!-- / Pay USC Modal -->
