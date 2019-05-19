<?php

//Подключаем модель
include_once ROOT . "/models/User.php";

class UserController
{
    //Регистрация
    public function actionRegistration()
    {
        //Создаем переменные
        $error = [];
        $login = false;
        $password = false;
        $email = false;
        $password_continue = false;

        //Првоерка, переданы данные или нет
        if (isset($_POST["sumbit"])) {
            //Получаем данные пользователя
            $login = $_POST["login"];
            $password = $_POST["password"];
            $password_confirm = $_POST["password_confirm"];
            $email = $_POST["email"];
            $status = true;

            //Проверяем введенные данные и производим регистрацию
            if (!User::checkLogin($login)) {
                $error[] = "Введен некоректный login";
                $status = false;
            }
            if (!User::checkPassword($password, $password_confirm)) {
                $error[] = "Введен некоректный пароль или пароли не совпадают";
                $status = false;
            }
            if (!User::checkEmail($email)) {
                $error[] = "Введен некоректный email";
                $status = false;
            }
            if (!User::checkUserLogin($login)) {
                $error[] = "Пользователь с таким login уже зарегестрирован";
                $status = false;
            }
            if (!User::checkUserEmail($email)) {
                $error[] = "Пользователь с таким email уже зарегистрирован";
                $status = false;
            }
            if ($status) {

                $hashedPassword = User::generateHash($password);

                if (User::register($login, $email, $hashedPassword)) {
                    header("Location: login");
                    $error = "";
                } else {
                    $error[] = "Ошибка регистрации)";
                }
            }
        }
        //подключаем вид
        require_once(ROOT . "/views/user/registration.php");
        return true;
    }

    //Логин
    public function actionLogin()
    {
        //Создаем переменные
        $errors = [];
        $login = '';
        $password = '';
        $info = true;

        //Проверяем, получены ли данные
        if (isset($_POST['sumbit'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            if (User::checkLogin($login))  $info = true;
            else {
                $info = false;
                $errors[] = "Введен некоректный логин";
            }
            if (User::checkPasswordLogin($password))  $info = true;
            else {
                $info = false;
                $errors[] = "Введен некректный пароль";
            }
            //хешируем пароль
            $hashedPassword = USER::generateHash($password);

            if ($info == true) {
                if (User::login($login, $hashedPassword == false))
                header("Location: http://liceum.loc"); else echo User::login($login, $hashedPassword); 
            }
        }
        //подключаем вид
        require_once(ROOT . "/views/user/login.php");
        return true;
    }
}
