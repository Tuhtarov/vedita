<?php

include_once ROOT . '/app/Components/utils/UriLine.php';
include_once ROOT . '/app/Components/utils/ControllerSearch.php';

class Router extends ControllerSearch
{
    use UriLine;

    public function run()
    {
        $uri = $this->getUri();

        if ($uri == '') {
            $this->runController('products');
        } else {
            $this->runController($uri);
        }
    }
    public function __construct()
    {
        parent::__construct();
    }
}

