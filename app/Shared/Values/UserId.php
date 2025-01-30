<?php

namespace Leugin\TestDovfac\Shared\Values;

use Leugin\TestDovfac\Shared\Exceptions\LestOneDontAllowException;

class UserId
{
    public function __construct(private int $value)
    {
        if ($this->value < 0) {
            throw new LestOneDontAllowException('User ID cannot be negative');
        }
    }

    public function getValue(): int
    {
        return $this->value;
    }

    public function setValue(int $value): self
    {
        $this->value = $value;
        return $this;
    }

}
