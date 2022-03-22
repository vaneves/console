<?php

declare(strict_types = 1);

namespace Vaneves\Console;

use PHPUnit\Framework\TestCase;
use Vaneves\Console\Color;

class ColorTest extends TestCase
{
    public function testNotInstantiable(): void
    {
        $this->expectException(\Error::class);
        $color = new Color();
    }

    public function testColors(): void
    {
        $this->assertEquals(Color::RED, 31);
        $this->assertEquals(Color::GREEN, 32);
        $this->assertEquals(Color::YELLOW, 33);
        $this->assertEquals(Color::BLUE, 34);
        $this->assertEquals(Color::GRAY, 90);
    }
}