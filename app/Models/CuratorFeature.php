<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuratorFeature extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    // Curator Feature tags
    public function curatorFeatureTag(){
        return $this->hasMany(CuratorFeatureTag::class, 'curator_feature_id');
    }
}
