<?php

return array(

    //Главная страница сайта
    "" => "site/index",  
    //Просмотр одной новости
    "news/([0-9]+)" => "site/newsView/$1",
    //Регистрация
    "user/registration" => "user/registration",
    //Авторизация
    "user/login" => "user/login",
    //Личный кабинет
    "user/personalArea" => "user/personalArea"
);