<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Vehicle as VehicleResource;
use Illuminate\Support\Carbon;

class Auction extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $startTime    = Carbon::now();
        $endTime      = Carbon::parse($this->end_time);
        $totalMinutes = $startTime->diffInMinutes($endTime);
        $hours = intdiv($totalMinutes, 60).':'. ($totalMinutes % 60);
        return [
            'id'                 => $this->id,
            'name'               => $this->name,
            'description'        => $this->description,
            'city'               => $this->city->name,
            'start_time'         => $this->start_time,
            'end_time'           => $this->end_time,
            'status'             => $this->status,
            'time_left'          => intdiv($totalMinutes, 60).'h'.$totalMinutes % 60 . 'm',
            'auction_end_time'   => Carbon::parse($this->end_time)->format('d M Y'),
            'vehicles'           => VehicleResource::collection($this->vehicles),
        ];
    }
}
