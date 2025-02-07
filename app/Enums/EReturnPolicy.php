<?php

namespace app\Enums;

enum EReturnPolicy: int
{
    case AnyBranch = 0;

    case SameBranch = 1;
}
