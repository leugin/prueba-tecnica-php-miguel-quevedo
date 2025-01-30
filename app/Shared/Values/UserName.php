<?php

namespace Leugin\TestDovfac\Shared\Values;


use Leugin\TestDovfac\Shared\Exceptions\IsEmptyException;

class UserName
{
    public function __construct(private string $value)
    {
        if (empty($this->value)) {
            throw  IsEmptyException::makeByValue(get_class($this));
        }
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
