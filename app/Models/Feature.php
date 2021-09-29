<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Feature tags
    public function featureTags(){
        return $this->hasMany(FeatureTag::class, 'feature_id');
    }

}
