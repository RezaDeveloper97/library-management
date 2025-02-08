<?php

namespace App\DTOs;

class PenaltyLogDTO extends BasicDTO
{
    public $id;
    public $user_id;
    public $reservation_id;
    public $penalty_reason;
    public $penalty_amount;

    public static function create($user_id, $reservation_id, $penalty_reason, $penalty_amount)
    {
        $dto = new self();
        $dto->user_id = $user_id;
        $dto->reservation_id = $reservation_id;
        $dto->penalty_reason = $penalty_reason;
        $dto->penalty_amount = $penalty_amount;

        return $dto;
    }

    public static function update($id, $user_id = null, $reservation_id = null, $penalty_reason = null, $penalty_amount = null)
    {
        $dto = new self();
        $dto->id = $id;
        if (!is_null($user_id)) {
            $dto->user_id = $user_id;
        }
        if (!is_null($reservation_id)) {
            $dto->reservation_id = $reservation_id;
        }
        if (!is_null($penalty_reason)) {
            $dto->penalty_reason = $penalty_reason;
        }
        if (!is_null($penalty_amount)) {
            $dto->penalty_amount = $penalty_amount;
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
