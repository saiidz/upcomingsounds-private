<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtistTrackTag extends Model
{
    use HasFactory;
    protected $table = 'artist_track_tags';

    protected $fillable = [
        'artist_track_id',
        'curator_feature_tag_id',
    ];

    /**
     * @return BelongsTo
     */
    public function curatorFeatureTag(): BelongsTo
    {
        return $this->belongsTo(CuratorFeatureTag::class);
    }
}
