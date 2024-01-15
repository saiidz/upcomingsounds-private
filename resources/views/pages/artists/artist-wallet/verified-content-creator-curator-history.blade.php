
<div class="tab-pane animated fadeIn text-muted" id="myVerifiedContentCreatorCuratorHistory">
    @if(!empty($verifiedContentCreatorCurators))
        <table id="verifiedContentCreatorCuratorsPayments" class="table table-responsive " cellspacing="0" width="100%">
            <thead>
            <tr>
                <th>#</th>
                <th>Curator Name</th>
                <th>Offer Type</th>
{{--                <th>Artist Name</th>--}}
                <th>Contribution</th>
                <th>Fee Offer</th>
{{--                <th>Final Total</th>--}}
                <th>Status</th>
                <th>Created At</th>
            </tr>
            </thead>
            <tbody>
            @foreach($verifiedContentCreatorCurators as $verifiedContentCreatorCurator)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><a href="{{route('curator.coverage.verified.show',encrypt($verifiedContentCreatorCurator->verifiedCoverage->id))}}" style="color:#02b875 !important;">{{!empty($verifiedContentCreatorCurator->userCurator->name) ? $verifiedContentCreatorCurator->userCurator->name : '----'}}</a></td>
                    <td>{{!empty($verifiedContentCreatorCurator->verifiedCoverage->offerType->name) ? $verifiedContentCreatorCurator->verifiedCoverage->offerType->name : '----'}}</td>
{{--                    <td>--}}
{{--                        @if(!empty($verifiedContentCreatorCurator->userArtist))--}}
{{--                            <a href="{{route('taste.maker.public.profile',$verifiedContentCreatorCurator->userArtist->name)}}">--}}
{{--                                {{!empty($verifiedContentCreatorCurator->userArtist) ? $verifiedContentCreatorCurator->userArtist->name : '----'}}--}}
{{--                            </a>--}}
{{--                        @else--}}
{{--                            ------}}
{{--                        @endif--}}
{{--                    </td>--}}
                    <td>{{ $verifiedContentCreatorCurator->verifiedCoverage->contribution .' USC' }}</td>
                    <td>{{!empty($verifiedContentCreatorCurator->usc_fee_commission) ? $verifiedContentCreatorCurator->usc_fee_commission .' USC' : '----'}}</td>
{{--                    <td>{{ $verifiedContentCreatorCurator->verifiedCoverage->contribution - $verifiedContentCreatorCurator->usc_fee_commission .' USC' }}</td>--}}
                    <td>{{$verifiedContentCreatorCurator->status}}</td>
                    <td>{{getDateFormat($verifiedContentCreatorCurator->created_at)}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <span>NoT Found History</span>
    @endif
</div>
