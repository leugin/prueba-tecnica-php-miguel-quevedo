<?php

use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Infrastructure\Repositories\InMemoryUserRepository;
use Leugin\TestDovfac\Shared\Contracts\Database;

return [
    'providers'=> [
        UserRepository::class => InMemoryUserRepository::pupulate(),
        Database::class => new \Leugin\TestDovfac\Shared\Providers\Database\SqliteDatabase()
    ]
];
