<?php

namespace Elattar\Prepare\Classes;

class Calculator
{
    private float $result = 0;

    public function add($value): static
    {
        $this->result += $value;

        return $this;
    }

    public function subtract($value): static
    {
        $this->result -= $value;

        return $this;
    }

    public function getResult(): float|int
    {
        return $this->result;
    }
}
