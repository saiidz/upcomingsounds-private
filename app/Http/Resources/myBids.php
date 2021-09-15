<?php

namespace App\Http\Resources;

use App\Http\Resources\Vehicle as VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class myBids extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $startTime = \Carbon\Carbon::now();
        $endTime = \Carbon\Carbon::parse($this->auctionVehicle->auction->end_time);
        $totalMinutes = $startTime->diffInMinutes($endTime);

        return [
            'id'        => $this->id,
            'bid'       => $this->bid,
            'status'    => $this->status,
            'time_left' => intdiv($totalMinutes, 60).'h'.$totalMinutes % 60 . 'm',
            'vehicle'   => new VehicleResource(Vehicle::find($this->auctionVehicle->vehicle_id)),
//            'user'      => $this->when(Auth::guard('api')->user() && Auth::guard('api')->user()->id == $this->user_id , $this->user),
        ];
    }
}
