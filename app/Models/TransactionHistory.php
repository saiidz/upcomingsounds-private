<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class TransactionHistory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'transaction_histories';

    protected $fillable = [
        'user_id',
        'user_type',
        'type',
        'transaction_user_id',
        'package_name',
        'amount',
        'credits',
        'payment_status',
        'payment_method',
        'payment_response',
        'paid_at',
        'transaction_id',
        'customer_id',
        'gateway_transaction_id',
        'referral_relationship_id',
        'deleted_at',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function transactionUserInfo(): BelongsTo
    {
        return $this->belongsTo(TransactionUserInfo::class);
    }

    /**
     * @return BelongsTo
     */
    public function referralRelationship(): BelongsTo
    {
        return $this->belongsTo(ReferralRelationship::class,'referral_relationship_id');
    }
}
