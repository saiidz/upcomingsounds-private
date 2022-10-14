<?php

namespace App\Models;

use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

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
        'is_verified',
        'is_rejected',
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
        'is_blog',
        'created_at',
        'last_active_at',
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
        'last_active_at' => 'datetime',
    ];

    protected $dates = ['last_active_at'];

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
    // User can have many transactions
    public function transactionHistory(){
        return $this->hasMany(TransactionHistory::class, 'user_id');
    }
    // curator user
    public function transactionUserInfo(){
        return $this->hasOne(TransactionUserInfo::class,'user_id');
    }

    // get curators received
    public function scopeGetReceivedCurstors($query)
    {
        $query->where('is_approved',1)->where('type','curator');
    }

    // get artists approved
    public function scopeGetApprovedArtists($query)
    {
        $query->where('is_approved',1)->where('type','artist');
    }

     // get artists pending
     public function scopeGetPendingArtists($query)
     {
         $query->where('is_approved',0)->where('type','artist');
     }

     // get curators approved
    public function scopeGetApprovedCurators($query)
    {
        $query->where('is_approved',1)->where('type','curator');
    }

     // get curators pending
     public function scopeGetPendingCurators($query)
     {
         $query->where('is_approved',0)->where('type','curator');
     }

     // CuratorVerificationForm
    public function curatorVerificationForm(){
        return $this->hasMany(CuratorVerificationForm::class, 'user_id');
    }


    // get Referrals
    public function getReferrals()
    {
        return ReferralProgram::all()->map(function ($program) {
            return ReferralLink::getReferral($this, $program);
        });
    }

     /**
     * Enter your own logic (e.g. if ($this->id === 1) to
     *   enable this user to be able to add/edit blog posts
     *
     * @return bool - true = they can edit / manage blog posts,
     *        false = they have no access to the blog admin panel
     */
    public function canManageBinshopsBlogPosts()
    {
        if (  $this->type != "artist" && $this->is_blog === 1
           ){

           // return true so this user CAN edit/post/delete
           // blog posts (and post any HTML/JS)

           return true;
        }

        // otherwise return false, so they have no access
        // to the admin panel (but can still view posts)

        return false;

        // if (       $this->id === 1 || $this->id === 168
        //      && $this->type === "admin"
        //    ){

        //    // return true so this user CAN edit/post/delete
        //    // blog posts (and post any HTML/JS)

        //    return true;
        // }

        // // otherwise return false, so they have no access
        // // to the admin panel (but can still view posts)

        // return false;
        // if(Auth::check())
        // {
        //     // Enter the logic needed for your app.
        //     // Maybe you can just hardcode in a user id that you
        //     //   know is always an admin ID?

        //     if (       $this->id === Auth::user()->id
        //         && $this->email === Auth::user()->email
        //         && $this->type === 'admin'
        //     ){

        //     // return true so this user CAN edit/post/delete
        //     // blog posts (and post any HTML/JS)

        //     return true;
        //     }

        //     // otherwise return false, so they have no access
        //     // to the admin panel (but can still view posts)

        //     return false;
        // }

    }
}
