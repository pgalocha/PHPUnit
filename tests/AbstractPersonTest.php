<?php

use Model\Doctor;

class AbstractPersonTest extends \PHPUnit\Framework\TestCase
{
    public function testAbstractClass()
    {
        $doctor = new Doctor('Green');
        $this->assertEquals('Dr Green',$doctor->getNameAndTittle());
    }

    public function testAbstractClassWithMock()
    {
        $mock = $this->getMockBuilder(\Model\AbstractPerson::class)
            ->setConstructorArgs(['Green'])
            ->getMockForAbstractClass();
        $mock->method('getTittle')
            ->willReturn('Dr');

        $this->assertEquals('Dr Green',$mock->getNameAndTittle());

    }

}