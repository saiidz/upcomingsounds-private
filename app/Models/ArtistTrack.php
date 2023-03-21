<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtistTrack extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'artist_tracks';

    protected $fillable = [
        'name',
        'description',
        'pitch_description',
        'user_id',
        'is_approved',
        'is_rejected',
//        'track_category_id',
        'youtube_soundcloud_url',
        'soundcloudUrl',
        'audio',
        'audio_cover',
        'audio_description',
        'spotify_track_url',
        'ep_lp_link',
        'release_date',
        'display_profile',
        'track_thumbnail',
        'demo',
        'release_type',
        'permission_copyright',
        'is_locked',
        'request_edit_des',
        'favorite',
        'add_queque',
        'add_playlist',
        'deleted_at',
    ];

    /**
     * @return BelongsTo
     */
    public function trackCategory(): BelongsTo
    {
        return $this->belongsTo(TrackCategory::class);
    }

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function artistTrackTags(): HasMany
    {
        return $this->hasMany(ArtistTrackTag::class,'artist_track_id');
    }

    /**
     * @return HasMany
     */
    public function artistTrackLinks(): HasMany
    {
        return $this->hasMany(ArtistTrackLink::class,'artist_track_id');
    }

    /**
     * @return HasMany
     */
    public function artistTrackImages(): HasMany
    {
        return $this->hasMany(ArtistTrackImage::class,'artist_track_id');
    }

    /**
     * @return HasMany
     */
    public function artistTrackLanguages(): HasMany
    {
        return $this->hasMany(ArtistTrackLanguage::class,'artist_track_id');
    }

    /**
     * @param $query
     * @return void
     */
    public function scopeGetApprovedTrack($query)
    {
        $query->where('is_approved',1);
    }

    /**
     * @param $query
     * @return void
     */
    public function scopeGetPendingTrack($query)
    {
        $query->where('is_approved',0);
    }

    /**
     * @return HasMany
     */
    public function campaign(): HasMany
    {
        return $this->hasMany(Campaign::class,'track_id','id');
    }

    /**
     * @return HasOne
     */
    public function latestCampaign(): HasOne
    {
        return $this->hasOne(Campaign::class,'track_id','id')->latest();
    }
}
