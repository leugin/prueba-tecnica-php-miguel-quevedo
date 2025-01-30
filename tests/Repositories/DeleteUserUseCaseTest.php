<?php

namespace Tests\Application;

use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Shared\Dtos\UserDto;
use Leugin\TestDovfac\Shared\Exceptions\DontExistUserException;
use Leugin\TestDovfac\Shared\Exceptions\EmailInvalidException;
use Leugin\TestDovfac\Shared\Values\UserEmail;
use Leugin\TestDovfac\Shared\Values\UserId;
use Leugin\TestDovfac\Shared\Values\UserName;
use Leugin\TestDovfac\Shared\Values\UserRawPassword;
use Tests\Base;

class DeleteUserUseCaseTest extends Base
{

    /**
     */
    public function testDeleteUser()
    {
        /**@var  UserRepository $repository*/
        $repository = $this->getService(UserRepository::class);

        $userId = new UserId(1);

         $repository->delete($userId);
        $this->assertNull($repository->findOne($userId));


     }
    /**
     */
    public function testDeleteUserFieldByMissingId()
    {
        /**@var  UserRepository $repository*/
        $repository = $this->getService(UserRepository::class);

        $userId = new UserId(1999);

        $deleted = $repository->delete($userId);
        $this->assertFalse($deleted);


     }

}
