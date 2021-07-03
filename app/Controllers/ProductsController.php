<?php

require_once ROOT . '/app/Models/Products.php';

class ProductsController extends Products
{
    /**
     * Предоставление списка товаров.
     */
    public function actionIndex()
    {
//        echo __METHOD__;
        $products = $this->getProductsBySortDate(2);
        foreach ($products as $product) {
//            var_dump($product);
        }
        echo "<link rel='stylesheet' href=''>";

        require_once ROOT . '/resources/views/products/index.html';
    }

    /**
     * Предоставление информации о товаре.
     * @param $id - идентификатор товара, хранящегося в таблице products.
     */
    public function actionView(int $id)
    {
        echo __METHOD__;
        $product = $this->getProductById($id);
        var_dump($product);
    }
}