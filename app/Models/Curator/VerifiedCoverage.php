<?php

namespace App\Models\Curator;

use App\Models\OfferType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerifiedCoverage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'verified_coverages';

    protected $fillable = [
        'user_id',
        'offer_type',
        'time_to_publish',
        'contribution',
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
}
