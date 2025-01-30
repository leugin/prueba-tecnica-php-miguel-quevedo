<?php

namespace Leugin\TestDovfac\Domain\Repositories;

use Leugin\TestDovfac\Domain\Entities\UserEntity;
use Leugin\TestDovfac\Shared\Dtos\UserDto;
use Leugin\TestDovfac\Shared\Values\UserId;

interface UserRepository
{
    public function create(UserDto $createUserDto): UserEntity;
    public function update(UserId $id, UserDto $updateUserDto): UserEntity;
    public function delete(UserId $id): UserEntity;
}
