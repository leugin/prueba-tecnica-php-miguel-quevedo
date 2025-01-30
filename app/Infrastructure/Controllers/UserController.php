<?php

namespace Leugin\TestDovfac\Infrastructure\Controllers;

use DI\Container;
use Leugin\TestDovfac\Applications\CreateUserUseCase;
use Leugin\TestDovfac\Applications\DeleteUserUseCase;
use Leugin\TestDovfac\Applications\UpdateUserUseCase;
use Leugin\TestDovfac\Domain\Repositories\UserRepository;
use Leugin\TestDovfac\Shared\Dtos\UserDto;
use Leugin\TestDovfac\Shared\Values\UserId;
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
        $useCase =new CreateUserUseCase(
            $userRepository
        );

        $useCase->__invoke($userDto);
        $response->getBody()
            ->write(json_encode([
            'message' => 'User created successfully'
        ]));
        return $response->withHeader('Content-Type', 'application/json');

    }
    public function update(Request $request, Response $response, $args = [])
    {

        $userRepository = $this->container->get(UserRepository::class);
        $body = $request->getParsedBody();
        $userid  = $args['userId'];

        $userDto = UserDto::fromArray($body);

        $useCase = new UpdateUserUseCase($userRepository);
        $entity = $useCase->__invoke(new UserId($userid), $userDto);

        $response->getBody()
            ->write(json_encode($entity));
        return $response->withHeader('Content-Type', 'application/json');

    }
    public function delete(Request $request, Response $response, $args = [])
    {

        $userRepository = $this->container->get(UserRepository::class);
        $userid  = $args['userId'];


        $useCase = new DeleteUserUseCase($userRepository);
        $deleted = $useCase->__invoke(new UserId($userid));

        $response->getBody()
            ->write(json_encode([
                'message' => $deleted ? 'User deleted successfully': 'User not found'
            ]));
        return $response->withHeader('Content-Type', 'application/json');

    }
}
