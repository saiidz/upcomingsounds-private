<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArtistTrackLanguage extends Model
{
    use HasFactory;
    protected $table = 'artist_track_languages';

    protected $fillable = [
        'artist_track_id',
        'language_id',
    ];

    // User
    public function language(){
        return $this->belongsTo(Language::class);
    }
}
