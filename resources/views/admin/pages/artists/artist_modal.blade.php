{{-- Approved Modal  --}}
<div id="approvedModal" class="modal">
    <form class="new_basicform_approved_with_reload" action="{{ route('admin.store.approved.artist', $user->id) }}" id="approvedArtistForm" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reason For Approved</h5>
              </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control ckeditor" name="description_details" id="descriptionApprovedDetails" required>
                        Welcome to UpcomingSounds.com! My name is Gary, and I'm excited to have you join our community of talented musicians and artists. We believe that every artist has the potential to make an impact through their art, and we are dedicated to helping you share your music with the world.

                        We have a number of resources available to help you succeed, including industry-leading promotion tools, expert advice, and a supportive community of fellow artists. We also offer a range of opportunities to perform and collaborate with other musicians, so you can grow your audience and build your career.

                        We're looking forward to seeing what you create and helping you take your art to the next level.

                        Now you can add and submit your release to our curators and tastemakers.

                        To get started, please visit your artist profile and take a few minutes to fill out your bio and upload any promotional materials, such as photos or videos. This will help your fans get to know you and your music better.

                        If you have any questions or need support along the way, don't hesitate to reach out to us.

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
<div id="rejectModal" class="modal">
    <form class="new_basicform_reject_with_reload" action="{{ route('admin.store.artist.reject', $user->id) }}" id="rejectArtistForm" method="post">
        @csrf
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Reason For Reject</h5>
              </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="message-text" class="col-form-label">Message:</label>
                    <textarea class="form-control ckeditor" name="description_details" id="descriptionRejectDetails" required>
                        Thank you for submitting your music to UpcomingSounds.com. We appreciate the time and effort you put into creating your art and sharing it with us.

                        After careful consideration, we have decided that this submission does not align with the direction and vision of our platform at this time. While we cannot accept your submission for publication on UpcomingSounds.com, we encourage you to continue creating and sharing your music with the world.

                        We wish you the best of luck in your musical endeavors and hope that you will consider submitting your work to us in the future. If you have any questions or need support along the way, don't hesitate to reach out to us.

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
{{--  Reject Modal --}}
