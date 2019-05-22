<?php namespace frontend\tests;

use frontend\models\ContactForm;

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
        $this->assertTrue($x > 5);
        expect($x)->greaterThan(5);
    }

    public function testAssertEquals()
    {
        $x = 10;
        $this->assertEquals(10, $x);
        expect($x)->equals(10);
    }

    public function testAssertLessThan()
    {
        $x = 10;
        $this->assertLessThan(20, $x);
        expect($x)->lessThan(20);
    }

    public function testAssertAttributeEquals()
    {
        $cForm = new ContactForm();
        $cForm->name = "Boris Moskalev";
        $cForm->email = "mbs20111980@bk.ru";
        $cForm->subject = "Homework";
        $cForm->body = "My homework is almost done";
        $cForm->verifyCode = "12345678";

        $this->assertAttributeEquals("Boris Moskalev", 'name', $cForm);
        $this->assertAttributeEquals("mbs20111980@bk.ru", 'email', $cForm);
        $this->assertAttributeEquals("Homework", 'subject', $cForm);
        $this->assertAttributeEquals("My homework is almost done", 'body', $cForm);
        $this->assertAttributeEquals("12345678", 'verifyCode', $cForm);
    }

    public function testAssertArrayHasKey()
    {
        $user = [
            'login' => "BorisM",
            'pass' => "12345",
        ];
        $this->assertArrayHasKey('login',$user);
        expect($user)->hasKey('pass');
    }
}