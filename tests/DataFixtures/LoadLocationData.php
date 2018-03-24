<?php
declare(strict_types=1);

namespace Tests\DataFixtures;

use Model\Entity\Location;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\Persistence\ObjectManager;

class LoadLocationData extends AbstractFixture
{
    public function load(ObjectManager $manager)
    {
        $this->create(
            $manager,
            'Vilnius',
            'Lithuania',
            'location.vilnius'
        );
    }

    protected function create(
        ObjectManager $manager,
        string $city,
        string $country,
        string $referenceName
    ) {
        $location = new Location();
        $location->setCity($city);
        $location->setCountry($country);
        $this->setReference($referenceName, $location);
        $manager->persist($location);
        $manager->flush();
    }
}
