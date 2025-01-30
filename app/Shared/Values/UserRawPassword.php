<?php

namespace Leugin\TestDovfac\Shared\Values;

class UserRawPassword
{
    public function __construct(private string $value)
    {
    }

    public function getValue(): string
    {
        return $this->value;
    }

    public function setValue(string $value): self
    {
        $this->value = $value;
        return $this;
    }



}
