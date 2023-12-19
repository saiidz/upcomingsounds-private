<?php

namespace App\Models\Artist;

use App\Models\ArtistTrack;
use App\Models\Curator\VerifiedCoverage;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
}
