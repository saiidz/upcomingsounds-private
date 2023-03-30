<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ReferralRelationship extends Model
{
    use HasFactory;
    protected $fillable = ['referral_link_id', 'user_id'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * @return belongsTo
     */
    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class, 'user_id','user_id');
    }

    /**
     * @return BelongsTo
     */
    public function referralLink(): BelongsTo
    {
        return $this->belongsTo(ReferralLink::class, 'referral_link_id','id');
    }
}
