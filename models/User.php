<?php

class User
{
    //Проверка логина
    public static function checkLogin($login)
    {
        if(strlen($login) >=3 && strlen($login) <= 16) return true;
        else return false;

    }
    //Генерация хеш пароля
    public static function generateHash($password) {  
        //Добавляем к паролю "соль"
        $password = "KaTaWa2018".$password;
        //Хешируем пароль
        $password = md5($password);
        return $password;
    }
    //Проверка пароля
    public static function checkPassword($password, $password_confirm)
    {
        if(strlen($password) >=6 && strlen($password) <= 16 && preg_match("~^{$password}$~", $password_confirm )) return true;
        else return false;
    }
    //Проверка email
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) return true;
        else return false;
    }
    //Проверка email на совпадения с базой
    public static function checkUserEmail($email)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user) return false;
        else return true;
    }
    //Првоерка логина на совпадения в базе
    public static function checkUserLogin($login)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE login = :login';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if ($user) return false;
        else return true;
    }
    //Регистарция
    public static function register($login, $email, $password)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO users (login, email, password) VALUES (:login, :email, :password)';
        // Получение и возврат результатов. Используется подготовленный запрос
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();
    }

    //Проверяем пароль
    public static function checkPasswordLogin($password)
    {
        if(strlen($password) >=6 && strlen($password) <= 16) return true;
        else return false;
    }

    public static function login($login, $password){
        $db = Db::getConnection();
        $sql = "SELECT * FROM users WHERE login = :login,  password = :password";
        $result = $db->prepare($sql);
        $result = $result->execute(array("login" =>$login, "password" => $password));
        //if($result->fetch()){
        //    while($row = $result->fetch())
        //    {
        //        $data['login'] = $row['login'];
        //        $data['password'] = $row['password'];
        //    }
        //    $_SESSION['login_in'] = 1;
        //    $_SESSION['user'] = serialize($data);
       //     return true;
        //} else return false;
        return $result;

    }

}
