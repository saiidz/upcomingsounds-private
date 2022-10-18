<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TicketHelp extends Model
{
    use HasFactory;

    protected $table = 'ticket_helps';

    protected $fillable = [
        'name',
        'email',
        'description',
        'phone_number',
        'ticket_no',
        'status',
        'ticket_issue',
        'country_id',
        'image',
    ];

    // ticket help belongs to country
    public function country(){
        return $this->belongsTo(Country::class);
    }
}
