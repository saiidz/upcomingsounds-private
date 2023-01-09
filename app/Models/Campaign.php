<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Campaign extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'campaigns';

    protected $fillable = [
        'user_id',
        'track_id',
        'package_name',
        'usc_credit',
        'pay_now',
        'establish_receive_media',
        'status',
        'add_days',
        'add_remove_banner',
        'track_name',
        'track_description',
        'artist_name',
        'track_thumbnail',
        'audio',
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
