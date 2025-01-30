<?php

namespace Tests\Infrastructure\Repositories;

use Leugin\TestDovfac\App;
use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Shared\Dtos\UserDto;
use Leugin\TestDovfac\Shared\Values\UserEmail;
use Leugin\TestDovfac\Shared\Values\UserName;
use Leugin\TestDovfac\Shared\Values\UserRawPassword;
use PHPUnit\Framework\TestCase;

class UserRepositoryTest  extends TestCase
{
    private  $app;
    public function __construct($name)
    {
        parent::__construct($name);
        $this->app = new App();
    }
    public function testCreateUser()
    {
        /**@var  UserRepository $repository*/
        $repository = $this->app->getService(UserRepository::class);

        $dto = new UserDto(
            new UserName("miguel "),
            new UserEmail("miguel.quevedo.work@gmail.com"),
            new UserRawPassword("password")
        );
        $user = $repository->create($dto);
        $this->assertNotNull($user);
     }
}
