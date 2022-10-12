<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuratorVerificationForm extends Model
{
    use HasFactory;

    protected $table = 'curator_verification_forms';

    protected $fillable = [
        'user_id',
        'curator_type',
        'sub_curator_type',
        'name',
        'image',
        'information',
        'descriptions',
        'embedded_player',
        'apply_count',
    ];
    // User
    public function user(){
        return $this->belongsTo(User::class);
    }
}
