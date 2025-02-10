<?php

namespace App\Enums;

enum EUserNotificationStatus: int
{
    case Pending = 0;
    case Done = 1;
    case Failed = 2;
}
