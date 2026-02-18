<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens, Billable;

    /**
     * Only allow truly user-editable fields here.
     * IMPORTANT: Do NOT mass-assign role/status/verification/security tokens.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'address',
        'phone_number',
        'profile',
        'provider',
        'provider_id',
        'artist_completed_signup',
        'curator_completed_signup',
        'last_active_at',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_active_at' => 'datetime',
        'is_verified' => 'bool',
        'is_rejected' => 'bool',
        'is_approved' => 'bool',
    ];
// Temporary compatibility method (prevents 500)
public static function getReceivedCurstors($userId = null)
{
    return collect([]);
}
    // --- CHAT & SIDEBAR RECOVERY ---
    public function getUserType()
    {
        return $this->type ?? null;
    }

    public static function curatorBalance()
    {
        return 0;
    }

    public static function curatorRating()
    {
        return 0;
    }

    public static function curatorRank()
    {
        return 'Member';
    }

    public function getReferrals(): Collection
    {
        return collect([]);
    }

    // --- RELATIONSHIPS ---
    public function userTags()
    {
        return $this->hasMany(UserTag::class, 'user_id');
    }

    public function notifications()
    {
        return $this->morphMany(\Illuminate\Notifications\DatabaseNotification::class, 'notifiable')
            ->orderBy('created_at', 'desc');
    }

    /**
     * --- UNIVERSAL DATA MASKING ---
     * This prevents "Undefined property" style breaks in blades
     * when templates try to access optional profile fields.
     *
     * Note: This does NOT prevent SQL "Unknown column" errors when querying.
     */
    public function __get($key)
    {
        // If it's a real attribute, loaded relation, or a defined method/accessor, normal behavior.
        if (
            array_key_exists($key, $this->attributes) ||
            $this->relationLoaded($key) ||
            method_exists($this, $key)
        ) {
            return parent::__get($key);
        }

        // Optional "profile-ish" fields that old blades might call.
        static $safety = [
            'facebook_url',
            'spotify_url',
            'soundcloud_url',
            'youtube_url',
            'website_url',
            'deezer_url',
            'bandcamp_url',
            'tiktok_url',
            'artist_bio',
            'hot_news',
            'artist_name',
        ];

        if (in_array($key, $safety, true)) {
            return ''; // or null if you prefer strictness
        }

        // IMPORTANT: Don't call parent again (it can recurse / throw).
        // Return null for unknown properties to avoid noisy exceptions.
        return null;
    }
}
