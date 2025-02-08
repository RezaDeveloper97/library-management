<?php

namespace App\Handlers;

use App\Commands\PenaltyLogCommand;
use App\Models\PenaltyLog;

class PenaltyLogHandler
{
    public function create(PenaltyLogCommand $command)
    {
        return PenaltyLog::create([
            'user_id' => $command->user_id,
            'reservation_id' => $command->reservation_id,
            'penalty_reason' => $command->penalty_reason,
            'penalty_amount' => $command->penalty_amount
        ]);
    }

    public function update(PenaltyLogCommand $command)
    {
        $model = PenaltyLog::findOrFail($command->id);

        if (!is_null($command->user_id)) {
            $model->user_id = $command->user_id;
        }
        if (!is_null($command->reservation_id)) {
            $model->reservation_id = $command->reservation_id;
        }
        if (!is_null($command->penalty_reason)) {
            $model->penalty_reason = $command->penalty_reason;
        }
        if (!is_null($command->penalty_amount)) {
            $model->penalty_amount = $command->penalty_amount;
        }

        $model->save();

        return $model;
    }

    public function delete(PenaltyLogCommand $command)
    {
        $model = PenaltyLog::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
