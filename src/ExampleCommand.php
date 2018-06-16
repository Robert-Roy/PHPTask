<?php
namespace Robert;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class ShowCommand extends Command {

    public function __construct(DatabaseAdapter $database) {
        $this->database = $database;
        parent::__construct();
    }

    public function configure() {
        $this->setName("show")
                ->setDescription("Show all tasks.");
    }

    public function execute(InputInterface $input, OutputInterface $output) {
        $this->showTasks($output);
    }

    private function showTasks(OutputInterface $output) {
        $tasks = $this->database->fetchAll('tasks');
        $table = new Table($output);
        $table->setHeaders(['Id', 'Description'])
                ->setRows($tasks)
                ->render();
    }

}
