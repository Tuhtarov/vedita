<?php /** @noinspection ALL */

/**
 * Class DBconnection
 * Хранит настройки соединения с БД.
 * Создаёт при помощи dsn строки настроенный экземпляр PDO.
 * Метод getPDO() : возвращает созданный экземпляр.
 */
class DBconnection
{
    private const db = 'mysql';
    private const host = 'localhost';
    private const dbname = 'vedita';
    private const user = 'root';
    private const password = 'root';

    private static \PDO $pdo;

    private static function connect()
    {
        //настройки подключения
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );

        $dsn = self::db . ':host=' . self::host. ';' . 'dbname=' . self::dbname;
        self::$pdo = new PDO($dsn, self::user, self::password, $opt);
    }

    public static function getPDO() : PDO
    {
        SELF::connect();
        return SELF::$pdo;
    }
}

