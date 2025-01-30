<?php

namespace Leugin\TestDovfac\Applications;

use Leugin\TestDovfac\Domain\Entities\UserEntity;
use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Shared\Dtos\UserDto;
use Leugin\TestDovfac\Shared\Values\UserId;

class UpdateUserUseCase
{

    public function __construct(
        private readonly UserRepository $userRepository
    )
    {

    }

    public function __invoke(UserId $id, UserDto $userDto): UserEntity
    {
       return $this->userRepository->update($id, $userDto);
    }
}
