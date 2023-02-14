<?php

namespace App\Models\Curator;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubmitWork extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'submit_works';

    protected $fillable = [
        'curator_id',
        'send_offer_id',
        'status',
        'deleted_at',
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class,'curator_id');
    }

    /**
     * @return HasMany
     */
    public function submitWorkLinks(): HasMany
    {
        return $this->hasMany(SubmitWorkLink::class,'submit_work_id');
    }

    /**
     * @return HasMany
     */
    public function submitWorkImages(): HasMany
    {
        return $this->hasMany(SubmitWorkImage::class,'submit_work_id');
    }
}
