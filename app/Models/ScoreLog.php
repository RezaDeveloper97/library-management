<?php

namespace App\Models;

use App\Enums\EScoreLogReason;
use App\Traits\EventSourcingTrait;

class ScoreLog extends BaseModel
{
    use EventSourcingTrait;
    protected $fillable = [
        'user_id',
        'score_change',
        'reason',
    ];

    protected $casts = [
        'reason' => EScoreLogReason::class
    ];
}
