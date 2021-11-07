<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TrackCategory extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'track_categories';

    protected $fillable = [
        'name',
        'deleted_at',
    ];

    // track category belongs to artist track
    public function artistTrack(){
        return $this->hasOne(ArtistTrack::class,'track_category_id');
    }
}
