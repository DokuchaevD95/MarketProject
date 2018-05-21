<?php
    if (isset($_POST['login']) and isset($_POST['password']) and !$is_login)
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
            echo "<h1>dgfsdsfg</h1>";
            $is_login = true;
            $res = pg_fetch_row($res);
            $user_id = $res[0];
            $login = $res[1];
        }
        require "db_close.php";
    }
    header('Location: index.php');
?>