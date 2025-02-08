<?php

namespace App\Commands;

class PenaltyLogCommand
{
    public $id;
    public $user_id;
    public $reservation_id;
    public $penalty_reason;
    public $penalty_amount;

    public static function create($user_id, $reservation_id, $penalty_reason, $penalty_amount)
    {
        $command = new self();
        $command->user_id = $user_id;
        $command->reservation_id = $reservation_id;
        $command->penalty_reason = $penalty_reason;
        $command->penalty_amount = $penalty_amount;

        return $command;
    }

    public static function update($id, $user_id = null, $reservation_id = null, $penalty_reason = null, $penalty_amount = null)
    {
        $command = new self();
        $command->id = $id;
        if (!is_null($user_id)) {
            $command->user_id = $user_id;
        }
        if (!is_null($reservation_id)) {
            $command->reservation_id = $reservation_id;
        }
        if (!is_null($penalty_reason)) {
            $command->penalty_reason = $penalty_reason;
        }
        if (!is_null($penalty_amount)) {
            $command->penalty_amount = $penalty_amount;
        }

        return $command;
    }

    public static function delete($id)
    {
        $command = new self();
        $command->id = $id;

        return $command;
    }
}
