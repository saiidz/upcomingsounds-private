<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTag extends Model
{
    use HasFactory;
    protected $table = 'user_tags';

    protected $fillable = [
        'user_id',
        'feature_tag_id',
    ];

    // User
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function featureTag(){
        return $this->hasMany(FeatureTag::class,'id','feature_tag_id');
    }
}
