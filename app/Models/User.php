<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Passport\HasApiTokens;
use Laravel\Cashier\Billable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, SoftDeletes, HasApiTokens, Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'artist_completed_signup',
        'curator_completed_signup',
        'password',
        'phone_number',
        'otp',
        'is_phone_verified',
        'address',
        'profile',
        'type',
        'is_approved',
        'status',
        'is_phone_verified',
        'suspended_at',
        'provider',
        'provider_id',
        'access_token',
        'deleted_at',
        'stripe_id',
        'pm_type',
        'pm_last_four',
        'trial_ends_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'artist_completed_signup' => 'datetime',
        'curator_completed_signup' => 'datetime',
    ];

    // User tags
    public function userTags(){
        return $this->hasMany(UserTag::class, 'user_id');
    }
    // CuratorUserTags
    public function curatorUserTags(){
        return $this->hasMany(CuratorUserTag::class, 'user_id');
    }
    // artist user
    public function artistUser(){
        return $this->hasOne(ArtistUser::class,'user_id');
    }
    // curator user
    public function curatorUser(){
        return $this->hasOne(CuratorUser::class,'user_id');
    }
    // user belongs to country
    public function country(){
        return $this->belongsTo(Country::class);
    }
    // User track
    public function artistTrack(){
        return $this->hasMany(ArtistTrack::class, 'user_id');
    }
}
