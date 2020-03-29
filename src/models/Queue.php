<?php

namespace Model;

class Queue
{
    public array $items = [];

    public function push($item)
    {
        $this->items[] = $item;
    }

    public function pop()
    {
        array_pop($this->items);
    }


    public function getCount()
    {
        return count($this->items);
    }
}