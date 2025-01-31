<?php

namespace Leugin\TestDovfac\Shared\Providers\Database;

use Leugin\TestDovfac\Shared\Contracts\Database;

class SqliteDatabase implements Database
{

    private $database;
    public function __construct()
    {
        $this->database = new \SQLite3(__DIR__ . '/../../../../database/database.sqlite');
    }
    public function execute(string $statement):bool
    {
       return $this->database->exec($statement);
    }

    public function query(string $statement): array
    {
        $rows = [];
        $results =   $this->database->query($statement);
        while ($row = $results->fetchArray(SQLITE3_ASSOC)) {
            $rows[] = $row;
        }
        return $rows ;
    }
}
