<?php
	require "db_connect.php";

	$sql = "select * from comments order by time desc offset 0 limit 5;"
	

	
	require "db_close.php";
?>