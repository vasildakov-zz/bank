<?php
namespace Application\Cli;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputDefinition;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

use League\Tactician\CommandBus;
use Domain\Transfer\MakeTransferCommand;

class TransferCommand extends Command
{
    private $bus;

    /**
     * Constructor
     */
    public function __construct(CommandBus $bus)
    {
        $this->bus = $bus;
        parent::__construct();
    }


    protected function configure()
    {
        $this
            ->setName('bank:transfer')
            ->setDescription('Transfer Money')
            ->setHelp("This command allows transfer money from between accouns")
            ->setDefinition(
                new InputDefinition(array(
                    new InputOption('source', 's', InputOption::VALUE_REQUIRED),
                    new InputOption('destination', 'd', InputOption::VALUE_REQUIRED),
                    new InputOption('amount', 'a', InputOption::VALUE_REQUIRED),
                ))
            )
        ;
    }


    /**
     * @param  InputInterface  $input
     * @param  OutputInterface $output
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $this->bus->execute(
            new MakeTransferCommand(
                $request->get('source'),
                $request->get('destination'),
                $request->get('amount')
            )
        );

        $output->writeln("<info>$title, $author, $isbn, $price</info>");

    }
}
