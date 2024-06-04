<?php

declare(strict_types=1);

namespace Buki\BitPermission;

class Sequent extends BitPermission
{
    protected function set(int $value, bool $init): void
    {
        if (!($value < $max = PHP_INT_SIZE * 8)) {
            throw new \OutOfBoundsException("The value must be lower than {$max}.");
        }

        $this->value = ($this->value & ~(1 << $value)) | ($init << $value);
    }

    protected function check(int $value): bool
    {
        return ($this->value & (1 << $value)) !== 0;
    }
}
