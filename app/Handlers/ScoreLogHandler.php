<?php

namespace App\Handlers;

use App\Commands\ScoreLogCommand;
use App\Models\ScoreLog;

class ScoreLogHandler
{
    public function create(ScoreLogCommand $command)
    {
        return ScoreLog::create([
            'user_id' => $command->user_id,
            'score_change' => $command->score_change,
            'reason' => $command->reason
        ]);
    }

    public function update(ScoreLogCommand $command)
    {
        $model = ScoreLog::findOrFail($command->id);

        if (!is_null($command->user_id)) {
            $model->user_id = $command->user_id;
        }
        if (!is_null($command->score_change)) {
            $model->score_change = $command->score_change;
        }
        if (!is_null($command->reason)) {
            $model->reason = $command->reason;
        }

        $model->save();

        return $model;
    }

    public function delete(ScoreLogCommand $command)
    {
        $model = ScoreLog::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
