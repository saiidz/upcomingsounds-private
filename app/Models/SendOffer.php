<?php

namespace App\Models;

use App\Models\Curator\SubmitWork;
use App\Models\Curator\CuratorRating;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SendOffer extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'send_offers';

    protected $fillable = [
        'curator_id',
        'offer_template_id',
        'artist_id',
        'track_id',
        'campaign_id',
        'expiry_date',
        'publish_date',
        'status',
        'is_approved',
        'is_rejected',
        'message',
        'offer_check',
        'deleted_at',
    ];

    /**
     * @return BelongsTo
     */
    public function userCurator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'curator_id');
    }

    /**
     * @return BelongsTo
     */
    public function curatorOfferTemplate(): BelongsTo
    {
        return $this->belongsTo(CuratorOfferTemplate::class, 'offer_template_id');
    }

    /**
     * @return BelongsTo
     */
    public function userArtist(): BelongsTo
    {
        return $this->belongsTo(User::class, 'artist_id');
    }

    /**
     * @return BelongsTo
     */
    public function artistTrack(): BelongsTo
    {
        return $this->belongsTo(ArtistTrack::class, 'track_id');
    }

    /**
     * @return BelongsTo
     */
    public function campaign(): BelongsTo
    {
        return $this->belongsTo(Campaign::class, 'campaign_id');
    }

    /**
     * @return HasOne
     */
    public function submitWork(): HasOne
    {
        return $this->hasOne(SubmitWork::class, 'send_offer_id');
    }

    /**
     * @return HasOne
     */
    public function sendOfferTransaction(): HasOne
    {
        return $this->hasOne(SendOfferTransaction::class, 'send_offer_id');
    }

    /**
     * Relationship for Curator Ratings
     * @return HasMany
     */
    public function ratings(): HasMany
    {
        return $this->hasMany(CuratorRating::class, 'send_offer_id');
    }
}
