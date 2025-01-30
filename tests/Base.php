<?php

namespace Tests;
use DI\DependencyException;
use DI\NotFoundException;
use Leugin\TestDovfac\App;
use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Shared\Dtos\UserDto;
use Leugin\TestDovfac\Shared\Values\UserEmail;
use Leugin\TestDovfac\Shared\Values\UserName;
use Leugin\TestDovfac\Shared\Values\UserRawPassword;
use PHPUnit\Framework\TestCase;

class Base  extends TestCase
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
    public function getService(string $service)
    {
        return $this->app->getContainer()->get($service);
    }

}
