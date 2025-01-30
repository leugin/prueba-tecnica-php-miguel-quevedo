<?php

namespace Leugin\TestDovfac\Domain\Entities;


use Leugin\TestDovfac\Shared\Values\UserId;
use Leugin\TestDovfac\Shared\Values\UserName;
use Leugin\TestDovfac\Shared\Values\UserPassword;

class UserEntity
{
    public function __construct(
        public readonly UserId $id,
        public readonly UserName $name,
        public readonly UserPassword $password,
    )
    {

    }
}
