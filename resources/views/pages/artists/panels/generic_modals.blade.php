<!-- Change Password Modal -->
<div id="change-password" class="modal black-overlay" data-backdrop="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
            </div>
            <div class="modal-body p-lg">
                <form action="{{ url('/artist-change-password') }}" method="POST" id="changePasswordArtist">
                    @csrf
                    <div class="form-group changePassword">
                        <input type="password" class="form-control" id="oldpassword" placeholder="Enter current password" name="oldpassword">

                        <span class="text-danger error-text ml-10 oldpassword_error"></span>

                        <span toggle="#oldpassword" class="show-pas toggle-password change_password">
                            <img src="{{asset('images/toggle.svg')}}" alt="" class="password-toggle show" />
							<img src="{{asset('images/show-pas_black.svg')}}" alt="" class="password-toggle hide" />
									</span>
                    </div>

                    <div class="form-group changePassword">
                        <input id="newpassword" type="password"
                               class="form-control"
                               name="newpassword" placeholder="Enter new password" autocomplete="new-password">
                        <span class="text-danger error-text ml-10 newpassword_error"></span>

                        <span toggle="#newpassword" class="show-pas toggle-password change_password">
                            <img src="{{asset('images/toggle.svg')}}" alt="" class="password-toggle show" />
							<img src="{{asset('images/show-pas_black.svg')}}" alt="" class="password-toggle hide" />
									</span>
                    </div>
                    <div class="form-group changePassword">
                        <input id="cnewpassword" type="password" class="form-control" name="cnewpassword"
                               placeholder="ReEnter new password" autocomplete="new-password">

                        <span class="text-danger error-text ml-10 cnewpassword_error"></span>

                        <span toggle="#cnewpassword" class="show-pas toggle-password change_password">
                            <img src="{{asset('images/toggle.svg')}}" alt="" class="password-toggle show" />
							<img src="{{asset('images/show-pas_black.svg')}}" alt="" class="password-toggle hide" />
									</span>
                    </div>

                    <div class="form-group modal-footer">
                        <button type="button" class="btn dark-white rounded update_track_not" id="closeChangeArtistPassword" data-dismiss="modal">No</button>
                        {{--                                <button type="button" class="btn danger p-x-md" data-dismiss="modal">Yes</button>--}}
                        <button type="submit" class="btn btn-sm rounded add_track">
                            Update Password</button>
                    </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
</div>
<!-- Change Password Modal -->
