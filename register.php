<?php
    require "db_connect.php";

    $login = $_POST['login'];
    $password = $_POST['password'];
    $tel = $_POST['tel'];
    $save = $_POST['save'];

    $sql = "select * from users where login = '".$login."';";
    $search = pg_query($conn, $sql);
    
    if(!$search)
    {
        echo "Запрос к базе не удалось выполнить";
    }
    else
    {
        if(pg_fetch_row($search))
        {
            echo "Такой пользователь уже существует. Придумайте новый логин!";
            require "db_close.php";
        }
        else
        {
            $sql = "insert into users (login, password, phone) values ('".$login."', '".$password."', '".$tel."');";
            $result = pg_query($conn, $sql);
            if($result)
            {
                echo "Пользователь был успешно добавлен!";
                
                if($save == 'true')
                {   
                    $sql = "select * from users where login = '".$login."';";
                    $search = pg_query($conn, $sql);
                    $res = pg_fetch_row($search);
                    
                    session_start();
                    $_SESSION['user_id'] = $res[0];
                    $_SESSION['login'] = $res[1];
                    $_SESSION['password'] = $res[2];
                }
            }
            else
            {
                echo "Ошибка добавления пользователя!";
            }
            require "db_close.php";
        }
    }
?>