<?php

namespace Foggyline\Console\Command;

use Symfony\Component\Console\{Command\Command,
    Helper\ProgressBar,
    Helper\Table,
    Input\InputInterface,
    Output\OutputInterface};

class CustomerExportCommand extends Command
{
    protected function configure()
    {
        $this->setName('customer:export')->setDescription('Exports one or more customers.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $customers = [
            ['John Doe', 'john.doe@mail.loc', '1983-01-16'],
            ['Samantha Smith', 'samantha.smith@mail.loc', '1986-01-16'],
            ['Robert Black', 'robert.blac@mail.loc', '1989-01-16'],
        ];

        $progress = new ProgressBar($output, count($customers));
        $progress->start();

        for($i = 1; $i <= count($customers); $i++) {
            sleep(3);
            $progress->advance();
        }

        $progress->finish();

        $table = new Table($output);
        $table->setHeaders(['Name', 'Email', 'DOB'])
            ->setRows($customers)
            ->render();


        $output->writeln('Customers exported.');
    }
}