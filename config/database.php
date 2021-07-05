<?php
//конфигурация подключения к БД.
$db = new stdClass();

$db->db = 'mysql';
$db->host = 'localhost';
$db->dbname = 'vedita';
$db->user = 'root';
$db->password = 'root';

return $db;