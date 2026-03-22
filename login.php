<?php

	include_once 'connect.php';

	$username= $_POST['username'];
	$password= $_POST['Password'];

	$sql = "SELECT * FROM user WHERE username='$username' AND password='$password'";
	
	$result = $dbcon->query($sql);
	
	if($result->num_rows> 0) {
		while ($row = $result->fetch_assoc()){
			echo $row["username"];
		}
	} else { 
		echo "login_error";
	}

?>