<?php


namespace Model;


abstract class AbstractPerson
{
    protected $surname;

    public function __construct($surname)
    {
        $this->surname = $surname;
    }

    abstract public function getTittle();

    public function getNameAndTittle()
    {
        return $this->getTittle(). ' ' . $this->surname;
    }
}