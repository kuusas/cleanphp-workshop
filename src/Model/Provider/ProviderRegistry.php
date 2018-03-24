<?php

namespace Model\Provider;

use Psr\Log\LoggerInterface;

class ProviderRegistry
{
    private $weatherProvider = array();
    private $log;

    public function __construct(LoggerInterface $log)
    {
        $this->log = $log;
    }

    public function add(ProviderInterface $weatherProvider) : void
    {
        $this->weatherProvider[] = $weatherProvider;
    }

    public function get(string $name) : ProviderInterface
    {
        $this->log->info(sprintf('Loading provider by name %s', $name));
        foreach ($this->weatherProvider as $provider) {
            if ($provider->getName() === $name) {
                return $provider;
            }
        }
        throw new UnknownProviderException();
    }
}
