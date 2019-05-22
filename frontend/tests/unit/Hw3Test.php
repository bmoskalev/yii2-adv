<?php namespace frontend\tests;

class Hw3Test extends \Codeception\Test\Unit
{
    /**
     * @var \frontend\tests\UnitTester
     */
    protected $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testAssertTrue()
    {
        $x = 10;
        $this->testAssertTrue($x > 5);
    }
}