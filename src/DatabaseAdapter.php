<?php
namespace Robert;
use PDO;

class DatabaseAdapter {

    protected $connection;

    public function __construct(PDO $connection) {
        $this->connection = $connection;
    }

    public function query($sql, $parameters) {
        return $this->connection->prepare($sql)->execute($parameters);
    }

}
