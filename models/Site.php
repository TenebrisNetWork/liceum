<?php

class Site
{
    //Получение списка новостей
    public static function getNewsList()
    {
        //Подключение к базе данных
        $db = DB::getConnection();
        //Массив для новостей
        $newsList = array();
        
        //Создаем запрос в базу данных
        //Возвращает объект
        $result = $db->query("SELECT * FROM news ORDER BY date DESC LIMIT 10");
        
        //Объявляем переменную цикла
        $i = 0;
        
        //Записываем данные из запроса в результирующий массив
        while($row = $result->fetch())
        {
            $newsList[$i]["id"] = $row["id"];
            $newsList[$i]["NewsTitle"] = $row["NewsTitle"];
            $newsList[$i]["NewsContent"] = $row["NewsContent"];
            $newsList[$i]["date"] = $row["date"];
            $i++;
        }
        
        return $newsList;
    }

    //Получение одной новости
    public static function getNewsItemById($id)
    {
        //Получаем новость по id
        $id = intval($id);

        if($id){
            //Подключение к базе данных
            $db = DB::getConnection();
            //Запрос к БД
            $result = $db->query("SELECT * FROM news WHERE id = ".$id);
            //Устанвока настроек(Получить по названиям стобцов)
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $newsItem = $result->fetch();
            return $newsItem;
        }
    }
    
}