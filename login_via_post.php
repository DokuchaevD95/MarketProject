<?php
    if (isset($_POST['login']) and isset($_POST['password']))
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        require "db_connect.php";;
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
                if(isset($_POST['save_data']))
                {
                    setcookie('login', $res[1]);
                    setcookie('password', $res[2]);
                }
                else
                {
                    session_start();
                    $_SESSION['user_id'] = $res[0];
                    $_SESSION['login'] = $res[1];
                    $_SESSION['password'] = $res[2];
                }
            }
        }
        require "db_close.php";
    }
    header("Location: index.php");
    exit();
?>