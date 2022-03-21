<?php

declare(strict_types = 1);

require_once('../vendor/autoload.php');

use Vaneves\Console\Console;

$console = new Console();

$console->title('A highlighted title for the section');

$console->line('A regular line.');

$console->success('Operation executed successfully!');
$console->info('This is just highlighted information.');
$console->warning('This requires your attention!');
$console->error('Oops! Error during execution!');
$console->comment('Just a comment.');
$console->comment('Just a comment without slash.', false);

$console->successWithIcon('Operation executed successfully!');
$console->infoWithIcon('This is just highlighted information.');
$console->warningWithIcon('This requires your attention!');
$console->errorWithIcon('Oops! Error during execution!');

$console->successWithIcon('Operation executed successfully!', '❤');
$console->infoWithIcon('This is just highlighted information.', '➥');
$console->warningWithIcon('This requires your attention!', '➤');
$console->errorWithIcon('Oops! Error during execution!', '✖');