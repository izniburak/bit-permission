<?php

declare(strict_types=1);

namespace Buki\BitPermission;

abstract class BitPermission
{
    public function __construct(protected int $value = 0)
    {}

    abstract protected function set(int $value, bool $init): void;
    abstract protected function check(int $value): bool;

    protected function getValue(int|EnumInterface $value): int {
        return $value instanceof EnumInterface ? $value->value : $value;
    }

    public function value(): int
    {
        return $this->value;
    }

    public function has(array|int|EnumInterface $values): bool
    {
        $values = is_array($values) ? $values : func_get_args();

        return (bool) array_filter($values, fn ($value) => $this->check($this->getValue($value)));
    }

    public function hasAll(array|int|EnumInterface $values): bool
    {
        $values = is_array($values) ? $values : func_get_args();

        return ! (array_filter($values, fn ($value) => !$this->check($this->getValue($value))));
    }

    public function add(array|int|EnumInterface $values): self
    {
        $values = is_array($values) ? $values : func_get_args();
        foreach ($values as $value) {
            $this->set($this->getValue($value), true);
        }

        return $this;
    }

    public function remove(int|EnumInterface $value): self
    {
        $this->set($this->getValue($value), false);

        return $this;
    }

    public function only(int|EnumInterface $value): self
    {
        $this->add($this->value = $this->getValue($value));

        return $this;
    }
}
