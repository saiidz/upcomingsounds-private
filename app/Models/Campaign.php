<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
        'banner_img',
        'banner_img_status',
        'banner_img_one',
        'banner_img_one_status',
        'button_text',
        'button_link',
        'button_status',
        'is_expired_campaign_date',
        'is_expired_campaign',
        'deleted_at',
    ];

    protected $casts = [
        'is_expired_campaign_date' => 'datetime',
        'is_expired_campaign' => 'boolean',
        'banner_img_status' => 'boolean',
        'banner_img_one_status' => 'boolean',
        'button_status' => 'boolean',
        'add_days' => 'integer',
        'usc_credit' => 'decimal:2',
        'pay_now' => 'decimal:2',
    ];

    /**
     * Get the user that owns the campaign.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the artist track associated with the campaign.
     *
     * @return BelongsTo
     */
    public function artistTrack(): BelongsTo
    {
        return $this->belongsTo(ArtistTrack::class, 'track_id', 'id');
    }

    /**
     * Get the curator's favorite track.
     *
     * @return HasOne
     */
    public function curatorFavoriteTrack(): HasOne
    {
        return $this->hasOne(CuratorFavoriteTrack::class, 'track_id', 'track_id')
            ->where('user_id', Auth::id());
    }

    /**
     * Get the curator's favorite artist.
     *
     * @return HasOne
     */
    public function curatorFavoriteArtist(): HasOne
    {
        return $this->hasOne(CuratorFavoriteArtist::class, 'artist_id', 'user_id')
            ->where('curator_id', Auth::id());
    }

    /**
     * Get the send offer associated with the campaign.
     *
     * @return HasOne
     */
    public function sendOffer(): HasOne
    {
        return $this->hasOne(SendOffer::class, 'campaign_id', 'id');
    }

    /**
     * Get all send offers for this campaign (if multiple are allowed).
     *
     * @return HasMany
     */
    public function sendOffers(): HasMany
    {
        return $this->hasMany(SendOffer::class, 'campaign_id', 'id');
    }

    /**
     * Get all submitted coverages for this campaign.
     *
     * @return HasMany
     */
    public function submitCoverages(): HasMany
    {
        return $this->hasMany(SubmitCoverage::class, 'track_id', 'track_id');
    }

    /**
     * Scope a query to only include active campaigns.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('status', 'active')
            ->where('is_expired_campaign', false);
    }

    /**
     * Scope a query to only include expired campaigns.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeExpired($query)
    {
        return $query->where('is_expired_campaign', true);
    }

    /**
     * Scope a query to only include campaigns for a specific artist.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeForArtist($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    /**
     * Check if the campaign is expired.
     *
     * @return bool
     */
    public function isExpired(): bool
    {
        return $this->is_expired_campaign || 
               ($this->is_expired_campaign_date && $this->is_expired_campaign_date->isPast());
    }

    /**
     * Check if the campaign is active.
     *
     * @return bool
     */
    public function isActive(): bool
    {
        return $this->status === 'active' && !$this->isExpired();
    }

    /**
     * Get the campaign banner image URL.
     *
     * @return string|null
     */
    public function getBannerImageUrl(): ?string
    {
        if (!$this->banner_img) {
            return null;
        }

        if (str_starts_with($this->banner_img, 'http')) {
            return $this->banner_img;
        }

        return url('/uploads/banners/' . $this->banner_img);
    }

    /**
     * Get the track thumbnail URL.
     *
     * @return string|null
     */
    public function getTrackThumbnailUrl(): ?string
    {
        if (!$this->track_thumbnail) {
            return null;
        }

        if (str_starts_with($this->track_thumbnail, 'http')) {
            return $this->track_thumbnail;
        }

        return url('/uploads/tracks/' . $this->track_thumbnail);
    }
}
