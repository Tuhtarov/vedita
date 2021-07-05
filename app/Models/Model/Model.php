<?php

require_once ROOT . '/app/Components/Database.php';

/**
 * Родительский класс всех классов моделей паттерна MVC.
 * В проекте Vedita, класс Model подключается к БД, и сохраняет доступный для наследников объект класса PDO.
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