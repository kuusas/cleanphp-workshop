<?php

namespace App\Controller;

use App\Provider\WeatherProviderInterface;
use League\Tactician\CommandBus;
use Model\Location\CreateLocation;
use Model\Location\LocationResponse;
use Model\Entity\Location;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Validator\Validator;
use Model\Location\CreateLocationConstraints;
use Swagger\Annotations as SWG;
use Nelmio\ApiDocBundle\Annotation\Model;

class LocationController extends Controller
{
    private $commandBus;

    public function __construct(CommandBus $commandBus, Validator $validator)
    {
        $this->commandBus = $commandBus;
        $this->validator = $validator;
    }

    /**
     * @SWG\Tag(name="Location")
     *
     * @SWG\Parameter(
     *     name="city",
     *     in="path",
     *     required=true,
     *     type="string",
     *     description="Name of the city"
     * )
     * @SWG\Parameter(
     *     name="country",
     *     in="path",
     *     required=true,
     *     type="string",
     *     description="Country where the city is located"
     * )
     *
     * @SWG\Response(
     *     response=201,
     *     description="Create new location",
     *     @Model(type=LocationResponse::class)
     * )
     */
    public function create(Request $request) : Response
    {
        $data = $request->request->all();
        
        $this->validator->validate(
            $data,
            new CreateLocationConstraints()
        );

        $result = $this->commandBus->handle(
            new CreateLocation($data['city'], $data['country'])
        );

        return new JsonResponse($result->serialize());
    }
}
