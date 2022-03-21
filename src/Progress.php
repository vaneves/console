<?php

declare(strict_types = 1);

namespace Vaneves\Console;

class Progress
{
    private int $total;
    private int $progress;

    public function __construct(int $total)
    {
        $this->total = $total;
        $this->progress = 0;
    }

    protected function getBar(int $percentage): string
    {
        $progress = (int)ceil($percentage / 4);
        $remaining = 25 - $progress;
        $bar = '';
        if ($progress > 0) {
            $bar .= str_repeat('▓', $progress);
        }
        if ($remaining) {
            $bar .= str_repeat('░', $remaining);
        }
        return $bar;
    }

    public function start(): void 
    {
        $this->advance(0);
    }

    public function advance(int $amount = 1): void
    {
        $this->progress += $amount;
        if ($this->progress > $this->total) {
            $this->total = $this->progress;
        }
        $percentage = (int)floor((100 * $this->progress) / $this->total);
        echo "\r{$this->progress}/{$this->total} [{$this->getBar($percentage)}] {$percentage}%";
    }

    public function finish(): void
    {
        echo PHP_EOL;
    }
}