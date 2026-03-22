<?php

 include_once 'connect.php';
  // Create a connection
    $dbcon = new MySQLi("$localhost","$username","$password","$db_name");

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
                               }

         // Query to fetch timeslots
         $sql = "SELECT * FROM slot";
         $result = $conn->query($sql);

        // Check if there are any results
        if ($result->num_rows > 0) {
        $slot = array();

        // Fetch data and add to the timeslots array
        while ($row = $result->fetch_assoc()) {
        $slot[] = $row;
                                              }

          // Convert timeslots array to JSON and output it
          echo json_encode($slot);
        } else {
          echo "No timeslots found.";
         }

        // Close the connection
        $conn->close();
       ?>
