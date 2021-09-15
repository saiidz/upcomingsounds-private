<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AuctionVehicleResource extends JsonResource
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
        $endTime      = Carbon::parse($this->auctionVehicle->auction->end_time);
        $totalMinutes = $startTime->diffInMinutes($endTime);
        $hours = intdiv($totalMinutes, 60).':'. ($totalMinutes % 60);
        return [
            'id'                 => $this->id,
            'user'               => $this->when(Auth::guard('api')->user() && Auth::guard('api')->user()->id != $this->user_id , $this->user),
            'brand'              => $this->brand,
            'mileage'            => $this->mileage,
            'color'              => $this->color,
            'chassis_number'     => $this->chassis_number,
            'lot_number'         => $this->lot_number,
            'condition'          => $this->condition,
            'model'              => $this->model,
            'year'               => $this->year,
            'transmission'       => $this->transmission,
            'engine_cc'          => $this->engine_cc,
            'specifications'     => $this->specifications,
            'min_price'          => $this->min_price,
            'is_sold'            => $this->is_sold,
            'is_approved'        => $this->is_approved == 1 ? 'Approved' : 'Unapproved',
            'city_id'            => $this->city_id,
            'category'           => $this->category->name,
            'images'             => $this->vehicleImages()->select('id', 'path', 'type')->get()->map(function($col) { $col->path = public_path().'/uploads/vehicle_images/'.$col->path; return $col; }),
            'tags'               => $this->vehicleTags->map(function($col){ $col->name = $col->tag()->select('name')->first()->name; return $col; }),
            'auction'            => $this->auctionVehicle->auction,
            'auction_vehicle_id' => $this->auctionVehicle->id,
            'end_date'           => Carbon::parse($this->auctionVehicle->auction->end_time)->format('d/m/Y'),
            'time_left'          => intdiv($totalMinutes, 60).'h'.$totalMinutes % 60 . 'm',
            'current_bid'        => (count($this->auctionVehicle->bids) < 1) ? $this->min_price : $this->auctionVehicle->bids->max('bid'),
        ];
    }
}
