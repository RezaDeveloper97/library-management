<?php

namespace App\Models;

use app\Enums\EReturnPolicy;
use Illuminate\Database\Eloquent\Model;

class Book extends BaseModel
{
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
