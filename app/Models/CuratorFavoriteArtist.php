<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CuratorFavoriteArtist extends Model
{
    use HasFactory;

    protected $table = 'curator_favorite_artists';

    protected $fillable = [
        'curator_id',
        'artist_id',
    ];

    /**
     * @return BelongsTo
     */
    public function curatorUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'curator_id');
    }

    /**
     * @return BelongsTo
     */
    public function artistUser(): BelongsTo
    {
        return $this->belongsTo(User::class,'artist_id');
    }
}
