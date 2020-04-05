<?php


namespace Model;


class Item
{

    /**
     * Item constructor.
     */
    public function __construct()
    {
    }


    public function getDescription()
    {
        return $this->getId().$this->getToken();
    }

    protected function getId()
    {
        return mt_rand();
    }

    private function getToken()
    {
        return uniqid('', true);
    }


    private function getPrefixedToken(string $prefix)
    {
        return uniqid($prefix, true);
    }
}