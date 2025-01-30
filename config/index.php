<?php

use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Infrastructure\Repositories\InMemoryUserRepository;

return [
    'providers'=> [
        UserRepository::class => InMemoryUserRepository::pupulate()
    ]
];
