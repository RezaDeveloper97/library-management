<?php

namespace App\Models;

class SystemRule extends BaseModel
{
    protected $fillable = [
        'group_name',
        'rule_name',
        'rule_value',
    ];
}
