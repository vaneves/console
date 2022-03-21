<?php

declare(strict_types = 1);

namespace Vaneves\Console;

class Padding
{
    private int $width;

    public function __construct(int $width)
    {
        $this->width = $width;
    }

    protected function print(string $label, string $result): void 
    {
        $labelLength = mb_strlen(''. $label);
        $resultLength = mb_strlen(''. $result);
        $totalLength = $labelLength + $resultLength;
        $remnant = $this->width - $totalLength;

        if ($resultLength > $this->width) {
            $output = mb_substr($result, $this->width * -1);
            echo $output . PHP_EOL;
            return;
        }
        if ($totalLength >= $this->width) {
            $cropAt = $this->width - $resultLength - 3;
            $output = mb_substr($label, 0, $cropAt) . '...' . $result;
            echo $output . PHP_EOL;
            return;
        }
        $output = $label . str_repeat('.', $remnant) . $result;
        echo $output . PHP_EOL;
    }

    public function line(string $label, string $result): void 
    {
        $this->print($label, $result);
    }
}
