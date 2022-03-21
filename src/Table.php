<?php

declare(strict_types = 1);

namespace Vaneves\Console;

class Table 
{
    private array $rows = [];
    private array $columnSize = [];

    public function __construct(array $rows)
    {
        $this->rows = $rows;
    }

    protected function calculateColumnSize(): void
    {
        $this->columnSize = [];
        foreach ($this->rows as $row) {
            $i = 0;
            foreach ($row as $cell) {
                if (! isset($this->columnSize[$i])) {
                    $this->columnSize[$i] = 0;
                }
                $textLength = mb_strlen(''. $cell);
                if ($this->columnSize[$i] < $textLength) {
                    $this->columnSize[$i] = $textLength;
                }
                $i++;
            }
        }
        for ($i = 0; $i < count($this->columnSize); $i++) {
            $this->columnSize[$i] += 2;
        }
    }

    protected function printRow(array $cells): void
    {
        $i = 0;
        foreach ($cells as $cell) {
            echo '| ' . $cell;
            $textLength = mb_strlen($cell);
            $remaining = $this->columnSize[$i] - $textLength - 1;
            if ($remaining > 0) {
                echo str_repeat(' ', $remaining);
            }
            $i++;
        }
        echo '|' . PHP_EOL;
    }

    protected function printHeader(array $rows): void
    {
        foreach ($rows as $row) {
            $header = [];
            foreach ($row as $key => $cell) {
                if (is_numeric($key)) {
                    return;
                }
                array_push($header, $key);
            }
            $this->printSeparator();
            $this->printRow($header);
            return;
        }
    }

    protected function printSeparator(): void
    {
        foreach ($this->columnSize as $size) {
            echo '+' . str_repeat('-', $size);
        }
        echo '+' . PHP_EOL;
    }

    public function show(): void
    {
        $this->calculateColumnSize();
        $this->printHeader($this->rows);
        $this->printSeparator();
        foreach ($this->rows as $row) {
            $this->printRow($row);
        }
        $this->printSeparator();
    }
}