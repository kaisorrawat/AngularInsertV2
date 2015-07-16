<?php
	error_reporting(E_ALL ^ E_DEPRECATED);
	$host = "localhost";
	$user = "root";
	$pass = "root";
	$database = "data";

	$conn = mysql_connect($host,$user,$pass);

	if(!$conn){
		die('Could not connect:'.mysql_error());
	}

	mysql_select_db($database,$conn)

?>