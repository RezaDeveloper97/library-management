<?php

namespace App\Handlers;

use App\Models\PenaltyLog;
use App\DTOs\PenaltyLogDTO;

class PenaltyLogHandler extends BasicHandler
{
    public function create(PenaltyLogDTO $dto)
    {
        $model = PenaltyLog::query()->create([
            'user_id' => $dto->user_id,
            'reservation_id' => $dto->reservation_id,
            'penalty_reason' => $dto->penalty_reason,
            'penalty_amount' => $dto->penalty_amount
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(PenaltyLogDTO $dto)
    {
        $model = PenaltyLog::query()->find($dto->id);

        if (!is_null($dto->user_id)) {
            $model->user_id = $dto->user_id;
        }
        if (!is_null($dto->reservation_id)) {
            $model->reservation_id = $dto->reservation_id;
        }
        if (!is_null($dto->penalty_reason)) {
            $model->penalty_reason = $dto->penalty_reason;
        }
        if (!is_null($dto->penalty_amount)) {
            $model->penalty_amount = $dto->penalty_amount;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(PenaltyLogDTO $dto)
    {
        $model = PenaltyLog::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
