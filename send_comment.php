<?php
	if(isset($_POST['product_id']) && isset($_POST['user_id']) && isset($_POST['content']))
	{
		require "db_connect.php";
		$sql = "insert into comments (product_id, user_id, content) values (".$_POST['product_id'].", ".$_POST['user_id'].", '".$_POST['content']."');";
		if(pg_query($conn, $sql))
		{
			echo json_encode(array('status' => 'Ok'));
		}
		else echo json_encode(array('error' => 'Произошла ошибка при обращении к бд!: '.$sql));
		require "db_close.php";
	}
	else echo json_encode(array('error' => 'Неправильно сформирован post!'));
?>