<div class="tab-pane animated fadeIn text-muted" id="myHistory">
    @if(!empty($artist_transaction_user))
        @if(!empty($artist_transaction_user->transactionHistory))
            <table id="historyWallet" class="table table-responsive " cellspacing="0" width="100%">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Artist Name</th>
                    <th>Package Name</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Amount</th>
                    <th>Credits</th>
                    <th>Country</th>
                    <th>City</th>
                    <th>Payment Method</th>
                </tr>
                </thead>
                <tbody>
                @foreach($artist_transaction_user->transactionHistory as $transactionHistory)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{$transactionHistory->user->name}}</td>
                        <td>{{$transactionHistory->package_name}}</td>
                        <td>{{$artist_transaction_user->first_name}}</td>
                        <td>{{$artist_transaction_user->last_name}}</td>
                        <td>{{$transactionHistory->amount}}</td>
                        <td>{{$transactionHistory->credits}}</td>
                        <td>{{!empty($artist_transaction_user->city) ? $artist_transaction_user->city->country->name : ''}}</td>
                        <td>{{!empty($artist_transaction_user->city) ? $artist_transaction_user->city->name : '' }}</td>
                        <td>{{$transactionHistory->payment_method}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @else
        <span>NoT Found History</span>
    @endif
</div>
