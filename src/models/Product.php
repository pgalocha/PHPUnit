<?php


namespace Model;


class Product
{
    protected $product_id;


    public function __construct()
    {
        $this->product_id = mt_rand();
    }

}