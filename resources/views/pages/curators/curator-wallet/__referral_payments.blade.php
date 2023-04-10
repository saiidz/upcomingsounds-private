@if(!empty($referral_payments))
    <table id="curatorReferralPayments" class="table table-responsive" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Artist Name</th>
            <th>Credit</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($referral_payments as $referral_payment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>
                    @if(!empty($referral_payment->referralRelationship->user))
                        <a href="{{route('artist.public.profile',$referral_payment->referralRelationship->user->name)}}">
                            {{!empty($referral_payment->referralRelationship->user) ? $referral_payment->referralRelationship->user->name : '----'}}
                        </a>
                    @else
                        ----
                    @endif
                </td>
                <td>{{ $referral_payment->credits .' USC' }}</td>
                <td>{{$referral_payment->payment_status}}</td>
                <td>{{getDateFormat($referral_payment->created_at)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <span>NoT Found Offer Payments</span>
@endif
