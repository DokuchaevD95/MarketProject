<?php
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
            if($res = pg_fetch_row($res))
            {
            $is_login = true;
            $user_id = $res[0];
            setcookie('user_id', $res[0]);
            }
            else
            {
                unset($login);
                unset($password);
                $is_login = false;
            }
        }
        require "db_close.php";
    }
    if (isset($_SESSION['session_login']) and isset($_SESSION['session_password']))
    {
        setcookie('user_id', $_SESSION['session_user_id']);
        $login = $_SESSION['session_login'];
        $password = $_SESSION['session_password'];
        $user_id = $_SESSION['session_user_id'];
        $is_login = true;
    }
?>