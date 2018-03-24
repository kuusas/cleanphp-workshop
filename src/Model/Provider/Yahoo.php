<?php

namespace Model\Provider;

use Model\HttpClientInterface;
use Model\Entity\Temperature;

class Yahoo implements ProviderInterface
{
    private $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    public function getCurrentTemperature(string $city) : Temperature
    {
        $json = json_decode($this->fetch($city), true);
        $temperature = $json['query']['results']['channel']['item']['condition']['temp'];
        $unit = 'F';

        return new Temperature($temperature, $unit);
    }

    public function getName() : string
    {
        return self::NAME;
    }

    private function fetch(string $city)
    {
        $url = 'https://query.yahooapis.com/v1/public/yql'
                . '?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22'.$city.'%22)'
                .' &format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys&u=c'
                ;
        return $this->client->get($url);
    }
}
