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

    /*--------------------------------------Работа с запросами Ajax-----------------------------------------*/

    /**
     * Создание новой записи в таблице products. Этот метод вызывается из скрипта
     * 'store' (resources/views/products/ajax/store.js).
     */
    public function actionStore()
    {
        $newProduct = $_POST['product'];
        $result = $this->products->create($newProduct);
        if (is_null($result)) {
            echo false;
        }
        echo $result;
    }

    /**
     * Сохранение отметки о сокрытии записи в таблице products. Этот метод вызывается из скрипта
     * 'hide' (resources/views/products/ajax/hide.js).
     */
    public function actionHide()
    {
        $id = $_POST['idProduct'];
        $result = $this->products->hideProductById($id);
        echo $result;
    }

    /**
     * Изменение количества товара в таблице products. Этот метод вызывается из скрипта
     * 'change' (resources/views/products/ajax/change.js).
     */
    public function actionChange()
    {
        $id = $_POST['idProduct'];
        $qty = $_POST['qtyProduct'];
        $result = $this->products->changeQtyProductById($id, $qty);
        echo $result;
    }
}