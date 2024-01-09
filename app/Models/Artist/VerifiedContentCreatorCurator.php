<?php

namespace App\Models\Artist;

use App\Models\ArtistTrack;
use App\Models\Curator\VerifiedCoverage;
use App\Models\Curator\VerifiedCoverageSubmitWork;
use App\Models\User;
use App\Templates\IOfferTemplateStatus;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerifiedContentCreatorCurator extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'verified_content_creator_curators';

    protected $fillable = [
        'artist_id',
        'artist_track_id',
        'curator_id',
        'verified_coverage_id',
        'usc_credit',
        'pay_now',
        'is_approved',
        'is_rejected',
        'status',
        'refund_message',
        'deleted_at',
    ];

    /**
     * @return BelongsTo
     */
    public function artistUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'artist_id');
    }

    /**
     * @return BelongsTo
     */
    public function userCurator(): BelongsTo
    {
        return $this->belongsTo(User::class,'curator_id');
    }

    /**
     * @return BelongsTo
     */
    public function verifiedCoverage(): BelongsTo
    {
        return $this->belongsTo(VerifiedCoverage::class,'verified_coverage_id');
    }

    /**
     * @return BelongsTo
     */
    public function artistTrack(): BelongsTo
    {
        return $this->belongsTo(ArtistTrack::class, 'artist_track_id', 'id');
    }

    /**
     * @return HasOne
     */
    public function verifiedCoverageSubmitWork(): HasOne
    {
        return $this->hasOne(VerifiedCoverageSubmitWork::class,'verified_content_creator_id');
    }

    /**
     * @return HasOne
     */
    public function pendingVerifiedCoverageSubmitWork(): HasOne
    {
        return $this->hasOne(VerifiedCoverageSubmitWork::class,'verified_content_creator_id')->where('status', IOfferTemplateStatus::PENDING);
    }
}
