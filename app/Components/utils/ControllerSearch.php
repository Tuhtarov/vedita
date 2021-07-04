<?php

class ControllerSearch
{
    private array $_routeList;

    /**
     * ControllerSearch constructor, отвечающий за инициализацию файла с маршрутами '/config/routes.php'.
     */
    public function __construct()
    {
        $this->_routeList = include(ROOT . '/config/routes.php');
    }

    /**
     * Запуск управления контроллерами на основе адресной строки браузера.
     * @param string $uri
     */
    protected function runController(string $uri)
    {
        //getController - возвращает массив с именем контроллера и его метода, исходя из введённой адресной строки $uri
        $controllerSegments = $this->getController($uri);

        /*
         * далее чпу, нативными методами создаётся имя класса, далее его метод, параметр (если есть)
         * образуется файл с расширением php, проверка: если такой существует, то подключается файл, затем используется
         * его класс и метод.
        */
        $controllerName = ucfirst(array_shift($controllerSegments) . 'Controller');
        $controllerMethod = 'action' . ucfirst(array_shift($controllerSegments));
        $paramMethod = array_shift($controllerSegments);

        $controllerFileLocation =  ROOT . '/app/Controllers/' . $controllerName . '.php';

        if(file_exists($controllerFileLocation)) {
            include_once $controllerFileLocation;

            $controllerObject = new $controllerName();
            if($controllerMethod == 'actionIndex.php') {
                $debugMethod = 'actionIndex';
                $controllerObject->$debugMethod();
            } else {
                $controllerObject->$controllerMethod((int)$paramMethod);
            }
        }
    }

    /**
     * Метод отвечает за определение сегментов контроллера (имя контроллера, метод, имеющиеся параметры),
     * на вход приходит адресная строка браузера, по имеющимся правилам в файле config/router.php, происходит извлечение
     * сегментов контроллера из адресной строки, и все сегменты возращаются методом в виде массива.
     * @param string $uri
     * @return array|null
     */
    private function getController(string $uri): ?array
    {
        foreach ($this->_routeList as $pattern => $pathLine) {

            if(preg_match("~$pattern~", $uri)){
                $controllerSegments = preg_replace("~$pattern~", $pathLine, $uri);
                return explode('/', $controllerSegments);
            }
        }
    }
}
