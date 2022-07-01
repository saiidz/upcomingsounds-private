<div class="col-lg-3 w-xxl w-auto-md">
    <div class="padding" style="bottom: 60px;" data-ui-jp="stick_in_parent">
        <h6 class="text text-muted">5 Likes</h6>
        <div class="row item-list item-list-sm m-b">
            <div class="col-xs-12">
                <div class="item r" data-id="item-3"
                     data-src="http://api.soundcloud.com/tracks/79031167/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                    <div class="item-media ">
                        <a href="javascript:void(0)" class="item-media-content"
                           style="background-image: url('images/b2.jpg');"></a>
                    </div>
                    <div class="item-info">
                        <div class="item-title text-ellipsis">
                            <a href="javascript:void(0)">I Wanna Be In the Cavalry</a>
                        </div>
                        <div class="item-author text-sm text-ellipsis ">
                            <a href="javascript:void(0)" class="text-muted">Jeremy Scott</a>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="item r" data-id="item-1"
                     data-src="http://api.soundcloud.com/tracks/269944843/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                    <div class="item-media ">
                        <a href="javascript:void(0)" class="item-media-content"
                           style="background-image: url('images/b0.jpg');"></a>
                    </div>
                    <div class="item-info">
                        <div class="item-title text-ellipsis">
                            <a href="javascript:void(0)">Pull Up</a>
                        </div>
                        <div class="item-author text-sm text-ellipsis ">
                            <a href="javascript:void(0)" class="text-muted">Summerella</a>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="item r" data-id="item-12"
                     data-src="http://api.soundcloud.com/tracks/174495152/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                    <div class="item-media ">
                        <a href="javascript:void(0)" class="item-media-content"
                           style="background-image: url('images/b11.jpg');"></a>
                    </div>
                    <div class="item-info">
                        <div class="item-title text-ellipsis">
                            <a href="javascript:void(0)">Happy ending</a>
                        </div>
                        <div class="item-author text-sm text-ellipsis ">
                            <a href="javascript:void(0)" class="text-muted">Postiljonen</a>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="item r" data-id="item-11"
                     data-src="http://api.soundcloud.com/tracks/218060449/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                    <div class="item-media ">
                        <a href="javascript:void(0)" class="item-media-content"
                           style="background-image: url('images/b10.jpg');"></a>
                    </div>
                    <div class="item-info">
                        <div class="item-title text-ellipsis">
                            <a href="javascript:void(0)">Spring</a>
                        </div>
                        <div class="item-author text-sm text-ellipsis ">
                            <a href="javascript:void(0)" class="text-muted">Pablo Nouvelle</a>
                        </div>


                    </div>
                </div>
            </div>
            <div class="col-xs-12">
                <div class="item r" data-id="item-6"
                     data-src="http://api.soundcloud.com/tracks/236107824/stream?client_id=a10d44d431ad52868f1bce6d36f5234c">
                    <div class="item-media ">
                        <a href="javascript:void(0)" class="item-media-content"
                           style="background-image: url('images/b5.jpg');"></a>
                    </div>
                    <div class="item-info">
                        <div class="item-title text-ellipsis">
                            <a href="javascript:void(0)">Body on me</a>
                        </div>
                        <div class="item-author text-sm text-ellipsis ">
                            <a href="javascript:void(0)" class="text-muted">Rita Ora</a>
                        </div>


                    </div>
                </div>
            </div>
        </div>

        @if (Auth::check() && auth()->user())
            @if (!empty(auth()->user()->getReferrals()))
                @forelse(auth()->user()->getReferrals() as $referral)
                    <h6 class="text text-muted">Referral Link</h6>
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <input id="tastemaker_name" class="form-control" value="{{ $referral->link }}">
                        </div>
                    </div>
                    <p>
                        Number of referred users: {{ $referral->relationships()->count() }}
                    </p>
                @empty
                    No referrals
                @endforelse
            @endif
        @endif

        {{-- <h6 class="text text-muted">Go mobile</h6>
        <div class="btn-groups">
            <a href="" class="btn btn-sm dark lt m-r-xs" style="width: 135px">
                <span class="pull-left m-r-sm">
                    <i class="fa fa-apple fa-2x"></i>
                </span>
                <span class="clear text-left l-h-1x">
                    <span class="text-muted text-xxs">Download on the</span>
                    <b class="block m-b-xs">App Store</b>
                </span>
            </a>
            <a href="" class="btn btn-sm dark lt" style="width: 133px">
                <span class="pull-left m-r-sm">
                    <i class="fa fa-play fa-2x"></i>
                </span>
                <span class="clear text-left l-h-1x">
                    <span class="text-muted text-xxs">Get it on</span>
                    <b class="block m-b-xs m-r-xs">Google Play</b>
                </span>
            </a>
        </div> --}}
        <div class="b-b m-y"></div>
        <div class="nav text-sm _600">
            <a href="#" class="nav-link text-muted m-r-xs">About</a>
            <a href="#" class="nav-link text-muted m-r-xs">Contact</a>
            <a href="#" class="nav-link text-muted m-r-xs">Legal</a>
            <a href="#" class="nav-link text-muted m-r-xs">Policy</a>
        </div>
        <p class="text-muted text-xs p-b-lg">&copy; Copyright {{ date('Y') }}</p>
    </div>
</div>
