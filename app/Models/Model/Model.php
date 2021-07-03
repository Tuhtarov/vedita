<?php

require_once ROOT . '/app/Components/Database.php';

class Model
{
    protected \PDO $pdo;

    public function __construct()
    {
        $connection = new DBconnection();
        $this->pdo = $connection->getPDO();;
    }
}