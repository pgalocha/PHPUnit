<?php

namespace Model;

class WeatherMonitor
{
    public $service;

    public function __construct($service)
    {
        $this->service = $service;
    }

    public function getAvarageTemperature(string $start, string $end)
    {
        $start_temp = $this->service->getTemperature($start);
        $end_temp = $this->service->getTemperature($end);
        return ((int)$start_temp+(int)$end_temp)/2;
    }
}