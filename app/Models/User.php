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
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection as SupportCollection;
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
        'is_allow_curator_verification',
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

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'artist_completed_signup' => 'datetime',
        'curator_completed_signup' => 'datetime',
        'last_active_at' => 'datetime',
    ];

    protected $dates = ['last_active_at'];

    // -----------------------------
    // ✅ FIX: Curators "curstors" compat
    // -----------------------------

    /**
     * ✅ Static compatibility method
     * Allows: User::getReceivedCurstors()
     */
    public static function getReceivedCurstors($userId = null): SupportCollection
    {
        // If you ever create a correctly spelled method later, forward to it.
        if (method_exists(static::class, 'getReceivedCurators')) {
            return static::getReceivedCurators($userId);
        }

        // Return a collection of approved curators (matches the old intent)
        return static::query()
            ->where('is_approved', 1)
            ->where('type', 'curator')
            ->get();
    }

    /**
     * ✅ Proper chainable scope
     * Allows: User::query()->receivedCurstors()->latest()->get()
     */
    public function scopeReceivedCurstors(Builder $query, $userId = null): Builder
    {
        return $query
            ->where('is_approved', 1)
            ->where('type', 'curator');
    }

    /**
     * ✅ Backward-compatible scope name (if code uses getReceivedCurstors as a scope)
     * Allows: User::query()->getReceivedCurstors()->latest()->get()
     */
    public function scopeGetReceivedCurstors(Builder $query): Builder
    {
        return $this->scopeReceivedCurstors($query);
    }

    // -----------------------------
    // Relationships
    // -----------------------------

    public function userTags(): HasMany
    {
        return $this->hasMany(UserTag::class, 'user_id');
    }

    public function curatorUserTags(): HasMany
    {
        return $this->hasMany(CuratorUserTag::class, 'user_id');
    }

    public function artistUser(): HasOne
    {
        return $this->hasOne(ArtistUser::class,'user_id');
    }

    public function curatorUser(): HasOne
    {
        return $this->hasOne(CuratorUser::class,'user_id');
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function artistTrack(): HasMany
    {
        return $this->hasMany(ArtistTrack::class, 'user_id');
    }

    public function artistTrackAlbum(): HasMany
    {
        return $this->hasMany(ArtistTrack::class, 'user_id')->where('release_type','album');
    }

    public function artistTrackPopular(): HasMany
    {
        return $this->hasMany(ArtistTrack::class, 'user_id')->where('release_type','!=','album');
    }

    public function transactionHistory(): HasMany
    {
        return $this->hasMany(TransactionHistory::class, 'user_id');
    }

    public function transactionUserInfo(): HasOne
    {
        return $this->hasOne(TransactionUserInfo::class,'user_id');
    }

    public function campaign(): HasMany
    {
        return $this->hasMany(Campaign::class, 'user_id');
    }

    // get artists approved
    public function scopeGetApprovedArtists($query)
    {
        return $query->where('is_approved',1)->where('type','artist');
    }

    // get artists pending
    public function scopeGetPendingArtists($query)
    {
        return $query->where('is_approved',0)->where('type','artist');
    }

    public function scopeGetApprovedCurators($query)
    {
        return $query->where('is_approved',1)->where('type','curator');
    }

    // get curators pending
    public function scopeGetPendingCurators($query)
    {
        return $query->where('is_approved',0)->where('type','curator');
    }

    public function curatorVerificationForm(): HasMany
    {
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

    public function curatorOfferTemplate(): HasMany
    {
        return $this->hasMany(CuratorOfferTemplate::class,'user_id','id')
            ->where('type', '!=', IOfferTemplateStatus::TYPE_DIRECT_OFFER);
    }

    public function curatorVerifiedCoverage(): HasMany
    {
        return $this->hasMany(VerifiedCoverage::class,'user_id','id');
    }

    public function canManageBinshopsBlogPosts()
    {
        if ($this->type != "artist" && $this->is_blog === 1) {
            return true;
        }
        return false;
    }

    public function artistSendOfferTransaction(): HasMany
    {
        return $this->hasMany(SendOfferTransaction::class, 'artist_id');
    }

    public function artistRefundSendOfferTransaction(): HasMany
    {
        return $this->hasMany(SendOfferTransaction::class, 'artist_id')
            ->where(['is_rejected' => 1, 'status' => IOfferTemplateStatus::REFUND]);
    }

    public function curatorSendOfferTransactions(): HasMany
    {
        return $this->hasMany(SendOfferTransaction::class,'curator_id')
            ->where(['is_approved' => 1, 'is_rejected' => 0]);
    }

    public function curatorWithdrawalRequestPending(): HasMany
    {
        return $this->hasMany(TransactionHistory::class, 'user_id')
            ->where('payment_status', IStatus::PENDING)
            ->where('type', IUserType::WITHDRAWAL);
    }

    public function curatorWithdrawalRequestApproved(): HasMany
    {
        return $this->hasMany(TransactionHistory::class, 'user_id')
            ->where('payment_status', IStatus::COMPLETED)
            ->where('type', IUserType::WITHDRAWAL);
    }

    public function curatorReferralTransactionHistory(): HasMany
    {
        return $this->hasMany(TransactionHistory::class, 'user_id')
            ->where('payment_status', IStatus::COMPLETED)
            ->whereNotNull('referral_relationship_id');
    }

    public function curatorSubmitCoverageTransactionHistory(): HasMany
    {
        return $this->hasMany(TransactionHistory::class, 'user_id')
            ->where('payment_status', IStatus::COMPLETED)
            ->where(['submit_coverage' => 1, 'type' => IUserType::DEPOSIT]);
    }

    public function artistCouponGiftCard(): HasMany
    {
        return $this->hasMany(ArtistCouponGiftCard::class, 'user_id')
            ->where('status', IOfferTemplateStatus::PAID);
    }

    public function artistVerifiedContentCreatorCurator(): HasMany
    {
        return $this->hasMany(VerifiedContentCreatorCurator::class, 'artist_id');
    }

    public function artistRefundVerifiedContentCreatorCurator(): HasMany
    {
        return $this->hasMany(VerifiedContentCreatorCurator::class, 'artist_id')
            ->where(['is_rejected' => 1, 'status' => IOfferTemplateStatus::REFUND]);
    }

    public static function artistBalance()
    {
        $user = Auth::user();
        if (!empty($user)) {
            $balance = !empty($user->TransactionUserInfo)
                ? $user->TransactionUserInfo->transactionHistory->sum('credits')
                    - (!empty($user->campaign) ? $user->campaign->sum('usc_credit') : 0)
                    - (!empty($user->artistSendOfferTransaction) ? $user->artistSendOfferTransaction->sum('contribution') : 0)
                    - (!empty($user->artistVerifiedContentCreatorCurator) ? $user->artistVerifiedContentCreatorCurator->sum('usc_credit') + $user->artistVerifiedContentCreatorCurator->sum('usc_fee_commission') : 0)
                    + (!empty($user->artistRefundSendOfferTransaction) ? $user->artistRefundSendOfferTransaction->sum('contribution') : 0)
                    + (!empty($user->artistRefundVerifiedContentCreatorCurator) ? $user->artistRefundVerifiedContentCreatorCurator->sum('usc_credit') : 0)
                    + (!empty($user->artistCouponGiftCard) ? $user->artistCouponGiftCard->sum('credits') : 0)
                : 0;

            return $balance;
        }
    }

    public static function curatorBalance()
    {
        $user = Auth::user();
        if (!empty($user)) {
            $balance = !empty($user->curatorSendOfferTransactions)
                ? $user->curatorSendOfferTransactions->sum('contribution')
                    - (!empty($user->curatorSendOfferTransactions) ? $user->curatorSendOfferTransactions->sum('usc_fee_commission') : 0)
                    - (!empty($user->curatorWithdrawalRequestPending) ? $user->curatorWithdrawalRequestPending->sum('amount') : 0)
                    - (!empty($user->curatorWithdrawalRequestApproved) ? $user->curatorWithdrawalRequestApproved->sum('amount') : 0)
                    + (!empty($user->curatorReferralTransactionHistory) ? $user->curatorReferralTransactionHistory->sum('credits') : 0)
                    + (!empty($user->curatorSubmitCoverageTransactionHistory) ? $user->curatorSubmitCoverageTransactionHistory->sum('amount') : 0)
                : 0;

            return $balance;
        }
    }

    public function getUserType()
    {
        if (Auth::check() && Auth::user()) {
            if (Auth::user()->type == IMessageTemplates::CURATOR) {
                $type = IMessageTemplates::ARTIST;
            } elseif (Auth::user()->type == IMessageTemplates::ARTIST) {
                $type = IMessageTemplates::CURATOR;
            }
            return ucfirst($type);
        }
    }
}
