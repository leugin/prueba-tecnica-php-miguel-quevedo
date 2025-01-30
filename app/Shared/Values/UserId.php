<?php

namespace Leugin\TestDovfac\Shared\Values;

class UserId
{
    public function __construct(private int $value)
    {

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
