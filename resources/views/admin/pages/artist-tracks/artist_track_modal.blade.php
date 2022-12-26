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
                    <textarea class="form-control ckeditor" name="description_details" id="descriptionApprovedDetails" required>
                        Congratulations on your approved submission to UpcomingSounds.com! We are excited to have your music on our platform and to help you share it with the world.

                        Next, you'll want to add credits or funds to your wallet in order to promote your release.

                        We offer a range of packages to choose from, so you can find the one that best fits your needs and budget.

                        Simply visit the wallet section of your account and select the package you'd like to purchase.

                        Thank you for choosing UpcomingSounds.com as your platform for sharing your music. We are committed to helping you succeed and are excited to see what you create. If you have any questions or need support along the way, don't hesitate to reach out to us.

                        Sincerely, Gary
                    </textarea>
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
                    <textarea class="form-control ckeditor" name="description_details" id="descriptionRejectDetails" required>
                        Thank you for submitting your music to UpcomingSounds.com. We appreciate the time and effort you put into creating your art and sharing it with us.

                        After careful consideration, we have decided that this submission does not align with the direction and vision of our platform at this time. While we cannot accept your submission for publication on UpcomingSounds.com, we encourage you to continue creating and sharing your music with the world.

                        We wish you the best of luck in your musical endeavors and hope that you will consider submitting your work to us in the future. If you have any questions or need support along the way, don't hesitate to reach out to us.


                    </textarea>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="javascript:void(0)" class="modal-action modal-close waves-effect waves-green btn-flat ">Cancel</a>
            <button type="submit" class="btn btn-primary basicbtn">Send</button>
        </div>
    </form>
</div>
{{--  Reject Modal --}}
