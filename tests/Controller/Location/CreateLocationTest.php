<?php
declare(strict_types=1);

namespace Tests\Controller\Location;

use Doctrine\Common\DataFixtures\ReferenceRepository;
use Liip\FunctionalTestBundle\Test\WebTestCase;
use Symfony\Bundle\FrameworkBundle\Client;
use Tests\DataFixtures\LoadLocationData;

class CreateLocationTest extends WebTestCase
{
    /**
     * @var ReferenceRepository
     */
    protected $fixtures;

    /**
     * @var Client
     */
    protected $client;

    protected function setUp()
    {
        $this->client = static::makeClient(false);
        $this->fixtures =
            $this
                ->loadFixtures([LoadLocationData::class])
                ->getReferenceRepository();
    }

    public function testCreateLocationFailure()
    {
        $data = [
            'city' => 'Barcelona',
        ];

        $this->makeRequest($data);
        $this->assertEquals(400, $this->client->getResponse()->getStatusCode());
    }

    public function testSuccessfullyCreatesLocation()
    {
        $data = [
            'city' => 'Barcelona',
            'country' => 'Spain',
        ];
        $this->makeRequest($data);
        // var_dump($this->client->getResponse()->getContent());exit;
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    protected function makeRequest(array $data)
    {
        $headers = ['CONTENT_TYPE' => 'application/form-data'];
        $this->client->request(
            'POST',
            '/api/v1/location/create',
            $data,
            [],
            $headers,
            ''
        );
    }
}
