<?php

namespace App\Http\Resources;

use App\Models\Auction;
use App\Models\Config;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Vehicle extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
//        dd($this->auctionVehicle->bids);
        if (count($this->auctionVehicle->bids) < 1) {
            $current_bid = $this->min_price;
        } else {
           $current_bid = $this->auctionVehicle->bids->max('bid');
        }

        $bid_range = Config::where('key', 'default_bid_range')->first();

        if (count($this->auctionVehicle->bids) < 1) {
            $add_price = $this->min_price + (int)$bid_range->value;
        } else {
            $add_price = $this->auctionVehicle->bids->max('bid') + (int)$bid_range->value;
        }

        return [
            'id'                 => $this->id,
//            'user'           => $this->when(Auth::guard('api')->user() && Auth::guard('api')->user()->id != $this->user_id , $this->user),
            'brand'              => $this->brand,
            'mileage'        => $this->mileage,
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
            'country_id'         => (!empty($this->city_id) ? $this->city->country->id : 0),
            'state_id'           => (!empty($this->city_id) ? $this->city->state->id : 0),
            'city_id'            => (!empty($this->city_id) ? $this->city_id : 0),
            'country_name'       => (!empty($this->city_id) ? $this->city->country->name : 0),
            'state_name'         => (!empty($this->city_id) ? $this->city->state->name : 0),
            'city_name'          => (!empty($this->city_id) ? $this->city->name : 0),
            'category_name'      => $this->category->name,
            'category_id'        => $this->category_id,
            'commission'         => $this->commission,
            'bid_range'          => (int)$bid_range->value,
            'auction_vehicle_id' => !empty($this->auctionVehicle->id) ? $this->auctionVehicle->id : 0,
            'current_bid'        => $current_bid,
            'add_price'          => $add_price,
            'bid_count'          => (!empty($this->auctionVehicle->bids) ? $this->auctionVehicle->bids->count() : 0),
            'images'             => $this->vehicleImages()->select('id', 'path', 'type')->get()->map(function($col) { $col->path = config('app.url').'/uploads/vehicle_images/'.$col->path; return $col; }),
            'tags'               => $this->vehicleTags->map(function($col){ $col->name = $col->tag()->select('name')->first()->name; return $col; }),
            'on_auction'         => DB::table('auction_vehicle')->where('vehicle_id', $this->id)->exists() ? TRUE : FALSE,
        ];
    }
}
