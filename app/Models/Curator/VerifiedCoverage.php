<?php

namespace App\Models\Curator;

use App\Models\Artist\ArtistFavoriteCurator;
use App\Models\OfferType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class VerifiedCoverage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'verified_coverages';

    protected $fillable = [
        'user_id',
        'v_c_offer_type',
        'description',
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
     * @return HasOne
     */
    public function artistFavoriteCurator(): HasOne
    {
        return $this->hasOne(ArtistFavoriteCurator::class,'curator_id','user_id')->where('artist_id',Auth::id());
    }

    /**
     * @return BelongsTo
     */
    public function offerType(): BelongsTo
    {
        return $this->belongsTo(VerifiedCoverageOfferType::class,'v_c_offer_type');
    }
}
