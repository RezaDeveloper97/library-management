<?php

namespace App\Jobs;

use App\Models\User;
use App\Services\UserNotificationService;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class SendNextReservationNotificationJob implements ShouldQueue
{
    use Queueable;

    public function __construct(
        protected User $user
    )
    {
        $this->onQueue('notifications');
    }

    /**
     * Execute the job.
     */
    public function handle(UserNotificationService $userNotificationService): void
    {
        $userNotificationService->sendNewNotificationNextReservation($this->user);
    }
}
