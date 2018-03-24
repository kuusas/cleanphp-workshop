<?php
namespace Model\Weather;

use Model\Entity\Location;

class GetWeather
{
    private $location;

    public function __construct(string $location)
    {
        $this->location = $location;
    }

    public function getLocation(): string
    {
        return $this->location;
    }
}
