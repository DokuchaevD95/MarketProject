<?php
	if(isset($_POST['user_id']) && isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']))
	{
		$name = $_POST['name'];
		$description = $_POST['description'];
		$user_id = $_POST['user_id'];
		$description = $_POST['description'];
		$price = $_POST['price'];

		if(isset($_FILES['img']))
		{
			if(!file_exists($_SERVER['DOCUMENT_ROOT'].'/src'))
				mkdir($_SERVER['DOCUMENT_ROOT'].'/src', '0777');
			$img = $_FILES['img'];
			$path = $_SERVER['DOCUMENT_ROOT'].'/src/';
			$tmp_name = $_FILES['img']['tmp_name'];
			$finally_name = $path."$user_id"."_".date("d.m.y_U").".jpg";

			move_uploaded_file($tmp_name, $finally_name);
		}

		require "db_connect.php";
		$sql = "insert into products (seller, name, description, img, price) values (".$user_id.", '".$name."', '".$description."', '".$finally_name."', ".$price.");";
		require "db_close.php";
		if(pg_query($sql))
			echo "Oк. Продажа создана!";
		else echo "Проблемы с обращением к базе данных!";
	}
	else echo "Допущена ошибка при оформлении запроса!";
?>