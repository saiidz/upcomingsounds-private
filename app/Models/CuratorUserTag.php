<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CuratorUserTag extends Model
{
    use HasFactory;

    protected $table = 'curator_user_tags';

    protected $fillable = [
        'user_id',
        'curator_feature_tag_id',
    ];

    // User
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function curatorFeatureTag(){
        return $this->belongsTo(CuratorFeatureTag::class);
    }
}
