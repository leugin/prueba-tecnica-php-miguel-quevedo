<?php
namespace Leugin\TestDovfac\Shared\Exceptions;
use DomainException;
use Throwable;

class DontExistUserException extends DomainException
{
    public function __construct($message = 'The user with the selected id don\'t exist', $code = 400, Throwable $previos = null)
    {
        parent::__construct($message, $code, $previos);
    }


}
