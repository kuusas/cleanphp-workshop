<?php

namespace App\Controller;

use App\Provider\WeatherProviderInterface;
use League\Tactician\CommandBus;
use Model\Weather\GetWeather;
use Model\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class WeatherController extends Controller
{
    private $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function temperature(string $location) : Response
    {
        $result = $this->commandBus->handle(
            new GetWeather($location)
        );

        return new JsonResponse($result->serialize());
    }
}
