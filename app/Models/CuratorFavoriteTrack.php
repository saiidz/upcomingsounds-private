<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class CuratorFavoriteTrack extends Model
{
    use HasFactory;

    protected $table = 'curator_favorite_tracks';

    protected $fillable = [
        'user_id',
        'track_id',
        'status',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function artistTrack(): BelongsTo
    {
        return $this->belongsTo(ArtistTrack::class, 'track_id');
    }

    /**
     * @return HasOne
     */
    public function campaign(): HasOne
    {
        return $this->hasOne(Campaign::class, 'track_id','track_id');
    }
}
