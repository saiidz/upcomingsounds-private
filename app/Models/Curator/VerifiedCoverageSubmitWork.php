<?php

namespace App\Models\Curator;

use App\Models\Artist\VerifiedContentCreatorCurator;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerifiedCoverageSubmitWork extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'verified_coverage_submit_works';

    protected $fillable = [
        'curator_id',
        'verified_content_creator_id',
        'status',
        'deleted_at',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'curator_id');
    }

    /**
     * @return BelongsTo
     */
    public function verifiedContentCreatorCurator(): BelongsTo
    {
        return $this->belongsTo(VerifiedContentCreatorCurator::class,'verified_content_creator_id');
    }

    /**
     * @return HasMany
     */
    public function VerifiedCoverageSubmitWorkLinks(): HasMany
    {
        return $this->hasMany(VerifiedCoverageSubmitWorkLink::class,'verified_coverage_submit_work_id');
    }

    /**
     * @return HasMany
     */
    public function verifiedCoverageSubmitWorkImages(): HasMany
    {
        return $this->hasMany(VerifiedCoverageSubmitWorkImage::class,'verified_coverage_submit_work_id');
    }
}
