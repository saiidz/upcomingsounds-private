<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SendOfferTransaction extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'send_offer_transactions';

    protected $fillable = [
        'send_offer_id',
        'artist_id',
        'contribution',
        'curator_id',
        'is_approved',
        'is_rejected',
        'status',
        'refund_message',
        'deleted_at',
    ];
}
