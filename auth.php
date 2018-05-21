<?php
    if (isset($_COOKIE['login']) and isset($_COOKIE['password']) and !$is_login)
    {
        $login = $_COOKIE['login'];
        $password = $_COOKIE['password'];
        require "db_connect.php";
        $query = "select * from users where login=".$login." and password=".$password.";";
        $result = $pg_query($query);
        if(!$result)
        {
            unset($login);
            unset($password);
            $is_login = false;
        }
        else
        {
            $is_login = true;
            $user_id = result[0];
        }
        require "db_close.php";
    }
?>