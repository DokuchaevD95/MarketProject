<?php
if(isset($_POST['user_id']) && isset($_POST['product_id']))
{
	$sql = "update products set is_selled=true, buyer=".$_POST['user_id']." where id=".$_POST['product_id'].";";

	require "db_connect.php";
	$res = pg_query($conn, $sql);
	require "db_close.php";

	if($res)
	{
		echo json_encode(array());
	}
	else
	{
		echo json_encode(array('error' => 'Проблемы с подключением к базе данных!'));
	}
}
else echo json_encode(array('error' => 'Проблемы с POST запросом!'));

?>