<?php

namespace App\DTOs;

class ScoreLogDTO extends BasicDTO
{
    public $id;
    public $user_id;
    public $score_change;
    public $reason;

    public static function create($user_id, $score_change, $reason)
    {
        $dto = new self();
        $dto->user_id = $user_id;
        $dto->score_change = $score_change;
        $dto->reason = $reason;

        return $dto;
    }

    public static function update($id, $user_id = null, $score_change = null, $reason = null)
    {
        $dto = new self();
        $dto->id = $id;
        if (!is_null($user_id)) {
            $dto->user_id = $user_id;
        }
        if (!is_null($score_change)) {
            $dto->score_change = $score_change;
        }
        if (!is_null($reason)) {
            $dto->reason = $reason;
        }

        return $dto;
    }

    public static function delete($id)
    {
        $dto = new self();
        $dto->id = $id;

        return $dto;
    }
}
