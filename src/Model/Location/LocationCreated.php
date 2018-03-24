<?php
namespace Model\Location;

use Model\Entity\Location;
use Symfony\Component\EventDispatcher\Event;

class LocationCreated extends Event
{
    private $location;

    public function __construct(Location $location)
    {
        $this->location = $location;
    }

    public function getLocation(): Location
    {
        return $this->location;
    }
}
