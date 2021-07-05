<?php

require_once ROOT . '/app/Models/Model/Model.php';

class Products extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Метод возвращает массив объектов, в котором содержится список товаров, с заданным количеством записей.
     * Количество товаров для вывода по умолчанию - 10.
     * @param int $qtyRecords - количество товаров в массиве.
     * @return array
     */
    public function getProducts(int $qtyRecords = 10): ?array
    {
        $query = $this->pdo->query('SELECT * FROM `products` LIMIT ' . $qtyRecords);

        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $products[] = $row;
        }

        return $products ?? null;
    }

    /**
     * Метод возвращает массив, в котором содержится вся информация о товаре в виде объекта.
     * @param int $id - id товара.
     * @return array
     */
    public function getProductById(int $id): ?array
    {
        $query = $this->pdo->query("SELECT * FROM `products` WHERE `id` = " . $id);

        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $product[] = $row;
        }

        return $product ?? null;
    }

    /**
     * Метод возвращает массив объектов, в котором содержится отсортированный по дате список товаров,
     * с заданным количеством записей. Количество товаров для вывода по умолчанию - 10.
     * @param int $qtyRecords - количество товаров в массиве.
     * @param string|null $orderBy - необязательный параметр со строковым значением "ASC" или "DESC", по умолчанию "DESC".
     * @return array
     */
    public function getProductsBySortDate(int $qtyRecords = 10, string $orderBy = null): ?array
    {
        $orderBy = strtoupper($orderBy);
        $sortByAsc = 'ASC';
        $sortByDesc = 'DESC';

        //проверка на правильность использования метода
        if ($orderBy == null || $orderBy == $sortByDesc) {
            $sort = $sortByDesc;
        } else {
            if ($orderBy == $sortByAsc) {
                $sort = $sortByAsc;
            } else {
                die(__METHOD__ . ' Необходимо указать сортировку по возрастанию - ASC, или убыванию - DESC');
            }
        }

        $query = $this->pdo->query('SELECT * FROM `products` WHERE `hidden` is null ORDER BY `created_at` ' . $sort . ' LIMIT ' . $qtyRecords);

        while ($row = $query->fetch(PDO::FETCH_OBJ)) {
            $products[] = $row;
        }

        return $products ?? null;
    }

    /**
     * Метод создаёт новую запись (новый продукт) в таблице products.
     * @param array $product массив полей (пример: name => "example", article => "ex-228", n..), для создания новой записи
     * в таблице.
     * @return int возвращает id добавленной записи, либо null - если запрос выполнить не удалось
     */
    public function create(array $product) : ?int
    {
        //создание записи в таблице
        $query = $this->pdo->prepare("INSERT INTO products (name, article, quantity, price)
                                VALUES (:name, :article, :quantity, :price)");
        $result = $query->execute($product);

        //если запись создалась, то взять её ID (это нужно для отображения изменений в View, при помощи jQuery)
        if($result == true) {
            $query = $this->pdo->query('SELECT `id` FROM `products`
                                                WHERE name = ' . "'{$product['name']}'" . '
                                                  AND article = ' . "'{$product['article']}'" . ' 
                                                  AND quantity =' . "'{$product['quantity']}'" . '
                                                  AND price = ' . "'{$product['price']}'");
            while ($row = $query->fetch(PDO::FETCH_OBJ)) {
                $result = $row->id;
            }
            return $result;
        } else {
            return null;
        }
    }

    /**
     * Метод перезаписывает поле hidden по id записи таблицы products.
     * @return bool результат выполнения запроса (true - операция успешна, false - ошибка выполнения)
     */
    public function hideProductById(int $idProduct): bool
    {
        $hiddenDate = date('Y-m-d H:i:s');
        $query = $this->pdo->prepare("UPDATE `products` SET `hidden` = :date WHERE `products`.`id` = :id");
        $result = $query->execute([
            'date' => $hiddenDate,
            'id' => $idProduct
        ]);
        return $result;
    }

    /**
     * Метод перезаписывает поле quantity по id записи таблицы products, дополнительный параметр - новое количество товара.
     * @return bool результат выполнения запроса (true - операция успешна, false - ошибка выполнения)
     */
    public function changeQtyProductById(int $idProduct, int $qtyProduct): bool
    {
        $query = $this->pdo->prepare("UPDATE `products` SET `quantity` = :qty WHERE `products`.`id` = :id");
        $result = $query->execute([
            'qty' => $qtyProduct,
            'id' => $idProduct
        ]);
        return $result;
    }

}

