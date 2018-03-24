<?php
namespace Model\Location;

class CreateLocation
{
    private $city;
    private $country;

    public function __construct(string $city, string  $country)
    {
        $this->city = $city;
        $this->country = $country;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function getCountry(): string
    {
        return $this->country;
    }
}
