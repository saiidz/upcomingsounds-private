<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SessionStripe extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'session_stripes';

    protected $fillable = [
        'session_id',
        'coupon_code',
        'name',
        'email',
        'phone',
        'currency',
        'live_mode',
        'url',
        'payment_status',
        'claim_now_status',
        'details',
        'stripe_customer_id',
        'customer_details',
        'deleted_at',
    ];
}
