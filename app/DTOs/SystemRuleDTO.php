<?php

namespace App\DTOs;

class SystemRuleDTO extends BasicDTO
{
    public $id;
    public $group_name;
    public $rule_name;
    public $rule_value;

    public static function create($group_name, $rule_name, $rule_value)
    {
        $dto = new self();
        $dto->group_name = $group_name;
        $dto->rule_name = $rule_name;
        $dto->rule_value = $rule_value;

        return $dto;
    }

    public static function update($id, $group_name = null, $rule_name = null, $rule_value = null)
    {
        $dto = new self();
        $dto->id = $id;
        if (!is_null($group_name)) {
            $dto->group_name = $group_name;
        }
        if (!is_null($rule_name)) {
            $dto->rule_name = $rule_name;
        }
        if (!is_null($rule_value)) {
            $dto->rule_value = $rule_value;
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
