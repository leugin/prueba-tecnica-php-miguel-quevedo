<?php
namespace Leugin\TestDovfac\Shared\Exceptions;
use DomainException;
use Throwable;

class EmailInvalidException extends DomainException
{
    public function __construct($message = 'The email is invalid', $code = 400, Throwable $previos = null)
    {
        parent::__construct($message, $code, $previos);
    }


}
