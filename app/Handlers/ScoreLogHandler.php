<?php

namespace App\Handlers;

use App\Models\ScoreLog;
use App\DTOs\ScoreLogDTO;

class ScoreLogHandler extends BasicHandler
{
    public function create(ScoreLogDTO $dto)
    {
        $model = ScoreLog::query()->create([
            'user_id' => $dto->user_id,
            'score_change' => $dto->score_change,
            'reason' => $dto->reason
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(ScoreLogDTO $dto)
    {
        $model = ScoreLog::query()->find($dto->id);

        if (!is_null($dto->user_id)) {
            $model->user_id = $dto->user_id;
        }
        if (!is_null($dto->score_change)) {
            $model->score_change = $dto->score_change;
        }
        if (!is_null($dto->reason)) {
            $model->reason = $dto->reason;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(ScoreLogDTO $dto)
    {
        $model = ScoreLog::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
