<?php

namespace Model;

class Order
{

    public int $amount = 0;
    
    public $gateway;

    public function __construct($paymentGateway)
    {
        $this->gateway = $paymentGateway;
    }

    public function process()
    {
        return $this->gateway->charge($this->amount);
    }
}