<?php

namespace Model\Entity;

class Temperature
{
    private $value;
    private $units;

    public function __construct(int $value, string $units)
    {
        $this->value = $value;
        $this->units = $units;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function getUnits()
    {
        return $this->units;
    }
}
