<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
        'favorite',
        'add_queque',
        'add_playlist',
        'deleted_at',
    ];
    // track category belongs to artist track
    public function trackCategory(){
        return $this->belongsTo(TrackCategory::class);
    }
    // User
    public function user(){
        return $this->belongsTo(User::class);
    }

    // track has many track tag
    public function artistTrackTags(){
        return $this->hasMany(ArtistTrackTag::class,'artist_track_id');
    }

    // track has many track links
    public function artistTrackLinks(){
        return $this->hasMany(ArtistTrackLink::class,'artist_track_id');
    }

    // track has many track images
    public function artistTrackImages(){
        return $this->hasMany(ArtistTrackImage::class,'artist_track_id');
    }

    // track has many track Languages
    public function artistTrackLanguages(){
        return $this->hasMany(ArtistTrackLanguage::class,'artist_track_id');
    }
    // get artists approved
    public function scopeGetApprovedTrack($query)
    {
        $query->where('is_approved',1);
    }
    // get artists pending
    public function scopeGetPendingTrack($query)
    {
        $query->where('is_approved',0);
    }
}
