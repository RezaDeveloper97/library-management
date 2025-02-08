<?php

namespace App\Repositories;

use App\Queries\SystemRuleQuery;

class SystemRuleRepository
{
    protected $query;

    public function __construct(SystemRuleQuery $query)
    {
        $this->query = $query;
    }

    public function find($id)
    {
        return $this->query->findById($id);
    }

    public function all()
    {
        return $this->query->getAll();
    }
}
