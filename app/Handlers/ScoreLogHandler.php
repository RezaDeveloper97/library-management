<?php

namespace App\Handlers;

use App\Enums\EScoreLogReason;
use App\Models\ScoreLog;
use App\DTOs\ScoreLogDTO;

class ScoreLogHandler extends BasicHandler
{
    public function addScore(int $userId, int $score, EScoreLogReason $reason)
    {
        $model = ScoreLog::query()->create([
            'user_id' => $userId,
            'score_change' => $score,
            'reason' => $reason
        ]);

        $model->setCacheData();

        return $model;
    }
}
