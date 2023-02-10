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
                <p id="msgDeclineArtist"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Permission Copy Right Modal -->

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
            $('#msgDeclineArtist').html(msg);
            $('#declineMsgModalCenter').modal('show');

        }
    </script>
@endsection
