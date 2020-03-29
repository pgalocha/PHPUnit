<?php

use Model\Queue;
use PHPUnit\Framework\TestCase;


class QueueTest extends TestCase {

    public function testNewQueueIsEmpty()
    {
        $newQueue = new Queue();
        $this->assertEmpty($newQueue->items);
    }



}