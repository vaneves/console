<?php

declare(strict_types = 1);

require_once('../vendor/autoload.php');

use Vaneves\Console\Console;

$items = [];
for ($i = 0; $i < 113; $i++) {
    array_push($items, $i);
}

$console = new Console();
$console->progress($items, function ($number) {
    usleep(100);
});