<?php

namespace App\Services;

use App\Handlers\UserNotificationHandler;
use App\DTOs\UserNotificationDTO;
use App\Models\User;
use App\Models\UserNotification;
use App\Notifications\NextReservationNotification;
use Illuminate\Support\Facades\DB;

class UserNotificationService extends BasicService
{
    protected $handler;

    public function __construct()
    {
        $this->handler = new UserNotificationHandler();

    }

    public function sendNewNotificationNextReservation(User $user): void
    {
        try {
            $userNotification = $this->handler->addNotification($user->id);

            $user->notify(new NextReservationNotification());

            $this->handler->doneNotification($userNotification->id);
        } catch (\Exception $e) {
            if (isset($userNotification)) {
                $this->handler->failedNotification($userNotification->id);
            }
        }
    }

    /**
     * @throws \Exception
     */
    public function sendRetryNotificationNextReservation(UserNotification $userNotification): void
    {
        $userNotification->load('user');
        $user = $userNotification->user;

        $user->notify(new NextReservationNotification());

        $this->handler->doneNotification($userNotification->id);
    }
}
