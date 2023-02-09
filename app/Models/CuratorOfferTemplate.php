<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class CuratorOfferTemplate extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'curator_offer_templates';

    protected $fillable = [
        'user_id',
        'type',
        'title',
        'offer_type',
        'offer_text',
        'contribution',
        'alternative_option',
        'is_active',
        'is_approved',
        'is_rejected',
        'confirm',
        'reason_reject',
        "deleted_at",
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
    public function offerType(): BelongsTo
    {
        return $this->belongsTo(OfferType::class,'offer_type');
    }

    /**
     * @return BelongsTo
     */
    public function alternativeOption(): BelongsTo
    {
        return $this->belongsTo(AlternativeOption::class,'alternative_option');
    }

    /**
     * @return HasOne
     */
    public function sendOffer(): HasOne
    {
        return $this->hasOne(SendOffer::class,'offer_template_id','id')->latest();
    }
}
