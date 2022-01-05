<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CuratorUser extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'curator_users';

    protected $fillable = [
        'user_id',
        'curator_signup_from',
        'tastemaker_name',
        'country_id',
        'share_music',
        'instagram_url',
        'tiktok_url',
        'facebook_url',
        'spotify_url',
        'deezer_url',
        'apple_url',
        'soundcloud_url',
        'youtube_url',
        'website_url',
        'come_upcoming',
        'deleted_at',
    ];

    // curator user
    public function user(){
        return $this->belongsTo(User::class);
    }
    // curator user belongs to country
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
