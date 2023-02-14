<?php

namespace App\Models\Curator;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubmitWorkImage extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'submit_work_images';

    protected $fillable = [
        'submit_work_id',
        'path',
        'type',
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
