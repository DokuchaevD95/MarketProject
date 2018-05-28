<?php
	if(isset($_POST['product_id']))
	{
		require "db_connect.php";

		$sql = "delete from products where id=".$_POST['product_id'].";";
		if(pg_query($conn, $sql))
		{
			echo json_encode(array('status' => 'Ok'));
		}
		else echo json_encode(array('status' => 'ERROR'));

		require "db_close.php";
	}
?>