<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Branch extends BaseModel
{
    protected $fillable = [
        'city_id',
        'name',
        'address',
        'postal_code',
        'latitude',
        'longitude',
    ];

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }
}
