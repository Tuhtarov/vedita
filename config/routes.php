<?php
    //ключ - URL, значение - имя контроллера/метод
    return array(
        'products/store' => 'products/store',
        'products/change' => 'products/change',
        'products/hide' => 'products/hide',
        'products/([0-9]+)' => 'products/view/$1',
        'products' => 'products/index',
    );

