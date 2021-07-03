<?php

class ControllerSearch
{
    private array $_routeList;

    public function __construct()
    {
        $this->_routeList = include(ROOT . '/config/routes.php');
    }

    protected function runController(string $uri)
    {
        //getController - возвращает массив с именем контроллера и его метода, исходя из введённой адресной строки $uri
        $controllerSegments = $this->getController($uri);

        $controllerName = ucfirst(array_shift($controllerSegments) . 'Controller');
        $controllerMethod = 'action' . ucfirst(array_shift($controllerSegments));
        $paramMethod = array_shift($controllerSegments);

        $controllerFileLocation =  ROOT . '/app/Controllers/' . $controllerName . '.php';

        if(file_exists($controllerFileLocation)){
            try {
                include_once $controllerFileLocation;
            } catch (Exception $e) {
                die($e->getMessage());
            }
            $controllerObject = new $controllerName();
            $controllerObject->$controllerMethod((int)$paramMethod);
        }
    }


    public function getController(string $uri): ?array
    {
        foreach ($this->_routeList as $pattern => $pathLine) {

            if(preg_match("~$pattern~", $uri)){
                $pathLin = preg_replace("~$pattern~", $pathLine, $uri);
                return explode('/', $pathLin);
            }
        }
    }
}
