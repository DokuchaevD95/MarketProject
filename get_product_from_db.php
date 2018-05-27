<?php
if(!isset($_GET['id']))
{
	echo json_encode(array('error' => 'Bad Request'));
}
else
{
	$product_id = $_GET['id'];
	$product;
	require "db_connect.php";
	$sql = "select * from products where id=".$product_id.";";
	$res = pg_query($conn, $sql);
	if($res)
	{
		if($res=pg_fetch_row($res))
		{
			$product['id'] = (integer)$res[0];
			$product['seller'] = (integer)$res[1];
			$product['name'] = $res[2];
			$product['description'] = $res[3];
			$product['is_selled'] = $res[4]=="f" ? false: true;
			$product['img'] = $res[5];
			$product['buyer'] = (integer)$res[6];
			$product['price'] = (double)$res[7];

			echo json_encode($product);
		}
		else
		{
			echo json_encode(array('error' => 'Товар не найден'));
		}
	}
	else
	{
		echo json_encode(array('error' => 'Ошибка подключения к базе данных!'));
	}
}
?>
