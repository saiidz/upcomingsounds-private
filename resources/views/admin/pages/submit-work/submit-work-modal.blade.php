{{-- Approved Modal  --}}
<div id="approvedModal" class="modal">
    <form class="new_basicform_approved_with_reload" action="{{ route('admin.store.curator.approved.submitWork', $submitWork->id) }}" id="approvedCuratorForm" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reason For Approved</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control ckeditor" name="description_details" id="descriptionApprovedDetails" required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancle</a>
            <button type="submit" class="btn btn-primary basicbtn">Send</button>
        </div>
    </form>
</div>
{{--  Approved Modal --}}

{{-- Reject Modal  --}}
<div id="rejectSubmitModal" class="modal">
    <form class="new_basicform_reject_with_reload" action="{{ route('admin.store.curator.submitWork.reject', $submitWork->id) }}" id="rejectCuratorForm" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reason For Reject</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control ckeditor" name="description_details" id="descriptionRejectDetails" required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancle</a>
            <button type="submit" class="btn btn-primary basicbtn">Send</button>
        </div>
    </form>
</div>
{{--  Reject Modal --}}

{{-- Refund Artost Modal  --}}
<div id="refundArtistModal" class="modal">
    <form class="new_basicform_reject_with_reload" action="{{ route('admin.artist.refund.waller', $submitWork->id) }}" id="rejectCuratorForm" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reason For Refund USC Credits to Artist</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control ckeditor" name="description_details" id="descriptionRejectDetails" required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancle</a>
            <button type="submit" class="btn btn-primary basicbtn">Send</button>
        </div>
    </form>
</div>
{{--  Refund Artost Modal --}}
