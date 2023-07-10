<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HomeSlider extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'home_sliders';

    protected $fillable = [
        'title',
        'details',
        'button_one_text',
        'button_one_link',
        'button_two_text',
        'button_two_link',
        'image',
        'status',
        'deleted_at',
    ];
}
