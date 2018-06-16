<?php
namespace Robert;

use Symfony\Component\Console\Command\Command as SymfonyCommand;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class Command extends SymfonyCommand {

    public function __construct(DatabaseAdapter $database) {
        $this->database = $database;
        parent::__construct();
    }

    protected function showTasks(OutputInterface $output) {
        $tasks = $this->database->fetchAll('tasks');
        if(!$tasks){
            return $output->writeln("<info>There are no tasks at this time.</info>");
        }
        $table = new Table($output);
        $table->setHeaders(['Id', 'Description'])
                ->setRows($tasks)
                ->render();
    }
    
}
