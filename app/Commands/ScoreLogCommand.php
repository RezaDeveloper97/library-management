<?php

namespace App\Commands;

class ScoreLogCommand
{
    public $id;
    public $user_id;
    public $score_change;
    public $reason;

    public static function create($user_id, $score_change, $reason)
    {
        $command = new self();
        $command->user_id = $user_id;
        $command->score_change = $score_change;
        $command->reason = $reason;

        return $command;
    }

    public static function update($id, $user_id = null, $score_change = null, $reason = null)
    {
        $command = new self();
        $command->id = $id;
        if (!is_null($user_id)) {
            $command->user_id = $user_id;
        }
        if (!is_null($score_change)) {
            $command->score_change = $score_change;
        }
        if (!is_null($reason)) {
            $command->reason = $reason;
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
