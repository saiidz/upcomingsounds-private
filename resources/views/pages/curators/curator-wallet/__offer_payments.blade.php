@if(!empty($offer_payments))
    <table id="curatorOfferPayments" class="table table-responsive" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Offer Title</th>
            <th>Artist Name</th>
            <th>Amount</th>
            <th>Fee Offer</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offer_payments as $offer_payment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{!empty($offer_payment->sendOffer->curatorOfferTemplate) ? $offer_payment->sendOffer->curatorOfferTemplate->title : '----'}}</td>
                <td>{{!empty($offer_payment->userArtist) ? $offer_payment->userArtist->name : '----'}}</td>
                <td>{{ $offer_payment->contribution - $offer_payment->usc_fee_commission .' USC' }}</td>
                <td>{{!empty($offer_payment->usc_fee_commission) ? $offer_payment->usc_fee_commission .' USC' : '----'}}</td>
                <td>{{$offer_payment->status}}</td>
                <td>{{getDateFormat($offer_payment->created_at)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <span>NoT Found Offer Payments</span>
@endif
