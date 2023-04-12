@if(!empty($offer_payments))
    <table id="curatorOfferPayments" class="table table-responsive" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Offer Title</th>
            <th>Offer Type</th>
            <th>Artist Name</th>
            <th>Offering</th>
            <th>Fee Offer</th>
            <th>Final Total</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offer_payments as $offer_payment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><a href="{{route('curator.send.offer.show',encrypt($offer_payment->sendOffer->id))}}">{{!empty($offer_payment->sendOffer->curatorOfferTemplate) ? $offer_payment->sendOffer->curatorOfferTemplate->title : '----'}}</a></td>
                <td>{{!empty($offer_payment->sendOffer->curatorOfferTemplate) ? $offer_payment->sendOffer->curatorOfferTemplate->offerType->name : '----'}}</td>
                <td>
                    @if(!empty($offer_payment->userArtist))
                        <a href="{{route('artist.public.profile',$offer_payment->userArtist->name)}}">
                            {{!empty($offer_payment->userArtist) ? $offer_payment->userArtist->name : '----'}}
                        </a>
                    @else
                        ----
                    @endif
                </td>
                <td>{{ $offer_payment->contribution .' USC' }}</td>
                <td>{{!empty($offer_payment->usc_fee_commission) ? $offer_payment->usc_fee_commission .' USC' : '----'}}</td>
                <td>{{ $offer_payment->contribution - $offer_payment->usc_fee_commission .' USC' }}</td>
                <td>{{$offer_payment->status}}</td>
                <td>{{getDateFormat($offer_payment->created_at)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <span>NoT Found Offer Payments</span>
@endif
