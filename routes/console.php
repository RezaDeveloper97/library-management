<?php

use App\Jobs\RetryFailedSendNextReservationNotificationJob;
use Illuminate\Support\Facades\Schedule;

Schedule::job(RetryFailedSendNextReservationNotificationJob::class)
    ->everyMinute()
    ->withoutOverlapping();
