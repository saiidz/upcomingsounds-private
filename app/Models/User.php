<?php

namespace App\Models;

use App\Models\Artist\ArtistCouponGiftCard;
use App\Models\Artist\VerifiedContentCreatorCurator;
use App\Models\Curator\VerifiedCoverage;
use App\Templates\IMessageTemplates;
use App\Templates\IOfferTemplateStatus;
use App\Templates\IStatus;
use App\Templates\IUserType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Laravel\Cashier\Billable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use LaravelIdea\Helper\App\Models\_IH_ReferralProgram_C;

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
        'is_public_profile',
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

    /**
     * @return HasMany
     */
    public function userTags(){
        return $this->hasMany(UserTag::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    public function curatorUserTags(){
        return $this->hasMany(CuratorUserTag::class, 'user_id');
    }

    /**
     * @return HasOne
     */
    public function artistUser(){
        return $this->hasOne(ArtistUser::class,'user_id');
    }

    /**
     * @return HasOne
     */
    public function curatorUser(){
        return $this->hasOne(CuratorUser::class,'user_id');
    }

    /**
     * @return BelongsTo
     */
    public function country(){
        return $this->belongsTo(Country::class);
    }

    /**
     * @return HasMany
     */
    public function artistTrack(): HasMany
    {
        return $this->hasMany(ArtistTrack::class, 'user_id');
    }

    /**
     * @return HasMany
     */
    public function artistTrackAlbum(): HasMany
    {
        return $this->hasMany(ArtistTrack::class, 'user_id')->where('release_type','album');
    }

    /**
     * @return HasMany
     */
    public function artistTrackPopular(): HasMany
    {
        return $this->hasMany(ArtistTrack::class, 'user_id')->where('release_type','!=','album');
    }

    /**
     * @return HasMany
     */
    public function transactionHistory(): HasMany
    {
        return $this->hasMany(TransactionHistory::class, 'user_id');
    }

    /**
     * @return HasOne
     */
    public function transactionUserInfo(): HasOne
    {
        return $this->hasOne(TransactionUserInfo::class,'user_id');
    }

    /**
     * @return HasMany
     */
    public function campaign(): HasMany
    {
        return $this->hasMany(Campaign::class, 'user_id');
    }

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

    /**
     * @param $query
     * @return void
     */
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


    /**
     * @return ReferralProgram[]|Collection|\Illuminate\Support\Collection|_IH_ReferralProgram_C
     */
    public function getReferrals()
    {
        return ReferralProgram::all()->map(function ($program) {
            return ReferralLink::getReferral($this, $program);
        });
    }

    /**
     * @return HasMany
     */
    public function curatorOfferTemplate(): HasMany
    {
        return $this->hasMany(CuratorOfferTemplate::class,'user_id','id')->where('type', '!=',IOfferTemplateStatus::TYPE_DIRECT_OFFER);
    }

    /**
     * @return HasMany
     */
    public function curatorVerifiedCoverage(): HasMany
    {
        return $this->hasMany(VerifiedCoverage::class,'user_id','id');
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

    /**
     * @return HasMany
     */
    public function artistSendOfferTransaction(): HasMany
    {
        return $this->hasMany(SendOfferTransaction::class, 'artist_id');
    }

    /**
     * @return HasMany
     */
    public function artistRefundSendOfferTransaction(): HasMany
    {
        return $this->hasMany(SendOfferTransaction::class, 'artist_id')->where(['is_rejected' => 1, 'status' => IOfferTemplateStatus::REFUND]);
    }

    /**
     * @return HasMany
     */
    public function curatorSendOfferTransactions(): HasMany
    {
        return $this->hasMany(SendOfferTransaction::class,'curator_id')->where(['is_approved' => 1, 'is_rejected' => 0]);
    }

    /**
     * @return HasMany
     */
    public function curatorWithdrawalRequestPending(): HasMany
    {
        return $this->hasMany(TransactionHistory::class, 'user_id')->where('payment_status', IStatus::PENDING)->where('type',IUserType::WITHDRAWAL);
    }

    /**
     * @return HasMany
     */
    public function curatorWithdrawalRequestApproved(): HasMany
    {
        return $this->hasMany(TransactionHistory::class, 'user_id')->where('payment_status', IStatus::COMPLETED)->where('type',IUserType::WITHDRAWAL);
    }

    /**
     * @return HasMany
     */
    public function curatorReferralTransactionHistory(): HasMany
    {
        return $this->hasMany(TransactionHistory::class, 'user_id')->where('payment_status', IStatus::COMPLETED)->whereNotNull('referral_relationship_id');
    }

    /**
     * @return HasMany
     */
    public function curatorSubmitCoverageTransactionHistory(): HasMany
    {
        return $this->hasMany(TransactionHistory::class, 'user_id')->where('payment_status', IStatus::COMPLETED)
            ->where(['submit_coverage' => 1, 'type' => IUserType::DEPOSIT]);
    }

    /**
     * @return HasMany
     */
    public function artistCouponGiftCard(): HasMany
    {
        return $this->hasMany(ArtistCouponGiftCard::class, 'user_id')->where('status' , IOfferTemplateStatus::PAID);
    }

    /**
     * @return HasMany
     */
    public function artistVerifiedContentCreatorCurator(): HasMany
    {
        return $this->hasMany(VerifiedContentCreatorCurator::class, 'artist_id');
    }

    /**
     * @return HasMany
     */
    public function artistRefundVerifiedContentCreatorCurator(): HasMany
    {
        return $this->hasMany(VerifiedContentCreatorCurator::class, 'artist_id')->where(['is_rejected' => 1, 'status' => IOfferTemplateStatus::REFUND]);
    }

    /**
     * @return int|void
     */
    public static function artistBalance()
    {
        $user = Auth::user();
        if(!empty($user))
        {
            $balance = !empty($user->TransactionUserInfo) ? $user->TransactionUserInfo->transactionHistory->sum('credits')
                - (!empty($user->campaign) ? $user->campaign->sum('usc_credit') : 0)
                - (!empty($user->artistSendOfferTransaction) ? $user->artistSendOfferTransaction->sum('contribution') : 0)
                - (!empty($user->artistVerifiedContentCreatorCurator) ? $user->artistVerifiedContentCreatorCurator->sum('usc_credit') : 0)
                + (!empty($user->artistRefundSendOfferTransaction) ? $user->artistRefundSendOfferTransaction->sum('contribution') : 0)
                + (!empty($user->artistRefundVerifiedContentCreatorCurator) ? $user->artistRefundVerifiedContentCreatorCurator->sum('usc_credit') : 0)
                + (!empty($user->artistCouponGiftCard) ? $user->artistCouponGiftCard->sum('credits') : 0)
                : 0;
            return $balance;
        }
    }

    /**
     * @return int|void
     */
    public static function curatorBalance()
    {
        $user = Auth::user();
        if(!empty($user))
        {
            $balance = !empty($user->curatorSendOfferTransactions) ? $user->curatorSendOfferTransactions->sum('contribution')
                - (!empty($user->curatorSendOfferTransactions) ? $user->curatorSendOfferTransactions->sum('usc_fee_commission') : 0)
                - (!empty($user->curatorWithdrawalRequestPending) ? $user->curatorWithdrawalRequestPending->sum('amount') : 0)
                - (!empty($user->curatorWithdrawalRequestApproved) ? $user->curatorWithdrawalRequestApproved->sum('amount') : 0)
                + (!empty($user->curatorReferralTransactionHistory) ? $user->curatorReferralTransactionHistory->sum('credits') : 0)
                + (!empty($user->curatorSubmitCoverageTransactionHistory) ? $user->curatorSubmitCoverageTransactionHistory->sum('amount') : 0)
                : 0;
            return $balance;
        }

    }

    /**
     * @return string|void
     */
    public function getUserType()
    {
        // this is for send offer
        if (Auth::check() && Auth::user())
        {
            if(Auth::user()->type == IMessageTemplates::CURATOR)
            {
                $type = IMessageTemplates::ARTIST;
            }elseif (Auth::user()->type == IMessageTemplates::ARTIST){

                $type = IMessageTemplates::CURATOR;
            }
            return ucfirst($type);
        }
    }
}
