<?php

namespace App\Http\Resources;

use App\Models\Vehicle;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class Invoice extends JsonResource
{
    protected $vehicle;
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    public function toArray($request)
    {
        $this->vehicle = Vehicle::find($this->bid->auctionVehicle->vehicle_id);
        return [
            'id'                => $this->id,
            'invoice_id'        => "MII-" . strtotime($this->created_at). "-" . $this->id,
            'total'             => $this->total,
            'paid'              => $this->paid,
            'balance'           => $this->balance,
            'due_date'          => $this->due_date,
            'payment_journey'   => $this->payment_journey,
            'bid'               => [
                'status'  => $this->bid->status,
                'vehicle'               => [
                    'id'             => $this->vehicle->id,
                    'user'           => $this->when(Auth::guard('api')->user() && Auth::guard('api')->user()->type != 'admin' , $this->vehicle->user),
                    'brand'          => $this->vehicle->brand,
                    'category'       => $this->vehicle->category,
                ],
            ],

        ];
    }
}
