<?php
    if (isset($_POST['login']) and isset($_POST['password']))
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        require "db_connect.php";
        $sql = "select * from users where login = '".$login."' and password = '".$password."';";
        $res = pg_query($conn, $sql);
        require "db_close.php";
        if(!$res)
        {
            unset($login);
            unset($password);
            $is_login = false;
            echo "Ошибка подключения к базе данных!";
        }
        else
        {
            if($res = pg_fetch_row($res))
            {
                if($_POST['save_data'] == "true")
                {
                    $is_login = true;
                    $user_id = $res[0];
                    setcookie('check', $_POST['save_data']);
                    setcookie('user_id', $res[0]);
                    setcookie('login', $res[1], time() + 31536000);
                    setcookie('password', $res[2], time() + 31536000);
                }
                else
                {
                    $is_login = true;
                    $user_id = $res[0];
                    session_start();
                    setcookie('user_id', $res[0]);
                    $_SESSION['session_user_id'] = $res[0];
                    $_SESSION['session_login'] = $res[1];
                    $_SESSION['session_password'] = $res[2];
                }
                echo "ok";
            }
            else
            {
                echo "Ошибка ввода логина или пароля!";
            }
        }
    }
?>