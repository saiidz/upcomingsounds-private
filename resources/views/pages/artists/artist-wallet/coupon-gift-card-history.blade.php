
<div class="tab-pane animated fadeIn text-muted" id="myCouponHistory">
    @if(!empty($artistCouponGiftCards))
        <table id="couponGiftHistoryWallet" class="table table-responsive " cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Artist Name</th>
                <th>Credits</th>
                <th>Coupon Code</th>
                <th>Created At</th>
                <th>Status</th>
            </tr>
            </thead>
            <tbody>
            @foreach($artistCouponGiftCards as $artistCouponGiftCard)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{!empty($artistCouponGiftCard->user) ? $artistCouponGiftCard->user->name : '-----' }}</td>
                    <td>{{$artistCouponGiftCard->credits}}</td>
                    <td>{{$artistCouponGiftCard->coupon_code}}</td>
                    <td>{{getDateNewFormat($artistCouponGiftCard->created_at)}}</td>
                    <td>{{$artistCouponGiftCard->status}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <span>NoT Found History</span>
    @endif
</div>
