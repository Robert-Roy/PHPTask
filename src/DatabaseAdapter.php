<?php
namespace Robert;
use PDO;

class DatabaseAdapter {

    protected $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function fetchAll($table) {
        //This method is exposed to SQL injection if untrusted parties can access it
        return $this->connection->query('SELECT * FROM ' . $table)->fetchAll();
    }

    public function query($sql, $parameters) {
       return $this->connection->prepare($sql)->execute($parameters);
    }

}
