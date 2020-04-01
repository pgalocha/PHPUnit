<?php


use Model\Order;
use PHPUnit\Framework\TestCase;

//Testing a class who was not created yet
class OrderTest extends TestCase
{
    public function testOrderIsProcessed()
    {
        $gateway = $this->getMockBuilder('PaymentGateway')
            ->setMethods(['charge'])
            ->getMock();

        $gateway->expects($this->once())
            ->method('charge')
            ->with($this->equalTo(200))
            ->willReturn(true);

        $order = new Order($gateway);
        $order->amount = 200;
        $this->assertTrue($order->process());
    }

}