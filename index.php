<?php

ini_set("display_errors", 1);
error_reporting(E_ALL);

//Определяем переменную местоположения ROOT
define("ROOT", dirname(__FILE__));

//Подключаем файл роутера
require_once(ROOT."/components/Router.php");
//Подключаем базу данных
require_once(ROOT."/components/DB.php");

//Создаем объект роутера и вызываем метод run
$router = new Router();
$router->run();

