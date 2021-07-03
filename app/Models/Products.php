<?php

require_once ROOT . '/app/Models/Model/Model.php';

class Products extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Метод возвращает массив, в котором содержится список товаров, с заданным количеством.
     * Количество товаров для вывыда по умолчанию - 10.
     * @param int $qty - колличество записей.
     */
    protected function getProducts(int $qty = 10): array {
        $query = $this->pdo->query('SELECT * FROM `products`');

        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $products[] = $row;
        }

        return $products;
    }

}

