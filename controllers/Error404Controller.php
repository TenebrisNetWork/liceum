<?php

//Подключаем модель 
include_once ROOT."/models/Error404.php";

class Error404Controller
{
    //Метод вывода основного содержания страницы 404
    public function actionIndex($parameter)
    {
        //Подключаем вид страницы с ошибкой
        require_once(ROOT."/views/error404/index.php");
        
        return true;
    }

}