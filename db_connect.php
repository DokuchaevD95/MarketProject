<?php
    $host        = "host = 127.0.0.1";
   $port        = "port = 5432";
   $dbname      = "dbname = market";
   $credentials = "user = admin password=password";

   $conn = pg_connect( "$host $port $dbname $credentials") or die("error");
?>