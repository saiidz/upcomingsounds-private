@if(!empty($submit_coverage_histories))
    <table id="curatorSubmitCoverageHistory" class="table table-responsive" cellspacing="0" width="100%">
        <thead>
        <tr>
            <th>#</th>
            <th>Type</th>
            <th>Credit</th>
            <th>Status</th>
            <th>Created At</th>
        </tr>
        </thead>
        <tbody>
        @foreach($submit_coverage_histories as $submit_coverage_history)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{__('Tier Activity')}}</td>
{{--                <td>{{$submit_coverage_history->type}}</td>--}}
                <td>{{ $submit_coverage_history->amount .' USC' }}</td>
                <td>{{$submit_coverage_history->payment_status}}</td>
                <td>{{getDateFormat($submit_coverage_history->created_at)}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
@else
    <span>Not Found Submit Coverage History</span>
@endif
