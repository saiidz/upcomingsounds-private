<?php

namespace App\Models;

use App\Traits\SyncsWithFirebase;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory, SyncsWithFirebase;

    protected $table = "messages";

    protected $fillable = [
        'conversation_id',
        'user_id',
        'message',
        'ip',
        'file',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
