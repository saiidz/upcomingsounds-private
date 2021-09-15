@if(count($auction_update) > 0)
<div class="col-2 rightbar">
		<div class="rightboxcontainer">
			<h3>Auction Updates</h3>
            @foreach($auction_update as $bid)
                <div class="rightbox">

                    @if(count($bid->auctionVehicle->vehicle->vehicleImages) > 0)
                        <img src="{{URL('/')}}/uploads/vehicle_images/{{$bid->auctionVehicle->vehicle->vehicleImages[0]->path}}" alt="car" class="rightbar_top_image"/>
                    @else
                        <img src="{{URL('/')}}/images/cat/{{$bid->auctionVehicle->vehicle->category->name}}.png" alt="{{$bid->auctionVehicle->vehicle->category->name}}"/>
                    @endif
                    <h3>{{$bid->auctionVehicle->vehicle->brand}} {{$bid->auctionVehicle->vehicle->model}}</h3>
                    <div class="inofsection">
                        <div class="car-detail">
                            <div class="pb1">
                                <img src="{{asset('images/sedan.svg')}}" alt="sedan"/><span
                                >{{!empty($bid->auctionVehicle->vehicle->category_id) ? $bid->auctionVehicle->vehicle->category->name: ''}}</span
                                >
                            </div>
                            <div class="pb1">
                                <img
                                    src="{{asset('images/cvt-automatic2.svg')}}"
                                    alt="sedan"
                                /><span>{{$bid->auctionVehicle->vehicle->transmission}}</span>
                            </div>
                            <div class="pb1">
                                <img src="{{asset('images/runing_icon.svg')}}" alt="sedan"/><span
                                >{{$bid->auctionVehicle->vehicle->mileage}}km</span
                                >
                            </div>
                        </div>
                        <div class="price"><p>${{$bid->bid}}</p></div>
                    </div>
                    <div class="statussection">
                        <div>
                            <span>
                                @if(($bid->auctionVehicle->auction->status == 'live') && ($bid->status == 'active'))
                                    @php
                                        $startTime = \Carbon\Carbon::now();
                                        $endTime = \Carbon\Carbon::parse($bid->auctionVehicle->auction->end_time);
                                        $totalMinutes = $startTime->diffInMinutes($endTime);
                                        $hours = intdiv($totalMinutes, 60).':'. ($totalMinutes % 60);
                                    @endphp
                                    <img src="{{asset('images/red-clock.svg')}}"
                                         alt="icon"/>{{intdiv($totalMinutes, 60)}}h
                                    {{$totalMinutes % 60}}m
                                @endif
                            </span
                            >
                        </div>

                        @if($bid->status == 'active')
                            <p>Active</p>
                        @elseif($bid->status == 'won')
                            <p style="color: #2AC940;">Won</p>
                        @else
                            <p style="color: #8D8CA4;">Discarded</p>
                        @endif
                    </div>
                </div>
            @endforeach
		</div>
	</div>
</div>
@else

<div class="col-2 rightbar">
	<div class="rightboxcontainer right_side_empty">
		<h3>Auction Updates</h3>
				<div class=" empty_box">
					<img src="{{asset('images/no_auction_available.svg')}}" alt="car">

	</div>

	</div>
</div>
@endif
