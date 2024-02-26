<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserTag extends Model
{
    use HasFactory;
    protected $table = 'user_tags';

    protected $fillable = [
        'user_id',
        'curator_feature_tag_id',
        'feature_tag_id',
    ];


    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo
     */
    public function featureTag(): BelongsTo
    {
        return $this->belongsTo(FeatureTag::class);
    }

    /**
     * @return BelongsTo
     */
    public function curatorFeatureTag(): BelongsTo
    {
        return $this->belongsTo(CuratorFeatureTag::class);
    }
}
