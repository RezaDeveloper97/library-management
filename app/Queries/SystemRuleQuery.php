<?php

namespace App\Queries;

use App\Models\SystemRule;

class SystemRuleQuery
{
    public function findById($id)
    {
        return SystemRule::find($id);
    }

    public function getAll()
    {
        return SystemRule::all();
    }
}
