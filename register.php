<?php

    include_once 'connect.php';
    
	$levelID = 3;
	$userID = uniqid();
    $username = $_POST['username'];
    $password = $_POST['password'];
	$email = $_POST['email'];
	$phonenum = $_POST['phonenum'];

    
	$sql1 = $dbcon->query("SELECT * FROM user WHERE username='$username'");
    if(mysqli_num_rows($sql1) >0 ){
        echo "username_already_exist";
    } else { 
		$sql2 = $dbcon->query("INSERT INTO user (userID,levelID,username,password,email,phonenum) VALUES (
														'$userID',
														'$levelID', 
														'$username', 
														'$password',
														'$phonenum',
														'$email')");
		if ($sql2) {
            echo "register_ok";
        } else {
            echo "register_error";
        } 
	}
?>