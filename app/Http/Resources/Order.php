<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Order extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                => $this->id,
            'order_id'          => "MIO-" . strtotime($this->created_at). "-" . $this->id,
            'delivery_time'     => $this->delivery_time,
            'order_status'      => $this->order_status,
            'invoice'           => Invoice::make($this->invoice),
        ];
    }
}
