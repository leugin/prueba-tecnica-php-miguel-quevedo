<?php

use Leugin\TestDovfac\Shared\Contracts\Database;

require __DIR__ . '/../vendor/autoload.php';
$app = \Leugin\TestDovfac\App::get();

/**@var Database $db*/
$db = $app->getContainer()->get(Database::class);
$sql = file_get_contents(__DIR__ . '/database.sql');

$db->execute($sql);

$users = [
    [
        'name' => 'John Doe',
        'email' => 'john.doe@example.com',
        'password' => password_hash('password', PASSWORD_DEFAULT),
    ],
    [
        'name' => 'Jane Doe',
        'email' => 'jane.doe@example.com',
        'password' => password_hash('password', PASSWORD_DEFAULT),
    ],
    [
        'name' => 'Bob Smith',
        'email' => 'bob.smith@example.com',
        'password' => password_hash('password', PASSWORD_DEFAULT),
    ],
];

foreach ($users as $user) {
    $db->execute("insert into users (name, email, password)  values ".
        "('{$user['name']}', '{$user['email']}', '{$user['password']}')");
}

$last = $db->query("select * from users order by  id  desc limit  1");

echo  "Base de datos inicializada";
