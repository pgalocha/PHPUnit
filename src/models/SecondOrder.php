<?php

namespace Model;

class SecondOrder
{

    public float $amount;

    public int $quantity;

    public float $unit_price;

    public function __construct(int $quantity, float $unitPrice)
    {
        $this->quantity = $quantity;
        $this->unit_price = $unitPrice;
        $this->amount = $unitPrice;
    }

    public function process($gateway)
    {
        $gateway->charge($this->amount);
    }
}