<?php

namespace Buki\Tests\Classes;

use Buki\BitPermission\EnumInterface;

enum PermissionEnum: int implements EnumInterface
{
    case READ = 0x0001;

    case WRITE = 0x0002;

    case UPDATE = 0x0004;

    case DELETE = 0x0008;

    case ALL = 0x000f;
}
