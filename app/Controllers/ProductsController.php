<?php

include_once ROOT . '/app/Models/Products.php';

/**
 * Контроллер товаров, отвечает за общение View и Model.
 * Class ProductsController
 */
class ProductsController extends Products
{
    /**
     * Предоставление списка товаров.
     */
    public function actionIndex()
    {
        parent::__construct();
        $products = $this->getProducts();
        foreach ($products as $product) {
            echo '<br>' . $product->id;
        }
    }

    /**
     * Предоставление информации о товаре.
     * @param $id - идентификатор товара, хранящегося в таблице products.
     */
    public function actionView(int $id)
    {
//        $connection = new DBconnection();
//        $pdo = $connection->getPDO();
//
//        $statement = $pdo->query('SELECT * FROM `products`');
//        $statement->execute();
//        var_dump($statement);
    }
}