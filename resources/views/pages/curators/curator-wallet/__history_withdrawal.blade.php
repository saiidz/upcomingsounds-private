@if(!empty($withdrawal_histories))
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
        @foreach($withdrawal_histories as $withdrawal_history)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$withdrawal_history->amount}} USC</td>
                <td>{{ $withdrawal_history->type }}</td>
                <td>{{ $withdrawal_history->payment_status }}</td>
                <td>{{getDateFormat($withdrawal_history->created_at)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <span>NoT Found Offer Payments</span>
@endif
