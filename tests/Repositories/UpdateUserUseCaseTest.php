<?php

namespace Tests\Application;

use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Shared\Dtos\UserDto;
use Leugin\TestDovfac\Shared\Exceptions\EmailInvalidException;
use Leugin\TestDovfac\Shared\Values\UserEmail;
use Leugin\TestDovfac\Shared\Values\UserName;
use Leugin\TestDovfac\Shared\Values\UserRawPassword;
use Tests\Base;

class UpdateUserUseCaseTest extends Base
{

    /**
     */
    public function testUpdateUserCreateUser()
    {
        /**@var  UserRepository $repository*/
        $repository = $this->getService(UserRepository::class);

        $dto = new UserDto(
            new UserName("miguel "),
            new UserEmail("miguel.quevedo.work@gmail.com"),
            new UserRawPassword("password")
        );
        $user = $repository->create($dto);


        $newDataUser =  new UserDto(
            new UserName("miguel Eduardo"),
            new UserEmail("miguel.quevedo.work_3@gmail.com"),
            new UserRawPassword("password")
        );

        $newUSer = $repository->update($user->id, $newDataUser);

        $this->assertEquals($newUSer->name, $newDataUser->name);
        $this->assertEquals($newUSer->email, $newDataUser->email);
        $this->assertEquals($user->id, $newUSer->id);

     }

}
