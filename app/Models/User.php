<?php
namespace App\Models;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable {
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens, Billable;
    protected $fillable = ['name', 'email', 'password', 'type', 'status', 'last_active_at', 'address', 'phone_number', 'is_verified', 'is_rejected', 'is_approved', 'otp', 'profile', 'provider', 'provider_id', 'access_token', 'artist_completed_signup', 'curator_completed_signup'];
    protected $casts = ['email_verified_at' => 'datetime', 'last_active_at' => 'datetime'];

    // --- CHAT & SIDEBAR RECOVERY ---
    public function getUserType() { return $this->type; }
    public static function curatorBalance() { return 0; }
    public static function curatorRating() { return 0; }
    public static function curatorRank() { return "Member"; }
    public function getReferrals() { return collect([]); }

    // --- RELATIONSHIPS ---
    public function userTags() { return $this->hasMany(UserTag::class, 'user_id'); }
    public function notifications() { return $this->morphMany(\Illuminate\Notifications\DatabaseNotification::class, 'notifiable')->orderBy('created_at', 'desc'); }

    // --- UNIVERSAL DATA MASKING (Prevents 500s on missing DB columns) ---
    public function __get($key) {
        if (array_key_exists($key, $this->attributes) || $this->relationLoaded($key) || method_exists($this, $key)) {
            return parent::__get($key);
        }
        $safety = ['facebook_url','spotify_url','soundcloud_url','youtube_url','website_url','deezer_url','bandcamp_url','tiktok_url','artist_bio','hot_news','artist_name'];
        if (in_array($key, $safety)) { return ''; }
        return parent::__get($key);
    }
}
