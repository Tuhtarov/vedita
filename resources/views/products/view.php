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
        <a class="nav-link" href="/">На главную</a>
    </header>

    <main>
        <section class="content">
            <h1 class="content-title">
                Информация о товаре.
            </h1>
            <div>
                <?php foreach($products as $product): ?>
                <h2 class="content-text">
                    <?= $product->name ?>
                </h2>
                <table class="table">
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
                        <tr>
                            <td><?= $product->id ?></td>
                            <td><?= $product->name ?></td>
                            <td><?= $product->article ?></td>
                            <td>
                                <p><?= $product->quantity ?></p>
                                <button>+</button>
                                <button>-</button>
                            </td>
                            <td><?= $product->price ?></td>
                            <td>
                                <button>Скрыть</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer class="footer">
        <p class="footer-subtitle">Тухтаров.</p>
    </footer>
</div>
<script type="text/javascript" src="/resources/template/js/jQuery/jquery.min.js"></script>
<script type="text/javascript" src="/resources/views/products/ajax/store.js"></script>
</body>
</html>