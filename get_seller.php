<?php
	if(isset($_POST['product_id']))
	{
		require "db_connect.php";
		$sql = "select * from users where id=(select seller from products where id=".$_POST['product_id'].");";
		if($res=pg_fetch_row(pg_query($conn, $sql)))
		{
			echo json_encode(array('login' => $res[1], 'phone' => $res[3]));
		}
		else
		{
			echo json_encode(array('error' => 'Ошибка подключения к бд!'));
		}
		require "db_close.php";
	}
	else echo json_encode(array('error' => 'Неверно сформирован post запрос!'));
?>