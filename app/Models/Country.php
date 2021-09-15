<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';

    protected $fillable =
        [
            'name',
            'iso3',
            'iso2',
            'phonecode',
        ];
    // State can have many auction
    public function state(){
        return $this->hasMany(State::class);
    }

    // City can have many auction
    public function city(){
        return $this->hasMany(City::class);
    }
}
