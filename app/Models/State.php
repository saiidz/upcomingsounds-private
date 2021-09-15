<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = 'states';

    protected $fillable =
        [
            'name',
            'country_id',
            'country_code',
        ];
    // City can have many auction
    public function city(){
        return $this->hasMany(City::class);
    }
    // city Belongs to country
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
