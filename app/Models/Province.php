<?php

namespace App\Models;

class Province extends BaseModel
{
    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
}
