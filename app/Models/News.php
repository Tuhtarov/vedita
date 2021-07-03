<?php /** @noinspection ALL */

class News
{
    public static function getNewsItemById(int $id): array
    {
        $pdo = DBconnection::getPDO();
        if (is_null($pdo)) {
            die('Отсутствует подключение к базе данных.');
        }

        $statement = $pdo->query("SELECT `id`, `title`, `date`, `short_content`, `author_name` FROM `news` WHERE `id` = " . $id);

        $statement = $statement->fetch();

        if($statement == false){
            return array();
        }

        return $statement;
    }

    public static function getNewsList(): array
    {
        $pdo = DBconnection::getPDO();
        if (is_null($pdo)) {
            die('Отсутствует подключение к базе данных.');
        }

        $statement = $pdo->query('SELECT `id`, `title`, `date`, `short_content`, `author_name` FROM news'
            . ' ORDER BY date DESC'
            . ' LIMIT 10');
        ;
        $newsList = array();

        $i = 0;
        while($row = $statement->fetch()){
            $newsList[$i]['id'] = $row['id'];
            $newsList[$i]['title'] = $row['title'];
            $newsList[$i]['date'] = $row['date'];
            $newsList[$i]['short_content'] = $row['short_content'];
            $newsList[$i]['author_name'] = $row['author_name'];
            $i++;
        }

        return $newsList;
    }
}