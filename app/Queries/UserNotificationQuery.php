<?php

namespace App\Queries;

use App\Enums\EUserNotificationStatus;
use App\Models\UserNotification;
use Illuminate\Database\Eloquent\Collection;

class UserNotificationQuery extends BasicQuery
{
    public function findById($id)
    {
        $model = UserNotification::query()->find($id);

        return $this->getModelData($model);
    }

    public function getAll()
    {
        return UserNotification::all();
    }

    public function getFailedNotifications(int $limit = 1): Collection
    {
        return UserNotification::query()
            ->where('status', EUserNotificationStatus::Failed)
            ->limit($limit)
            ->get();
    }
}
