<?php

namespace Buki\Tests\Classes;

use Buki\BitPermission\EnumInterface;

enum RoleEnum: int implements EnumInterface
{
    case GUEST = 0;

    case USER = 1;

    case EDITOR = 2;

    case AUTHOR = 3;

    case ADMIN = 4;

    case ROOT = 5;
}
