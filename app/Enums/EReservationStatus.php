<?php

namespace App\Enums;

enum EReservationStatus: int
{
    case Active = 0;
    case Completed = 1;
    case Canceled = 2;
}
