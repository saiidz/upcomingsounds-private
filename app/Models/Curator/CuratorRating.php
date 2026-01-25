<?php

namespace App\Models; // Add the semicolon here

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class CuratorRating extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * These must match the columns in your upcomingsounds_UCS database.
     */
    protected $fillable = [
        'artist_id',
        'curator_id',
        'send_offer_id',
        'rating',
        'review'
    ];

    /**
     * Get the artist that was rated.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'artist_id');
    }

    /**
     * Get the curator that received the rating.
     */
    public function curator()
    {
        return $this->belongsTo(User::class, 'curator_id');
    }
}
