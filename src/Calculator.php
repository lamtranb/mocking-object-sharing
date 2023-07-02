<?php

namespace MockSharing;

use PHPUnit\Logging\Exception;

class Calculator
{
    private int $numberA;

    private int $numberB;

    private string $operator;

    private const PLUS = '+';
    private const MINUS = '-';
    private const MULTIPLY = 'x';
    private const DIVISION = '/';

    private int $vnd;

    public function __construct(int $numberA, string $operator, int $numberB, $vnd = 0)
    {
        $this->numberA = $numberA;
        $this->numberB = $numberB;
        $this->operator = $operator;
        $this->vnd = 0;
    }

    public function getTotal() {
        switch ($this->operator) {
            case self::PLUS:
                return $this->numberA + $this->numberB;
            case self::MINUS:
                return $this->numberA - $this->numberB;
            case self::MULTIPLY:
                return $this->numberA * $this->numberB;
            case self::DIVISION:
                return $this->numberA / $this->numberB;
            default:
                throw new Exception('Does not accept this operator');
        }
    }

    public function getPrice()
    {
        $total = $this->getTotal();

        if ($total >= 100) {
            $total = $total + ($total / 100) * 3;
        }

        if ($this->vnd > 0) {
            $total = $total * $this->vnd;
        }

        return $total;
    }
}