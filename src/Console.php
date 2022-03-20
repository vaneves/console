<?php

namespace Vaneves\Console;

class Console
{
    protected function getColored(string $text, ?int $color = null): string 
    {
        if ($color === null) {
            return $text;
        }
        return "\033[". $color ."m". $text ."\033[0m";
    }

    protected function printLine(string $text, ?int $color = null): void
    {
        echo $this->getColored($text, $color) . PHP_EOL;
    }

    public function line(string $text): void 
    {
        $this->printLine($text);
    }

    public function success(string $text): void 
    {
        $this->printLine($text, Color::GREEN);
    }

    public function info(string $text): void 
    {
        $this->printLine($text, Color::BLUE);
    }

    public function warning(string $text): void 
    {
        $this->printLine($text, Color::YELLOW);
    }

    public function error(string $text): void 
    {
        $this->printLine($text, Color::RED);
    }
}

