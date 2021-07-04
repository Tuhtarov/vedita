<?php

require_once ROOT . '/app/Models/Products.php';

/**
 * Class ProductsController, ответственность за управление методами контроллера
 * берёт на себя Router.php (app/Components/Router.php)
 */
class ProductsController
{
    private \Products $products;

    /**
     * ProductsController constructor, отвечающий за инкапсулирование класса модели таблицы products.
     */
    public function __construct()
    {
        $this->products = new Products();
    }

    /**
     * Предоставление списка товаров.
     */
    public function actionIndex()
    {
        $products = $this->products->getProductsBySortDate(10);
        if(empty($products)){
            $warning = 'Товары отсутствуют.';
        }
        require_once ROOT . '/resources/views/products/index.php';
    }

    /**
     * Предоставление информации о товаре.
     * @param $id - идентификатор товара, хранящегося в таблице products.
     */
    public function actionView(int $id)
    {
        $products = $this->products->getProductById($id);
        require_once ROOT . '/resources/views/products/view.php';
    }

    /**
     * Создание новой записи в таблице products. Этот метод вызывается при запуске скрипта
     * 'store' (resources/views/products/ajax/store.js).
     */
    public function actionStore()
    {
        $newProduct = $_POST['product'];
        $result = $this->products->create($newProduct);
        echo $result;
    }
}