<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlternativeOption extends Model
{
    use HasFactory;

    protected $table = 'alternative_options';

    protected $fillable = [
        'name',
    ];
}
