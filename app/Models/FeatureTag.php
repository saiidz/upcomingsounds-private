<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeatureTag extends Model
{
    use HasFactory;
    protected $table = 'feature_tags';

    protected $fillable = [
        'feature_id',
        'name',
    ];

    // Feature
    public function feature(){
        return $this->belongsTo(Feature::class);
    }
    // UserTag
//    public function userTag(){
//        return $this->belongsTo(UserTag::class);
//    }

}
