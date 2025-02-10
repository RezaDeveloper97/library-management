<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends BaseModel
{
    protected $fillable = [
        'province_id',
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class);
    }
}
