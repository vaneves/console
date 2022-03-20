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

    public function title(string $text, string $separator = '='): void
    {
        $line = str_repeat($separator, strlen($text));
        $this->printLine($line);
        $this->printLine($text);
        $this->printLine($line);
        $this->printLine('');
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

    public function comment(string $text, bool $slash = true): void 
    {
        if ($slash) {
            $text = '// '. $text;
        }
        $this->printLine($text, Color::GRAY);
    }

    public function successWithIcon(string $text, ?string $icon = null): void 
    {
        if ($icon === null) {
            $icon = "\u{2714}"; // ✔
        }
        $line = $this->getColored($icon, Color::GREEN) .' '. $text;
        $this->printLine($line);
    }

    public function infoWithIcon(string $text, ?string $icon = null): void 
    {
        if ($icon === null) {
            $icon = "\u{261B}"; // ☛
        }
        $line = $this->getColored($icon, Color::BLUE) .' '. $text;
        $this->printLine($line);
    }

    public function warningWithIcon(string $text, ?string $icon = null): void 
    {
        if ($icon === null) {
            $icon = "\u{26A0}"; // ⚠
        }
        $line = $this->getColored($icon, Color::YELLOW) .' '. $text;
        $this->printLine($line);
    }

    public function errorWithIcon(string $text, ?string $icon = null): void 
    {
        if ($icon === null) {
            $icon = "\u{2718}"; // ✘
        }
        $line = $this->getColored($icon, Color::RED) .' '. $text;
        $this->printLine($line);
    }
}

