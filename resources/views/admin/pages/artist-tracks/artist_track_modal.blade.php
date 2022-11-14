{{-- Approved Track Modal  --}}
<div id="approvedTrackModal" class="modal">
    <form class="new_basicform_approved_with_reload" action="{{ route('admin.store.approved.track', $artist_track->id) }}" id="approvedArtistForm" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reason For Approved Track</h5>
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
<div id="rejectTrackModal" class="modal">
    <form class="new_basicform_reject_with_reload" action="{{ route('admin.store.track.reject', $artist_track->id) }}" id="rejectArtistForm" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reason For Reject Track</h5>
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
