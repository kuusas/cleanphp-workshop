<?php
namespace Model\Location;

use Model\Entity\Location;

class LocationResponse
{
    private $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function getId() : int
    {
        return $this->location->getId();
    }

    public function getCity() : string
    {
        return $this->location->getCity();
    }
 
    public function getCountry() : string
    {
        return $this->location->getCountry();
    }

    public function serialize()
    {
        return [
            'id' => $this->getId(),
            'city' => $this->getCity(),
            'country' => $this->getCountry(),
        ];
    }
}
