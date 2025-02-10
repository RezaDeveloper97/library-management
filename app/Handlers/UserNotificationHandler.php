<?php

namespace App\Handlers;

use App\Enums\EUserNotificationStatus;
use App\Models\UserNotification;

class UserNotificationHandler extends BasicHandler
{
    public function addNotification(int $userId): UserNotification
    {
        $model = UserNotification::query()->create([
            'user_id' => $userId,
            'status' => EUserNotificationStatus::Pending,
        ]);

        $model->setCacheData();

        return $model;
    }

    public function doneNotification(int $userNotificationId): bool
    {
        $model = UserNotification::query()
            ->where('id', $userNotificationId)
            ->update([
                'status' => EUserNotificationStatus::Done,
            ]);

        return $model > 0;
    }

    public function failedNotification(int $userNotificationId): bool
    {
        $model = UserNotification::query()
            ->where('id', $userNotificationId)
            ->update([
                'status' => EUserNotificationStatus::Failed
            ]);

        return $model > 0;
    }

}
