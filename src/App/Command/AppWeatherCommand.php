<?php

namespace App\Command;

use Model\Provider\ProviderRegistry;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class AppWeatherCommand extends Command
{
    protected static $defaultName = 'app:weather';
    private $providerRegistry;

    public function __construct(ProviderRegistry $providerRegistry)
    {
        $this->providerRegistry = $providerRegistry;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription('Gather weather information')
            ->addArgument('location', InputArgument::REQUIRED, 'Location')
            ->addOption('noCache', null, InputOption::VALUE_NONE, 'Disable cache')
            ->addOption('provider', null, InputOption::VALUE_REQUIRED, 'Provider name', ApixuProvider::NAME)
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
        $location = $input->getArgument('location');

        $temperature = $this->providerRegistry
            ->get($input->getOption('provider'))
            ->getCurrentTemperature($location);

        $io->table(['Temperature'], [[$temperature->getValue() . $temperature->getUnit()]]);
        
        $io->success('Done');
    }
}


