<?php 

declare(strict_types = 1);

require_once('../vendor/autoload.php');

use Vaneves\Console\Progress;

$total = 150;

$progress = new Progress($total);
$progress->start();

for ($i = 1; $i <= $total; $i++) {
    $progress->advance();
    usleep(30000);
}
$progress->finish();