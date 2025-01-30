<?php
namespace  Leugin\TestDovfac\Shared\Dtos;
use Leugin\TestDovfac\Shared\Values\UserEmail;
use Leugin\TestDovfac\Shared\Values\UserName;
use Leugin\TestDovfac\Shared\Values\UserRawPassword;

class UserDto
{
    public function __construct(
        public UserName $name,
        public UserEmail $email,
        public UserRawPassword $password,
    ){}

    public static function fromArray(array $params)
    {
        return new self(
            new UserName($params['name']),
            new UserEmail($params['email']),
            new UserRawPassword($params['password'])
        );
    }
}
