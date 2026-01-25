<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CuratorRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'artist_id',
        'curator_id',
        'offer_id',
        'rating_stars',
        'artist_feedback'
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
