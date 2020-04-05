<?php


use Model\Mailer;

class MailerTest extends \PHPUnit\Framework\TestCase
{
    /**
     *
     * @throws Exception
     */
    public function testMailerSendMessage()
    {
        $this->assertTrue(Mailer::send('email@mail.com', 'hello!'));
    }

    /**
     * @throws Exception
     */
    public function testInvalidArgumentExceptionEmailIsEmpty()
    {
        $this->expectException(Exception::class);
        Mailer::send('','');
        $this->assertTrue(Mailer::send('', ''));
    }
}