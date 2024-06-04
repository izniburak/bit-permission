<?php

declare(strict_types=1);

namespace Buki\BitPermission;

class Binary extends BitPermission
{
    protected function set(int $value, bool $init): void
    {
        if (!($value < $max = PHP_INT_MAX)) {
            throw new \OutOfBoundsException("The value must be lower than {$max}.");
        }

        $this->value = $init  ? ($this->value | $value) : ($this->value & ~$value);
    }

    protected function check(int $value): bool
    {
        return ($this->value & $value) === $value;
    }
}
