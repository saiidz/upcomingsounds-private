<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SendOfferTransaction extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'send_offer_transactions';

    protected $fillable = [
        'send_offer_id',
        'artist_id',
        'contribution',
        'usc_fee_commission',
        'curator_id',
        'is_approved',
        'is_rejected',
        'status',
        'refund_message',
        'deleted_at',
    ];

    /**
     * @return BelongsTo
     */
    public function userArtist(): BelongsTo
    {
        return $this->belongsTo(User::class,'artist_id');
    }
}
