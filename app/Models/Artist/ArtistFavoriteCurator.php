<?php

namespace App\Models\Artist;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtistFavoriteCurator extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'artist_favorite_curators';

    protected $fillable = [
        'artist_id',
        'curator_id',
        'deleted_at',
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
