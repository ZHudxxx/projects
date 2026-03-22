<?php

	include_once 'connect.php';

    $slotno= $_POST['slotno'];
	$resID= $_POST['resID'];
	$slotTime= $_POST['slotTime'];
	$slotDate= $_POST['slotDate'];
	$slotType= $_POST['slotType'];

	$sql = "SELECT * FROM slot WHERE resID='$resID' AND slotno='$slotno')";
	$result = $dbcon->query($sql);
	
	
	if($result->num_rows> 0) {
		while ($row = $result->fetch_assoc()){
			echo $row["slot"]."?";

		}
	} else{ 
		echo "";
	}

?>