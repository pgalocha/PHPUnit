<?php


//include __DIR__.'/../src/start.php';

use Model\User;
use PHPUnit\Framework\TestCase;


class UserTest extends TestCase {

    public function testAddReturnsTheCorrectSum()
    {
        $name = 'Pedro';
        $lastname = 'Galocha';
        $newUser = new User();
        $newUser->first_name = $name;
        $newUser->last_name = $lastname;
        $this->assertEquals($newUser->getFullName(),$name.' '.$lastname);
        $this->assertEquals('Pedro Galocha',$newUser->getFullName());
    }

    public function testFullNameIsEmptyByDefault()
    {
        $user = new User();
        $this->assertEquals('',$user->getFullName());
    }

    /**
     * @test without test prefix
     */
    public function FullNameIsEmptyByDefault()
    {
        $user = new User();
        $this->assertEquals('',$user->getFullName());
    }


}