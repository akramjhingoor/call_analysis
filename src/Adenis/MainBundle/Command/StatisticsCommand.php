<?php

namespace Adenis\MainBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Adenis\BackBundle\Controller\WebservicegeController;
use Adenis\BackBundle\Controller\EmailController;
use Adenis\DefaultBundle\Entity\Webservice;
use Adenis\DefaultBundle\Entity\Webserviceim;

class StatisticsCommand extends ContainerAwareCommand {

    protected function configure() {
        $this->setName('updatestatistics:run')
                ->setDescription('update statistics from infocob to cdrent.');
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        try {
            $container = $this->getContainer();
            $output->writeln('Start Update Statistics...');
            $this->getContainer()->get('clientcontroller')->updatestatistics($container);
            $output->writeln('Finish!');
        } catch (\Exception $e) {
            $output->writeln('\n');
            $output->writeln($e->getMessage());
            $output->writeln('\n');
        }
    }

}
