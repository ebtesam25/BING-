<?php
	$db_server = "localhost";
	$db_username = "root";
	$db_password = "Chandler";
	$db_database = "bing";
	$conn = new PDO("mysql:host=$db_server; dbname=$db_database", $db_username, $db_password);
	if(!$conn){
		die("Fatal Error: Connection Failed!");
	}
?>