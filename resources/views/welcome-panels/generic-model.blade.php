    <!-- Change Password Modal -->
<div id="unsubscribed" class="modal black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">UN-SUBSCRIBE</h5>
            </div>
            <div class="modal-body p-lg">
                <form class="m-b-1" method="POST" action="{{url('/newsletter')}}">
                    @csrf
                    <div class="form-group">
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Your UnSubscriber email" required>
                        @error('email')
                        <small class="red-text" role="alert">
                            {{ $message }}
                        </small>
                        @enderror
                    </div>

                    <div class="form-group modal-footer">
                        <button type="button" class="btn dark-white rounded update_track_not" id="closeChangeArtistPassword" data-dismiss="modal">No</button>
                        <button type="submit" class="btn btn-sm rounded add_track">
                            Unsubscribed</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Change Password Modal -->
