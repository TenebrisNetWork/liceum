<?php

//Подключаем модель
include_once ROOT."models/User.php";

class UserController
{
    //Регистрация
    public function actionRegistration()
    {
        //Создаем переменные
        $login = false;
        $password = false;
        $email = false;
        $password_continue = false;

        //Првоерка, переданы данные или нет
        if(isset($_POST["sumbit"]))
        {
            //Получаем данные пользователя
            $login = $_POST["login"];
            $password = $_POST["password"];
            $password_continue = $_POST["password_continue"];
            $email = $_POST["email"];

            //Проверяем введенные данные и производим регистрацию
            if(User::checkLogin($login)) 
            {
                if(User::checkPassword($password, $password_continue))
                {
                    if(User::checkEmail($email))
                    {
                        if(User::checkUserLogin($login))
                        {
                            if(User::checkUserEmail($email))
                            {
                                $hashedPassword = User::hashedPassword($password);
                                if(User::registration($login, $password, $email))
                                {
                                    User::login($login, $hashedPassword);
                                    return true;

                                } else $error[] = "Ошибка регистрации)";

                            } else $error[]= "Пользователь с таким email уже зарегистрирован";

                        } else $error[] = "Пользователь с таким login уже зарегестрирован";

                    } else $error[] = "Введен некоректный email";

                } else $error[] = "Введен некоректный пароль или пароли не совпадают";

            } else $error[]= "Введен некоректный login";

        }

        //подключаем вид
        require_once(ROOT."views/user/registration.php");
        return true;

    }
    
}