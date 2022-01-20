<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsLetterSubscription extends Model
{
    use HasFactory;

    protected $table = 'news_letter_subscriptions';

    protected $fillable = [
        'email',
        'status',
    ];
}
