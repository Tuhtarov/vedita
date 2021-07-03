<?php

/*
$datetime = date("m-d-Y");
$patternDate = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';

$replacement = 'Год $3, месяц $1, день $2';
echo preg_replace($patternDate, $replacement, $datetime);

die("<br>" . 'rest in peace php script');*/


//preg_match, preg_replace
//0 - false
//1 - true
$string = '121312312312213123';

// pattern - шаблон для поиска (регулярное выражение), заключается в символах разделителях [,/,{}
// символы - "/" задают маску для поиска точного значение, заключенное между этими символами
// символы - "[]" задают маску для поиска диапазона букв/цифр
// символы - "[]" , в которых находится ',' задают условное выражение 'или', т.е строка 200[2,3,4] - эквивалентна выражению: "или 2002 или 2003 или 2004"
/* в регулярных выражениях существуют квантификаторы (символы: {}), которые помогают описать повторяющиеся символы в строке. Пример: '/p{2}/' === pp, т.е цифра 2 в квантификаторе означает
два символа 'p' подряд;
в квантификаторах можно так же указывать диапазон значений, только уже через запятую, пример: p{3,5} === ppp/pppp/ppppp. '/0{1-3}/' - вот так не прокатит.
'/p{5,}/' - такая запись === 5>=, т.е вернётся 1(true), если символов 5 будет равно или больше 5. Эти квантификаторы можно применять так же к диапазонам цифр/букв: '/[0-9]{1,2}/',
есть ещё такой вариант записи = '/[0-9]+/' - это значит, что нужно найти любое колличество цифр больше 0 */

$pattern = '/[2-9]+/';

$result = preg_match($pattern, $string);

var_dump($result);

if ($result) echo 'true'; else echo 'false';
/*


private $routes;

public function __construct()
{
    $routesPath = ROOT . '/config/routes.php';
    $this->routes = include($routesPath);
}

public function run()
{
    $uri = $this->getUri();
    foreach ($this->routes as $uriPattern => $path)
    {
        if (preg_match("~$uriPattern~", $uri))
        {
            $segments = explode('/', $path);

            echo "<pre>";
            print_r($segments);
            echo "</pre>";

            $controllerName = ucfirst(array_shift($segments).'Controller');
            $actionMethod = 'action'.ucfirst(array_shift($segments));

            // подключить файл класса-контроллера
            $controllerFile = ROOT . '/controllers/' . $controllerName . '.php';
            if(file_exists($controllerFile)){
                include_once ($controllerFile);
            } else{
                die('Такого контроллера не существует');
            }

            $controllerObject = new $controllerName;
            $result = $controllerObject->$actionMethod();
            if($result == null){
                die('гавно');
            } else{
                echo $result;
            }
        }
    }


    // создать объект класса контроллера, вызвать метод action
}

private function getUri(): string
{
    if (!empty($_SERVER['REQUEST_URI'])) {
        return trim($_SERVER['REQUEST_URI'], '/');
    }
}