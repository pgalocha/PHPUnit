<?php


//include __DIR__.'/../src/start.php';

use Model\Mailer;
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

    public function testUserNotificationIsSent()
    {
        $user = new User();
        $mock_mailer = $this->createMock(Mailer::class);
        $mock_mailer
            ->expects($this->once())
            ->method('sendMessage')
            ->with($this->equalTo('dave@example.com'), $this->equalTo('O jantar esstá servido.'))
            ->willReturn(true);

        $user->setMailer($mock_mailer);
        $user->email = 'dave@example.com';
        $this->assertTrue($user->notify('O jantar esstá servido.'));
    }


    public function testUserNotificationIsSentEmailEmpty()
    {
        $user = new User();
        $mock_mailer = $this->getMockBuilder(Mailer::class)->setMethods(null)->getMock();
        $user->setMailer($mock_mailer);
        $this->expectException(Exception::class);
        $user->notify('Hello');
    }

}
