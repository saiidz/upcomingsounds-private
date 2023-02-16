<!-- Permission Copy Right Modal -->
<div id="adminMsgModalCenter" class="modal fade black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Admin Message Against Offer</h5>
            </div>
            <div class="modal-body">
                <p id="msgAdmin"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Permission Copy Right Modal -->

<!-- Permission Copy Right Modal -->
<div id="declineMsgModalCenter" class="modal fade black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Artist Message Decline Offer</h5>
            </div>
            <div class="modal-body">
                <p id="msgOffer_D"></p>
                <p id="msgDeclineArtist"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Permission Copy Right Modal -->


<!-- Completed Modal -->
<div id="completedMsgModalCenter" class="modal fade black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Admin Message Completed Offer</h5>
            </div>
            <div class="modal-body">
                <p id="msgCompletedCurator"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Completed Modal -->

<!-- Delete Campaign Modal -->
<div id="delete-offer-template-modal" class="modal fade animate black-overlay" data-backdrop="false">
    <div class="row-col h-v">
        <div class="row-cell v-m">
            <div class="modal-dialog modal-sm">
                <div class="modal-content flip-y">
                    <div class="modal-body text-center">
                        <p class="p-y m-t"><i class="fa fa-remove text-warning fa-3x"></i></p>
                        <p>Are you sure to delete this offer template?</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn btn-default p-x-md" href="javascript:void(0)" data-dismiss="modal">No</a>
                        <a class="btn red p-x-md deleteOfferTemplate" id="delete_offer_template" data-offer_template-id="" data-dismiss="modal" href="javascript:void(0)">Yes</a>
                    </div>
                </div><!-- /.modal-content -->
            </div>
        </div>
    </div>
</div>
<!-- / Delete Campaign Modal -->


@section('page-script')
    <script>
        function adminMsgModalCenter(id)
        {
            let msg = $('#mgAdmin'+id).html();
            $('#msgAdmin').html(msg);
            $('#adminMsgModalCenter').modal('show');

        }
        function declineOfferMsgModal(id)
        {
            let msg = $('#mgAdmin'+id).html();
            let msgOffer = $('#mgDeclineOffer'+id).html();
            $('#msgOffer_D').html(msgOffer);
            $('#msgDeclineArtist').html(msg);
            $('#declineMsgModalCenter').modal('show');

        }

        function completedOfferMsgModal(id)
        {
            let msg = $('#mgAdmin'+id).html();
            $('#msgCompletedCurator').html(msg);
            $('#completedMsgModalCenter').modal('show');

        }
    </script>
    <script>
        // Delete Offer Template Model
        function deleteOfferTemplate(offer_template_id){
            $('.deleteOfferTemplate').attr('data-offer_template-id',offer_template_id);
        }
        $('#delete_offer_template').click(function (event) {
            event.preventDefault();
            var offer_template_id = $('.deleteOfferTemplate').attr('data-offer_template-id');
            var url= "{{url('/delete-offer-template')}}/"+offer_template_id;
            $.ajax({
                type: "DELETE",
                url: url,
                data:{
                    "_token": "{{ csrf_token() }}",
                    "offer_template_id": offer_template_id,
                },
                success: function (data) {
                    if(data.success){
                        $('#remove_offer-'+offer_template_id).remove();
                        $('#snackbar').html(data.success);
                        $('#snackbar').addClass("show");
                        setTimeout(function () {
                            $('#snackbar').removeClass("show");

                        }, 5000);
                    }
                }
            });
        });
    </script>
@endsection
