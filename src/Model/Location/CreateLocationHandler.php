<?php
namespace Model\Location;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Model\Entity\Location;

class CreateLocationHandler
{
    private $em;
    private $dispatcher;

    public function __construct(
        EntityManagerInterface $em,
        EventDispatcherInterface $dispatcher
    ) {
        $this->em = $em;
        $this->dispatcher = $dispatcher;
    }

    public function handle(CreateLocation $command)
    {
        $location = new Location();
        $location->setCity($command->getCity());
        $location->setCountry($command->getCountry());
        $this->em->persist($location);
        $this->em->flush();

        $this->dispatcher->dispatch(
            LocationCreated::class,
            new LocationCreated($location)
        );

        return new LocationResponse($location);
    }
}
