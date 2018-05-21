<?php
$user_id; 
$is_login;
//echo "<h1>SMTH</h1>";

/*if (isset($_POST['login']) or isset($_POST['password']))
{
    echo "<h1>SMTH</h1>";
    $login=$_POST['login'];
    $password=$_POST['password'];
    echo "<h3>$login</h3>";
    echo "<h3>$password</h3>";
    $res = $_POST['save_data'];
    echo "<h3>$res</h3>";
}*/

if (isset($_COOKIE['login']) and isset($_COOKIE['password']))
{
	$login = $_COOKIE['login'];
	$password = $_COOKIE['password'];
    require "db_connection.php";
    $query = "select * from users where login=".$login." and password=".$password.";";
    $result = $pg_query($query);
    echo "$result";
    require "db_close.php";
}

if (isset($_POST['login']) and isset($_POST['password']) and !is_login)
{
	$login = $_POST['login'];
	$password = $_POST['password'];
    require "db_connection.php";
    $query = "select * from users where login=".$login." and password=".$password.";";
    $result = $pg_query($query);
    echo(result);
    require "db_close.php";
}
?>