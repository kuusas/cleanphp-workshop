<?php

namespace Model\Provider;

use Model\Entity\Temperature;

interface ProviderInterface
{
    public function getCurrentTemperature(string $city) : Temperature;
    public function getName() : string;
}
