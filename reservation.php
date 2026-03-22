<?php
include_once 'connect.php';

$resID = $_POST['resID'];
$dateRes = $_POST['dateRes'];
$userID = $_POST['userID'];

$serID = $_POST['serID'];
$serType = $_POST['serType'];
$serCharge = $_POST['serCharge'];
$status = $_POST['status'];

$vecType = $_POST['vecType'];
$vecPrice = $_POST['vecPrice'];
$vecPlatno = $_POST['vecPlatno'];

$payID = $_POST['payID'];
$payType = $_POST['payType'];
$payDate = $_POST['payDate'];
$payProof = $_POST['payProof'];

// Fetch vehID from the vehicle table based on vecPlatno
$sql = "SELECT vehID FROM vehicle WHERE vecPlatno = '$vecPlatno'";
$result = $dbcon->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $vehID = $row['vehID'];
} else {
    echo "Error: Vehicle with the specified plate number not found.";
    exit;
}

// Calculate vecPrice based on vecType and add serCharge to it
$sql = "SELECT vecPrice FROM vehicle WHERE vecType = '$vecType'";
$result = $dbcon->query($sql);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $vecPrice = $row['vecPrice'] + $serCharge;
} else {
    echo "Error: Vehicle with the specified type not found.";
    exit;
}

// Insert into reservation table
$sql = "INSERT INTO reservation (resID, userID, vehID, serID, slotno, dateRes, payID, status) 
        VALUES ('$resID', '$userID', '$vehID', '$serID', DEFAULT, '$dateRes', '$payID', '$status')";

if ($dbcon->query($sql) === TRUE) {
    echo "Data inserted into the reservation table successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $dbcon->error;
    exit;
}

// Calculate payAmount as the sum of vecPrice and serCharge
$payAmount = $vecPrice + $serCharge;

// Insert into payment table (assuming payID is auto-generated)
$sql = "INSERT INTO payment (payID, resID, payType, payDate, payAmount, payProof)
        VALUES (DEFAULT, '$resID', '$payType', '$payDate', '$payAmount', '$payProof')";

if ($dbcon->query($sql) === TRUE) {
    echo "Payment data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $dbcon->error;
    exit;
}
?>
