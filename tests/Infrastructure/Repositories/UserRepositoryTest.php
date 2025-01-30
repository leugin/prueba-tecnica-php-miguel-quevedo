<?php

namespace Tests\Infrastructure\Repositories;

use DI\DependencyException;
use DI\NotFoundException;
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

    /**
     * @throws DependencyException
     * @throws NotFoundException
     */
    public function testCreateUser()
    {
        /**@var  UserRepository $repository*/
        $repository = $this->app->getContainer()->get(UserRepository::class);

        $dto = new UserDto(
            new UserName("miguel "),
            new UserEmail("miguel.quevedo.work@gmail.com"),
            new UserRawPassword("password")
        );
        $user = $repository->create($dto);
        $this->assertNotNull($user);
     }
}
