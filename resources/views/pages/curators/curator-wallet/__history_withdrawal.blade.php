@if(!empty($offer_payments))
    <table id="historyCuratorWithdrawal" class="table table-responsive" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Amount</th>
            <th>Type</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($offer_payments as $offer_payment)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>10 USC</td>
                <td>Withdrawal</td>
                <td>PAID</td>
                <td>09 Apr 2023</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <span>NoT Found Offer Payments</span>
@endif
