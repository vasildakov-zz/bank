<?php
namespace Presentation\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class PingCommand extends Command
{
    protected function configure()
    {
        $this
            // the name of the command (the part after "bin/console")
            ->setName('app:ping')

            // the short description shown while running "php bin/console list"
            ->setDescription('Ping command')

            // the full command description shown when running the command with
            // the "--help" option
            ->setHelp("This is a ping command...")
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Ping: ' . time());
    }
}
