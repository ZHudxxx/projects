<?php 
	$host = "localhost";
	$username = "root";
	$password = "";
	$db_name = "smartcarwash";

	$dbcon = new MySQLi("$localhost","$username","$password","$db_name");

	if($dbcon-> connect_error) {
		echo "connection_error";
	}/*else{
		echo "connection_ok";
	}*/
?>