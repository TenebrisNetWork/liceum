<?php

//Подключаем модель 
include_once ROOT."/models/Site.php";

class SiteController
{
    //Метод отображения контента главной страницы
    public function actionIndex()
    {
        //Получаем список новостей.
        $newsList = array();
        $newsList = Site::getNewsList();

        //Подключаем вид главной страницы
        require_once(ROOT."/views/site/index.php");
        
        return true;
    }

    //Метод отображения старницы с одной новостью
    public function actionNewsView($id)
    {
        if($id){
        //Получаем новость по ID
        $newsItem = Site::getNewsItemById($id);

        //Подключаем вид страницы с новостью
        require_once(ROOT."/views/site/newsView.php");
        }
        return true;
    }

}