<?php

namespace App\Handlers;

use App\Commands\SystemRuleCommand;
use App\Models\SystemRule;

class SystemRuleHandler
{
    public function create(SystemRuleCommand $command)
    {
        return SystemRule::create([
            'group_name' => $command->group_name,
            'rule_name' => $command->rule_name,
            'rule_value' => $command->rule_value
        ]);
    }

    public function update(SystemRuleCommand $command)
    {
        $model = SystemRule::findOrFail($command->id);

        if (!is_null($command->group_name)) {
            $model->group_name = $command->group_name;
        }
        if (!is_null($command->rule_name)) {
            $model->rule_name = $command->rule_name;
        }
        if (!is_null($command->rule_value)) {
            $model->rule_value = $command->rule_value;
        }

        $model->save();

        return $model;
    }

    public function delete(SystemRuleCommand $command)
    {
        $model = SystemRule::findOrFail($command->id);
        $model->delete();

        return $model;
    }
}
