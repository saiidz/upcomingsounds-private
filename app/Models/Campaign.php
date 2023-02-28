<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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
        'link',
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

    /**
     * @return HasOne
     */
    public function curatorFavoriteTrack(): HasOne
    {
        return $this->hasOne(CuratorFavoriteTrack::class,'track_id','track_id')->where('user_id',Auth::id());
    }

    /**
     * @return HasOne
     */
    public function curatorFavoriteArtist(): HasOne
    {
        return $this->hasOne(CuratorFavoriteArtist::class,'artist_id','user_id')->where('curator_id',Auth::id());
    }

    /**
     * @return hasOne
     */
    public function sendOffer(): hasOne
    {
        return $this->hasOne(SendOffer::class, 'campaign_id', 'id');
    }
}
