<?php

namespace App\Http\Resources;

use App\Http\Resources\Vehicle as VehicleResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Vehicle;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class Bid extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $vehicle_id = isset($this['vehicle_id']) ? $this['vehicle_id'] : $this->auctionVehicle->vehicle_id;

        $startTime    = Carbon::now();
        $endTime      =  (!empty($this['auction'])) ? Carbon::parse($this['auction']['end_time']) : null;
        $totalMinutes = $startTime->diffInMinutes($endTime);
        $hours = intdiv($totalMinutes, 60).':'. ($totalMinutes % 60);

        return [
            'id'        => isset($this['id']) ? $this['id'] : null,
            'vehicle'   => new VehicleResource(Vehicle::find($vehicle_id)),
            'user'      => $this->when(Auth::guard('api')->user() && Auth::guard('api')->user()->id == $this->user_id , $this->user),
            'bid'       => $this['bids'],
            'end_date'  => (!empty($this['auction'])) ? Carbon::parse($this['auction']['end_time'])->format('d/m/Y') : null,
            'time_left' => intdiv($totalMinutes, 60).'h'.$totalMinutes % 60 . 'm',
        ];
    }
}

