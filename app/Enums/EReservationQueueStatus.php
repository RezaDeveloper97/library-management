<?php

namespace App\Enums;

enum EReservationQueueStatus: int
{
    case Waiting = 0;
    case Completed = 1;
    case Canceled = 2;
}
