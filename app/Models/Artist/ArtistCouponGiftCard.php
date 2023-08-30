<?php

namespace App\Models\Artist;

use App\Models\SessionStripe;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtistCouponGiftCard extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'artist_coupon_gift_cards';

    protected $fillable = [
        'user_id',
        'session_strip_id',
        'credits',
        'coupon_code',
        'status',
        'deleted_at',
    ];


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function sessionStripe(): BelongsTo
    {
        return $this->belongsTo(SessionStripe::class,'session_strip_id','id');
    }
}
