<?php

namespace App\Enums;

enum EPenaltyReason: int
{
    case LateReturn = 0;
    case Damage = 1;
    case ReservationCancel = 2;
}
