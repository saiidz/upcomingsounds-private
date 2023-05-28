<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubmitCoverage extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'submit_coverages';

    protected $fillable = [
        'curator_id',
        'artist_id',
        'track_id',
        'campaign_id',
        'offer_type_id',
        'links',
        'message',
        'submit_at',
        'status',
        'deleted_at',
    ];

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
    public function userArtist(): BelongsTo
    {
        return $this->belongsTo(User::class,'artist_id');
    }

    /**
     * @return BelongsTo
     */
    public function artistTrack(): BelongsTo
    {
        return $this->belongsTo(ArtistTrack::class,'track_id');
    }

    /**
     * @return BelongsTo
     */
    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class,'campaign_id');
    }
}
