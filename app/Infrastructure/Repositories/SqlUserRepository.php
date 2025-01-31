<?php

namespace Leugin\TestDovfac\Infrastructure\Repositories;

use DI\Container;
use Leugin\TestDovfac\App;
use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Domain\Entities\UserEntity;
use Leugin\TestDovfac\Shared\Contracts\Database;
use Leugin\TestDovfac\Shared\Dtos\UserDto;
use Leugin\TestDovfac\Shared\Values\UserEmail;
use Leugin\TestDovfac\Shared\Values\UserId;
use Leugin\TestDovfac\Shared\Values\UserName;
use Leugin\TestDovfac\Shared\Values\UserPassword;

class SqlUserRepository implements UserRepository
{


    public function create(UserDto $createUserDto): UserEntity
    {
        $this->database()
            ->execute("INSERT INTO users (name, email, password) VALUES "
                ."('{$createUserDto->name->getValue()}', "
                ."'{$createUserDto->email->getValue()}', "
                ."'{$createUserDto->password->getValue()}')"
            );
        return $this->getLast();
    }

    public function update(UserId $id, UserDto $updateUserDto): UserEntity
    {
        $this->database()->execute("update users set "
            ."name = '{$updateUserDto->name->getValue()}', "
            ."email = '{$updateUserDto->email->getValue()}', "
            ."password = '{$updateUserDto->password->getValue()}' "
            ."where id = '{$id->getValue()}'"
        );
        return $this->findById($id->getValue());
    }

    public function delete(UserId $id): bool
    {
        return $this->database()
            ->execute("delete from users where id = '{$id->getValue()}'");

    }

    public function findOne(UserId $id): ?UserEntity
    {
       return $this->findById($id->getValue());
    }

    public function all(): array
    {
        $rawRows = $this->database()->query("select * from users");
        $users = [];
        foreach ($rawRows as $rawRow){
            $users[] = new UserEntity(
                new UserId($rawRow['id']),
                new UserName($rawRow['name']),
                new UserEmail($rawRow['email']),
                new UserPassword($rawRow['password'])
            );
        }
        return $users;

    }

    public function getLast():?UserEntity
    {
        $results = $this->database()->query("select * from users order by  id desc limit  1");
        if(empty($results)){
            return null;
        }
        $last = $results[0];
        return new UserEntity(
            new UserId($last['id']),
            new UserName($last['name']),
            new UserEmail($last['email']),
            new UserPassword($last['password'])
        );
    }

    public function findById(int $id): ?UserEntity
    {
        $results = $this->database()->query("select * from users where id = '{$id}'");
        if(empty($results)){
            return null;
        }
        $last = $results[0];
        return new UserEntity(
            new UserId($last['id']),
            new UserName($last['name']),
            new UserEmail($last['email']),
            new UserPassword($last['password'])
        );
    }

    public function database():Database {
        return App::get()->getContainer()->get(Database::class);
    }

}
