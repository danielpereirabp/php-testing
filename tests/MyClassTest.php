<?php

namespace PHPTesting;

use \Mockery as m;

class MyClassTest extends \PHPUnit_Framework_TestCase
{

    public function tearDown()
    {
        m::close();
    }

    public function testPartialMockExample()
    {
        $mock = m::mock('PHPTesting\MyClass[getOption]');
        $mock->shouldReceive('getOption')->once()->andReturn('foo');

        $this->assertEquals('foo', $mock->fire());

        $myClass = new MyClass();

        $this->assertEquals('bar', $myClass->fire());
    }

    public function testPassiveMockExample()
    {
        $mock = m::mock(MyClass::class)->makePartial();
        $mock->shouldReceive('getOption')->once()->andReturn('foo');

        $this->assertEquals('foo', $mock->fire());
    }

    public function testPartialMockExampleWithParentMethod()
    {
        $mock = m::mock('PHPTesting\MyClass[getParentMethod]');
        $mock->shouldReceive('getParentMethod')->once()->andReturn(true);

        $this->assertEquals('ok', $mock->getMyMethod());
    }

    public function testPassiveMockExampleWithParentMethod()
    {
        $mock = m::mock(MyClass::class)->makePartial();
        $mock->shouldReceive('getParentMethod')->once()->andReturn(true);

        $this->assertEquals('ok', $mock->getMyMethod());
    }

}