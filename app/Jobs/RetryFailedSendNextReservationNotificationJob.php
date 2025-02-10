<?php

namespace App\Jobs;

use App\Repositories\UserNotificationRepository;
use App\Services\UserNotificationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class RetryFailedSendNextReservationNotificationJob implements ShouldQueue
{
    use Queueable;

    protected int $tries = 0;
    protected int $maxExceptions = 0;

    public function __construct()
    {
        $this->onQueue('notifications');
    }

    /**
     * Execute the job.
     * @throws \Exception
     */
    public function handle(UserNotificationRepository $userNotificationRepository, UserNotificationService $userNotificationService): void
    {
        $userNotifications = $userNotificationRepository->getFailedNotifications(limit: 1);
        foreach ($userNotifications as $userNotification) {
            $userNotificationService->sendRetryNotificationNextReservation($userNotification);
        }
    }
}
