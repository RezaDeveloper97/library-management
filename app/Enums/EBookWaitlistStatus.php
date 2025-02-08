<?php

namespace app\Enums;

enum EBookWaitlistStatus: int
{
    case Waiting = 0;
    case Completed = 1;
    case Canceled = 2;
}
