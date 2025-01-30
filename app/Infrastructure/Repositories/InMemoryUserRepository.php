<?php

namespace Leugin\TestDovfac\Infrastructure\Repositories;

use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Domain\Entities\UserEntity;
use Leugin\TestDovfac\Shared\Dtos\UserDto;
use Leugin\TestDovfac\Shared\Values\UserId;
use Leugin\TestDovfac\Shared\Values\UserPassword;

class InMemoryUserRepository implements UserRepository
{

    private array $users = [];

    public function __construct(array $initData = [])
    {
        foreach ($initData as $user){
            $this->users[] = UserEntity::fromArray($user);
        }
    }
    public function create(UserDto $createUserDto): UserEntity
    {
        $entity = new UserEntity(
            new UserId(count($this->users) + 1),
            $createUserDto->name,
            $createUserDto->email,
            UserPassword::fromRaw($createUserDto->password)
        );
        $this->users[] =$entity;
        return  $entity;
    }

    public function update(UserId $id, UserDto $updateUserDto): UserEntity
    {

    }

    public function delete(UserId $id): UserEntity
    {
        // TODO: Implement delete() method.
    }

}
