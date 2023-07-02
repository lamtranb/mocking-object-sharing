<?php

namespace MockSharing\Tests;

use MockSharing\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function test_total(): void
    {
        $this->assertEquals(5, (new Calculator(4, '+', 1))->getTotal());
        $this->assertEquals(3, (new Calculator(4, '-', 1))->getTotal());
        $this->assertEquals(8, (new Calculator(4, 'x', 2))->getTotal());
        $this->assertEquals(2, (new Calculator(4, '/', 2))->getTotal());
    }

    /**
     * Test case > 100.
     */
    public function test_get_price(): void
    {
        $calculator = new Calculator(20, 'x', 5);
        $this->assertEquals(100, $calculator->getTotal());
        $this->assertEquals(103, $calculator->getPrice());
    }

    /**
     * Test with depend test + mock
     */

    public function test_get_total_correct(): void
    {
        $calculator = new Calculator(20, 'x', 5);
        $this->assertEquals(100, $calculator->getTotal());
    }

    /**
     * @depends test_get_total_correct
     */
    public function test_get_price_standalone(): void
    {
        $calculatorMock = $this->getMockBuilder(Calculator::class)
            ->setConstructorArgs([20, 'x', 5])
            ->onlyMethods(['getTotal'])
            ->getMock();

        $calculatorMock->method('getTotal')->willReturn(100);

        $this->assertEquals(103, $calculatorMock->getPrice());
    }
}