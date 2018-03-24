<?php

namespace Model\Provider;

use Model\HttpClientInterface;
use Model\Entity\Temperature;

class OpenWeatherMap implements ProviderInterface
{
    const NAME = 'open_weather';
    const URL = 'http://api.openweathermap.org/data/2.5/weather?q=%s&appid=8a96c9742f0ef23f67ea107c07150d85';
    const CACHE_FILE = 'OpenWatherMap.json';

    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    private function fetch(string $city)
    {
        return $this->client->get(sprintf(self::URL, $city));
    }

    public function getCurrentTemperature(string $city) : Temperature
    {
        $temperature = json_decode($this->fetch($city), true)['main']['temp'];
        $unit = 'F';
        
        return new Temperature($temperature, $unit);
    }

    public function getName() : string
    {
        return self::NAME;
    }
}
