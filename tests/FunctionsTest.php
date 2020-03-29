<?php


//include __DIR__.'/../src/start.php';

use Helpers\Mathmatics;
use PHPUnit\Framework\TestCase;


class FunctionsTest extends TestCase {

    public function testAddReturnsTheCorrectSum()
    {
        $this->assertEquals(4,Mathmatics::add(2,2));
        $this->assertEquals(8,Mathmatics::add(3,5));
    }

    public function testAddDoesNotReturnTheCorrectResult()
    {
        $this->assertNotEquals(5,Mathmatics::add(2,2));
        $this->assertNotEquals(9,Mathmatics::add(3,5));
        
    }

}