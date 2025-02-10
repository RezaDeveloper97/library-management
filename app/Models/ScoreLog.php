<?php

namespace App\Models;

use App\Enums\EScoreLogReason;

class ScoreLog extends BaseModel
{
    protected $fillable = [
        'user_id',
        'score_change',
        'reason',
    ];

    protected $casts = [
        'reason' => EScoreLogReason::class
    ];
}
