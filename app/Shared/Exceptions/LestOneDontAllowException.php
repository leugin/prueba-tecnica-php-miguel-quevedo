<?php
namespace Leugin\TestDovfac\Shared\Exceptions;
use DomainException;
use Throwable;

class LestOneDontAllowException extends DomainException
{
    public function __construct($message = 'The field can\'t be less than 1', $code = 400, Throwable $previos = null)
    {
        parent::__construct($message, $code, $previos);
    }


}
