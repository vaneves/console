<?php 

require_once('../vendor/autoload.php');

use Vaneves\Console\Padding;

$padding = new Padding(20);
$padding->line('Apples', '$0.99');
$padding->line('Bananas', '$0.39');
$padding->line('Clementines', '$3.99');
$padding->line('Lemons', '$0.69');
$padding->line('Strawberriess', '$1.99');