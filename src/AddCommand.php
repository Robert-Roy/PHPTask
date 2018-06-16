<?php
namespace Robert;

use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class AddCommand extends Command {

    public function configure() {
        $this->setName("add")
                ->setDescription("Create a task.")
                ->addArgument("Task Name", InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $description = $input->getArgument('Task Name');
        
        $this->database->query('insert into tasks(description) values(:description)',
                compact('description'));
        $output->writeln('<info>Task Added!</info>');
        $this->showTasks($output);
    }

}
