<?php

namespace App\Models\Curator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class VerifiedCoverageSubmitWorkImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'verified_coverage_submit_work_images';

    protected $fillable = [
        'verified_coverage_submit_work_id',
        'path',
        'type',
        'deleted_at',
    ];

    /**
     * @return BelongsTo
     */
    public function verifiedCoverageSubmitWork(): BelongsTo
    {
        return $this->belongsTo(VerifiedCoverageSubmitWork::class,'verified_coverage_submit_work_id');
    }
}
