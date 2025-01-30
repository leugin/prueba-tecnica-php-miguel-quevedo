<?php declare(strict_types=1);



namespace Tests\App\Domain\User;


use Leugin\TestDovfac\Domain\Entities\UserEntity;
use Leugin\TestDovfac\Shared\Exceptions\IsEmptyException;
use Leugin\TestDovfac\Shared\Values\UserEmail;
use Leugin\TestDovfac\Shared\Values\UserId;
use Leugin\TestDovfac\Shared\Values\UserName;
use Leugin\TestDovfac\Shared\Values\UserPassword;
use PHPUnit\Framework\TestCase;

final class UserEntityTest extends TestCase
{
    public function testNameEmpty(): void
    {
        $this->expectException(IsEmptyException::class);
        new UserEntity(
            new UserId(1),
            new UserName(''),
            new UserEmail(''),
            new UserPassword('')
        );
    }
}
