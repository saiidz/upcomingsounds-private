<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtistUser extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'artist_users';

    protected $fillable = [
        'user_id',
        'artist_signup_from',
        'artist_name',
        'country_id',
        'instagram_url',
        'facebook_url',
        'spotify_url',
        'soundcloud_url',
        'youtube_url',
        'website_url',
        'deezer_url',
        'bandcamp_url',
        'released',
        'released_day',
        'come_upcoming',
        'artist_representative_record',
        'artist_representative_manager',
        'artist_representative_press',
        'artist_representative_publisher',
        'artist_country_id',
        'deleted_at',
    ];

    // artist user
    public function user(){
        return $this->belongsTo(User::class);
    }
    // artist user belongs to country
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
