<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuratorFeatureTag extends Model
{
    use HasFactory;

    protected $table = 'curator_feature_tags';

    protected $fillable = [
        'curator_feature_id',
        'name',
    ];

    // CuratorFeature
    public function curatorFeature(){
        return $this->belongsTo(CuratorFeature::class);
    }
}
