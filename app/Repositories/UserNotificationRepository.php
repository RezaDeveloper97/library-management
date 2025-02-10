<?php

namespace App\Repositories;

use App\Queries\UserNotificationQuery;
use Illuminate\Database\Eloquent\Collection;

class UserNotificationRepository extends BasicRepository
{
    protected $query;

    public function __construct()
    {
        $this->query = new UserNotificationQuery();
    }

    public function find($id)
    {
        return $this->query->findById($id);
    }

    public function all()
    {
        return $this->query->getAll();
    }

    public function getFailedNotifications(int $limit = 1): Collection
    {
        return $this->query->getFailedNotifications($limit);
    }
}
