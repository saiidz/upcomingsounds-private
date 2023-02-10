<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    public function curatorOfferTemplate(): BelongsTo
    {
        return $this->belongsTo(CuratorOfferTemplate::class,'offer_template_id');
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
