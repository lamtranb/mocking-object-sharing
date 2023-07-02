<?php

namespace MockSharing\Tests;

use PHPUnit\Framework\TestCase;

class MockingDatabaseTest extends TestCase
{
    public function test_greeting(): void
    {
        $database = new \MockSharing\Database();
        $test = new \MockSharing\Person($database);
        $this->assertEquals('Hello John', $test->greeting(1));
        $this->assertEquals('Hello Vanessa', $test->greeting(2));
    }

    public function test_greeting_with_mock(): void
    {
        $dbMock = $this->getMockBuilder(\MockSharing\Database::class)
            ->onlyMethods(['getPersonById'])
            ->getMock();

        $mockPerson = new \stdClass();
        $mockPerson->name = 'John';

        $dbMock->method('getPersonById')->willReturn($mockPerson);

        $test = new \MockSharing\Person($dbMock);
        $this->assertEquals('Hello John', $test->greeting(1));

        $test = new \MockSharing\Person($dbMock);
        $this->assertEquals('Hello John', $test->greeting(2));
    }
}