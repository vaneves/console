<?php

require_once('../vendor/autoload.php');

use Vaneves\Console\Console;

$data = [
    [
        'name' => 'Van Neves',
        'domain' => 'vaneves.com',
        'profession' => 'PHP Developer',
    ],
    [
        'name' => 'Luiz Carvalho',
        'domain' => 'luizcarvalho.com',
        'profession' => 'Ruby Developer',
    ],
    [
        'name' => 'Nyl Marcos',
        'domain' => '',
        'profession' => 'PHP Developer',
    ],
];

$console = new Console();
$console->table($data);