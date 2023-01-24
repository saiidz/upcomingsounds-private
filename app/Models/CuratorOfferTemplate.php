<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CuratorOfferTemplate extends Model
{
    use HasFactory;

    protected $table = 'curator_offer_templates';

    protected $fillable = [
        'user_id',
        'title',
        'offer_type',
        'offer_text',
        'contribution',
        'alternative_option',
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
}
