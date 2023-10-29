<?php

namespace App\Models\Curator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifiedCoverageOfferType extends Model
{
    use HasFactory;

    protected $table = 'verified_coverage_offer_types';

    protected $fillable = [
        'name',
    ];
}
