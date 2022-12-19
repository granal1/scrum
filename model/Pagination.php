<?php

namespace app\model;

/** @package app\model */
class Pagination
{
    private int $beginElement;
    private int $amountRows = 2;
    private array $taskArray;

    public function __construct($taskArray, $page)
    {
        $this->taskArray = $taskArray;
        $this->beginElement = intval($page);
    }

    public function getBeginElement(): int
    {
        if ($this->beginElement != 1) {
            return ($this->beginElement - 1) * $this->amountRows;
        }
        return 0;
    }

    public function getCountPages(): int
    {
        return ceil(count($this->taskArray) / $this->amountRows);
    }

    public function getCurrentPages(): array
    {
        return array_slice($this->taskArray, $this->getBeginElement(), $this->amountRows);
    }

    public function getButtonNumber(): array
    {
        return range(1, $this->getCountPages());
    }
}
