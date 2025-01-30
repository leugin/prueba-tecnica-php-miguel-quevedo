<?php

namespace Leugin\TestDovfac\Infrastructure\Controllers;

use DI\Container;
use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Shared\Dtos\UserDto;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

class UserController
{
    public function __construct(private readonly Container $container)
    {

    }

    public function create(Request $request, Response $response)
    {
        $body = $request->getParsedBody();
        $userDto = UserDto::fromArray($body);
        $userRepository = $this->container->get(UserRepository::class);
        $userRepository->create($userDto);
        $response->getBody()
            ->write(json_encode([
            'message' => 'User created successfully'
        ]));
        return $response->withHeader('Content-Type', 'application/json');

    }
}
