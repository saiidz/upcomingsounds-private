<?php

namespace App\Http\Resources;

use App\Http\Resources\Invoice as InvoiceResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionHistory extends JsonResource
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
            'id'                    => $this->id,
            'amount'                => $this->amount,
            'payment_status'        => $this->payment_status,
            'payment_method'        => $this->payment_method,
            'payment_response'      => $this->payment_response,
            'paid_at'               => $this->paid_at,
            'created_at'            => $this->created_at,
            'invoice'               => InvoiceResource::make($this->invoice),
        ];
    }
}
