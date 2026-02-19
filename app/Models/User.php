<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens, Billable;

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

    /**
     * Compatibility alias (typo method name used elsewhere)
     * Keeps site from 500ing until code is cleaned up.
     */
    public static function getReceivedCurstors($userId = null): Collection
    {
        // If the correct method exists, forward to it
        if (method_exists(static::class, 'getReceivedCurators')) {
            return static::getReceivedCurators($userId);
        }

        // Safe fallback
        return collect([]);
    }

    /**
     * Scope used by query builder calls
     */
    public function scopeReceivedCurstors(Builder $query, $userId = null): Builder
    {
        return $query; // temporary no-op to prevent 500
    }

    // -----------------------------
    // ✅ Put the rest of your REAL methods BELOW this line
    // (getUserType, relationships, notifications, etc.)
    // -----------------------------

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

    public function userTags()
    {
        return $this->hasMany(UserTag::class, 'user_id');
    }

    public function notifications()
    {
        return $this->morphMany(
            \Illuminate\Notifications\DatabaseNotification::class,
            'notifiable'
        )->orderBy('created_at', 'desc');
    }

    public function __get($key)
    {
        if (
            array_key_exists($key, $this->attributes) ||
            $this->relationLoaded($key) ||
            method_exists($this, $key)
        ) {
            return parent::__get($key);
        }

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
            return '';
        }

        return null;
    }
}

    // keep the rest of your methods below...
}
    /**
     * ✅ THIS is the correct scope placement
     */
    public function scopeReceivedCurstors(Builder $query, $userId = null): Builder
    {
        return $query; // temporary no-op to prevent 500
    }

    /**
     * Optional compatibility method
     */
    public static function getReceivedCurstors($userId = null): Collection
    {
        return collect([]);
    }

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

    public function userTags()
    {
        return $this->hasMany(UserTag::class, 'user_id');
    }

    public function notifications()
    {
        return $this->morphMany(
            \Illuminate\Notifications\DatabaseNotification::class,
            'notifiable'
        )->orderBy('created_at', 'desc');
    }

    public function __get($key)
    {
        if (
            array_key_exists($key, $this->attributes) ||
            $this->relationLoaded($key) ||
            method_exists($this, $key)
        ) {
            return parent::__get($key);
        }

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
            return '';
        }

        return null;
    }
}
