<?php
namespace Robert;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Output\OutputInterface;

class CompleteCommand extends Command {

    public function configure() {
        $this->setName("complete")
                ->setDescription("Complete a task by ID number.")
                ->addArgument("ID", InputArgument::REQUIRED);
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $id = $input->getArgument('ID');
        $this->database->query('DELETE from tasks where id = :id',
                compact('id'));
        $output->writeln('<info>Task Completed!</info>');
        $this->showTasks($output);
    }

}
