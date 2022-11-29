<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArtistTrackImage extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'artist_track_images';

    protected $fillable = [
        'artist_track_id',
        'path',
        'type',
    ];
}
