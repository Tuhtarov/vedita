<?php

include_once ROOT . '/Models/News.php';

class NewsController
{
    public function actionIndex()
    {
        $newsList = News::getNewsList();
        include_once ROOT . '/views/news/index.php';

    }

    public function actionView(int $id)
    {
        if($id){
            $newsItem = News::getNewsItemById($id);
            include_once ROOT . '/views/news/view.php';

            if(empty($newsItem)) die('пусто');
        }
    }
}