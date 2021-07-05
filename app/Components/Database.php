<?php /** @noinspection ALL */

/**
 * Class DBconnection
 * Хранит настройки соединения с БД.
 * Создаёт при помощи dsn строки настроенный экземпляр PDO.
 * Метод getPDO() : возвращает созданный экземпляр.
 */
class DBconnection
{
    private static \PDO $pdo;

    /**
     * Метод создаёт подключение с БД на основании файла конфигурации, и дополнительных настроек в своём теле.
     */
    private static function connect()
    {
        //подключение файла с основными настройками подключения к БД
        $connection = require ROOT . '/config/database.php';

        //дополнительные настройки подключения
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        $dsn = $connection->db . ':host=' . $connection->host. ';' . 'dbname=' . $connection->dbname;

        self::$pdo = new PDO($dsn, $connection->user, $connection->password, $opt);
    }

    /**
     * Метод возвращает объект PDO базы данных указанной в файле конфигурации config/database.
     * @return PDO
     */
    public static function getPDO() : PDO
    {
        SELF::connect();
        return SELF::$pdo;
    }
}

