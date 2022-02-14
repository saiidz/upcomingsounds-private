<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionUserInfo extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'transaction_user_infos';

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'phone_number',
        'address',
        'city_id',
        'postal_code',
        'deleted_at',
    ];
}
