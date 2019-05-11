<?php 

class DB
{
    //Подключение к базе данных
    public static function getConnection()
    {
        //Путь к файлу с настройками подключения к БД
        $paramsPath = ROOT."/config/db_params.php";
        //Получение настроек БД
        $params = include($paramsPath);

        $dsn = "mysql:host={$params["host"]};dbname={$params["dbname"]}";
        $db = new PDO($dsn, $params["user"], $params["password"]);

        return $db;

    }
}