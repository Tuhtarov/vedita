<?php
trait UriLine
{
    public function getUri(): string
    {
        if(!empty($_SERVER['REQUEST_URI']))
        {
            return trim($_SERVER['REQUEST_URI'], '/');
        }
    }
}
