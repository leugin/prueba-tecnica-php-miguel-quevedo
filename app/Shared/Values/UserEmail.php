<?php

namespace Leugin\TestDovfac\Shared\Values;

use Leugin\TestDovfac\Shared\Exceptions\EmailInvalidException;
use Leugin\TestDovfac\Shared\Exceptions\IsEmptyException;

class UserEmail
{
    public function __construct(private string $value)
    {
        if (empty($this->value)) {
            throw  IsEmptyException::makeByValue(get_class($this));
        }
        $regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/';
        if (!preg_match($regex, $value)) {
            throw new EmailInvalidException('Invalid email address');
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
