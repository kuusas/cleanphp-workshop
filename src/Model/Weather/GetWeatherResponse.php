<?php
namespace Model\Weather;

use Model\Entity\Temperature;

class GetWeatherResponse
{
    private $temperature;

    public function __construct(Temperature $temperature)
    {
        $this->temperature = $temperature;
    }

    public function getValue()
    {
        return $this->temperature->getValue();
    }

    public function getUnits()
    {
        return $this->temperature->getUnits();
    }

    public function serialize()
    {
        return [
            'temperature' => [
                'value' => $this->getValue(),
                'units' => $this->getUnits(),
            ]
        ] ;
    }
}
