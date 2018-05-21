<?php
    session_start();
    
    if (isset($_COOKIE['login']) and isset($_COOKIE['password']))
    {
        $login = $_COOKIE['login'];
        $password = $_COOKIE['password'];
        require "db_connect.php";
        $sql = "select * from users where login = '".$login."' and password = '".$password."';";
        $res = pg_query($conn, $sql);
        if(!$res)
        {
            unset($login);
            unset($password);
            $is_login = false;
        }
        else
        {
            $is_login = true;
            $user_id = res[0];
        }
        require "db_close.php";
    }
    if (isset($_SESSION['login']) and isset($_SESSION['password']))
    {
        $login = $_SESSION['login'];
        $password = $_SESSION['password'];
        $user_id = $_SESSION['user_id'];
        $is_login = true;
    }
?>