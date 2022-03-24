<?php

declare(strict_types = 1);

namespace Vaneves\Console;

use PHPUnit\Framework\TestCase;
use Vaneves\Console\Progress;

class ProgressTest extends TestCase
{
    public function testStart(): void
    {
        $output = "\r0/1 [░░░░░░░░░░░░░░░░░░░░░░░░░] 0%";

        $this->expectOutputString($output);
        $progress = new Progress(1);
        $progress->start();
    }

    public function testAdvance(): void
    {
        $output = "\r1/1 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%";

        $this->expectOutputString($output);
        $progress = new Progress(1);
        $progress->advance();
    }

    public function testFinish(): void
    {
        $output = PHP_EOL;

        $this->expectOutputString($output);
        $progress = new Progress(1);
        $progress->finish();
    }
}