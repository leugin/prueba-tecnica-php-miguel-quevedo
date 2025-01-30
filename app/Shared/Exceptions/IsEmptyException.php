<?php
namespace Leugin\TestDovfac\Shared\Exceptions;
use DomainException;

class IsEmptyException extends DomainException
{
    public function __construct($message = 'value can\'t be empty', $code = 400, Throwable $previos = null)
    {
        parent::__construct($message, $code, $previos);
    }

    public static function  makeByValue($value): static
    {

         return new static(sprintf('value %s can\'t be empty', $value));
    }
}
