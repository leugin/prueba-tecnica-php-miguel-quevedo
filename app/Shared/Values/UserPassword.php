<?php

namespace Leugin\TestDovfac\Shared\Values;

class UserPassword
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

    public function compareRaw(UserRawPassword $rawPassword)
    {
        return password_verify($rawPassword->getValue(), $this->value);
    }

    public static function fromRaw(UserRawPassword $rawPassword)
    {
        return new self(password_hash($rawPassword->getValue(), PASSWORD_DEFAULT));
    }


}
