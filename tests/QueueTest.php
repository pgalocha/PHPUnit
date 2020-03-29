<?php

use Model\Queue;
use Model\QueueException;
use PHPUnit\Framework\TestCase;


class QueueTest extends TestCase
{
    protected $queue;

    protected function setUp(): void
    {
        $this->queue = new Queue;
    }


    protected function tearDown(): void
    {
        unset($this->queue);
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEmpty($this->queue ->items);
        $this->assertCount(0,$this->queue ->items);
        $this->assertEquals(0,$this->queue ->getCount());
        $this->assertEmpty($this->queue ->items);
    }

    public function testNewQueueIsNotEmpty()
    {
        $this->queue ->push('a');
        $this->assertCount(1,$this->queue ->items);
        $this->assertNotEmpty($this->queue ->items);
    }

    public function testNewQueueIsNotEmptyRemoving()
    {
        $this->assertCount(0,$this->queue->items);
        $this->queue ->push('a');
        $this->queue->pop();
        $this->assertCount(0,$this->queue ->items);
        $this->assertEquals(0,$this->queue ->getCount());
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        $this->queue ->push('first');
        $this->queue ->push('second');
        $this->assertEquals('first',$this->queue->pop());
    }


    public function testMaxNumberOfItemsCanBeAdded()
    {
        $this->queue ->push('first');
        $this->queue ->push('second');
        $this->queue ->push('first');
        $this->queue ->push('first');
        $this->queue ->push('first');
        $this->assertEquals(Queue::MAX_ITEMS,$this->queue->getCount());
    }

    public function testMaxNumberOfItemsCanBeAddedException()
    {
        $this->queue ->push('first');
        $this->queue ->push('second');
        $this->queue ->push('first');
        $this->queue ->push('first');
        $this->queue ->push('first');
        $this->expectException(QueueException::class);
        $this->expectExceptionMessage('Queue is full');
        $this->queue ->push('first');
    }



}