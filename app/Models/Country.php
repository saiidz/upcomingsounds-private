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
    // user can have many user
    public function user(){
        return $this->hasMany(User::class);
    }
    // User artist
    public function artistUser(){
        return $this->hasOne(ArtistUser::class, 'country_id');
    }
    // User curator
    public function curatorUser(){
        return $this->hasOne(CuratorUser::class, 'country_id');
    }
}
