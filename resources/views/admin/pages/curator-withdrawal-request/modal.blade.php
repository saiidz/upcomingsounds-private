{{-- Approved Modal  --}}
<div id="approvedTransactionHistoryModal" class="modal">
    <form class="new_basicform_withdrawal_approved_with_reload" action="{{ route('admin.store.curator.approved.withdrawal', $transactionHistory->id) }}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reason For Approved</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control ckeditor" name="description_details" id="descriptionWithdrawalApprovedDetails" required></textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
            <button type="submit" class="btn btn-primary basicbtn">Send</button>
        </div>
    </form>
</div>
{{--  Approved Modal --}}

{{-- Reject Modal  --}}
<div id="rejectTransactionHistoryModal" class="modal">
    <form class="new_basicform_withdrawal_reject_with_reload" action="{{ route('admin.store.curator.withdrawal.reject', $transactionHistory->id) }}" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reason For Reject</h5>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control ckeditor" name="description_details" id="descriptionWithdrawalRejectDetails" required></textarea>
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

