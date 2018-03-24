<?php

namespace Model\Provider;

use Model\HttpClientInterface;
use Model\Entity\Temperature;

class Apixu implements ProviderInterface
{
    const NAME = 'apixu';
    const URL = 'https://api.apixu.com/v1/current.json?key=e4f06cf645194ff88b9190500181603&q=%s';

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    private function fetch($city)
    {
        return $this->client->get(sprintf(self::URL, $city));
    }

    public function getCurrentTemperature(string $city) : Temperature
    {
        $data = json_decode($this->fetch($city), true);
        $temperature = $data['current']['temp_c'];
        $unit = 'C';
        
        return new Temperature($temperature, $unit);
    }

    public function getName() : string
    {
        return self::NAME;
    }
}