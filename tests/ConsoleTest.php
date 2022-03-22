<?php

declare(strict_types = 1);

namespace Vaneves\Console;

use PHPUnit\Framework\TestCase;
use Vaneves\Console\Console;
use Vaneves\Console\Color;

class ConsoleTest extends TestCase
{
    public function testPrintTitle(): void
    {
        $title = '====' . PHP_EOL;
        $title .= 'Test' . PHP_EOL;
        $title .= '====' . PHP_EOL;
        $title .= PHP_EOL;
        
        $this->expectOutputString($title);
        $console = new Console();
        $console->title('Test');
    }

    public function testPrintLine(): void
    {
        $this->expectOutputString('Test' . PHP_EOL);
        $console = new Console();
        $console->line('Test');
    }

    public function testPrintSuccess(): void
    {
        $this->expectOutputString("\033[". Color::GREEN ."mTest\033[0m" . PHP_EOL);
        $console = new Console();
        $console->success('Test');
    }

    public function testPrintInfo(): void
    {
        $this->expectOutputString("\033[". Color::BLUE ."mTest\033[0m" . PHP_EOL);
        $console = new Console();
        $console->info('Test');
    }

    public function testPrintWarning(): void
    {
        $this->expectOutputString("\033[". Color::YELLOW ."mTest\033[0m" . PHP_EOL);
        $console = new Console();
        $console->warning('Test');
    }

    public function testPrintError(): void
    {
        $this->expectOutputString("\033[". Color::RED ."mTest\033[0m" . PHP_EOL);
        $console = new Console();
        $console->error('Test');
    }

    public function testPrintComment(): void
    {
        $this->expectOutputString("\033[". Color::GRAY ."mTest\033[0m" . PHP_EOL);
        $console = new Console();
        $console->comment('Test', false);
    }

    public function testPrintCommentWithSlash(): void
    {
        $this->expectOutputString("\033[". Color::GRAY ."m// Test\033[0m" . PHP_EOL);
        $console = new Console();
        $console->comment('Test');
    }

    public function testPrintSuccessWithDefaultIcon(): void
    {
        $this->expectOutputString("\033[". Color::GREEN ."m\u{2714}\033[0m Test" . PHP_EOL);
        $console = new Console();
        $console->successWithIcon('Test');
    }

    public function testPrintInfoWithDefaultIcon(): void
    {
        $this->expectOutputString("\033[". Color::BLUE ."m\u{261B}\033[0m Test" . PHP_EOL);
        $console = new Console();
        $console->infoWithIcon('Test');
    }

    public function testPrinWarningWithDefaultIcon(): void
    {
        $this->expectOutputString("\033[". Color::YELLOW ."m\u{26A0}\033[0m Test" . PHP_EOL);
        $console = new Console();
        $console->warningWithIcon('Test');
    }

    public function testPrintErrorWithDefaultIcon(): void
    {
        $this->expectOutputString("\033[". Color::RED ."m★\033[0m Test" . PHP_EOL);
        $console = new Console();
        $console->errorWithIcon('Test', '★');
    }

    public function testPrintSuccessWithCustomIcon(): void
    {
        $this->expectOutputString("\033[". Color::GREEN ."m★\033[0m Test" . PHP_EOL);
        $console = new Console();
        $console->successWithIcon('Test', '★');
    }

    public function testPrintInfoWithCustomIcon(): void
    {
        $this->expectOutputString("\033[". Color::BLUE ."m★\033[0m Test" . PHP_EOL);
        $console = new Console();
        $console->infoWithIcon('Test', '★');
    }

    public function testPrinWarningWithCustomIcon(): void
    {
        $this->expectOutputString("\033[". Color::YELLOW ."m★\033[0m Test" . PHP_EOL);
        $console = new Console();
        $console->warningWithIcon('Test', '★');
    }

    public function testPrintErrorWithCustomIcon(): void
    {
        $this->expectOutputString("\033[". Color::RED ."m\u{2718}\033[0m Test" . PHP_EOL);
        $console = new Console();
        $console->errorWithIcon('Test');
    }

    public function testPrintProgressBar(): void
    {
        $bar = "\r0/1 [░░░░░░░░░░░░░░░░░░░░░░░░░] 0%";
        $bar .= "\r1/1 [▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓▓] 100%\r\n";

        $this->expectOutputString($bar);
        $console = new Console();
        $console->progress([1], function ($n) {});
    }

    public function testPrintTable(): void
    {
        $bar = '+------+' . PHP_EOL;
        $bar .= '| name |' . PHP_EOL;
        $bar .= '+------+' . PHP_EOL;
        $bar .= '| Test |' . PHP_EOL;
        $bar .= '+------+' . PHP_EOL;

        $this->expectOutputString($bar);
        $console = new Console();
        $console->table([
            [
                'name' => 'Test'
            ]
        ]);
    }
}