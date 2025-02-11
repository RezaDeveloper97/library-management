<?php

namespace App\Models;

use App\Enums\EReturnPolicy;
use App\Traits\EventSourcingTrait;

class Book extends BaseModel
{
    use EventSourcingTrait;
    protected $fillable = [
        'title',
        'author_id',
        'is_vip_only',
        'return_policy',
    ];

    protected $casts = [
        'is_vip_only' => 'boolean',
        'return_policy' => EReturnPolicy::class
    ];
}
