<?php

namespace Leugin\TestDovfac\Applications;

use Leugin\TestDovfac\Domain\Entities\UserEntity;
use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Shared\Dtos\UserDto;

class CreateUserUseCase
{

    public function __construct(
        private readonly UserRepository $userRepository
    )
    {

    }

    public function __invoke(UserDto $userDto): UserEntity
    {
       return $this->userRepository->create($userDto);
    }
}
