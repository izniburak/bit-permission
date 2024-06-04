<?php

namespace Buki\Tests\Classes;

class Permission
{
    const NONE = 0x0000;
    const READ = 0x0001;
    const WRITE = 0x0002;
    const UPDATE = 0x0004;
    const DELETE = 0x0008;
    const SUPER = 0x000f;
}
