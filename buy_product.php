<?php
if(isset($_POST['user_id']) && isset($_POST['product_id']))
{
	$sql = "update products set is_selled=true, buyer=".$_POST['user_id']." where id=".$_POST['product_id'].";";

	require "db_connect.php";
	$res = pg_query($conn, $sql);

	if($res)
	{
        $sql = "select seller from products where id=".$_POST['product_id'].";";
        $res = pg_fetch_row(pg_query($conn, $sql))[0];
        $sql = "select * from users where id=".$res.";";
        $res = pg_fetch_row(pg_query($conn, $sql));
        
        $res['id'] = (integer)$res['id'];
        
		echo json_encode(array('login' => $res[1], 'phone' => $res[3]));   
	}
	else
	{
		echo json_encode(array('error' => 'Проблемы с подключением к базе данных!'));
	}
		require "db_close.php";
}
else echo json_encode(array('error' => 'Проблемы с POST запросом!'));
?>