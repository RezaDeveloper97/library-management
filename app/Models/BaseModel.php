<?php

namespace App\Models;

use App\Traits\EventSourcingTrait;
use Illuminate\Database\Eloquent\Model;

abstract class BaseModel extends Model
{
    use EventSourcingTrait;
}
