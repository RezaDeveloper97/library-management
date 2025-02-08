<?php

namespace App\Handlers;

use App\Models\SystemRule;
use App\DTOs\SystemRuleDTO;

class SystemRuleHandler extends BasicHandler
{
    public function create(SystemRuleDTO $dto)
    {
        $model = SystemRule::query()->create([
            'group_name' => $dto->group_name,
            'rule_name' => $dto->rule_name,
            'rule_value' => $dto->rule_value
        ]);

        $model->setCacheData();

        return $model;
    }

    public function update(SystemRuleDTO $dto)
    {
        $model = SystemRule::query()->find($dto->id);

        if (!is_null($dto->group_name)) {
            $model->group_name = $dto->group_name;
        }
        if (!is_null($dto->rule_name)) {
            $model->rule_name = $dto->rule_name;
        }
        if (!is_null($dto->rule_value)) {
            $model->rule_value = $dto->rule_value;
        }

        $model->save();

        $model->setCacheData();

        return $model;
    }

    public function delete(SystemRuleDTO $dto)
    {
        $model = SystemRule::query()->find($dto->id);

        $model->clearCache();

        $model->delete();

        return $model;
    }
}
