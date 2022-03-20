<?php

require_once('../vendor/autoload.php');

use Vaneves\Console\Console;

$console = new Console();

$console->line('A regular line.');

$console->success('Operation executed successfully!');
$console->info('This is just highlighted information.');
$console->warning('This requires your attention!');
$console->error('Oops! Error during execution!');