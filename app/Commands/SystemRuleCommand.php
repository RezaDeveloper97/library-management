<?php

namespace App\Commands;

class SystemRuleCommand
{
    public $id;
    public $group_name;
    public $rule_name;
    public $rule_value;

    public static function create($group_name, $rule_name, $rule_value)
    {
        $command = new self();
        $command->group_name = $group_name;
        $command->rule_name = $rule_name;
        $command->rule_value = $rule_value;

        return $command;
    }

    public static function update($id, $group_name = null, $rule_name = null, $rule_value = null)
    {
        $command = new self();
        $command->id = $id;
        if (!is_null($group_name)) {
            $command->group_name = $group_name;
        }
        if (!is_null($rule_name)) {
            $command->rule_name = $rule_name;
        }
        if (!is_null($rule_value)) {
            $command->rule_value = $rule_value;
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
