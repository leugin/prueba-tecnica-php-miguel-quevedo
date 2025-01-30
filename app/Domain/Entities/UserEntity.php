<?php

namespace Leugin\TestDovfac\Domain\Entities;


use Leugin\TestDovfac\Shared\Values\UserEmail;
use Leugin\TestDovfac\Shared\Values\UserId;
use Leugin\TestDovfac\Shared\Values\UserName;
use Leugin\TestDovfac\Shared\Values\UserPassword;

class UserEntity implements \JsonSerializable
{
    public function __construct(
        public readonly UserId $id,
        public readonly UserName $name,
        public readonly UserEmail $email,
        public readonly UserPassword $password,
    )
    {

    }
     public static function fromArray(array $arrUser): static
     {
         return new self(
             new UserId($arrUser['id']),
             new UserName($arrUser['name']),
             new UserEmail($arrUser['email']),
             new UserPassword($arrUser['password'])
         );
     }

    public function jsonSerialize(): array
    {
        return [
            'id' => $this->id->getValue(),
            'name' => $this->name->getValue(),
            'email' => $this->email->getValue(),
            'password' => $this->password->getValue()
        ];
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id->getValue(),
            'name' => $this->name->getValue(),
            'email' => $this->email->getValue(),
            'password' => $this->password->getValue()
        ];
    }
}
