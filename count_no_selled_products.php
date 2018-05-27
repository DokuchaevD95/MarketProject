<?php
$sql = "select count(*) from products where is_selled=false;";
require "db_connect.php";
$result = pg_query($conn, $sql);
require "db_close.php";
if($result)
{
	$result = pg_fetch_row($result);
	if($result)
	{
		echo json_encode(array('count' => $result[0]));
	}
	else echo json_encode(array('error'), 'Ошибка в оформлении запроса к бд');
}
else
{
	echo json_encode(array("error" => "Проблемы с подключением к бд!"));
}
?>