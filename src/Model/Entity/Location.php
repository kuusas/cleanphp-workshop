<?php

namespace Model\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Model\Repository\LocationRepository")
 */
class Location
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $city;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $country;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateCreated;

    public function __construct()
    {
        $this->dateCreated = new \DateTime();
    }
 
    public function getId() : int
    {
        return $this->id;
    }
 
    public function getCity() : string
    {
        return $this->city;
    }
 
    public function setCity(string $city) : void
    {
        $this->city = $city;
    }
 
    public function getCountry() : string
    {
        return $this->country;
    }
 
    public function setCountry(string $country) : void
    {
        $this->country = $country;
    }
 
    public function getDateCreated()
    {
        return $this->dateCreated;
    }
 
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }
}
