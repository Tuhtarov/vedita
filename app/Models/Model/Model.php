<?php

require_once ROOT . '/app/Components/Database.php';

/**
 * Родительский класс всех классов моделей паттерна MVC.
 * Класс Model подключается к БД, и сохраняет доступный для наследников объект класса PDO.
 * Class Model
 */
class Model
{
    protected \PDO $pdo;

    public function __construct()
    {
        $connection = new DBconnection();
        $this->pdo = $connection->getPDO();;
    }
}