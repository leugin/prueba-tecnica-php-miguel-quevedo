<?php

namespace Leugin\TestDovfac\Shared\Contracts;

interface Database
{
    public function execute(string $statement):bool;
    public function query(string $statement): array;
}
