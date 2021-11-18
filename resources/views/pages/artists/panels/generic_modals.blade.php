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


<!-- ############ SEARCH START -->
<div class="modal white lt fade" id="search-modal" data-backdrop="false">
    <a data-dismiss="modal" class="text-muted text-lg p-x modal-close-btn">&times;</a>
    <div class="row-col">
        <div class="p-a-lg h-v row-cell v-m">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form action="search.html" class="m-b-md">
                        <div class="input-group input-group-lg">
                            <input type="text" class="form-control" placeholder="Type keyword"
                                   data-ui-toggle-class="hide" data-ui-target="#search-result">
                            <span class="input-group-btn">
                    <button class="btn b-a no-shadow white" type="submit">Search</button>
                  </span>
                        </div>
                    </form>
                    <div id="search-result" class="animated fadeIn">
                        <p class="m-b-md"><strong>23</strong> <span
                                class="text-muted">Results found for: </span><strong>Keyword</strong></p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="row item-list item-list-sm item-list-by m-b">
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-9"
                                             data-src="http://api.soundcloud.com/tracks/264094434/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content"
                                                   style="background-image: url('images/b8.jpg');"></a>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">All I Need</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Pablo
                                                        Nouvelle</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted">
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-2"
                                             data-src="http://api.soundcloud.com/tracks/259445397/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content"
                                                   style="background-image: url('images/b1.jpg');"></a>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">Fireworks</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Kygo</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted">
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-7"
                                             data-src="http://api.soundcloud.com/tracks/245566366/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content"
                                                   style="background-image: url('images/b6.jpg');"></a>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">Reflection (Deluxe)</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Fifth
                                                        Harmony</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted">
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item r" data-id="item-11"
                                             data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                                            <div class="item-media ">
                                                <a href="track.detail.html" class="item-media-content"
                                                   style="background-image: url('images/b10.jpg');"></a>
                                            </div>
                                            <div class="item-info">
                                                <div class="item-title text-ellipsis">
                                                    <a href="track.detail.html">Spring</a>
                                                </div>
                                                <div class="item-author text-sm text-ellipsis ">
                                                    <a href="artist.detail.html" class="text-muted">Pablo
                                                        Nouvelle</a>
                                                </div>
                                                <div class="item-meta text-sm text-muted">
                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row item-list item-list-sm item-list-by m-b">
                                    <div class="col-xs-12">
                                        <div class="item">
                                            <div class="item-media rounded ">
                                                <a href="artist.detail.html" class="item-media-content"
                                                   style="background-image: url('images/a4.jpg');"></a>
                                            </div>
                                            <div class="item-info ">
                                                <div class="item-title text-ellipsis">
                                                    <a href="artist.detail.html">Judith Garcia</a>
                                                    <div class="text-sm text-muted">13 songs</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item">
                                            <div class="item-media rounded ">
                                                <a href="artist.detail.html" class="item-media-content"
                                                   style="background-image: url('images/a9.jpg');"></a>
                                            </div>
                                            <div class="item-info ">
                                                <div class="item-title text-ellipsis">
                                                    <a href="artist.detail.html">Douglas Torres</a>
                                                    <div class="text-sm text-muted">20 songs</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item">
                                            <div class="item-media rounded ">
                                                <a href="artist.detail.html" class="item-media-content"
                                                   style="background-image: url('images/b1.jpg');"></a>
                                            </div>
                                            <div class="item-info ">
                                                <div class="item-title text-ellipsis">
                                                    <a href="artist.detail.html">Melissa Garza</a>
                                                    <div class="text-sm text-muted">20 songs</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="item">
                                            <div class="item-media rounded ">
                                                <a href="artist.detail.html" class="item-media-content"
                                                   style="background-image: url('images/a3.jpg');"></a>
                                            </div>
                                            <div class="item-info ">
                                                <div class="item-title text-ellipsis">
                                                    <a href="artist.detail.html">Joe Holmes</a>
                                                    <div class="text-sm text-muted">24 songs</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="top-search" class="btn-groups">
                        <strong class="text-muted">Top searches: </strong>
                        <a href="#" class="btn btn-xs white">Happy</a>
                        <a href="#" class="btn btn-xs white">Music</a>
                        <a href="#" class="btn btn-xs white">Weekend</a>
                        <a href="#" class="btn btn-xs white">Summer</a>
                        <a href="#" class="btn btn-xs white">Holiday</a>
                        <a href="#" class="btn btn-xs white">Blue</a>
                        <a href="#" class="btn btn-xs white">Soul</a>
                        <a href="#" class="btn btn-xs white">Calm</a>
                        <a href="#" class="btn btn-xs white">Nice</a>
                        <a href="#" class="btn btn-xs white">Home</a>
                        <a href="#" class="btn btn-xs white">SLeep</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ############ SEARCH END -->


<!-- ############ SHARE START -->
<div id="share-modal" class="modal fade animate">
    <div class="modal-dialog">
        <div class="modal-content fade-down">
            <div class="modal-header">

                <h5 class="modal-title">Share</h5>
            </div>
            <div class="modal-body p-lg">
                <div id="share-list" class="m-b">
                    <a href="" class="btn btn-icon btn-social rounded btn-social-colored indigo" title="Facebook">
                        <i class="fa fa-facebook"></i>
                        <i class="fa fa-facebook"></i>
                    </a>

                    <a href="" class="btn btn-icon btn-social rounded btn-social-colored light-blue"
                       title="Twitter">
                        <i class="fa fa-twitter"></i>
                        <i class="fa fa-twitter"></i>
                    </a>

                    <a href="" class="btn btn-icon btn-social rounded btn-social-colored red-600" title="Google+">
                        <i class="fa fa-google-plus"></i>
                        <i class="fa fa-google-plus"></i>
                    </a>

                    <a href="" class="btn btn-icon btn-social rounded btn-social-colored blue-grey-600"
                       title="Trumblr">
                        <i class="fa fa-tumblr"></i>
                        <i class="fa fa-tumblr"></i>
                    </a>

                    <a href="" class="btn btn-icon btn-social rounded btn-social-colored red-700" title="Pinterst">
                        <i class="fa fa-pinterest"></i>
                        <i class="fa fa-pinterest"></i>
                    </a>
                </div>
                <div>
                    <input class="form-control" value="http://plamusic.com/slug"/>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ############ SHARE END -->
