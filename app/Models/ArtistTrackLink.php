<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ArtistTrackLink extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'artist_track_links';

    protected $fillable = [
        'artist_track_id',
        'link',
        'icon',
    ];
}
