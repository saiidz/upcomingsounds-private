<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GiftCard extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'gift_cards';
    protected $fillable = ['code', 'value', 'expiration_date', 'is_redeemed'];
}
