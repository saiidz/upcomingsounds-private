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

    // city Belongs to country
    public function country(){
        return $this->belongsTo(Country::class);
    }

}
