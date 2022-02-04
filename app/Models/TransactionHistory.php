<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionHistory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'transaction_histories';

    protected $fillable = [
        'user_id',
        'user_type',
        'package_name',
        'amount',
        'contacts',
        'payment_status',
        'payment_method',
        'payment_response',
        'paid_at',
        'transaction_id',
        'customer_id',
        'gateway_transaction_id',
        'deleted_at',
    ];
    // Transactions belongs to User
    public function user(){
        return $this->belongsTo(User::class);
    }
}
