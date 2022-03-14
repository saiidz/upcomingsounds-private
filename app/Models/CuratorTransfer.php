<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuratorTransfer extends Model
{
    use HasFactory;

    protected $table = 'curator_transfers';

    protected $fillable = [
        'user_id',
        'email',
        'amount',
    ];
}
