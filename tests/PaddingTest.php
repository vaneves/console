<?php

declare(strict_types = 1);

namespace Vaneves\Console;

use PHPUnit\Framework\TestCase;
use Vaneves\Console\Padding;

class PaddingTest extends TestCase
{
    public function testSmallText(): void
    {
        $output = 'Apples.........$0.99' . PHP_EOL;

        $this->expectOutputString($output);
        $padding = new Padding(20);
        $padding->line('Apples', '$0.99');
    }

    public function testLargeText(): void
    {
        $output = 'Yellow caven...$0.69' . PHP_EOL;

        $this->expectOutputString($output);
        $padding = new Padding(20);
        $padding->line('Yellow cavendish banana', '$0.69');
    }
}