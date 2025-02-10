<?php

namespace App\Models;

use App\Traits\ModelCacheableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    use ModelCacheableTrait;
    use HasFactory;
}
