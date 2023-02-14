<?php

namespace App\Models\Curator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubmitWorkLink extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'submit_work_links';

    protected $fillable = [
        'submit_work_id',
        'link',
        'deleted_at',
    ];

    /**
     * @return BelongsTo
     */
    public function submitWork(): BelongsTo
    {
        return $this->belongsTo(SubmitWork::class,'submit_work_id');
    }
}
