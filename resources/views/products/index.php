<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/resources/template/css/style.css" />
    <title>Товары</title>
</head>

<body>
    <div class="page">

        <header class="header">
            <h2 class="header-title">Vedita</h2>
        </header>

        <main>
            <section class="content">
                <?php if(isset($warning) == false) { ?>
                    <h1 class="content-title">
                        Товары
                    </h1>
                    <div>
                        <form class="form" id="product_form">
                            <h2 class="form-title">Добавить новый товар</h2>
                            <div class="form-column">
                                <div class="form-col-1">
                                    <div class="form-group">
                                        <label class="form-label" for="name">Наименование:</label>
                                        <input class="form-input" id="field_name" name="name" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="article">Артикул:</label>
                                        <input class="form-input" id="field_article" name="article" type="text">
                                    </div>
                                    <div class="form-group">
                                        <button id="btn_add_product" type="button" class="form-btn">Добавить товар</button>
                                    </div>
                                </div>
                                <div class="form-col-2">
                                    <div class="form-group">
                                        <label class="form-label" for="quantity">Количество:</label>
                                        <input class="form-input" id="field_quantity" name="quantity" type="number">
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label" for="price">Цена:</label>
                                        <input class="form-input" id="field_price" name="price" type="number">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="table-container">
                        <table class="table" id="product_table">
                            <thead>
                            <tr>
                                <th>№</th>
                                <th>Продукт</th>
                                <th>Артикул</th>
                                <th>Количество</th>
                                <th>Стоимость</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach($products as $product): ?>
                                <tr>
                                    <td id="product_id"><?= $product->id ?></td>
                                    <td>
                                        <a href="<?= '/products/' . $product->id ?>">
                                            <?= $product->name ?>
                                        </a>
                                    </td>
                                    <td><?= $product->article ?></td>
                                    <td>
                                        <p id="product_qty"><?= $product->quantity ?></p>
                                        <button class="btn_qty_up" id="btn_qty_up">+</button>
                                        <button class="btn_qty_down" id="btn_qty_down">-</button>
                                    </td>
                                    <td><?= $product->price ?></td>
                                    <td>
                                        <button class="btn_hide_row" id="btn_hide_row">Скрыть</button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                <?php } else { ?>
                    <h1 class="content-title">
                        <?= $warning ?>
                    </h1>
                <?php } ?>
            </section>
        </main>

        <footer class="footer">
            <p class="footer-subtitle">Тухтаров.</p>
        </footer>
    </div>
    <script type="text/javascript" src="/resources/template/js/jQuery/jquery.min.js"></script>
    <script type="text/javascript" src="/resources/views/products/ajax/store.js"></script>
    <script type="text/javascript" src="/resources/views/products/ajax/hide.js"></script>
    <script type="text/javascript" src="/resources/views/products/ajax/change.js"></script>
</body>
</html>