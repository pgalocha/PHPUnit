<?php

use Model\Queue;
use PHPUnit\Framework\TestCase;


class StaticQueueTest extends TestCase
{
    protected static  $queue;

    protected function setUp(): void
    {
        static::$queue->clear();
    }

    public static function setUpBeforeClass(): void
    {
        static::$queue = new Queue;
    }

    public static function tearDownAfterClass(): void
    {
        static::$queue = null;
    }

    public function testNewQueueIsEmpty()
    {
        $this->assertEmpty(static::$queue->items);
        $this->assertCount(0,static::$queue->items);
        $this->assertEquals(0,static::$queue->getCount());
        $this->assertEmpty(static::$queue->items);
    }

    public function testNewQueueIsNotEmpty()
    {
        static::$queue->push('a');
        $this->assertCount(1,static::$queue->items);
        $this->assertNotEmpty(static::$queue->items);
    }

    public function testNewQueueIsNotEmptyRemoving()
    {
        $this->assertCount(0,static::$queue->items);
        static::$queue->push('a');
        static::$queue->pop();
        $this->assertCount(0,static::$queue->items);
        $this->assertEquals(0,static::$queue->getCount());
    }

    public function testAnItemIsRemovedFromTheFrontOfTheQueue()
    {
        static::$queue->push('first');
        static::$queue->push('second');
        $this->assertEquals('first',static::$queue->pop());
    }



}