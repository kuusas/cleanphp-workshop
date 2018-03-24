<?php
declare(strict_types=1);

namespace Tests\Controller\Location;

use Doctrine\Common\DataFixtures\ReferenceRepository;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Client;
use Tests\DataFixtures\LoadLocationData;

class TemperatureTest extends WebTestCase
{
    /**
     * @var Client
     */
    protected $client;

    protected function setUp()
    {
        $this->client = static::makeClient(false);
    }

    public function testGetTemperature()
    {
        $this->makeRequest('Vilnius');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    protected function makeRequest(string $location)
    {
        $this->client->request(
            'GET',
            '/api/v1/weather/temperature/' . $location,
            [],
            [],
            [],
            ''
        );
    }
}
