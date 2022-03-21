<?php 

declare(strict_types = 1);

require_once('../vendor/autoload.php');

use Vaneves\Console\Table;

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

$table = new Table($data);
$table->show();