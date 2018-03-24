<?php
namespace Model\Weather;

use Model\Provider\ProviderInterface;

class GetWeatherHandler
{
    private $provider;

    public function __construct(ProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    public function handle(GetWeather $command)
    {
        $temperature = $this->provider->getCurrentTemperature($command->getLocation());
        return new GetWeatherResponse($temperature);
    }
}
