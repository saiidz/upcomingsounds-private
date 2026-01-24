<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CuratorRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',      // Changed from user_id to match Controller
        'curator_id',
        'offer_id',
        'rating_stars',   // Changed from rating to match Controller
        'artist_feedback' // Changed from comment to match Controller
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'artist_id');
    }

    public function curator()
    {
        return $this->belongsTo(User::class, 'curator_id');
    }
}
