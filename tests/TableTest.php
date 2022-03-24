<?php

declare(strict_types = 1);

namespace Vaneves\Console;

use PHPUnit\Framework\TestCase;
use Vaneves\Console\Table;

class TableTest extends TestCase
{
    public function testWithHeaders(): void
    {
        $output = '+---------------+------------------+' . PHP_EOL;
        $output .= '| name          | domain           |' . PHP_EOL;
        $output .= '+---------------+------------------+' . PHP_EOL;
        $output .= '| Van Neves     | vaneves.com      |' . PHP_EOL;
        $output .= '| Fábio Ricardo | fabioricardo.com |' . PHP_EOL;
        $output .= '+---------------+------------------+' . PHP_EOL;

        $data = [
            [
                'name' => 'Van Neves',
                'domain' => 'vaneves.com'
            ], 
            [
                'name' => 'Fábio Ricardo',
                'domain' => 'fabioricardo.com'
            ]
        ];

        $this->expectOutputString($output);
        $table = new Table($data);
        $table->show();
    }

    public function testWithoutHeaders(): void
    {
        $output = '+---------------+------------------+' . PHP_EOL;
        $output .= '| Van Neves     | vaneves.com      |' . PHP_EOL;
        $output .= '| Fábio Ricardo | fabioricardo.com |' . PHP_EOL;
        $output .= '+---------------+------------------+' . PHP_EOL;

        $data = [
            [ 'Van Neves', 'vaneves.com' ], 
            [ 'Fábio Ricardo', 'fabioricardo.com' ]
        ];

        $this->expectOutputString($output);
        $table = new Table($data);
        $table->show();
    }
}