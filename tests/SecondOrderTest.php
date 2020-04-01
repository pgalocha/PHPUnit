<?php


use Model\SecondOrder;
use PHPUnit\Framework\TestCase;

//Testing a class who was not created yet
class SecondOrderTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function testOrderIsProcessedUsingMock()
    {
        $order = new SecondOrder(3, 5.97);
        $this->assertEquals(5.97, $order->amount);
        $gateway = Mockery::mock('PaymentGateway');
        $gateway
            ->shouldReceive('charge')
            ->once()
            ->with(5.97);
        $order->process($gateway);
    }

    public function testOrderIsProcessedUsingASpy()
    {
        $order = new SecondOrder(3, 5.97);
        $this->assertEquals(5.97, $order->amount);
        $gateway_spy = Mockery::spy('PaymentGateway');
        $order->process($gateway_spy);
        //Test before the code happens.
        $gateway_spy
            ->shouldHaveReceived('charge')
            ->once()
            ->with(5.97);

    }

}