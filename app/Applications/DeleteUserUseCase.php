<?php

namespace Leugin\TestDovfac\Applications;

use Leugin\TestDovfac\Domain\Entities\UserEntity;
use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Shared\Dtos\UserDto;
use Leugin\TestDovfac\Shared\Values\UserId;

class DeleteUserUseCase
{

    public function __construct(
        private readonly UserRepository $userRepository
    )
    {

    }

    public function __invoke(UserId $id): bool
    {
       return $this->userRepository->delete($id);
    }
}
