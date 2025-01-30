<?php

namespace Tests\Application;

use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Shared\Dtos\UserDto;
use Leugin\TestDovfac\Shared\Exceptions\EmailInvalidException;
use Leugin\TestDovfac\Shared\Values\UserEmail;
use Leugin\TestDovfac\Shared\Values\UserName;
use Leugin\TestDovfac\Shared\Values\UserRawPassword;
use Tests\Base;

class CreateUserUseCaseTest extends Base
{

    /**
     */
    public function testCreateUser()
    {
        /**@var  UserRepository $repository*/
        $repository = $this->getService(UserRepository::class);

        $dto = new UserDto(
            new UserName("miguel "),
            new UserEmail("miguel.quevedo.work@gmail.com"),
            new UserRawPassword("password")
        );
        $user = $repository->create($dto);
        $this->assertNotNull($user);
    }
    /**
     */
    public function testFailToCreateUser()
    {
        /**@var  UserRepository $repository*/
        $repository = $this->getService(UserRepository::class);

        $this->expectException(EmailInvalidException::class);
        $dto = new UserDto(
            new UserName("miguel "),
            new UserEmail("miguel.quevedo.work"),
            new UserRawPassword("password")
        );
        $user = $repository->create($dto);
        $this->assertNotNull($user);
    }
}
