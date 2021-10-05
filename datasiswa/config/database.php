<?php

$db_engine = "mysql";
$db_host = "localhost";
$db_name = "";
$db_user = "";
$db_pass = "";

$conn = new PDO($db_engine.":host=".$db_host.";dbname=".$db_name,$db_user,$db_pass);
?>