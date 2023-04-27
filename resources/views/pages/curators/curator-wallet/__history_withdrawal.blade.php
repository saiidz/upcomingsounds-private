@if(!empty($withdrawal_histories))
    <table id="historyCuratorWithdrawal" class="table table-responsive" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Amount</th>
            <th>Withdrawal Request</th>
            <th>Account Email</th>
            <th>Type</th>
            <th>Status</th>
            <th>Withdrawal Message Admin</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($withdrawal_histories as $withdrawal_history)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{$withdrawal_history->amount}} USC</td>
                @php
                    $withdrawal_request = json_decode($withdrawal_history->details);
                @endphp
                <td>{{ !empty($withdrawal_request->withdrawal_request) ? ucfirst($withdrawal_request->withdrawal_request) : '-----' }}</td>
                <td>{{ !empty($withdrawal_request->withdrawal_request == \App\Templates\IStatus::PAYPAL) ? $withdrawal_request->paypal_email : (!empty($withdrawal_request->wise_email) ? $withdrawal_request->wise_email : '-----') }}</td>
                <td>{{ $withdrawal_history->type }}</td>
                <td>{{ ucfirst($withdrawal_history->payment_status) }}</td>
                <td>
                    @if(!empty($withdrawal_request->withdrawal_message))
                        <span id="mgAdminWithdrawalCurator{{$withdrawal_history->id}}" style="display:none">{!! $withdrawal_request->withdrawal_message !!}</span>
                        <a href="javascript:void(0)" class="btn btn-xs white green" id="withdrawalAdminBTn"  onclick="adminWithdrawalMsgModalCenter({{$withdrawal_history->id}})">
                            Admin Message
                        </a>
                    @else
                        {{'---------------'}}
                    @endif
                </td>
                <td>{{getDateFormat($withdrawal_history->created_at)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Permission Copy Right Modal -->
    <div id="adminWithdrawalMsgModalCenter" class="modal fade black-overlay" data-backdrop="false">
        <div class="modal-dialog">
            <div class="modal-content m-t-lg">
                <div class="modal-header">
                    <h5 class="modal-title">Admin Message Withdrawal Request</h5>
                </div>
                <div class="modal-body">
                    <p id="msgAdminWithdrawal"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div><!-- /.modal-content -->
        </div>
    </div>
    <!-- Permission Copy Right Modal -->
@else
    <span>NoT Found Offer Payments</span>
@endif
