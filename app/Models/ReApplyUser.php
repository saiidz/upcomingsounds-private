<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReApplyUser extends Model
{
    use HasFactory;
    protected $table = 're_apply_users';

    protected $fillable = [
        'user_id',
        'description',
    ];
}
