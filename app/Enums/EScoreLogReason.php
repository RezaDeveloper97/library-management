<?php

namespace App\Enums;

enum EScoreLogReason: int
{
    case LateReturn = 0;
    case EarlyReturn = 1;
    case SuccessfulReservation = 2;
    case ReservationCancel = 3;
}
