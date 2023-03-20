<div class="row item-list item-list-by m-b">
    @if ($notifications->count() > 0 )
        @if(!empty($unReadNotifications) && $unReadNotifications->count() > 0)
            <div class="col-xs-12 remove_offer m-b" id="remove_offer-">
                <div class="m-t-sm campaignBtn" id="cOfferBtn">
                    <div>
                        <a href="javascript:void(0)" id="mark-all" class="btn btn-xs white">Mark all as read</a>
                    </div>
                </div>
            </div>
        @endif

        @foreach($notifications as $notification)
            <div class="col-xs-12 remove_offer m-b" id="remove_offer-">
                <div class="item r ItemNotify" data-id="item-">
                    <div class="item-info">
                        <div class="bottom text-right">

                        </div>
                        <div class="item-title text-ellipsis">
                            <span class="text-muted">{{!empty($notification->data['data']['title']) ? $notification->data['data']['title'] : '----'}}</span>
                        </div>
                        <div class="item-author text-sm text-ellipsis hide">
                        </div>
                        <div class="item-meta text-sm text-muted">
                            <span class="item-meta-date text-xs">{{($notification->created_at) ? \Carbon\Carbon::parse($notification->created_at)->format('M d Y') : ''}}</span>
                        </div>

                        <div class="m-t-sm campaignBtn" id="cOfferBtn">
                            <form id="form-notification" action="{{!empty($notification->data['data']['link']) ? $notification->data['data']['link'] : '----'}}">
                                <a href="javascript:void(0)" class="btn btn-xs white" onclick="sendNotifySubmit()">View Offer</a>
                            </form>
                            {{--                            <div>--}}
                            {{--                                <a href="{{!empty($notification->data['data']['link']) ? $notification->data['data']['link'] : '----'}}" class="btn btn-xs white">View</a>--}}
                            {{--                            </div>--}}
                            {{--                            <div>--}}
                            {{--                                <a href="javascript:void(0)" data-id="{{ $notification->id }}" class="btn btn-xs white mark-as-read">Delete</a>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="item-title text-ellipsis">
            <h3 class="white" style="text-align:center">There are no new notifications</h3>
        </div>
    @endif
</div>
