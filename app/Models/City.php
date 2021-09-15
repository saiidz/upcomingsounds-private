<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $table = 'cities';

	protected $fillable =
        [
            'name',
            'country_id',
            'country_code',
        ];
    // City can have many auction
    public function auction(){
        return $this->hasMany(Auction::class);
    }
    // City can have many auction
    public function vehicle(){
        return $this->hasMany(Vehicle::class);
    }
    // city Belongs to country
    public function country(){
        return $this->belongsTo(Country::class);
    }
    // city Belongs to state
    public function state(){
        return $this->belongsTo(State::class);
    }
}
