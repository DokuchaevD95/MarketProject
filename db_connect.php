<?php
	$dbstr = "host=localhost port=5432 user=admin password=password dbname=market"
	$conn = pg_connect(dbstr) or die("connection failed");
?>