<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuratorRating extends Model
{
    use HasFactory;

    // This allows the rating data to be saved to the database
    protected $fillable = [
        'user_id',
        'curator_id',
        'offer_id',
        'rating',
        'comment'
    ];

    // Relationship to the User (Artist)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship to the Curator
    public function curator()
    {
        return $this->belongsTo(User::class, 'curator_id');
    }
}
