<?php

namespace App\Models\Artist;

use App\Models\ArtistTrack;
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
        'curator_id',
        'track_id',
        'usc_credit',
        'pay_now',
        'deleted_at',
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
    public function artistTrack(): BelongsTo
    {
        return $this->belongsTo(ArtistTrack::class, 'track_id', 'id');
    }
}
