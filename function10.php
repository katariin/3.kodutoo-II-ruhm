<?php
	require_once("dbase.php");
	require_once("Class.php");
	
	$database = "if15_jekavor";
	
	session_start();
	
	//$database = mysql_connect("servername", "server_username", "server_password", "database");
	
	//loome ab'i ühenduse
	$mysqli = new mysqli($servername, $server_username, $server_password, $database);
	//mysql_select_database("fashion", $database);
	//Uus instants klassist User
	$User = new User($mysqli);
	//$sql = mysql_query("SELECT * FROM fashion", $database);
	//mysql_close($database);
	//var_dump($User->connection);
	
	
?>