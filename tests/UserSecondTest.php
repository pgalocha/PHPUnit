<?php


class UserSecondTest extends \PHPUnit\Framework\TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    /**
     * @throws Exception
     */
    public function testNotifyReturnTrue()
    {
        $user = new \Model\User('dave@example.com');

        $mock = Mockery::mock('alias:Mailer');
        $mock->shouldReceive('sendStatic')
            ->with($user->email,'hello')
            ->andReturn(true);

        $this->assertTrue($user->notifyMockery('Hello'));
    }

}